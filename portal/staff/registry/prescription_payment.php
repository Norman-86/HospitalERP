<?php 
    include'include/session.php';
    
    // Get page data
    $query1 = "SELECT * FROM rates ORDER BY name ASC ";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
    
    if(isset($_GET['id']) && isset($_GET['no'])){
        $id = mysql_real_escape_string($_GET['id']);
        $no = mysql_real_escape_string($_GET['no']);
        
        $query = "SELECT name,gender,dob,id,phone FROM patient WHERE patientNo ='$id'  ";
        $results = mysql_query($query);
        
        $query1 = "SELECT SUM(ph.item_price*p.qty) AS totalPrice 
                   FROM prescription p 
                   LEFT JOIN(SELECT t1.item_price,t1.PID
                                FROM pharmacy_productSupplied t1
                                JOIN (SELECT MAX(PPSID) AS PPSID
                                        FROM pharmacy_productSupplied
                                        GROUP BY PID
                                    ) t2
                                ON t1.PPSID = t2.PPSID 
                            )ph
                   ON p.productID = ph.PID 
                   WHERE p.patientNo ='$id' AND p.visitNo='$no' ";
        $results1 = mysql_fetch_array(mysql_query($query1));
        $totalPrice = $results1['totalPrice'];
        
        $queryx = "SELECT level FROM visit WHERE patientNo ='$id' AND visitNo='$no' ";
        $resultsx = mysql_fetch_array(mysql_query($queryx));
        $level = $resultsx['level'];
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient | Registry | WAKA CMEC Hospital</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png"/>
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
    <link href="../../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    
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

<body style="background-color:rgba(42,63,84,0);">
    <nav class="navbar navbar-default" style="background-color:rgb(52,73,94);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">
                    Registry | Waka CMEC Hospital
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
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="add-patient.php">
                                <i class="fa fa-book" style="margin-right:5px;"></i>
                                Add Patient 
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Patient
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="patient.php">All Patient</a></li>
                                <li role="presentation"><a href="out-patient.php">Out Patient</a></li>
                                <!--<li role="presentation"><a href="in-patient.php">In Patient</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="">
        <div>
            <form method="POST">
                <div class="form-group">
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:5px;padding-bottom:5px;background-color:rgb(239,239,239);">
                            <div class="col-md-12" style="width:100%;height:auto;">
                                <h2 style="height:auto;margin:0px;font-size:16px;color:rgb(1,1,1);font-weight:bold;margin-left:1%;">
                                    <i class="fa fa-dollar"></i>&nbsp;
                                    Make Prescription Payment
                                </h2>
                            </div>
                        </div>
                        <?php 
                            
                            if(isset($_SESSION['new'])=='True')
                            {
                                $balance = $_SESSION['balance'];
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <span class="text-success">Payment successful<br>Patient Balance is: <b>Kshs.'.$balance.'</b>
                                        <button type="submit" class="print" onclick="PrintElem(\'#printReport\')" style="margin-right:1%;padding:3px 10px;color:rgb(1,1,1);"><a class="fa fa-print"></a> Print </button>
                                        </span>
                                    </div>';
                        ?>  
                        <div id="printReport">
                            <div class="row" style="margin-right:0px;margin-left:0px;">
                                <div class="col-md-12" id="hidden_div" style="font-size:12px;">
                                    <div style="border-bottom:1px dotted black;text-align:center;">
                                        <b>WAKA CMEC HOSPITAL RECEIPT</b>
                                    </div>
                                    <div style="border-bottom:1px dotted black;">
                                    <?php while($rw = mysql_fetch_array($results)) {?>
                                        <b>name: &nbsp;</b> <?php echo $rw['name'];?>
                                        <br>
                                        <b>Gender: &nbsp;</b> <?php echo $rw['gender'];?>
                                        <br>
                                        <b>Age: &nbsp;</b> <?php $today = date("Y-m-d");
                                                                $diff = date_diff(date_create($rw['dob']), date_create($today));
                                                                echo $diff->format('%y')." yrs.";
                                                            ?>    
                                        <br>
                                    <?php } ?>
                                    </div>    
                                    <div><b>Patient No: &nbsp;</b> <?php echo $_GET['id'];?></div>
                                    <div>
                                        <b>Visit No: &nbsp;</b> <?php echo $_GET['no'];?>
                                    </div>

                                    <div style="border-bottom:1px dotted black;">
                                        <b>Service: &nbsp;</b> Medication
                                    </div>

                                    <div class="col-md-12" style="border-bottom:1px solid black;">
                                        <div style="width:50%;float:left;">
                                            <b>Item</b>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <b>Qty</b>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <b>Price</b>
                                        </div>
                                    </div>

                                    <div class="col-md-12" style="border-bottom:1px solid black;">
                                        <div style="width:50%;float:left;">
                                            <?php echo implode('<br>',$_SESSION['item']);?>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <?php echo implode('<br>',$_SESSION['qty']);?>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <?php echo implode('<br>',$_SESSION['price']);?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div  style="width:50%;float:left;">
                                            <b>Total:</b>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            &nbsp;
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <?php echo "Kshs. ".number_format($_SESSION['cost'],2);?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="width:50%;float:left;">
                                            <b>Paid:</b>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            &nbsp;
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <?php echo "Kshs. ".number_format($_SESSION['paid'],2);?>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div style="width:50%;float:left;">
                                            <b>Balance:</b>
                                        </div>
                                        <div style="width:25%;float:left;">
                                            &nbsp;
                                        </div>
                                        <div style="width:25%;float:left;">
                                            <?php echo "Kshs. ".number_format($_SESSION['balance'],2);?>
                                        </div>
                                    </div>

                                    <div style="width:100%;border-top:1px dotted black;">
                                        <b>Served by: &nbsp;</b> <?php echo $pro;?>
                                    </div>
                                    <div>
                                        <b>Date: &nbsp;</b> <?php echo date("D d M Y, H:i A");?>
                                    </div>
                                </div>
                            </div>    
                        </div>    
                        <?php
                                    unset($_SESSION['new']); 
                                    unset($_SESSION['balance']);
                                    unset($_SESSION['name']);
                                    unset($_SESSION['cost']);
                                    unset($_SESSION['paid']);
                                    unset($_SESSION['item']);
                                    unset($_SESSION['qty']);
                                    unset($_SESSION['price']);
                            }
                        ?>
                            <?php
                            if(!isset($_GET['id'])){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">Failed to fetch patient No</b></span>
                                    </div>';
                            }else
                            if(!isset($_GET['no'])){
                                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                        <span class="text-warning">Failed to fetch patient visit No</b></span>
                                    </div>';
                            }else
                            if($level >= 6){
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <span class="text-success">Patient no.<b>'.$_GET['id'].'</b> has been treated and discharged during visit no. <b>'.$_GET['no'].'</b></span>
                                    </div>';
                            }else{
                            include('validate/payment.php'); 
                        ?>  
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Patient No.</p>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="town" readonly value="<?php echo $_GET['id'];?>" placeholder="Patient No" style="margin-left:0px;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Amount</p>
                                    <div class="input-group">
                                        <input class="form-control" type="text" readonly value="<?php echo number_format($totalPrice,2)."/=";?>" placeholder="Amount" style="margin-left:0px;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-money"></i>
                                        </span>
                                    </div>
                                    <input class="form-control" type="hidden" name="amount" id="amount" readonly value="<?php echo $totalPrice;?>" placeholder="Amount" style="margin-left:0px;">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Visit No.</p>
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="town" readonly value="<?php echo $_GET['no'];?>"  placeholder="Patient No" style="margin-left:0px;">
                                        <span class="input-group-addon">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </div>
                                </div>    
                                
                                <div class="col-md-6">
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Paid.</p>
                                    <input class="form-control" type="number" min="<?php echo $totalPrice;?>" id="paid" name="paid" value="<?php echo $paid;?>" required onkeyup="price()" placeholder="Amount Paid" style="margin-left:0px;">
                                    <script>
                                            function price() {

                                            var amount = document.getElementById("amount").value;
                                            var paid = document.getElementById("paid").value;
                                            var balance = paid - amount;
                                            
                                            document.getElementById("balance").value = balance;
                                        }
                                    </script>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Service.</p>
                                    <input type="text" readonly name="service" value="Medication" class="form-control">
                                </div>    
                                
                                <div class="col-md-6">
                                    <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Balance.</p>
                                    <input class="form-control" type="number" min="0" id="balance" name="balance" value="<?php echo $paid;?>" readonly placeholder="balance" style="margin-left:0px;">
                                </div>
                                
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px; text-align:center; padding-top:24px;">
                            <div class="col-md-12">
                                <button type="submit" name="medication_payment" style="padding:5px 20px;color:rgb(1,1,1);">Submit</button>
                            </div>
                        </div>
                       <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <script src="ajax.js"></script>
    <script type="text/javascript" src="../../../assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   
    <script type="text/javascript" src="../../../assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</body>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</html>