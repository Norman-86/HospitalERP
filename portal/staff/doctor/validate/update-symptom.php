<?php                                                                        
    $name="";
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
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to identify symptom!</span>
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
        {
            $id = mysql_real_escape_string($_GET['id']);
                $selected = mysql_query("SELECT * FROM symptom WHERE name='$name' AND symptomID != $id ");
                $counting=  mysql_num_rows($selected);
           
            if($counting > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b>
                            <br>
                            Symptom: <b>'.$name.'</b> already exists!</span>
                    </div>';
            }else
            { 
                    if(!$insert = mysql_query("UPDATE symptom SET name='$name' WHERE symptomID = $id "))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {    
                        $_SESSION["update"]='True';
                        header('Location:symptoms.php');
                        echo "<script type='text/javascript'> document.location = 'symptoms.php'; </script>";
                        exit();
                        $name=$gender=$dob=$id=$phone=$country=$town="";
                    }
                }
            
        }    
    }
       
?>                                                             