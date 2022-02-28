<?php                                                                        
    // Check if delete button active, start this
    if(isset($_POST['delete'])){
        
        $del_id=$_POST['delete'];

        //delete row(s) of record(s)
        $sql = "DELETE FROM supplier WHERE SID='$del_id'";
        $deleted = mysql_query($sql);
        //get no. of rows deleted
        $records=  mysql_affected_rows();
        
        // if successful redirect to refresh page
        if($records>0){            
            $_SESSION["del"]='True';
            header('Location:view-supplier.php');
            echo "<script type='text/javascript'> document.location = 'view-item.php'; </script>";
            exit();
        }else{
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">No Item deleted!</span>
                </div>';
        }
    }    
?>                                                             