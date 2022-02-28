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
    }else
    
        
    if(isset($_POST['medication_payment'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        $amount = clean($_POST['amount']); 
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
        if(!$paid){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="text-danger">Enter amount Paid!</span>
            </div>';
        }else
        {
            
            //get patient balance from amount paid
            $balance = $paid - $amount;
             
            if($balance < 0){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <span class="text-warning"> 
                            <b><i class="fa fa-warning"></i>Warning</b> &nbsp;
                            Amount Paid is less than medication fee
                        </span>
                    </div>';
            }else
            {
                if(!$results2 = mysql_query("SELECT i.name,ph.item_price * p.qty AS cost,p.*
                                            FROM prescription p 
                                            LEFT JOIN product i 
                                            ON p.productID = i.PID 
                                            LEFT JOIN(SELECT t1.item_price,t1.PID
                                                        FROM pharmacy_supply t1
                                                        JOIN (SELECT MAX(PHID) AS PHID
                                                                FROM pharmacy_supply
                                                                GROUP BY PID
                                                            ) t2
                                                        ON t1.PHID = t2.PHID 
                                                    )ph
                                           ON p.productID = ph.PID 
                                            WHERE p.patientNo = '$id' 
                                            AND p.visitNo='$no'"))
                {
                   echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <span class="text-danger">'.mysql_error().'</span>
                            </div>'; 
                }else
                {
                    while ($row = mysql_fetch_array($results2)){
                        $product[] = $row['productID'];
                        $item[] = $row['name'];
                        $price[] = "Kshs.".$row['cost'];
                        $cost[] = $row['cost'];
                        $qty[] = $row['qty'];
                        $prescription[] = $row['prescriptionID'];
                    }
                    
                    $patientNo = mysql_real_escape_string($_GET['id']);
                    $visitNo = mysql_real_escape_string($_GET['no']);
                    
                    //calculate balance
                    for($i=0;$i<count($item);$i++){
                        $select=mysql_query("SELECT COALESCE ((SELECT Bal2 FROM pharmacy_supply WHERE PID ='".$product[$i]."' ORDER BY PHID DESC LIMIT 1),0) AS Balance,COALESCE ((SELECT PHID FROM pharmacy_supply WHERE PID ='".$product[$i]."' ORDER BY PHID DESC LIMIT 1),0) AS PHID");
                        while ($row = mysql_fetch_array($select)) {
                            $bal2[]= $row['Balance'];
                            $idd[]= $row['PHID'];
                        }
                        
                        $receiveNo =  mysql_query("SELECT COALESCE((SELECT RNO FROM pharmacy_supply WHERE PID =$product[$i] GROUP BY RNO ORDER BY PHID DESC LIMIT 1),0) AS RNO");
                        while ($record = mysql_fetch_array($receiveNo)) {
                            $No[] = $record['RNO'];
                        }
                    }
                    
                    $subtraction = array_map(function ($x, $y) { return $x-$y; } , $bal2,$qty);
                    $result = array_combine(array_keys($qty), $subtraction);
                    
                    
                    /*get array values that are less or equal to zero*/    
                    $min = 0;
                    $newNumbers = array_filter(
                        $result,
                        function ($values) use($min) {
                            return ($values < $min);
                        }
                    );
                    /*end*/

                    /*get items whose qty to issue is bigger than stock*/
                    foreach ($newNumbers as $k => $v) {
                          $keys[]= $k;
                          $newItems[] = $item[$k];
                    }
                    
                    //if($quantity > $bal2){
                    if($newNumbers != NULL){
                         echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warnning">
                                        The following prescriptions are out of stock:<br>
                                        <ol>
                                            <li>
                                                '.implode('<li></li>',$newItems).'
                                            </li>
                                        <ol>
                                    </span>
                                </div>';
                    }else
                    {
                    
                        $p=$k=$l=$m=$n=$o=$p=0;
                        foreach ($item as $key) {
                            if(!$update =mysql_query("UPDATE pharmacy_supply SET Bal2='".$result[$l++]."' WHERE PHID ='".$idd[$m++]."'"))
                            {
                                echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-warnning">'.mysql_error().'</span>
                                    </div>';
                            }else
                            
                            if(!$update_rows =mysql_query("UPDATE prescription SET price='".$cost[$p++]."',Bal='".$result[$o++]."',date_purchased=NOW(),RNO='".$No[$n++]."' WHERE prescriptionID ='".$prescription[$k++]."'"))
                            {
                                echo'<div class="alert alert-warnning absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-warnning">'.mysql_error().'</span>
                                    </div>';
                            }
                        }

                        if(!$insert2 = mysql_query("INSERT INTO payment (visitNo,patientNo,dop,cost,paid,balance,staffID,service)
                                                    VALUES ('$visitNo','$patientNo',NOW(),'$amount','$paid','$balance','$staffID','Medication')"))
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                        }else

                        if(!$insert3 = mysql_query("UPDATE visit SET level = '6' WHERE patientNo = '$patientNo' AND visitNo = '$visitNo'"))
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-danger">'.mysql_error().'</span>
                                </div>';
                        }else{
                            $_SESSION["new"]='True';
                            $_SESSION["item"]=$item;
                            $_SESSION["qty"]=$qty;
                            $_SESSION["price"]=$price;
                            $_SESSION["cost"]=$amount;
                            $_SESSION["paid"]=$paid;
                            $_SESSION["balance"]=$balance;
                            header('Location:prescription_payment.php?id='.$patientNo.'&no='.$visitNo);
                            echo "<script type='text/javascript'> document.location = 'prescription_payment.php?id=".$patientNo."&no=$visitNo'; </script>";
                            exit();
                            $rate=$paid="";
                        }
                    }
                }
            }
           
        }    
        
    }    
       
?>                                                             