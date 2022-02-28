<?php                                                                        
    $product=$quantity=$contract=$invoice=$delivery=$price=$check="";
    if(isset($_POST['submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
    		$str = @trim($str);
    		if(get_magic_quotes_gpc()) {
    			$str = stripslashes($str);
    		}
    		return mysql_real_escape_string($str);
    	}
        
        $contract = clean($_POST['lpo']);
        $invoice = clean($_POST['invoice']);
        $delivery = clean($_POST['delivery']);
        $product = clean($_POST['productID']);
        $quantity = clean($_POST['quantity']);
        $price = clean($_POST['price']);
        $iqty = clean($_POST['item_qty']);
        $iprice = clean($_POST['item_price']);
        $supplier = clean($_POST['item_price']);
        $form = $_POST['formno'];
        $officer = $_POST['officer'];
        $date = $_POST['date'];
        //$time = $_POST['time'];
        
        if(!$contract){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter LPO No!</span>
                </div>';
        }else
        if(!$invoice){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Invoice No!</span>
                </div>';
        }else
        if(!$delivery){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Delivery Note No!</span>
                </div>';            
        }else
        if(!$no){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error: Failed to generate form s13 number!</span>
                </div>'; 
        }else
        if(!$staffID){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error: Failed to identify receiving officer!</span>
                </div>'; 
        }else
        if(!isset($_POST["productID"]) && !is_array($_POST["productID"])){
            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-warning">Error: Failed to identify product to receive!</span>
                </div>';            
        }else
        if(!isset($_POST["quantity"]) && !is_array($_POST["quantity"])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter Quantity!</span>
                </div>';
        }else
        /*if(!isset($_POST["price"]) && !is_array($_POST["price"])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Enter price of product!</span>
                </div>';
        }else*/
        if(!isset($_POST["supplier"]) && !is_array($_POST["supplier"])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Select Supplier!</span>
                </div>';
        }else
            {
                $item = $_POST['pname'];
                $product = $_POST['productID'];
                $quantity = $_POST['quantity'];
                $price = $_POST['price'];
                $contract = $_POST['lpo'];
                $supplier = $_POST['supplier'];
                $id=$_POST['productID'];
                $iqty = $_POST['item_qty'];
                $iprice = $_POST['item_price'];
                
                
                 
               
              
                //get array values that are less or equal to zero  
                $filteredarray = array_values( array_filter($quantity) );
                $newQuantity = array_diff_key($quantity,$filteredarray);
                $newPrice = array_diff_key($price,$filteredarray);
                $newSupplier = array_diff_key($supplier,$filteredarray);
                /*end*/
                
               foreach ($newQuantity as $k => $v) {
                  $keys[]= $k;
                  $newItems[] = $item[$k];
                  $newItem[] = $item[$k];
                }
                
                
                if($newQuantity != NULL){
                    echo'<div class="alert alert-warning absolue center text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <span class="text-warning">
                                <b>Select Quantity received for the following item(s):</b><br>
                                    '.implode("<br>",$newItems).'
                            </span>
                        </div>';
                    $_SESSION['items']=$newItems;
                    $_SESSION['capacity']='False';
                    
                    if(isset($_GET['no'])){
                        header("Location:receive.php?no=".$getArray);
                        echo "<script type='text/javascript'> document.location = 'receive.php?no=.$getArray.'; </script>";
                        exit();
                    }
                }else
                {
                    
                //if pharmacy is checked, receive for pharmacy
                    if(isset($_POST['checkbox']))
                    {
                        for($i=0;$i<count($product);$i++){
                            $select=mysql_query("SELECT COALESCE ((SELECT Bal2 FROM pharmacy_productsupplied WHERE PID ='".$product[$i]."' ORDER BY PPSID DESC LIMIT 1),0) AS Balance");

                            while ($row = mysql_fetch_array($select)) {
                                $bal2[]= $row['Balance'];
                            }
                        }

                           $addition = array_map(function ($x, $y) { return $y+$x; } , $bal2,$quantity);
                           $result = array_combine(array_keys($quantity), $addition);


                        $officer = array_fill(0,$i,$staffID);
                        $form = array_fill(0,$i,$no);
                        $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                        $contruct = array_fill(0,$i,$contract);
                        $inv = array_fill(0,$i,$invoice);
                        $deliver = array_fill(0,$i,$delivery);

                        $c = array_map(function ($form,$price,$quantity,$iqty,$iprice,$result,$result,$contruct,$inv,$deliver,$date,$product,$supplier,$officer){return "'$form','$price','$quantity','$iqty','$iprice','$result','$result','$contruct','$inv','$deliver','$date','$product','$supplier','$officer'";} , $form,$price,$quantity,$iqty,$iprice,$result,$result,$contruct,$inv,$deliver,$date,$product,$supplier,$officer);

                        if(!$insert_row =mysql_query("INSERT INTO pharmacy_productsupplied(No,price,Qty,item_qty,item_price,Bal1,Bal2,contract,invoice,delivery,received,PID,SID,staffID) VALUES (".implode('),(', $c).")"))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }
                         else{
                            $product=$capacity=$quantity=$contract=$price="";
                            $_SESSION['receive']='True';
                            header("Location:view-pharmacy-received.php");
                            exit();
                        }
                    }else //receive for general
                    {
                        for($i=0;$i<count($product);$i++){

                            $select=mysql_query("SELECT COALESCE ((SELECT Bal2 FROM productsupplied WHERE PID ='".$product[$i]."' ORDER BY PSID DESC LIMIT 1),0) AS Balance");

                            while ($row = mysql_fetch_array($select)) {
                                $bal2[]= $row['Balance'];
                            }
                        }

                           $addition = array_map(function ($x, $y) { return $y+$x; } , $bal2,$quantity);
                           $result = array_combine(array_keys($quantity), $addition);


                        $officer = array_fill(0,$i,$staffID);
                        $form = array_fill(0,$i,$no);
                        $date = array_fill(0,$i,date("Y-m-d H:i:s"));
                        $contruct = array_fill(0,$i,$contract);
                        $inv = array_fill(0,$i,$invoice);
                        $deliver = array_fill(0,$i,$delivery);

                        $c = array_map(function ($form,$price,$quantity,$iqty,$iprice,$result,$result,$contruct,$inv,$deliver,$date,$product,$supplier,$officer){return "'$form','$price','$quantity','$iqty','$iprice','$result','$result','$contruct','$inv','$deliver','$date','$product','$supplier','$officer'";} , $form,$price,$quantity,$iqty,$iprice,$result,$result,$contruct,$inv,$deliver,$date,$product,$supplier,$officer);

                        if(!$insert_row =mysql_query("INSERT INTO productsupplied(No,price,Qty,item_qty,item_price,Bal1,Bal2,contract,invoice,delivery,received,PID,SID,staffID) VALUES (".implode('),(', $c).")"))
                        {
                            echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-warning">'.mysql_error().'</span>
                                </div>';
                        }
                         else{
                            $product=$capacity=$quantity=$contract=$price="";
                            $_SESSION['receive']='True';
                            header("Location:view-received.php");
                            exit();
                        }
                    }
            }
            }
        }
        
?>                                                             