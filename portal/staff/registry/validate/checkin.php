<?php                                                                        
    $name=$gender=$dob=$id=$phone=$country=$town=$rate=$paid="";
    if(isset($_POST['checkin'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $patientNo = $_POST['checkin'];
        $dob = clean(date_format(date_create($_POST['dob']),"Y-m-d."));
        
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$patientNo){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Patient Name!</span>
            </div>';
        }else
        {
            //generate visit No
            $visitNo = rand(0,999999);
                //calculate total number of students in the assigned class
                $sel = mysql_query("SELECT COUNT(*) AS visit
                                    FROM visit p
                                    WHERE visitNo='$visitNo'");
                
                while ($ros = mysql_fetch_assoc($sel)){
                    $visit = $ros['visit'];
                }
                if($visit > 0){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning"> 
                                <b><i class="fa fa-warning"></i>Warning</b> &nbsp;
                                Opps! Generated visit No collided with an existing one. please try again!
                            </span>
                        </div>';
                }else
                {
                    
                    if(!$insert1 = mysql_query("INSERT INTO visit (visitNo,patientNo,dov,status,staffID)
                                                VALUES ('$visitNo','$patientNo',NOW(),'Out Patient','$staffID')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {
                        header('Location:payment.php?id='.$patientNo.'&no='.$visitNo.'');
                        echo "<script type='text/javascript'> document.location = 'payment.php?id=$patientNo&no=$visitNo'; </script>";
                        exit();
                    }
                }
            }
          
    }
       
?>                                                             