<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['deassign'])){
        
        $del_id = mysql_real_escape_string($_POST['deassign']);
        $id = mysql_real_escape_string($_GET['dsid']);
        
        
            //delete row(s) of record(s)
            $deleted = mysql_query("DELETE FROM disease_symptom WHERE diseaseID='$id' AND symptomID ='$del_id'");
            //get no. of rows deleted
            $records=  mysql_affected_rows();

            // if successful redirect to refresh page
            if($records>0){            
                $_SESSION["deassign"]='True';
                $_SESSION["disease"]=$disease;
                header('Location:diseases.php');
                echo "<script type='text/javascript'> document.location = 'diseases.php'; </script>";
                exit();
            }else{
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No Assigned Symptom deleted!</span>
                    </div>';
            }
        
    }else
        
    if(isset($_POST['unassign'])){
        
        $del_id = mysql_real_escape_string($_POST['unassign']);
        $patient = mysql_real_escape_string($_GET['dpid']);
        $visit = mysql_real_escape_string($_GET['dpvno']);
        
        
            //delete row(s) of record(s)
            $deleted = mysql_query("DELETE FROM patient_diagnosed_symptoms WHERE patientNo='$patient' AND visitNo = '$visit' AND symptomID ='$del_id'");
            //get no. of rows deleted
            $records=  mysql_affected_rows();

            // if successful redirect to refresh page
            if($records>0){            
                $_SESSION["delete"]="true";
                header('Location:symptoms.php?dpid='.$patient.'&dpvno='.$visit.'');
                echo "<script type='text/javascript'> document.location = 'symptoms.php?dpid=$patient&dpvno=$visit'; </script>";
                exit();
            }else{
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No Diagnosed Symptom deleted!</span>
                    </div>';
            }
        
    } else
    
    if(isset($_POST['addSymptom'])){
        $patient = mysql_real_escape_string($_GET['dpid']);
        $visit = mysql_real_escape_string($_GET['dpvno']);
                  
                $_SESSION["addSymptom1"]=$patient;
                $_SESSION["addSymptom2"]=$visit;
                header('Location:symptoms.php');
                echo "<script type='text/javascript'> document.location = 'symptoms.php'; </script>";
                exit();
          
        
    }
?>                                                             