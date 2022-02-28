<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['delete'])){
        
        $del_id = mysql_real_escape_string($_POST['delete']);
        
        $sq = "SELECT pic FROM staff WHERE staffID ='$del_id'";
        $que = mysql_query($sq);
        
        while($photo = mysql_fetch_assoc($que)){
           echo $pic = $photo['pic'];
        }
        
        //delete photo in folder
        if(!unlink("../../uploads/user/$pic")){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error occured while trying to delete document</span>
                </div>';
        }else{
            //delete row(s) of record(s)
            $sql = "DELETE FROM staff WHERE staffID='$del_id' AND category !='Human Resource Manager'";
            $deleted = mysql_query($sql);
            //get no. of rows deleted
            $records=  mysql_affected_rows();

            // if successful redirect to refresh page
            if($records>0){            
                $_SESSION["del"]='True';
                header('Location:staff.php');
                echo "<script type='text/javascript'> document.location = 'staff.php'; </script>";
                exit();
            }else{
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">No Staff deleted!</span>
                    </div>';
            }
        }
    }  
?>                                                             