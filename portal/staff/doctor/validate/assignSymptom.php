<?php                                  
    //if diagnose button is clicked
    if(isset($_POST['diagnose'])){
        $patientNo = mysql_real_escape_string($_GET['id']);
        $visitNo = mysql_real_escape_string($_GET['no']);
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Symptom was selected!</span>
                </div>';
        }else{
            $check=$_POST['checkbox'];
            
            for($i=0;$i<count($check);$i++){}
                    
            $patient = array_fill(0,$i,$patientNo);
            $visit = array_fill(0,$i,$visitNo);
            $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                    
            $c = array_map(function ($patient,$visit,$date,$check){return "'$patient','$visit','$date','$check'";} , $patient,$visit,$date,$check);
                
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
                    //check if patient has been diagonised
                    if($level == 1){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                            <i class="fa fa-warning"></i> 
                                <b>Warning:</b>&nbsp;
                                Patient No. <b>'.$patientNo.'</b> has already been diagnosed, during visit No. <b>'.$visitNo.'</b>
                            </span>
                        </div>';
                    }else //check if patient has been sent to lab
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
                    }else //check if patient lab results are out
                    if($level == 3){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                            <i class="fa fa-warning"></i> 
                                <b>Warning:</b>&nbsp;
                                Patient No. <b>'.$patientNo.'</b> lab results are out
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
                    }else //update status to show patient has been diagonised
                    if(!$insert = mysql_query("UPDATE visit SET level='1',doc='$staffID' WHERE patientNo='$patientNo' AND visitNo='$visitNo'"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else //insert patients symptoms to database
                    if(!$insert1 = mysql_query("INSERT INTO patient_diagnosed_symptoms (patientNo,visitNo,date_diagnosed,symptomID) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else{//go to diseases page & see associated diseases
                        $_SESSION["patient"]=$patientNo;
                        $_SESSION["visit"]=$visitNo;
                        $_SESSION["symptoms"]=$check;
                        header('Location:diseases.php');
                        echo "<script type='text/javascript'> document.location = 'diseases.php'; </script>";
                        exit();
                    }
                }               
            }
        }
    }else
        
        
        
    //if add diagnosed sysmpto to patient, is selected
    if(isset($_POST['add'])){
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Symptom was selected!</span>
                </div>';
        }else{
            
            $patientNo = $_SESSION['addSymptom1'];
            $visitNo = $_SESSION['addSymptom2'];
            
            $check=$_POST['checkbox'];
            
            
            if(!$sql=mysql_query("SELECT s.name FROM patient_diagnosed_symptoms d
                                LEFT JOIN symptom s
                                ON d.symptomID = s.symptomID
                                WHERE d.symptomID IN(".implode(',',$check).") AND d.patientNo='$patientNo' AND d.visitNo = '$visitNo'"))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'. mysql_error().'</span>
                    </div>';
            }else
            {
                $counts =  mysql_num_rows($sql);
                
                if($counts > 0){
                    while($rs=mysql_fetch_assoc($sql)){
                            $symptoms[] = $rs['name'];
                    }
                    
                    //display error message
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                                <i class="fa fa-warning"></i> &nbsp;
                                Patient has already been diagnosed with the following symptoms:
                                <ol><li>'
                                    .implode('</li><li>',$symptoms).
                                '</li></ol>
                            </span>
                        </div>';
                }else
                {
                    for($i=0;$i<count($check);$i++){}

                    $patient = array_fill(0,$i,$patientNo);
                    $visit = array_fill(0,$i,$visitNo);
                    $date = array_fill(0,$i,date("Y-m-d H:i:s"));

                    $c = array_map(function ($patient,$visit,$date,$check){return "'$patient','$visit','$date','$check'";} , $patient,$visit,$date,$check);

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
                            }else //check if patient lab results are out
                            if($level == 3){
                                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">
                                    <i class="fa fa-warning"></i> 
                                        <b>Warning:</b>&nbsp;
                                        Patient No. <b>'.$patientNo.'</b> lab results are out
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
                            }else //insert patients symptoms to database
                            if(!$insert = mysql_query("INSERT INTO patient_diagnosed_symptoms (patientNo,visitNo,date_diagnosed,symptomID) VALUES (".implode('),(', $c).")"))
                            {
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">'.mysql_error().'</span>
                                    </div>';
                            }else{
                                //go to diseases page & see associated diseases

                                $_SESSION["added"]="true";
                                header('Location:symptoms.php?dpid='.$patientNo.'&dpvno='.$visitNo.'');
                                echo "<script type='text/javascript'> document.location = 'symptoms?dpid=$patientNo&dpvno=$visitNo'; </script>";
                                exit();
                            }
                        }               
                    }
                }    
            }    
        }
    }else
        
        
        
        
    // Check if assign button active, start this
    if(isset($_POST['assign'])){
        
        $id = mysql_real_escape_string($_GET['did']);
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Symptom was selected!</span>
                </div>';
        }else{
            $check=$_POST['checkbox'];
            
            //check if a symptom is already assigned to this disease
            if(!$sq=mysql_query("SELECT s.name 
                                FROM disease_symptom ds
                                LEFT JOIN symptom s
                                ON ds.symptomID = s.symptomID 
                                WHERE ds.symptomID IN (".implode(',',$check).") AND ds.diseaseID='$id'"))
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
                if($count > 0){
                    //get symptom name
                    while($rws=mysql_fetch_assoc($sq)){
                        $name[] = $rws['name'];
                    }
                    
                    $_SESSION["symptom"]=$name;
                    header('Location:symptoms.php?did='.$id.'');
                    echo "<script type='text/javascript'> document.location = 'symptoms.php?did=$id'; </script>";
                    exit();
                }else
                {
                    for($i=0;$i<count($check);$i++){}
                    
                    $diseaseID = array_fill(0,$i,$id);
                    $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                    $officer = array_fill(0,$i,$staffID);
                    
                    $c = array_map(function ($check,$diseaseID,$date,$officer){return "'$check','$diseaseID','$date','$officer'";} , $check,$diseaseID,$date,$officer);
                
                    
                    //continue with saving the assigned symptoms to the disease
                    if(!$insert = mysql_query("INSERT INTO disease_symptom (symptomID,diseaseID,added,staffID) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {
                        $_SESSION["assign"]='true';
                        $_SESSION["symptoms"]=$i;
                        $_SESSION["disease"]=$disease;
                        header('Location:diseases.php');
                        echo "<script type='text/javascript'> document.location = 'diseases.php'; </script>";
                        exit();
                    }
                }   
             }
            }
        }else
            
            
            
    // Check if assign button active, start this
    if(isset($_POST['associateDisease'])){
        
        $patient = mysql_real_escape_string($_GET['dpid']);
        $visit = mysql_real_escape_string($_GET['dpvno']);
                
            if(!isset($diagnosedSymptoms)){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No Symptoms detected!</span>
                    </div>';
            }else
          
            if(count($diagnosedSymptoms) < 1){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No Symptoms diagnosed for his patient!</span>
                    </div>';
            }else{
                    $_SESSION["patient"]= mysql_real_escape_string($_GET['dpid']);
                    $_SESSION["visit"]= mysql_real_escape_string($_GET['dpvno']);
                    $_SESSION["diagnosedSymptoms"]=$diagnosedSymptoms;
                    header('Location:diseases.php');
                    echo "<script type='text/javascript'> document.location = 'diseases.php'; </script>";
                    exit();
                }
        
    }
        
        
        
     ?>              