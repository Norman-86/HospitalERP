<?php  
    $from=$to="";
    if(isset($_POST['submit']))
    {
        $from = mysql_real_escape_string(date_format(date_create($_POST['from']),"Y-m-d"));
        $to = mysql_real_escape_string(date_format(date_create($_POST['to']),"Y-m-d"));
        $id = mysql_real_escape_string($_GET['id']);
        
        if(!$staff){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Failed to identify staff</span>
                </div>';
        }else
        if(!$from){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter first date to search from</span>
                </div>';
        }else
        if($from > date("Y-m-d")){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">From date Cannot be greater than current date</span>
                </div>';
        }else    
        if(!$to){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter last date to search to</span>
                </div>';
        }else
        if($from > $to){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">From date Cannot be greater than To date</span>
                </div>';
        }else
        if($to > date("Y-m-d")){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">To date Cannot be greater than current date</span>
                </div>';
        }else
        {
            header('Location:amount.php?id='.$id.'&from='.$from.'&to='.$to);
            echo "<script type='text/javascript'> document.location = 'amount.php?id=$id&from=$from$to=$to'; </script>";
            exit();
         }
       
    }  
?>