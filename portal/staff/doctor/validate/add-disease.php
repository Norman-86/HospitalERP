<?php                                                                        
    $name=$gender=$age=$details="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $name = clean($_POST['name']);
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $details = clean($_POST['details']);
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify doctor!</span>
            </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Symptom Name!</span>
            </div>';
        }else
        if(!$gender){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Gender!</span>
            </div>';
        }else
        if(!$age){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Age!</span>
            </div>';
        }else
        {
                $selected = mysql_query("SELECT * FROM disease WHERE name='$name' ");
                $counting=  mysql_num_rows($selected);
           
            if($counting > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b>
                            <br>
                            Disease: <b>'.$name.'</b> already exists!</span>
                    </div>';
            }else
            { 
                    if(!$insert = mysql_query("INSERT INTO disease (name,gender,age,other_details,added,staffID)VALUES ('$name','$gender','$age','$details',NOW(),'$staffID')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {    
                        $_SESSION["new"]='True';
                        header('Location:add-disease.php');
                        echo "<script type='text/javascript'> document.location = 'add-disease.php'; </script>";
                        exit();
                        $name=$gender=$age=$details="";
                    }
                }
            
        }    
    }
       
?>                                                             