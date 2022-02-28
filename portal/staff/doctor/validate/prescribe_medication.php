<?php
    $other_details="";
    if(isset($_POST['prescribe'])){
        $patientNo = mysql_real_escape_string($_SESSION['patient']);
        $visitNo = mysql_real_escape_string($_SESSION['visit']);
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Disease was selected!</span>
                </div>';
        }else{
            $check=$_POST['checkbox'];
            
            for($i=0;$i<count($check);$i++){}
                    
            $patient = array_fill(0,$i,$patientNo);
            $visit = array_fill(0,$i,$visitNo);
            $officer = array_fill(0,$i,$staffID);
            $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                    
            $c = array_map(function ($patient,$visit,$date,$check,$officer){return "'$patient','$visit','$date','$check','$officer'";} , $patient,$visit,$date,$check,$officer);
                
            //check if a symptom is already assigned to this disease
            if(!$sq=mysql_query("SELECT * FROM visit WHERE patientNo='$patientNo' AND visitNo = '$visitNo'"))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'. mysql_error().'</span>
                    </div>';
            }else
            {
                $count =  mysql_num_rows($sq);
                
                if($count < 1){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">
                        <i class="fa fa-warning"></i> 
                            <b>Warning:</b>&nbsp;
                            Error occured while trying to read patient visit info!<br>
                            <b>Hint:</b> Either patient/visit does not exist, else contact system admin.
                        </span>
                    </div>';
                }else
                {
                    while($rws=mysql_fetch_assoc($sq)){
                        $level = $rws['level'];
                    }
                    //check if patient has been sent to lab
                    if($level == 2){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                            <i class="fa fa-warning"></i> 
                                <b>Warning:</b>&nbsp;
                                Patient No. <b>'.$patientNo.'</b> is awaiting lab results
                            </span>
                        </div>';
                    }else //check if patient has been prescribed medicine
                    if($level >= 4){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                            <i class="fa fa-warning"></i> 
                                <b>Warning:</b>&nbsp;
                                Patient No. <b>'.$patientNo.'</b> has been treated
                            </span>
                        </div>';
                    }else
                    {//go to diseases page & see associated diseases
                        $_SESSION["patient"]=$patientNo;
                        $_SESSION["visit"]=$visitNo;
                        $_SESSION["details"]=$c;
                        header('Location:items.php');
                        echo "<script type='text/javascript'> document.location = 'items.php'; </script>";
                        exit();
                    }
                }               
            }
        }
    }else
        
    if(isset($_POST['submitPrescription'])){
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No prescription drug/item was selected!</span>
                </div>';
        }else{
            $check=$_POST['checkbox'];
          
            for($i=0;$i<count($check);$i++){}
            
            $other_details = mysql_real_escape_string($_POST['other_details']);
            
            $patient = array_fill(0,$i, $patientDetails);
            $visit = array_fill(0,$i, $visitDetails);
                    
            $c = array_map(function ($patient,$visit,$check){return "'$patient','$visit','$check'";} , $patient,$visit,$check);
            
                
                    //update status to show patient has been diagonised
                    if(!$insert = mysql_query("UPDATE visit SET level='4' WHERE patientNo='$patientDetails' AND visitNo='$visitDetails'"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else //insert patients symptoms to database
                    if(!$insert1 = mysql_query("INSERT INTO patient_diagnosed_disease (patientNo,visitNo,dod,diseaseID,staffID) VALUES (".implode('),(', $checkDetails).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    if(!$insert2 = mysql_query("INSERT INTO prescription (patientNo,visitNo,productID) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    if(!$other_details){
                        $_SESSION["success"]="true";
                        header('Location:index.php');
                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                        exit();
                        unset($_SESSION['symptom']);
                    }else
                    if(!$insert3 = mysql_query("INSERT INTO prescription_details (patientNo,visitNo,details) VALUES ('".$_SESSION['patient']."','".$_SESSION["visit"]."','$other_details')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                    }else{
                        $_SESSION["success"]="true";
                        header('Location:index.php');
                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                        exit();
                       unset($_SESSION['symptom']);
                    }
        }
    }
    
    
?>

