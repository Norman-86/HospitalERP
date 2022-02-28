<?php                                                                        
    $product=$quantity[]=$usage=$designation="";
    //remove book from list
    if(isset($_POST['remove'])){
        $remove=$_POST['remove'];
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify Secretary!</span>
            </div>';
        }else{
            //remove the selected book from array(list)of books
            if (($key = array_search($remove, $array)) !== false) {
                unset($array[$key]);
            }
            /*serialize array and send it back to page
                to display the new set of books after removing book
             */
            $id=base64_encode(serialize($array));
            echo '<script type="text/javascript"> document.location = "requisition_items.php?id='.$id.'"; </script>';
        }
    }else
    if(isset($_POST['save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $item = $_POST['item'];
        $product = clean($_POST['itemID']);
        $quantity = $_POST['qty'];
        $designation = clean($_POST['designation']);
        $usage = clean($_POST['usage']);
       
        
            /*get array values that are less or equal to zero*/  
            $filteredarray = array_values( array_filter($quantity) );
            $newCapacity = array_diff_key($quantity,$filteredarray);
            /*end*/
                
            foreach ($newCapacity as $k => $v) {
                $keys[]= $k;
                $newItems[] = $item[$k];
            }
                
        if($newCapacity != NULL){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">
                        <i class="fa fa-warning"></i> &nbsp;
                        Enter Quantity for the following item(s):
                        <br>
                        <label style="font-size:13px;color:black;font-weight:normal;">'
                            .implode('<br>',$newItems).
                        '</label>
                    </span>
                </div>';
        }else
            
        if(!isset($product) && !is_array($product)){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Failed to identify item to requisition!</span>
                </div>';
        }else    
            
        if(!isset($quantity) && !is_array($quantity)){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Quantity to requisition</span>
                </div>';
                unset($_SESSION['quantity']); 
        }else
        if(!$designation){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Designation!</span>
                </div>';
        }else
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify requisitioning officer!</span>
                </div>';
        }else
            {
                
                
                
                $product = $_POST['itemID'];
                $quantity = $_POST['qty'];
                $designation = $_POST['designation'];
                $reqNo = $_POST['req'];
                $officer = $_POST['officer'];
        
                
                
                
                for($i=0;$i<count($product);$i++){}
                
                $new_usage = array_fill(0,$i,$usage);
                $new_designation = array_fill(0,$i,$designation);
                $QtyI = array_fill(0,$i,"-1");
                $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                $bar = array_fill(0,$i,"1");
                
               // print_r($time);
               
                
                $c = array_map(function ($reqNo,$officer,$product,$quantity,$new_usage,$new_designation,$QtyI,$date,$bar){return "'$reqNo','$officer','$product','$quantity','$new_usage','$new_designation','$QtyI','$date','$bar'";} , $reqNo,$officer,$product,$quantity,$new_usage,$new_designation,$QtyI,$date,$bar);
                
                
         
                if(!$insert = mysql_query("INSERT INTO request (RNO,staffID,PID,QtyR,Iuse,Designation,QtyI,Rdate,bar) VALUES (".implode('),(', $c).")"))
                {
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <span class="text-warning">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $product=$quantity[]=$usage=$designation="";
                    $_SESSION['requisition_successful']='success';
                    header('Location:requisitions.php');
                    echo "<script type='text/javascript'> document.location = 'requisitions.php'; </script>";
                    exit();
                }
            }  
        }
        
?>                                                             