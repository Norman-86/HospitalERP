<?php  
    $name=$cost="";
    if(isset($_POST['update']))
    {
        $name = mysql_real_escape_string($_POST['rate']);
        $cost = mysql_real_escape_string($_POST['cost']);
        
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify rate</span>
                </div>';
        }else
        if(!$name){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Rate Name</span>
                </div>';
        }else
        if(!$cost){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Rate Cost</span>
                </div>';
        }else
        {
            $id = mysql_real_escape_string($_GET['id']);
            
            $slt1 = mysql_query("SELECT COUNT(*) AS Rate
                                FROM rates
                                WHERE name='$name' AND rateID != '$id'");
               
            while ($total_row = mysql_fetch_assoc($slt1)){
                $rate = $total_row['Rate'];
            }
            
            if($rate > 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning">Rate <b>'.$name.'</b> already exists</span>
                    </div>';
            }else{
                    if(!$insert=mysql_query("UPDATE rates SET name='$name',cost='$cost' WHERE rateID='$id' "))
                    {
                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>';
                    }else
                    {
                        $name=$cost="";
                        $_SESSION['update']="true";
                        header('Location:view-rates.php');
                        echo "<script type='text/javascript'> document.location = 'view-rates.php'; </script>";
                        exit();
                    }
            }
        }
       
    }  
?>