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
        {
                $selected = mysql_query("SELECT * FROM symptom WHERE name='$name' ");
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
                    if(!$insert = mysql_query("INSERT INTO symptom (name,added,staffID)VALUES ('$name',NOW(),'$staffID')"))
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
                        header('Location:add-symptom.php');
                        echo "<script type='text/javascript'> document.location = 'add-symptom.php'; </script>";
                        exit();
                        $name=$gender=$dob=$id=$phone=$country=$town="";
                    }
                }
            
        }    
    }
       
?>                                                             