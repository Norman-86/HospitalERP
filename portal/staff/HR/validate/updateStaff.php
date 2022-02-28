<?php  
    $fname=$lname=$sname=$sno=$gender=$idNo=$phone1=$dob=$mail1=$category="";
    if(isset($_POST['update']))
    {
        $fname = mysql_real_escape_string($_POST['firstname']);
        $lname = mysql_real_escape_string($_POST['lastname']);
        $sname = mysql_real_escape_string($_POST['surname']);
        $sno = mysql_real_escape_string($_POST['staffNo']);
        $gender = mysql_real_escape_string($_POST['gender']);
        $idNo = mysql_real_escape_string($_POST['id']);
        $phone1 = mysql_real_escape_string($_POST['phone1']);
        $dob = mysql_real_escape_string($_POST['dob']);
        $mail1 = mysql_real_escape_string($_POST['mail1']);
        $category = mysql_real_escape_string($_POST['category']);
        $id =  mysql_real_escape_string($_GET['id']);
        
        if(!$id){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured while trying to fetch Staff info.</span>
                </div>';
        }else
        if(!$fname){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter First Name</span>
                </div>';
        }else
        if(!$lname){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Last Name</span>
                </div>';
        }else
        if(!$sno){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify Staff No.</span>
                </div>';
        }else
        if(!$gender){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Staff Gender</span>
                </div>';
        }else
        if(!$idNo){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Staff ID or Passport No.</span>
                </div>';
        }else
        if(!$phone1){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Phone number</span>
                </div>';
        }else
        if(!$dob){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Date of Birth</span>
                </div>';
        }else
        if(!$mail1){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter e-mail address</span>
                </div>';
        }else
        if(!$category){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Category</span>
                </div>';
        }else
        {
            $selectx = mysql_query("SELECT * FROM staff WHERE id='$idNo' AND staffID != '$id' ");
            $countingx =  mysql_num_rows($selectx);
                
            $selectxy = mysql_query("SELECT * FROM staff WHERE phone='$phone1' AND staffID != '$id' ");
            $countingxy =  mysql_num_rows($selectxy);
            
            $selectxyz = mysql_query("SELECT * FROM staff WHERE mail='$mail1' AND staffID != '$id' ");
            $countingxyz =  mysql_num_rows($selectxyz);
            
            if($countingx > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning: &nbsp;
                            </b>
                            The National ID No.<b>'.$idNo.'</b> is already taken!
                        </span>
                    </div>';
            }else
            if($countingxy > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning: &nbsp;
                            </b>
                            Phone No.<b>'.$phone1.'</b> is already taken!
                        </span>
                    </div>';
            }else  
            if($countingxyz > 0 ){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b>
                                <i class="fa fa-warning"></i>
                                Warning: &nbsp;
                            </b>
                            E-mail <b>'.$mail1.'</b> is already taken!
                        </span>
                    </div>';
            }else
            {
                if(!$insert = mysql_query("UPDATE staff SET fname='$fname',lname='$lname',sname='$sname',gender='$gender',
                                            id='$idNo',phone='$phone1',dob='$dob',mail='$mail1',
                                            category='$category' WHERE staffID='$id'")){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">'.mysql_error().'</span>
                        </div>';
                }else
                {
                    $fname=$lname=$sname=$sno=$gender=$idNo=$phone1=$dob=$mail1=$category="";
                    $_SESSION['success']="true";
                    header('Location:staff.php');
                    echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
                    exit();
                }
            }
        }
    }  
?>