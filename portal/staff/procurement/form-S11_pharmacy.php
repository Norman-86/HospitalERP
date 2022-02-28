<?php
    include'include/session.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form S11 Pharmacy | Procurement | WAKA CMEC Hospital</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
    
    <script>
        function PrintElem(elem)
        {
            Popup($(elem).html());
        }

        function Popup(data) 
        {

            var mywindow = window.open('location.href+"form-S11.php"', '', 'height=500,width=700');
            mywindow.document.write('<html><head><title>Form S11 Pharmacy</title>');
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

<body style="background-color:rgb(255,255,255);width:960px;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);font-size:12px;">
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
                 //Get page data
                $getId=$_GET['id'];

                $query2 = "SELECT  DISTINCT(IssuingOfficer), Department,RNO,Officer,Designation,Iuse,Idate FROM pharmacy_voucher WHERE RNO =".$getId;
                $result2 = mysql_query($query2); 

                $query1 = "SELECT  PID,name,Capacity,Department,RNO,Officer,IssuingOfficer,Designation,QtyR,QtyI,Iuse,Idate FROM pharmacy_voucher WHERE RNO =".$getId;
                $result = mysql_query($query1); 
                $count=  mysql_num_rows($result);
            }
         
        
    ?>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p class="text-right">
                        <button type="submit" class="print" onclick="PrintElem('#printReport')" style="margin-right:20px;margin-top:10px;padding:3px 10px;color:rgb(1,1,1);"><a class="fa fa-print"></a> Print </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div id="printReport">
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p style="margin-left:25px;color:rgb(3,3,3);font-weight:normal;">Form S11 Pharmacy</p>
                </div>
                <div class="col-md-6"><img class="img-responsive" src="../../../assets/img/logo.png" alt="Logo: WAKA CMEC" style="width:100px;margin-top:0px;margin-right:auto;margin-left:auto;">
                    <p class="text-center" style="color:rgb(4,4,4);margin-bottom:0px;text-align:center;font-weight:bold;">WAKA CMEC TRAINING INSTITUTE AND HOSPITAL</p>
                    <p class="text-center" style="color:rgb(4,4,4);font-size:16px;text-align:center;font-weight:bold;">COUNTER REQUISITION AND ISSUE VOUCHER </p>
                </div>
                <div class="col-md-3">
                    <p class="text-right" style="padding-right:25px;color:rgb(7,7,7);font-weight:bold;font-size:18px;">ORIGINAL </p>
                    <?php while($rows = mysql_fetch_assoc($result2)) { ?>
                        <p class="text-right" style="padding-right:25px;color:rgb(7,7,7);font-weight:normal;font-size:14px;"><?php echo $rows['RNO']; ?> </p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
        mysql_data_seek($result2,0);
        while($rows = mysql_fetch_assoc($result2)) 
        { 
    ?>
        <div style="margin-top:7px;">
            <div class="container">
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Department</p>
                    </div>
                    <div class="col-md-5">
                        <p class="text-center" style="border-bottom:1px dotted rgb(3,3,3); color:rgb(1,1,1);font-weight:normal;">&nbsp; PROCUREMENT</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-right" style="color:rgb(4,4,4);font-weight:normal;font-size:12px;">To (issue point)</p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center" style="border-bottom:1px dotted rgb(3,3,3); color:rgb(3,3,3);"> &nbsp; <?php echo $rows['Department']; ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:7px;">
            <div class="container">
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-4">
                        <p class="text-left" style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Please issue the store listed below to (point of use) </p>
                    </div>
                    <div class="col-md-8">
                        <p class="text-left" style="border-bottom:1px dotted rgb(3,3,3); padding-left:10px;color:rgb(1,1,1);font-weight:normal;">&nbsp; <?php echo $rows['Iuse']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;margin-top:10px;">
        <div class="col-md-12" style="width:100%;padding-right:0px;padding-left:0px;">
            <div class="table-responsive" style="width:100%;">
                <table class="table table-striped" style="width:94%;margin-left:auto;margin-right:auto;">
                    <thead>
                        <tr>
                            <th class="col-md-1" style="font-weight:bold;color:rgb(3,3,3);border:1px solid black;font-size:12px;text-align:center;">Code No.</th>
                            <th class="col-md-6" style="color:rgb(3,3,3);border:1px solid black;font-size:12px;">Item Description</th>
                            <th class="col-md-1" style="color:rgb(4,4,4);border:1px solid black;font-size:12px;text-align:center;">Unit of Issue</th>
                            <th class="col-md-1" style="color:rgb(3,3,3);border:1px solid black;font-size:12px;text-align:center;">Quantity Required</th>
                            <th class="col-md-1" style="color:rgb(4,4,4);border:1px solid black;font-size:12px;text-align:center;">Quantity Issued</th>
                            <th class="col-md-1" style="color:rgb(4,4,4);border:1px solid black;font-size:12px;text-align:center;">Value </th>
                            <th class="col-md-1" style="border:1px solid black;color:rgb(4,4,4);font-size:12px;text-align:center;">Remarks Purpose</th>
                        </tr>
                    </thead>
                    <tbody style="border-bottom:2px solid black;border-top:2px solid black;border-left:1px solid black;border-right:1px solid black;">
                        <?php 
                            mysql_data_seek($result,0);
                            $code=1;
                            while($rows = mysql_fetch_assoc($result)) 
                            { 
                        ?>
                        <tr style="color:rgb(4,4,4);">
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;"><?php echo $code++;?></td>
                            <td style="border:1px solid black;font-size:12px;padding:2px;padding-left:5px"><?php echo $rows['name']; ?></td>
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;"><?php echo $rows['Capacity']; ?></td>
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;text-align:center;"><?php echo $rows['QtyR']; ?></td>
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;text-align:center;">
                                <?php 
                                    if($rows['QtyI'] == 0)
                                    {
                                        echo "R/J";
                                    }else 
                                    if($rows['QtyI'] == NULL)
                                    {
                                        echo '<em>NULL<em>';
                                    }else
                                    {
                                        echo $rows['QtyI'];
                                    }
                                ?>
                            </td>
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;"></td>
                            <td style="border:1px solid black;font-size:12px;text-align:center;padding:2px;text-align:center;"><?php echo sprintf('%09d',$rows['PID']);?></td>                     
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php 
        mysql_data_seek($result2,0);
        while($rows = mysql_fetch_assoc($result2)) 
        { 
    ?>
        <div>
            <div class="container">
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-2">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Account No.</p>
                    </div>
                    <div class="col-md-3">
                        <p class="text-center" style="color:rgb(1,1,1);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;">&nbsp;</p>
                    </div>
                    <div class="col-md-4">
                        <p style="font-size:12px;"> </p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Date </p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(7,7,7);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;">&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-2">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Requisitioning Officer</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(1,1,1);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;"> <?php echo $rows['Officer']; ?> &nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Designation </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center" style="color:rgb(1,1,1);text-align:center;border-bottom:1px dotted rgb(1,1,1);font-size:12px;"><?php echo $rows['Designation']; ?> &nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Signature </p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(7,7,7);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;">&nbsp;</p>
                    </div>
                </div>
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-2">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Issued by</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(1,1,1);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;"><?php echo $rows['IssuingOfficer']; ?> &nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Signature </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center" style="color:rgb(1,1,1);text-align:center;border-bottom:1px dotted rgb(1,1,1);font-size:12px;">&nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Date </p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(7,7,7);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;"><?php if(!$rows['Idate']){echo '<em>NULL<em>';}else {echo date_format(date_create($rows['Idate']),"d/m/Y");} ?> &nbsp;</p>
                    </div>
                </div>
                <div class="row" style="width:98%;margin-right:auto;margin-left:auto;">
                    <div class="col-md-2">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Received by</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(1,1,1);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;"><?php echo $rows['Officer']; ?> &nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Designation </p>
                    </div>
                    <div class="col-md-4">
                        <p class="text-center" style="color:rgb(1,1,1);text-align:center;border-bottom:1px dotted rgb(1,1,1);font-size:12px;"><?php echo $rows['Designation']; ?> &nbsp;</p>
                    </div>
                    <div class="col-md-1">
                        <p style="color:rgb(3,3,3);font-weight:normal;font-size:12px;">Signature</p>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center" style="color:rgb(7,7,7);font-weight:normal;border-bottom:1px dotted rgb(1,1,1);text-align:center;font-size:12px;">&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <?php } ?>
    </div>
</body>

</html>