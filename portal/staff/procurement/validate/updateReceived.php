<?php                                                                        
    $product=$capacity=$quantity=$contract=$price="";
    if(isset($_POST['save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $received = clean($_POST['save']);
        $quantity = clean($_POST['quantity']);
        $price = clean($_POST['price']);
        $contract = clean($_POST['contract']);
        $supplier = clean($_POST['supplier']);
       
        if(!$received){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error: Failed to identify product received!</span>
                </div>';            
        }else
        if(!$quantity){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Quantity!</span>
                </div>';
        }else
        /*if(!$price){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter price of product!</span>
                    </div>';
        }else*/
        if(!$contract){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter LPO No!</span>
                    </div>';
            
        }else
        if(!$supplier){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Supplier!</span>
                    </div>';
            
        }else
            {
                if(!$insert = mysql_query("UPDATE productsupplied SET SID='$supplier',price='$price',Qty='$quantity',Contract='$contract' WHERE PSID='$received'"))
                {
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $received=$capacity=$quantity=$contract=$price="";
                    $product=$name="";
                    $_SESSION['update']='success';
                    header('Location:view-received.php');
                    
                }
            }  
        }else
            
    if(isset($_POST['pharmacy_save'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $received = clean($_POST['pharmacy_save']);
        $quantity = clean($_POST['quantity']);
        $price = clean($_POST['price']);
        $contract = clean($_POST['contract']);
        $supplier = clean($_POST['supplier']);
       
        if(!$received){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error: Failed to identify product received!</span>
                </div>';            
        }else
        if(!$quantity){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Quantity!</span>
                </div>';
        }else
        /*if(!$price){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter price of product!</span>
                    </div>';
        }else*/
        if(!$contract){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter LPO No!</span>
                    </div>';
            
        }else
        if(!$supplier){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Supplier!</span>
                    </div>';
            
        }else
            {
                if(!$insert = mysql_query("UPDATE pharmacy_productsupplied SET SID='$supplier',price='$price',Qty='$quantity',Contract='$contract' WHERE PPSID='$received'"))
                {
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    $received=$capacity=$quantity=$contract=$price="";
                    $product=$name="";
                    $_SESSION['update']='success';
                    header('Location:view-pharmacy-received.php');
                    
                }
            }  
        }        
            
            
        
?>                                                             