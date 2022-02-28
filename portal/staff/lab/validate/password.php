<?php  
    $current=$new=$confirm="";
    if(isset($_POST['update']))
    {
        $current = mysql_real_escape_string($_POST['currentpass']);
        $new = mysql_real_escape_string($_POST['newpass']);
        $confirm = mysql_real_escape_string($_POST['confirmpass']);
        
        if($current){
            if($new){
                if($confirm){
                    if($new==$confirm){
                        $cp=md5($current);
                        $np=md5($new);
                        if(!$result = mysql_query("SELECT pass FROM staff where staffID='$staffID'")){
                        echo '<div class="bg-danger text-danger" style="text-align:center;padding:3px;"><i class="fa fa-times-circle"></i> &nbsp;'.mysql_error().'</div>';
                        }
                        else{
                            while ($row = mysql_fetch_array($result)) {
                                if($cp==$row['pass']){
                                    if(!$insert = mysql_query("UPDATE staff SET pass='$np' WHERE staffID='$staffID'")){
                                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <span class="text-danger">'.mysql_error().'</span>
                                        </div>';
                                    }
                                    else{
                                            $current=$new=$confirm="";
                                            
                                            $_SESSION['success']="true";
                        
                                            header('Location:settings.php');
                                            echo "<script type='text/javascript'> document.location = 'settings.php'; </script>";
                                            exit();
                                        }
                                }else {echo '<div class="alert alert-danger absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-danger">Incorrect current password</span>
                                            </div>';}
                            }
                        }
                    
                    
                    }else {echo '<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">Passwords did not match</span>
                                </div>';}
                }else {echo '<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">Confirm new password</span>
                            </div>';}
            }else {echo '<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Enter new password</span>
                        </div>';}
        }else {echo '<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">Enter current password</span>
                    </div>';}
       
    }  
?>