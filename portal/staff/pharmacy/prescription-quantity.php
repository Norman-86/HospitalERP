<?php 
    include'include/session.php';
    
    $tableName="product";
    $tableName1="pharmacy_supply";
    $tableName2="prescription";
    
    if(mysql_escape_string($_GET['id'])){
        $array = unserialize(base64_decode($_GET['id']));
        $arrays=implode(',',$array);
        
        // Get page data
        $query1 = "SELECT p.*,prescriptionID FROM $tableName2 pr LEFT JOIN $tableName p ON pr.productID = p.PID WHERE pr.prescriptionID IN ($arrays)";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prescriptions Quantity | Pharmacy | WAKA CMEC Hospital</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/fonts/material-icons.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../../assets/css/Data-Table.css">
    <link rel="stylesheet" href="../../../assets/css/Data-Table1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS.css">
    <link rel="stylesheet" href="../../../assets/css/JLX-Fixed-Nav-on-Scroll.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar---App-Toolbar--LG--MD---Mobile-Nav--SM--XS1.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../../assets/css/Pretty-Table.css">
    <link rel="stylesheet" href="../../../assets/css/Pretty-Table1.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit1.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
    <link rel="stylesheet" href="../../../assets/css/tabela-mloureiro1973.css">
    <link rel="stylesheet" href="../../../assets/css/Team-Clean.css">
    
</head>

<body style="background-color:rgba(42,63,84,0);">
    <nav class="navbar navbar-default" style="background-color:rgb(52,73,94);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">
                    Pharmacy | Waka CMEC Hospital
                </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(52,73,94);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="nav navbar-nav hidden-xs hidden-sm navbar-right" id="desktop-toolbar">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?>  <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav visible-xs-block visible-sm-block" id="mobile-nav">
                    
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> <i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> </i> <i class="fa fa-chevron-down fa-fw"></i></a>
                        <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                            <li role="presentation"><a href="settings.php"><i class="fa fa-user fa-fw"></i> Profile </a></li>
                            <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off fa-fw"></i>Logout </a></li>
                        </ul>
                    </li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    <li role="presentation"><a>&nbsp;</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="top">
        <nav class="navbar navbar-default" id="navbar-main">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand hidden navbar-link" href="#" style="padding:0px;"> </a>
                    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav">
                        <li role="presentation">
                            <a href="index.php">
                                <i class="fa fa-table" style="margin-right:5px;"></i>
                                Dashboard
                                <p style="float:right;margin-left:10px;padding:0px;text-align:center;color:red;" id="messageCounter"></p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-product-hunt" style="margin-right:5px;"></i>
                                    Items
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation">
                                    <a href="items.php">
                                        <i class="fa fa-product-hunt" style="margin-right:5px;"></i>
                                        View Items
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="stock.php">
                                        <i class="fa fa-stack-exchange" style="margin-right:5px;"></i>
                                        View Stock Items
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="received.php">
                                        <i class="fa fa-reorder" style="margin-right:5px;"></i>
                                        View Requisitioned Items
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="requisitions.php">
                                        <i class="fa fa-reorder" style="margin-right:5px;"></i>
                                        View Requisitions
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li role="presentation">
                            <a href="prescription.php">
                                <i class="fa fa-medkit" style="margin-right:5px;"></i>
                                Prescriptions 
                            </a>
                        </li>
                        <li role="presentation" id="StockCounter"></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div id="printReport">
    <div class="row" style="width:100%;max-width:960px;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
               <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                   <i class="fa fa-product-hunt"></i> 
                   &nbsp;Prescriptions</h2>
            </div>
            <?php 
                if(empty($result))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Fatal Error Occured!</span>
                        </div>';
                }else
                {
                include('validate/prescription_payment.php'); 
                
            ?>
            <div class="col-md-12" style="width:98%;">
                <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color:rgb(42,63,84);color:rgb(255,255,255);">
                                <th style="border:none;">Item </th>
                                <th style="border:none;text-align:center;">Capacity</th>
                                <th style="border:none;text-align:center;">Status</th>
                                <th style="border:none;text-align:center;">Stock</th>
                                <th style="border:none;">Quantity<b style="color:red;">*</b></th>
                                <th style="border:none;text-align:right;">Price (Kshs)</th>
                                <!--<th style="border:none;">Remove</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i=$j=$k=$l=$m=$n=$o=$p=$q=$r=$s=$t=$u=$v=0;
                                while($row = mysql_fetch_assoc($result)) 
                                {
                                    $query2 = "SELECT Bal2,item_price FROM $tableName1 WHERE PID=".$row['PID']." ORDER BY PHID DESC LIMIT 0,1";
                                    $result2 = mysql_query($query2);
                                    $count=  mysql_num_rows($result2);
                            ?>
                            <tr>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);border:none;">
                                    <?php echo substr($row['name'],0,100); ?>
                                    <input type="hidden" name="prescriptionID[]" value="<?php echo $row['prescriptionID']; ?>" readonly style="display:none;" placeholder="Enter prescription ID.">
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <?php echo $row["Capacity"];?>
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <?php 
                                        if($count <= 0){
                                            echo '<a class="text-danger"><i class="fa fa-times"></i></a>';
                                        }else{
                                            mysql_data_seek($result2,0);
                                            while($rows = mysql_fetch_array($result2)) { 
                                                IF($rows['Bal2'] > $row['minimum']){
                                                    echo '<a class="text-success" title="On Stock"><i class="fa fa-check-square"></i></a>';
                                                }else 
                                                IF($rows['Bal2'] <= $row['minimum'] && $rows['Bal2'] >0){
                                                    echo '<a class="text-warning" title="Running out of Stock"><i class="fa fa-warning"></i></a>';
                                                }else
                                                IF($rows['Bal2'] < $row['minimum'] && $rows['Bal2'] == 0){
                                                    echo '<a class="text-danger" title="Out of Stock"><i class="fa fa-times-circle"></i></a>';
                                                }else{
                                                    echo '<a class="text-danger" title="Out of Stock"><i class="fa fa-times-circle"></i></a>';
                                                }
                                            }
                                        }
                                    ?>
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <?php 
                                        if($count <= 0){
                                            $bal = 0;
                                            echo '__';
                                        }else{
                                            mysql_data_seek($result2,0);
                                            while($rows = mysql_fetch_array($result2)) { 
                                                IF($rows['Bal2'] > 0){
                                                    $bal = $rows['Bal2'];
                                                    echo $rows['Bal2'];
                                                }else{
                                                    $bal = 0;
                                                    echo 'O/S';
                                                }
                                            }
                                        }
                                    ?>
                                </td>
                                
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <!--Only God knows how this bunch of code works
                                        I am a programmer, i have no life -->
                                    <input type="number" id="qty[<?php echo $s++;?>]" name="qty[]" min="1" max="<?php echo $bal;?>" required value='' onkeyup="price<?php echo $i++;?>()" style="width:100%;padding:1px 5px 1px 5px;" step="any" min="0"  placeholder="Enter Qty">
                                    <?php 
                                        if($count <= 0){
                                            echo '';
                                        }else{
                                        mysql_data_seek($result2,0);
                                        while($rows = mysql_fetch_array($result2)) { 
                                    ?>
                                            
                                            <input type="hidden" id="price[<?php echo $t++;?>]" name="price[]" value='<?php if($rows['item_price'] == NULL){echo "0";}else{echo $rows['item_price'];}?>' readonly style="width:100%;padding:5px;" step="any" min="0"  placeholder="Enter Price">
                                    
                                    <?php }}  ?>
                                    <script>
                                            function price<?php echo $j++;?>() {

                                            var qty<?php echo $k++;?> = document.getElementById("qty[<?php echo $u++;?>]").value;
                                            var price<?php echo $l++;?> = document.getElementById("price[<?php echo $v++;?>]").value;
                                            var result<?php echo $m++;?> = qty<?php echo $n++;?> * price<?php echo $o++;?>;
                                            
                                            document.getElementById("total<?php echo $q++;?>").value = result<?php echo $p++;?>;
                                            
                                            //sum all totals to get grand total
                                            var sum = 0;
                                            $('.total').each(function(i, obj) {
                                              if ($.isNumeric(this.value)) {
                                                sum += parseFloat(this.value);
                                              }
                                            });
                                            
                                            var grandTotal = sum.toLocaleString(
                                                undefined, // use a string like 'en-US' to override browser locale
                                                { minimumFractionDigits: 2 }
                                              );
                                            document.getElementById("grandTotal").value = grandTotal+'/=';
                                            //$('#grandTotal').val(sum);
                                        }
                                    </script>
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);border:none;">
                                    <input type="text" class="total" id="total<?php echo $r++;?>" name="total[]" tabindex="0" style="width:100%;padding:1px 5px 1px 5px;;border:none;background-color:transparent;text-align:right;" readonly>
                                </td>
                                <!--
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;"> 
                                    <button type="submit" name="remove" value="<?php //echo $rows['prescriptionID'];?>" title="Remove prescription" style="border:none;background-color:transparent; margin:0px;padding:0px;" onClick="return confirm('Are you sure you want to remove this item from list\nItem: <?php echo $rows['name'].'\nCapacity: '.$rows['Capacity']; ?>?');">
                                        <i class="fa fa-remove text-danger"></i>
                                    </button>
                                </td>
                                -->
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tbody>
                            <tr style="background-color:white;">
                                <td colspan="5" style="font-weight:bold;color:black;text-align:right;">Grand Total:</td>
                                <td style="font-size:14px;font-weight:bold;text-align:right;border-top:1px solid black;color:black;border-bottom:2px solid black;">
                                    <input type="text" id="grandTotal" name="grandTotal" tabindex="-1" style="width:100%;padding:1px 5px 1px 5px;;border:none;background-color:transparent;text-align:right;" readonly>
                                </td>
                                <td>&nbsp;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr style="padding:0px;">
            </div>
            <div class="col-md-12" style="text-align:center;width:100%;">
                <button name="save" type="submit" style="margin-bottom:3%;color:rgb(1,1,1);padding:5px 10px;">Submit for Payment</button>
            </div>
            <?php } ?>
        </form>    
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <script src="ajax_1.js"></script>
    </div>
</body>
    <script type="text/javascript">
            $(document).ready(function(){
            setInterval(function(){
                $("#messageCounter").load("include/counter.php");
                $("#messageCounter1").load("include/counter.php");
                $("#StockCounter").load("include/count_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
    
    
</html>