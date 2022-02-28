<?php 
    include'include/session.php';
    
     $tableName="payment";
    $month = date("m");
    $year = date("Y");
    $sql = "SELECT SUM(p.cost) as num FROM $tableName p LEFT JOIN rates r ON  p.rateID = r.rateID WHERE r.name = 'Consultation' AND  MONTH(p.dop)='$month' AND YEAR(p.dop)='$year'"; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $totalVisit = $pages['num'];
    
    $sql1 = "SELECT SUM(p.cost) as num FROM $tableName p LEFT JOIN rates r ON  p.rateID = r.rateID WHERE r.name = 'Lab Test' AND  MONTH(p.dop)='$month' AND YEAR(p.dop)='$year'"; 
    $pages1 = mysql_fetch_array(mysql_query($sql1));
    $totalLab = $pages1['num'];
    
    $sql2 = "SELECT SUM(cost) as num FROM $tableName WHERE rateID='0' AND service='Medication' AND MONTH(dop)='$month' AND YEAR(dop)='$year'"; 
    $pages2 = mysql_fetch_array(mysql_query($sql2));
    $totalMed = $pages2['num'];
   
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Accounts | WAKA CMEC Hospital</title>
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
    <nav class="navbar navbar-default" style="background-color:rgb(21,164,113);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(21,164,113);">
                    Accounts | Waka CMEC Hospital
                </a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-2" style="background-color:rgb(21,164,113);color:rgb(255,255,255);"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
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
                        <li class="active" role="presentation">
                            <a href="index.php">
                                <i class="fa fa-table" style="margin-right:5px;"></i>
                                Dashboard
                                <p style="float:right;margin-left:10px;padding:0px;text-align:center;color:red;" id="messageCounter"></p>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-thermometer" style="margin-right:5px;"></i>
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
                                    <a href="received.php">
                                        <i class="fa fa-reorder" style="margin-right:5px;"></i>
                                        View Received Items
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="pharmacy_received.php">
                                        <i class="fa fa-reorder" style="margin-right:5px;"></i>
                                        Received Pharmacy Items
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-thermometer" style="margin-right:5px;"></i>
                                    Rates
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation">
                                    <a href="rates.php">
                                        <i class="fa fa-plus-circle" style="margin-right:5px;"></i>
                                        Add Rate
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="view-rates.php">
                                        <i class="fa fa-search" style="margin-right:5px;"></i>
                                        View Rate
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div style="width:98%;padding:0px;padding-right:0px;padding-left:auto;padding-bottom:3%;background-color:rgba(57,12,12,0);margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);">
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-12">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</h2>
                </div>
        </div>
            <div class="container">
            <div class="row" style="margin-right:0px;margin-left:0px;">
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                             <?php echo date("M").". Consultations";?> 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php 
                                if($totalVisit > 999 && $totalVisit <= 999999) {
                                    echo "Kshs. ".number_format(($totalVisit / 1000),2). ' K';
                                    }else
                                    if($totalVisit > 999999 && $totalVisit <= 999999999) {
                                        echo "Kshs. ".number_format(($totalVisit / 1000000),2). ' M';
                                    }else
                                    if($totalVisit > 999999999 && $totalVisit <= 999999999999) {
                                        echo "Kshs. ".number_format(($totalVisit / 1000000000),2). ' B';
                                    }else
                                    if($totalVisit > 999999999999 && $$totalVisit <= 999999999999999) {
                                        echo "Kshs. ".number_format(($totalVisit / 1000000000000),2). ' T';
                                    }else {echo "Kshs. ".number_format($totalVisit,2)."/=";}
                            ?> 
                        </p>
                        <a>
                                <button style="border:1px solid white;border-radius:7px;background-color:transparent;width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">&nbsp;</button>
                            </a>
                    </div>
                </div>
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                             <?php echo date("M").". Lab Tests";?> 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php
                                if($totalLab > 999 && $totalLab <= 999999) {
                                    echo "Kshs. ".number_format(($totalLab / 1000),2). ' K';
                                    }else
                                    if($totalLab > 999999 && $totalLab <= 999999999) {
                                        echo "Kshs. ".number_format(($totalLab / 1000000),2). ' M';
                                    }else
                                    if($totalLab > 999999999 && $totalLab <= 999999999999) {
                                        echo "Kshs. ".number_format(($totalLab / 1000000000),2). ' B';
                                    }else
                                    if($totalLab > 999999999999 && $$totalLab <= 999999999999999) {
                                        echo "Kshs. ".number_format(($totalLab / 1000000000000),2). ' T';
                                    }else {echo "Kshs. ".number_format($totalLab,2)."/=";}
                            ?> 
                        </p>
                        <a>
                           <button style="border:1px solid white;border-radius:7px;background-color:transparent;width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">&nbsp;</button>
                        </a>
                    </div>
                </div>
                
                <div class="col-md-3 col-xs-3">
                    <div style="border:1px solid rgb(52,73,94);border-radius:5px;">
                        <p class="text-center" style="color:rgb(3,3,3);background-color:rgb(52,73,94);color:white;font-size:24px;font-weight:bold;">
                             <?php echo date("M").". Medication";?> 
                        </p>
                        <p style="font-weight:bold;font-size:16px;text-align:center;"> 
                            <?php
                                if($totalMed > 999 && $totalMed <= 999999) {
                                    echo "Kshs. ".number_format(($totalMed / 1000),2). ' K';
                                    }else
                                    if($totalMed > 999999 && $totalMed <= 999999999) {
                                        echo "Kshs. ".number_format(($totalMed / 1000000),2). ' M';
                                    }else
                                    if($totalMed > 999999999 && $totalMed <= 999999999999) {
                                        echo "Kshs. ".number_format(($totalMed / 1000000000),2). ' B';
                                    }else
                                    if($totalMed > 999999999999 && $$totalMed <= 999999999999999) {
                                        echo "Kshs. ".number_format(($totalMed / 1000000000000),2). ' T';
                                    }else {echo "Kshs. ".number_format($totalMed,2)."/=";}
                            ?> 
                        </p>
                        <a>
                           <button style="border:1px solid white;border-radius:7px;background-color:transparent;width:100%;margin:auto;padding:8px 0px;color:rgb(1,1,1);">&nbsp;</button>
                        </a>
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
    <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
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
</html>