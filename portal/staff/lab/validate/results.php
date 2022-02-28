<?php                                                                        
    $results[]="";
    //remove book from list
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $patient = mysql_real_escape_string($_GET['id']);
        $visit = mysql_real_escape_string($_GET['no']);
        
        $testResults = $_POST['results'];
        $test = $_POST['labTestID'];
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify Lab Technician!</span>
            </div>';
        }else
        if(!isset($testResults) && !is_array($testResults)){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Results for the recommended Tests</span>
                </div>'; 
        }else
        {
        
               
                //update status to show patient has been diagonised
                if(!$insert = mysql_query("UPDATE visit SET level='3' WHERE patientNo='$patient' AND visitNo='$visit'"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else
                {
                
                    $p=$k=$i=0;
                    foreach ($testResults as $key) {

                        if(!$update_rows =mysql_query("UPDATE lab_test SET results_date=NOW(), result='".clean($testResults[$p++])."', lab='$staffID' WHERE labTestID = '".$test[$k++]."' "))
                        {
                            echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warnning">'.mysql_error().'</span>
                                </div>';
                        }else{
                            $i++;
                        }
                        
                    }
                    if($i > 0){
                        
                            $results[]="";
                            $_SESSION['test_successful']='success';
                            header('Location:index.php');
                            echo "<script type='text/javascript'> document.location = 'index.php'; </script>";
                            exit();
                        }
            }
        }
    }
?>                                                             