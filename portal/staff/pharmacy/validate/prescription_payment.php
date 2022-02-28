<?php                                                                        
    $product=$qty[]="";
    if(isset($_POST['save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $product = clean($_POST['prescriptionID']);
        $quantity = $_POST['qty'];
       
        
            /*get array values that are less or equal to zero*/  
            /*$filteredarray = array_values( array_filter($quantity) );
            $newCapacity = array_diff_key($quantity,$filteredarray);
            */
            /*end*/
               /* 
            foreach ($newCapacity as $k => $v) {
                $keys[]= $k;
                $newItems[] = $item[$k];
            }*/
        if(!$staffID){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify requisitioning officer!</span>
                </div>';
        }else        
        /*if($newCapacity != NULL){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">
                        <i class="fa fa-warning"></i> &nbsp;
                        Enter Quantity for the following prescription(s):
                        <br>
                        <label style="font-size:13px;color:black;font-weight:normal;">'
                            .implode('<br>',$newItems).
                        '</label>
                    </span>
                </div>';
        }else*/
            
        if(!isset($product) && !is_array($product)){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Failed to identify prescription!</span>
                </div>';
        }else    
            
        if(!isset($quantity) && !is_array($quantity)){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Quantity to prescribe</span>
                </div>';
                unset($_SESSION['quantity']); 
        }else
        
            { 
                $product = $_POST['prescriptionID'];
                $quantity = $_POST['qty'];
                    
                if(!$select =mysql_query("SELECT i.name,p.patientNo,p.visitNo 
                                            FROM prescription p 
                                            LEFT JOIN product i 
                                            ON p.productID = i.PID
                                            WHERE p.prescriptionID IN (".implode(',',$product).")
                                            AND p.status > '0' "))
                {
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">'.mysql_error().'</span>
                        </div>';
                }else
                {
                    $count=  mysql_num_rows($select);
                    while ($medication = mysql_fetch_array($select)){
                        $drug[] = $medication['name'];
                        $patient = $medication['patientNo'];
                        $visit = $medication['visitNo'];
                    }
                    
                    if($count > 0){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warning">
                                    Patient No. <b>'.$patient.'</b> has already been prescribed the following medication, on Visit No. <b>'.$visit.'</b>
                                    <br>
                                        <ol>
                                            <li>
                                                '.implode("</li><li>", $drug).'
                                            </li>
                                        </ol>
                                </span>
                            </div>';
                    }else
                    {
                    
                        if(!$selected =mysql_query("SELECT DISTINCT patientNo,visitNo 
                                            FROM prescription 
                                            WHERE prescriptionID IN (".implode(',',$product).")
                                            AND status IS NULL "))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }else
                        {
                            while ($medic = mysql_fetch_array($selected)){
                                $patient = $medic['patientNo'];
                                $visit = $medic['visitNo'];
                            }
                            
                            for($a=0;$a<count($product);$a++){}

                            $status = array_fill(0,$a,"1");
                            $officer = array_fill(0,$a,$staffID);
                            
                            $index1=$index2=$index3=$index4=$index5=$index6=0;

                            if(!$update_rows =mysql_query("UPDATE visit SET level='5',pharmacy='$staffID' WHERE patientNo='$patient' AND visitNo='$visit' "))
                            {
                                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-warnning">'.mysql_error().'</span>
                                            </div>';
                            }else
                            {
                                foreach ($product as $key) {
                                    if(!$update_rows =mysql_query("UPDATE prescription SET status='".$status[$index1++]."',qty='".$quantity[$index2++]."' WHERE prescriptionID ='".$product[$index3++]."'"))
                                    {
                                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-warnning">'.mysql_error().'</span>
                                            </div>';
                                    }else{
                                        $true=1;
                                    }
                                }
                                if(isset($true)==1){
                                    $_SESSION['prescription_successful']='success';
                                    header('Location:index.php');
                                    echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                                    exit();
                                }
                            }
                        }
                    }
                }
            }  
        }
        
?>                                                             