<?php
    $username=$pass="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        /*end of function*/
        $username = clean($_POST['username']);
        $pass = clean($_POST['password']);
        
        if(!$username){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter username!</span>
                </div>';
        }else
        if(!$pass){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                        <span class="text-danger">Enter password!</span>
                </div>';
        }else 
        {
            $password=md5($pass);
            $qry="SELECT staffID,category,sname FROM staff WHERE (BINARY mail='$username' AND  pass='".$password."') OR (BINARY staffNo='$username' AND pass='".$password."')";
            $result=mysql_query($qry); 
            $num=mysql_num_rows($result);
            
        
            //Check whether the query was successful or not
            if($result) {
    		if($num > 1) {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Duplicate user found!</span>
                        </div>';
                }
                else if($num < 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                                <span class="text-danger">Invalid username / password!</span>
                        </div>';
                }
                else if($num ==1){
                    while ($row = mysql_fetch_array($result)) {
                        $username=$pass="";
                        $category = $row['category'];
                    
                        if($category=="Doctor"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:doctor/include/session.php');
                            header('Location:doctor/index.php');
                            echo "<script type='text/javascript'> document.location = 'doctor/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Lab Technician"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:lab/include/session.php');
                            header('Location:lab/index.php');
                            echo "<script type='text/javascript'> document.location = 'lab/index.php'; </script>";
                            exit();
                        }else    
                        if($category=="Pharmacist"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:pharmacy/include/session.php');
                            header('Location:pharmacy/index.php');
                            echo "<script type='text/javascript'> document.location = 'pharmacy/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Nurse"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:nurse/include/session.php');
                            header('Location:nurse/index.php');
                            echo "<script type='text/javascript'> document.location = 'nurse/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Registry"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:registry/include/session.php');
                            header('Location:registry/index.php');
                            echo "<script type='text/javascript'> document.location = 'registry/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Human Resource Manager"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:HR/include/session.php');
                            header('Location:HR/index.php');
                            echo "<script type='text/javascript'> document.location = 'HR/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Procurement"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:procurement/include/session.php');
                            header('Location:procurement/index.php');
                            echo "<script type='text/javascript'> document.location = 'procurement/index.php'; </script>";
                            exit();
                        }else
                        if($category=="Accounts"){
                            $_SESSION['staffID'] = $row['staffID'];
                            $_SESSION['category'] = $row['category'];
                            header('Location:accounts/include/session.php');
                            header('Location:accounts/index.php');
                            echo "<script type='text/javascript'> document.location = 'accounts/index.php'; </script>";
                            exit();
                        }
                    }    
                        
                    
                }
            }else {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                            <span class="text-danger">'.mysql_error().'!</span>
                    </div>';
            }
        }
    }
?>