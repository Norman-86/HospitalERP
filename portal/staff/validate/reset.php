<?php 
    $new=$confirm="";
    if(isset($_POST['reset'])){
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }       
                    
        $new = clean($_POST['new']);
        $confirm = clean($_POST['confirm']);
                    
        if(!$new){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter new password!</span>
                </div>';
            
        }else
        if(!$confirm){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Confirm new password!</span>
                </div>';
        }else
        if($new !== $confirm){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Password did not match!</span>
                </div>';
        }else
        {
            $pass=md5($new);
            // Update the database to set the "activation" field to null
            $query_reset_account = "UPDATE staff SET pass='$pass', activation=NULL WHERE mail ='$email' AND activation='$key'";
            $result_reset_account = mysql_query($query_reset_account) ;
            $affected = mysql_affected_rows();

            // Print a customized message:
            if ($affected == 1)//if update query was successfull
            {
                $new=$confirm="";
                
                $_SESSION['success']="true";
                header('Location:reset.php');
                echo "<script type='text/javascript'> document.location = 'reset.php'; </script>";
                exit();
            }else
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Oops! Your account could not be activated. Please recheck the link or contact the system administrator.</span>
                    </div>';
            }
        }
    }
?>
