<?php                                                                        
    $course=$yos=$sem=$period=$fee="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        $course = clean($_POST['course']);
        $yos = clean($_POST['yos']);
        $sem = clean($_POST['sem']);
        $period = clean($_POST['period']);
        $fee = clean($_POST['fee']);
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$course){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Course!</span>
            </div>';
        }else
        if(!$yos){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Year of Study!</span>
            </div>';
        }else
        if(!$sem){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Semester!</span>
            </div>';
        }else
        if(!$period){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Semester Period!</span>
            </div>';
        }else
        if(!$fee){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Fee!</span>
            </div>';
        }else
        {
           
            $selectFee = mysql_query("SELECT * FROM fee WHERE courseID='$course' AND yosID='$yos' AND semisterID='$sem' AND periodID='$period' ");
            $countFee=  mysql_num_rows($selectFee);
            
            if($countFee > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i> &nbsp; Warning</b>
                            <br>
                            Fee for selections made already exists
                        </span>
                    </div>';
            }else
            {
                if(!$insert = mysql_query("INSERT INTO fee (amount,courseID,yosID,semisterID,periodID,registered,staffID)
                                            VALUES ('$fee','$course','$yos','$sem','$period',NOW(),'$staffID')"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }
                else{
                    
                    $_SESSION["new"]='True';
                    header('Location:fee.php');
                    echo "<script type='text/javascript'> document.location = 'fee.php'; </script>";
                    exit();
                }
            
            }
        }
    }
?>                                                             