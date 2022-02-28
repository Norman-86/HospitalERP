<?php            
    
    $price="";
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
        $price = clean($_POST['price']);
        
        if(!$product){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch item info!</span>
                </div>';
        } 
        else
        if(!$price){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter price of Item Qty per Unit!</span>
                </div>';            
        }else
        if(!$insert = mysql_query("UPDATE product SET price='$price' WHERE PID='$product'")){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">'.mysql_error().'</span>
                </div>';
        }else{
            $price="";
            $_SESSION['update']='success';
            header('Location:items.php');
            echo "<script type='text/javascript'> document.location = 'items.php'; </script>";
            exit();
        } 
    }
?>                                                             