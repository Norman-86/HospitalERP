<?php  
    $name=$cost="";
    if(isset($_POST['submit']))
    {
        $name = mysql_real_escape_string($_POST['rate']);
        $cost = mysql_real_escape_string($_POST['cost']);
        
        
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
            
           
            $slt1 = mysql_query("SELECT COUNT(*) AS Rate
                                FROM rates
                                WHERE name='$name'");
               
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
                    if(!$insert=mysql_query("INSERT INTO rates (name,cost)VALUES('$name','$cost')"))
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
                        $_SESSION['success']="true";
                        header('Location:rates.php');
                        echo "<script type='text/javascript'> document.location = 'rates.php'; </script>";
                        exit();
                    }
                }
        }
       
    }  
?>