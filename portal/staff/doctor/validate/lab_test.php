<?php
    
    if(isset($_POST['lab'])){
            $patientNo = mysql_real_escape_string($_SESSION['patient']);
            $visitNo = mysql_real_escape_string($_SESSION['visit']);
        
            //$check=$_POST['checkbox'];
            /*
            for($i=0;$i<count($check);$i++){}
                    
            $patient = array_fill(0,$i,$patientNo);
            $visit = array_fill(0,$i,$visitNo);
            $officer = array_fill(0,$i,$staffID);
            $date = array_fill(0,$i,date("Y-m-d H:i:s"));
             */       
            //$c = array_map(function ($patient,$visit,$date,$check,$officer){return "'$patient','$visit','$date','$check','$officer'";} , $patient,$visit,$date,$check,$officer);
                
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
                    }else
                    if($level == 3){
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                            <i class="fa fa-warning"></i> 
                                <b>Warning:</b>&nbsp;
                                Patient No. <b>'.$patientNo.'</b> lab results are out!
                            </span>
                        </div>';
                    }else//check if patient has been prescribed medicine
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
                    {
                        //go to diseases page & see associated diseases
                        echo $_SESSION["labPatient"]=$patientNo;
                        $_SESSION["labVisit"]=$visitNo;
                        //$_SESSION["labDetails"]=$c;
                        header('Location:tests.php');
                        echo "<script type='text/javascript'> document.location = 'tests.php'; </script>";
                        exit();
                    }
                }               
            
        }
    }else
        
        
        
     
    if(isset($_POST['submit_for_test'])){    
    
        $patientNo = mysql_real_escape_string($_SESSION['patient']);
        $visitNo = mysql_real_escape_string($_SESSION['visit']);
        
        if(!isset($_POST['checkbox'])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No test was selected!</span>
                </div>';
        }else{
            $check=$_POST['checkbox'];
            
            for($i=0;$i<count($check);$i++){}
                    
            $patient = array_fill(0,$i,$patientNo);
            $visit = array_fill(0,$i,$visitNo);
            $officer = array_fill(0,$i,$staffID);
            $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                    
            $c = array_map(function ($check,$patient,$visit,$officer,$date){return "'$check','$patient','$visit','$officer','$date'";} , $check,$patient,$visit,$officer,$date);
                
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
                    if(!$update = mysql_query("UPDATE visit SET level='2' WHERE patientNo='$patientNo' AND visitNo='$visitNo'"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    if(!$insert = mysql_query("INSERT INTO lab_test (testID,patientNo,visitNo,doc,test_date) VALUES (".implode('),(', $c).")"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {//go to diseases page & see associated diseases
                        $_SESSION["patientTest"]=$patientNo;
                        header('Location:index.php');
                        echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                        exit();
                    }
                }               
            }
        }
    }
    
?>

