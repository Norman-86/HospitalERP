<?php  
    $period=$mop=$fee="";
    if(isset($_POST['update']))
    {
        $student = mysql_real_escape_string($_GET['id']);
        $feeID = mysql_real_escape_string($_POST['fed']);
        $period = mysql_real_escape_string($_POST['period']);
        $mop = mysql_real_escape_string($_POST['mop']);
        $fee = mysql_real_escape_string($_POST['fee']);
        $balance = mysql_real_escape_string($_POST['balance']);
        
        if(!$student){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to collect student info!</span>
                </div>';
        }else
        if(!$period){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">System failed to detect current semeter period!</span>
                </div>';
        }else
        if(!$mop){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select mode of payment!</span>
                </div>';
        }else
        if(!$fee){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Amount paid!</span>
                </div>';
        }else{
            $newBalance = $balance-$fee;
            if(!$insert = mysql_query("INSERT INTO studentfee (studentID,feeID,amount,balance,mop,dop,staffID)
                                        VALUES ('$student','$feeID','$fee','$newBalance','$mop',NOW(),'$staffID')"))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'.mysql_error().'</span>
                    </div>';
            }else{
                $_SESSION["student"]=$student;
                $_SESSION["feeSuccess"]='success';
                header('Location:success.php');
                echo "<script type='text/javascript'> document.location = 'success.php'; </script>";
                exit();
            }
        }                   
    }  
?>