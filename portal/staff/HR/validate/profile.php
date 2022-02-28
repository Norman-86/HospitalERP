<?php  
    $mail=$current="";
    if(isset($_POST['update']))
    {
        $mail = mysql_real_escape_string($_POST['mail']);
        $current = mysql_real_escape_string($_POST['pass']);
        
        if(!$mail){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter administrator e-mail</span>
                </div>';
        }else
        if(!$current){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter administrator password</span>
                </div>';
        }else
        {
            $cp=md5($current);
            if(!$result = mysql_query("SELECT pass FROM staff where staffID='$staffID'")){
                echo '<div class="bg-danger text-danger" style="text-align:center;padding:3px;">
                        <i class="fa fa-times-circle"></i> 
                        &nbsp;'.mysql_error().
                    '</div>';
            }
            else
            {
                while ($row = mysql_fetch_array($result)) {
                    if($cp !== $row['pass']){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">Incorrect current password</span>
                            </div>';
                    }else
                    {
                        if(!$insert = mysql_query("UPDATE staff SET mail='$mail' WHERE staffID='$staffID'")){
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
                    }
                }
            }
        }
    }  
?>