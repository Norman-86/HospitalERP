<?php                                                                        
    
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
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
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to fetch patient No!</span>
            </div>';
        }else
        if(!isset($_GET['no'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Failed to fetch patient visit No!</span>
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
                    $patientNo = mysql_real_escape_string($_GET['id']);
                    $visitNo = mysql_real_escape_string($_GET['no']);

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
                        header('Location:payment.php?id='.$patientNo.'&no='.$visitNo);
                        echo "<script type='text/javascript'> document.location = 'payment.php?id=".$patientNo."&no=$visitNo'; </script>";
                        exit();
                        $rate=$paid="";
                    }
                }
           
        }    
    }
       
?>                                                             