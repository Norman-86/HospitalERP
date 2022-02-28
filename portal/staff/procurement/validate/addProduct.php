<?php                                                                        
    $name=$capacity=$min=$pmin=$qty="";
    if(isset($_POST['save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $name = clean($_POST['product']);
        $capacity = clean($_POST['capacity']);
        $min = clean($_POST['min']);
        $pmin = clean($_POST['pmin']);
        $qty = clean($_POST['qty']);
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify procurement officer!</span>
            </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter item name!</span>
            </div>';
        }else
        if(!$capacity){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select item capacity!</span>
            </div>';
        }else
        if(!$qty){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Qty per Item!</span>
            </div>';
        }else
        if(!$min){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter minimum item quantity!</span>
                </div>';
        }else{
            
            $select = mysql_query("SELECT name FROM product WHERE name='$name'");
            $counting=  mysql_num_rows($select);
            
            if($counting>0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Item '.$name.' already exists!</span>
                    </div>';
            }else{
            
                if(!$insert = mysql_query("INSERT INTO product (name,capacity,qty,minimum,pharmacy_minimum,staffID,time) VALUES ('$name','$capacity','$qty','$min','$pmin','$staffID',NOW())"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $name=$capacity=$min=$pmin=$qty="";
                    $_SESSION["new"]='True';
                    header('Location:add-item.php');
                    echo "<script type='text/javascript'> document.location = 'add-item.php'; </script>";
                    exit();
                }
            
            }
        }  
        }
        
?>                                                             