<?php
    $mail="";
    if(isset($_POST['submit'])){
        $mail=  mysql_escape_string($_POST['mail']);
        
        if($mail){
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $sql=mysql_query("select mail,fname,staffID from staff where mail='$mail' ") or die (mysql_error());
                $q=  mysql_affected_rows();
                if($q<1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">E-mail addresses did not match!</span>
                        </div>';
                }else 
                if($q > 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Duplicate e-mail address found!</span>
                        </div>';
                }else 
                    if($q == 1){
                        $res=mysql_fetch_array($sql);
                        
                        $id=$res['staffID'];
                        
                        $rid= md5(uniqid(rand(),true));
                        
                        
                        $key=md5($rid);
                        $sql=mysql_query("UPDATE staff SET activation='$key' where staffID='$id' ") or die (mysql_error());
                        
                        
                        $email=base64_encode($mail);
                        
                        $name=$res['fname'];
                        
                        $to=$res['mail'];
                        $subject='Password Reset|WAKA CMEC Hospital';
                        $message="Hello $name,<br> 
                                Someone requested to reset your password.<br>
                                If this was you,<a href='http://www.wakamedcenter.org/portal/staff/reset.php?mail=$email&key=$key'>click here</a>to reset your password,
			        if not just ignore this email.
                                <br><br>
			        Thank you,
                                <br><br>
                                WAKA CMEC Training Institute & Hospital
                                <br><br>";
                            

			// Always set content-type when sending HTML email
                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                        
                        $headers .='From:noreply@wakamedcenter.org/';
                        $m=mail($to,$subject,$message,$headers);
                            
                        if($m)
                        {
                            $mail="";
                            $_SESSION['new']='true';
                            header("Location:#");
                            echo "<script type='text/javascript'> document.location = '#'; </script>";
                            exit();
                            
                        }else{
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                        <span class="text-danger">Error occured while trying to send e-mail</span>
                                </div>';
                        }
                    }          
        }else {
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Invalid Format!</span>
                </div>';
        }
        }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter your e-mail!</span>
                </div>';
        }
    }
?>