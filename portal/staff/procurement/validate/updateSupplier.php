<?php            
    
    $product=$name="";
    if(isset($_POST['update'])){
        
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $name = clean($_POST['name']);
        $address = clean($_POST['address']);
        $contact1 = clean($_POST['contact1']);
        $contact2 = clean($_POST['contact2']);
        $mail = clean($_POST['mail']);
        $supplier = clean($_POST['update']);
       
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter supplier name!</span>
            </div>';
        }else
        if(!$address){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter address!</span>
            </div>';
        }else
        if(!$contact1){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter supplier contact!</span>
            </div>';
        }else
        if(!$mail){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter supplier email!</span>
            </div>';
        }else{ 
            if(filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                if(!$supplier){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Error: failed to identify supplier to be updated!</span>
                        </div>';
                }else
                {
                    $select = mysql_query("SELECT name FROM supplier WHERE name='$name'");
                    $counting=  mysql_num_rows($select);

                    if($counting>1){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warning">A supplier with similar name already exists!</span>
                            </div>';
                    }else
                    {
                        if(!$insert = mysql_query("UPDATE supplier SET name='$name',address='$address',contacts1='$contact1',contacts2='$contact2',mail='$mail' WHERE SID='$supplier'"))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }
                        else{
                            $name=$address=$contact1=$contact2=$mail="";

                            $_SESSION['update']='sucess';
                            header('Location:view-supplier.php');
                        }
                     }
                }
            }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Invalid e-mail format</span>
                    </div>';
            }
        }    
    }
?>                                                             