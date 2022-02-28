<?php            
    
    $product=$name=$min=$pmin=$qty="";
    if(isset($_POST['update'])){
        
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $product = clean($_POST['update']);
        $name = clean($_POST['product']);
        $capacity = clean($_POST['capacity']);
        $min = clean($_POST['min']);
        $pmin = clean($_POST['pmin']);
        $qty = clean($_POST['qty']);
        
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter item name, to update!</span>
                </div>';
        } 
        else
        if(!$capacity){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select product capacity!</span>
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
                    <span class="text-danger">Enter minimum quantity for restock!</span>
                </div>';
            
        }else
        {
        
            $select = mysql_query("SELECT name FROM product WHERE name='$name' AND productID != '$product' ");
            $counting=  mysql_num_rows($select);
            
            if($counting>0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Item '.$name.' already exists!</span>
                    </div>';
            }else{
                if(!$insert = mysql_query("UPDATE product SET Name='$name',capacity='$capacity',qty='$qty',minimum='$min',pharmacy_minimum='$pmin' WHERE PID='$product'")){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">'.mysql_error().'</span>
                        </div>';
                }else{
                    $product=$name=$min=$pmin=$qty="";
                    $_SESSION['update']='success';
                    header('Location:view-item.php');
                    echo "<script type='text/javascript'> document.location = 'view-item.php'; </script>";
                    exit();
                }
            }
        }    
    }
?>                                                             