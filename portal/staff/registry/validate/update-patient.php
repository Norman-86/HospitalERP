<?php                                                                        
    $name=$gender=$dob=$id=$phone=$country=$town="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $name = $_POST['name'];
        $gender = $_POST['gender']; 
        $dob = clean(date_format(date_create($_POST['dob']),"Y-m-d."));
        $id = clean($_POST['id']);
        $phone = clean($_POST['phone']);
        $country = $_POST['country'];
        $town = clean($_POST['town']);
        
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-warning">Error: Failed to identify librarian!</span>
            </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Patient Name!</span>
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
        if(!$dob){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Date of Birth!</span>
            </div>';
        }else
        if(!$country){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Country!</span>
            </div>';
        }else
        if(!$town){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter Patient Home Town!</span>
            </div>';
        }else
        {
            if($id){
                $selected = mysql_query("SELECT * FROM patient WHERE id='$id' AND patientID != '$patientID' ");
                $counting=  mysql_num_rows($selected);
            }
            if($phone){
                $select1 = mysql_query("SELECT * FROM patient WHERE phone='$phone' AND patientID != '$patientID'");
                $counting1=  mysql_num_rows($select1);
            }
            
            if($counting > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b>
                            <br>
                            ID/Passport No.<b>'.$id.'</b> is already taken
                        </span>
                    </div>';
            }else
            if($counting1 > 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b>
                            <br>
                            Phone No.<b>'.$phone.'</b> is already taken
                        </span>
                    </div>';
            }else
            {
                if(!$insert = mysql_query("UPDATE patient SET name='$name',gender='$gender',dob='$dob',id='$id',phone='$phone',country='$country',town='$town' AND patientID='$patientID'"))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else{
                    $name=$gender=$dob=$id=$phone=$country=$town="";
                    $_SESSION["update"]='True';
                    header('Location:patient.php');
                    echo "<script type='text/javascript'> document.location = 'patient.php'; </script>";
                    exit();
                }
            }
        }  
    }
       
?>                                                             