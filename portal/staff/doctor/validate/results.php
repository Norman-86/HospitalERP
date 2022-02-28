<?php                                                                        
    $results[]="";
    //remove book from list
    if(isset($_POST['submit'])){
        
        
        $patient = mysql_real_escape_string($_GET['id']);
        $visit = mysql_real_escape_string($_GET['no']);
        
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify Lab Technician!</span>
            </div>';
        }else
        
        {
                            $_SESSION["patient"] = $patient;
                            $_SESSION["visit"] = $visit;
                            $_SESSION['results']='success';
                            header('Location:diseases.php');
                            echo "<script type='text/javascript'> document.location = 'diseases.php'; </script>";
                            exit();
        }
            
        
    }
?>                                                             