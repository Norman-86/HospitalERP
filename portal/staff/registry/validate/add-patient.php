<?php                                                                        
    $name=$gender=$dob=$id=$phone=$country=$town=$rate=$paid="";
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
        $rate = clean($_POST['rate']);
        $paid = clean($_POST['paid']);
        
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
        if(!$rate){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Select Service!</span>
            </div>';
        }else
        if(!$paid){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter amount Paid!</span>
            </div>';
        }else
        {
            //extract the two values on rate select option
            $rateDetails = explode('|', $rate);
            $rateID = $rateDetails[0];
            $rateCost =  $rateDetails[1];
            $rateName =  $rateDetails[2];
            
            //get patient balance from amount paid
            $balance = $paid - $rateCost;
            
            //generate visit No
            $visitNo = rand(0,999999);
                    
            if($id){
                $selected = mysql_query("SELECT * FROM patient WHERE id='$id' ");
                $counting=  mysql_num_rows($selected);
            }
            if($phone){
                $select1 = mysql_query("SELECT * FROM patient WHERE phone='$phone'");
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
                            Either the ID/Passport No.<b>'.$id.'</b> is already taken, or patient <b>'.$name.'</b> already exists!</span>
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
                            Either The Phone No.<b>'.$phone.'</b> is already taken, or patient <b>'.$name.'</b> already exists!</span>
                    </div>';
            }else
            if($balance < 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b> &nbsp;
                            Amount Paid is less than Service fee
                        </span>
                    </div>';
            }else
            {
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
                    //calculate total number of students in the assigned class
                    $slt1 = mysql_query("SELECT COUNT(*) AS total_patients
                                        FROM patient p
                                        WHERE gender='$gender' AND year(added)='".date('Y')."' AND month(added)='".date('m')."'");

                    while ($fabbrev = mysql_fetch_assoc($slt1)){
                        $totalPatients = $fabbrev['total_patients'];
                    }



                    //auto generate patient number
                    $patientNo = substr($gender,0,1).sprintf('%04d',(++$totalPatients)).date("m").date("y");
                    
                    if(!$insert = mysql_query("INSERT INTO patient (patientNo,name,gender,dob,id,phone,country,town,added,staff)
                                                VALUES ('$patientNo','$name','$gender','$dob','$id','$phone','$country','$town',NOW(),'$staffID')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
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
                    if(!$insert2 = mysql_query("INSERT INTO payment (visitNo,patientNo,dop,rateID,cost,paid,balance,staffID)
                                                VALUES ('$visitNo','$patientNo',NOW(),'$rateID','$rateCost','$paid','$balance','$staffID')"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else{
                        
                        $_SESSION["new"]='True';
                        $_SESSION["balance"]=$balance;
                        $_SESSION["cost"]=$rateCost;
                        $_SESSION["paid"]=$paid;
                        $_SESSION["name"]=$rateName;
                        $_SESSION["visitNo"]=$visitNo;
                        $_SESSION["patientNo"]=$patientNo;
                        $_SESSION["patientName"]=$name;
                        $_SESSION["dob"]=$dob;
                        $_SESSION["gender"]=$gender;
                        header('Location:add-patient.php');
                        echo "<script type='text/javascript'> document.location = 'add-patient.php'; </script>";
                        exit();
                        $name=$gender=$dob=$id=$phone=$country=$town="";
                    }
                }
            }
        }    
    }
       
?>                                                             