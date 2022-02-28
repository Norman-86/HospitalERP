<?php 
    include'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form S3 | Procurement | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
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
    
    <script>
        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data) 
        {

            var mywindow = window.open('', 'printReport', 'height=500,width=700');
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css"  media="print">');
            mywindow.document.write('<link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css"  media="print">');
            mywindow.document.write('</head><body >');
            mywindow.document.write(data);
            mywindow.document.write('</body></html>');

            mywindow.document.close(); // necessary for IE >= 10
            mywindow.focus(); // necessary for IE >= 10

            mywindow.print();
            mywindow.close();

            return true;
        }
    </script>
</head>

<body style="background-color:rgb(255,255,255);
            width: 96%;
            padding-bottom:2%;
            margin-right: auto;
            margin-left: auto;
            -webkit-box-shadow: 0px 4px 4px 0px rgba(0,0,0,1);
            -moz-box-shadow: 0px 4px 4px 0px rgba(0,0,0,1);
            box-shadow: 0px 4px 4px 0px rgba(0,0,0,1);
            font-size: 12px;">
    <?php 
        if(!isset($_GET['id'])){
            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <span class="text-danger">Error occured!</span>
                </div>';
        }else{
            if(mysql_escape_string ($_GET['id'])){
                // Get page data
                $query = "SELECT   DISTINCT p.PID AS ProductID,p.name,p.capacity FROM product p LEFT JOIN productsupplied r ON r.PID = p.PID LEFT JOIN supplier s ON r.SID = s.SID WHERE p.PID=".$_GET['id']." ";
                $result1 = mysql_query($query);

                $query1 = "SELECT   p.PID AS ProductID,p.name,r.*,s.name AS Supplier FROM productsupplied r LEFT JOIN  product p ON r.PID = p.PID LEFT JOIN supplier s ON r.SID = s.SID WHERE p.PID=".$_GET['id']."  ORDER BY r.PSID ASC";
                $result = mysql_query($query1);
                $count2 = mysql_num_rows($result);
            }
            if($count2<1){
                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                        <span class="text-warning">Error occured while trying to retrieve information!<br><b>Hint:</b> No supplies has been made for the item.</span>
                    </div>';
            }else{
            while($rows = mysql_fetch_assoc($result1)) { 
    ?>
        <div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-right">
                            <button type="submit" class="print" onclick="PrintElem('#printReport')" style="margin-right:20px;color:rgb(1,1,1);margin-top:10px;padding:3px 10px;"><a class="fa fa-print"></a> Print </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="printReport">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <img class="img-responsive" src="../../../assets/img/logo.png" alt="Logo: WAKA CMEC" style="width:100px;margin-top:0px;margin-right:auto;margin-left:auto;">
                        <p class="text-center" style="margin-top:10px;margin-bottom:0px;color:rgb(4,4,4);font-weight:bold;">WAKA CMEC TRAINING INSTITUTE AND HOSPITAL</p>
                        <p class="text-center" style="margin-top:0px;color:rgb(4,4,4);font-weight:bold;">STORES LEDGER AND STOCK CONTROL CARD </p>
                    </div>
                </div>
            </div>
        <div style="width:94%;margin-right:auto;margin-left:auto;margin-top:10px;margin-bottom:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-2" style="padding-right:0px;padding-left:0px;"><span class="label label-default" style="font-size:16px;font-family:EngraversGothic BT, serif;background-color:rgb(254,254,254);color:rgb(7,7,7);">ITEM CODE No.</span></div>
                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;border-bottom:1px dotted black;text-align:center;"><a href="#" style="color:rgb(4,4,4);">&nbsp;</a></div>
                    <div class="col-md-4" style="padding-left:0px;padding-right:0px;"><span class="label label-default" style="margin-right:10px;font-size:16px;background-color:rgb(254,254,254);color:rgb(7,7,7);">C No. <?php echo " ".sprintf('%09d',$rows['ProductID']);?></span></div>
                </div>
            </div>
        </div>
        <div style="width:94%;margin-right:auto;margin-left:auto;margin-bottom:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-2" style="padding-right:0px;padding-left:0px;"><span class="label label-default" style="font-size:16px;font-family:EngraversGothic BT, serif;color:rgb(1,1,1);background-color:rgb(254,254,254);">DESCRIPTION </span></div>
                    <div class="col-md-6" style="padding-right:0px;padding-left:0px;border-bottom:1px dotted black;text-align:center;"><a href="#" style="color:rgb(1,1,1);"><?php echo $rows['name'];?></a></div>
                    <div class="col-md-2" style="padding-left:0px;padding-right:0px;"><span class="label label-default" style="font-size:16px;font-family:EngraversGothic BT, serif;background-color:rgb(254,254,254);color:rgb(4,4,4);">UNIT OF ISSUE</span></div>
                    <div class="col-md-2" style="padding-right:0px;padding-left:0px;border-bottom:1px dotted black;text-align:center;"><a href="#" style="color:rgb(3,3,3);"><?php echo $rows['capacity'];?></a></div>
                </div>
            </div>
        </div>
        <div style="width:98%;margin-right:auto;margin-left:auto;">
            <div class="container">
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-12">
                        <div class="container">
        <div class="row">
            <div id="no-more-tables">
                <table class="col-md-12 table-bordered table-striped table-condensed cf" style="color:black;">
                    <thead class="cf">
                        <tr>
                            <th rowspan="2" style="text-align:center;width:100px;border-bottom:3px solid black;">Date</th>
                            <th rowspan="2" style="text-align:center;width:100px;border-bottom:3px solid black;">Vourcher Number</th>
                            <th rowspan="2" style="text-align:center;border-bottom:3px solid black;">Supplier or Requisitioning Office</th>
                            <th colspan="3" style="text-align:center;border-bottom:3px solid black;font-size:16px;font-family:EngraversGothic BT, serif;">Receipts</th>
                            <th colspan="3" style="text-align:center;border-bottom:3px solid black;font-size:16px;font-family:EngraversGothic BT, serif;">Issues</th>
                            <th colspan="3" style="text-align:center;border-bottom:3px solid black;font-size:16px;font-family:EngraversGothic BT, serif;">Balances</th>
                        </tr>
                        <tr>
                            <th style="text-align:center;border-bottom:3px solid black;">Qty</th>
                            <th style="width:100px;text-align:center;border-bottom:3px solid black;">Invoice Unit Price</th>
                            <th style="text-align:center;border-bottom:3px solid black;">Value</th>

                            <th style="text-align:center;border-bottom:3px solid black;">Qty</th>
                            <th style="width:100px;text-align:center;border-bottom:3px solid black;">Average Unit Price</th>
                            <th style="text-align:center;border-bottom:3px solid black;">Value</th>

                            <th style="text-align:center;border-bottom:3px solid black;">Qty</th>
                            <th style="text-align:center;border-bottom:3px solid black;">Value</th>
                        </tr>
                        <tr>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="text-align:center;border-bottom:2px solid black;"><em>B/F</em></th>
                            <th style="text-align:center;border-bottom:2px solid black;">Card No.</th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                            <th style="border-bottom:2px solid black;"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            mysql_data_seek($result,0);
                            while($rows = mysql_fetch_assoc($result)) 
                            {
                        ?>
                            <tr style="font-weight:bold;">
                                <td style="text-align:center;padding:2px;"><?php echo date_format(date_create($rows['received']),"d/m/Y");?></td>
                                <td style="text-align:center;padding:2px;"><?php echo "      ".sprintf('%09d',$rows['No']);?></td>
                                <td style="padding:2px;"><?php echo $rows['Supplier']; ?></td>
                                <td style="text-align:center;padding:2px;"><?php echo number_format($rows['Qty']); ?></td>
                                <td style="text-align:center;padding:2px;"><?php echo number_format($rows['price'])."/="; ?></td>
                                <td style="text-align:center;padding:2px;"><?php echo number_format($rows['price']*$rows['Qty'])."/="; ?></td>
                                <td style="text-align:center;padding:2px;"></td>
                                <td style="text-align:center;padding:2px;"></td>
                                <td style="text-align:center;padding:2px;"></td>
                                <td style="text-align:center;padding:2px;"><?php echo number_format($rows['Bal1']); ?></td>
                                <td style="text-align:center;padding:2px;"></td>
                            </tr>

                            <?php 
                                $query2 = "SELECT s.category AS faculty,r.RNO,r.QtyI,r.Bal,r.Idate  
                                            FROM request r 
                                            LEFT JOIN product p 
                                                    ON r.PID = p.PID 
                                            LEFT JOIN `staff` s 
                                                    ON r.`staffID` = s.`staffID` 
                                            WHERE r.PID = '".$_GET['id']."'
                                            AND r.Idate >= '".$rows['received']."'
                                            AND r.No = '".$rows['No']."'  
                                            AND r.QtyI > 0 
                                            ORDER BY r.Idate ASC";
                                $result2 = mysql_query($query2);
                                $count3 = mysql_num_rows($result2);

                                if($count3 < 1){
                                    echo'<td colspan="11" class="bg-danger text-danger text-center">
                                            No issiue records found!
                                        </td>';
                                }else{
                                mysql_data_seek($result2,0);
                                while($rws = mysql_fetch_assoc($result2)) 
                                {
                            ?>
                                <tr>
                                    <td style="text-align:center;padding:2px;"><?php echo date_format(date_create($rws['Idate']),"d/m/Y");?></td>
                                    <td style="text-align:center;padding:2px;"><?php echo "      ".sprintf('%09d',$rws['RNO']);?></td>
                                    <td style="padding:2px 5px;"><?php echo $rws['faculty']; ?></td>
                                    <td style="text-align:center;padding:2px;"></td>
                                    <td style="text-align:center;padding:2px;"><?php //echo $rows['price']."/="; ?></td>
                                    <td style="text-align:center;padding:2px;"><?php //echo $rows['price']*$rows['Qty']."/="; ?></td>
                                    <td style="text-align:center;padding:2px;"><?php echo number_format($rws['QtyI']); ?></td>
                                    <td style="text-align:center;padding:2px;"></td>
                                    <td style="text-align:center;padding:2px;"></td>
                                    <td style="text-align:center;padding:2px;"><?php echo number_format($rws['Bal']); ?></td>
                                    <td style="text-align:center;padding:2px;"></td>
                                </tr>
                            <?php }}} ?>
                        
                    </tbody>
                </table>
                </div>
            </div>
            
        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script src="../../../assets/js/jquery.min.js"></script>
        <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
        <script src="../../../assets/js/ebs-simple-login-form.js"></script>
        <script src="../../../assets/js/Profile-Edit.js"></script>
        <script src="../../../assets/js/Sidebar-Menu.js"></script>
        <?php }}} ?>
</body>

</html>