<?php  
    $fname=$lname=$sname=$sno=$gender=$idNo=$phone1=$dob=$mail1=$category="";
    if(isset($_POST['submit']))
    {
        $fname = mysql_real_escape_string($_POST['firstname']);
        $lname = mysql_real_escape_string($_POST['lastname']);
        $sname = mysql_real_escape_string($_POST['surname']);        
        $gender = mysql_real_escape_string($_POST['gender']);
        $idNo = mysql_real_escape_string($_POST['id']);
        $phone1 = mysql_real_escape_string($_POST['phone1']);
        $dob = mysql_real_escape_string($_POST['dob']);
        $mail1 = mysql_real_escape_string($_POST['mail1']);
        $category = mysql_real_escape_string($_POST['category']);
        
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
        if(!$_FILES['file']['tmp_name']){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select photo to upload!</span>
                </div>';
        }else
        {
            $selectx = mysql_query("SELECT * FROM staff WHERE id='$idNo' ");
            $countingx =  mysql_num_rows($selectx);
                
            $selectxy = mysql_query("SELECT * FROM staff WHERE phone='$phone1' ");
            $countingxy =  mysql_num_rows($selectxy);
            
            $selectxyz = mysql_query("SELECT * FROM staff WHERE mail='$mail1' ");
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
                /*auto generate staff Number*/
                //calculate total number of staff in specified category in current year
                $slt1 = mysql_query("SELECT COUNT(*) AS total_category_staff
                                    FROM staff
                                    WHERE category='$category' AND year(added)=".date('Y'));

                while ($total_row = mysql_fetch_assoc($slt1)){
                    $total_category_staff = $total_row['total_category_staff'];
                }
                    $newCategory = strtoupper($category);
                    $cat = substr($newCategory,0,3);

                    //staff Number
                    $code = "HSP-".$cat."-".sprintf('%03d',(++$total_category_staff))."/".date("Y");//staff Number
                    $photo = "HSP-".$cat."-".sprintf('%03d',(++$total_category_staff))."-".date("Y");//staff no. for purposes of saving photo

                    $allowed = array("jpg","jpeg");

                    $file_location = $_FILES['file']['tmp_name'];//get file location
                    $info = pathinfo($_FILES['file']['name']);//get file info 
                    $ext = $info['extension']; // get the extension of the file
                    $file_name = date("Ymd").date("His").$photo.".".$ext;//rename file
                    $folder="../../uploads/user/";

                    $target_file=$folder . basename($file_name);
                    //check if uploaded file extension is in allowed list
                    if (!in_array($ext, $allowed)){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">Invalid photo format. <br>Only photos of extension: .jpg & .jpeg are allowed</span>
                            </div>';
                    }else
                    if(file_exists($target_file)) {
                        echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-warning">File exists. Try renaming your document.</span>
                            </div>';
                    }else
                    if(!move_uploaded_file($file_location,$folder.$file_name)){
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">Unable to upload file<br> check file name or contact system administrator!</span>
                            </div>';
                    }else{
                        $dir=$file_name;



                        //generatepassword according to staff Number
                        $pass=md5($code);

                        if(!$insert=mysql_query("INSERT INTO staff (staffNo,pic,fname,lname,sname,gender,id,phone,dob,mail,category,pass)VALUES
                                                ('$code','$dir','$fname','$lname','$sname','$gender','$idNo','$phone1','$dob','$mail1','$category','$pass')")){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                        }else
                        {
                            $fname=$lname=$sname=$sno=$gender=$idNo=$phone1=$dob=$mail1=$category="";
                            $_SESSION['staffNumber']=$code;
                            $_SESSION['success']="true";
                            header('Location:add-staff.php');
                            echo "<script type='text/javascript'> document.location = 'add-staff.php'; </script>";
                            exit();
                        }
                    }
            }    
                    
        }
       
    }  
?>