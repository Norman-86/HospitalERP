<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['delete'])){
        
        $del_id=$_POST['delete'];

        //delete row(s) of record(s)
        $sql = "DELETE FROM student WHERE studentID='$del_id'";
        $deleted = mysql_query($sql);
        //get no. of rows deleted
        $records=  mysql_affected_rows();
        
        // if successful redirect to refresh page
        if($records>0){            
            $_SESSION["del"]='True';
            header('Location:view-publisher.php');
            echo "<script type='text/javascript'> document.location = 'view-preadmitted.php'; </script>";
            exit();
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Student deleted!</span>
                </div>';
        }
    }else
    if(isset($_POST['admit'])){
        $student = $_POST['admit'];
        
        if(!$student){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error occured while trying to collect student info!</span>
                </div>';
        }else
        {
            $sq=mysql_query("SELECT adm,courseID,yosID,semisterID FROM student WHERE status='Pre-Admitted' AND studentID=".$student);
            
            while($rows=mysql_fetch_assoc($sq)){
                $adm = $rows['adm'];
                $course = $rows['courseID'];
                $yos = $rows['yosID'];
                $sem = $rows['semisterID'];
            }
            
            $now=date("Y-m-d")." 00:00:00";
            //get fee for current semester and put it as outstanding balance
            $slt23 = mysql_query("SELECT f.feeID,f.amount
                                    FROM fee f 
                                    LEFT JOIN semisterperiod p
                                    ON f.periodID = p.periodID
                                    WHERE f.courseID ='$course'
                                    AND f.yosID='$yos'
                                    AND f.semisterID='$sem'
                                    AND '$now' >= p.start 
                                    AND '$now' <= p.end" );
                
            if(empty($slt23)){
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-danger">'. mysql_error($slt23).'</span>
                    </div>';
            }else{
                $feeRow = mysql_num_rows($slt23);
                if($feeRow > 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">More than 1 Fee record found for this course,Year of Study & Semeister</span>
                        </div>';
                }else
                if($feeRow < 1){
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-danger">Error: Either of the following occured 
                                <br><b>1)</b>No Fee record found for this course,Year of Study & Semeister
                                <br><b>2)</b>This semister has not yet began
                            </span>
                        </div>';
                }else{
                    while ($row = mysql_fetch_assoc($slt23)){
                        $feeID = $row['feeID'];
                        $balance = $row['amount'];
                    }
            
                    /*generate password for 
                     student to log into 
                    student portal*/
                    $pass = md5($adm);

                    if(!$insert = mysql_query("INSERT INTO studentfee (studentID,feeID,amount,balance,dop)
                                                        VALUES ('$student','$feeID',0,'$balance',NOW())"))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else{
                        $sql=mysql_query("UPDATE student SET status='Admitted',password='$pass' WHERE status='Pre-Admitted' AND studentID=".$student);
                        if(empty($sql)){
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">Error occured while trying to admit student!</span>
                                </div>';
                        }else{
                            $_SESSION["admit"]='True';
                            header('Location:view-preadmitted.php');
                            echo "<script type='text/javascript'> document.location = 'view-preadmitted.php'; </script>";
                            exit();
                        }
                    }
                }
            }
        }
        
    }    
?>                                                             