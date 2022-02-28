<?php 
    include'include/session.php';
    
    $tableName='product';
    $tableName1='productsupplied';
    $tableName2='request';
    $tableNamex='pharmacy_request';
    $tableName3='supplier';
    $tableName4='administrate';
    
    $sql = "SELECT COUNT(*) as num FROM $tableName "; 
    $t_p = mysql_fetch_array(mysql_query($sql));
    $total_pages = $t_p['num'];
    
    $sql1 = "SELECT COUNT(DISTINCT No) as num FROM $tableName1 "; 
    $t_p1 = mysql_fetch_array(mysql_query($sql1));
    $total_pages1 = $t_p1['num'];
    
    $sql2 = "SELECT COUNT(DISTINCT RNO) as num FROM $tableName2 WHERE QtyI >0 "; 
    $t_p2 = mysql_fetch_array(mysql_query($sql2));
    $total_pages2 = $t_p2['num'];
    
    $sqlx = "SELECT COUNT(DISTINCT RNO) as num FROM $tableNamex WHERE QtyI >0 "; 
    $t_px = mysql_fetch_array(mysql_query($sqlx));
    $total_pagesx = $t_px['num'];
    
    $sql3 = "SELECT COUNT(*) as num FROM $tableName3 "; 
    $t_p3 = mysql_fetch_array(mysql_query($sql3));
    $total_pages3 = $t_p3['num'];
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Procurement | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit1.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
</head>

<body style="background-color:rgb(252,252,252);">
    <div></div>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:rgb(21,164,113);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="color:rgb(255,255,255);"> 
                    <a href="#" style="font-weight:bold;color:rgb(254,254,254);">Proc | WAKA CMEC</a>
                </li>
                <li style="color:rgb(252,253,254);"> 
                    <a class="bg-info col-md-12">
                        <p style="float:left;">Dashboard</p> 
                        <p style="float:left;text-align:center;padding:0px;margin:0px;color:red;" id="messageCounter"></p>
                    </a>
                    <a href="view-item.php" style="color:rgb(255,255,255);">View Items</a>
                    <a href="view-requisitoned.php" style="color:rgb(255,255,255);"> View Requisitions </a>
                    <a href="view-pharmacy-requisitoned.php" style="color:rgb(255,255,255);"> Pharmacy Requisitions </a>
                    <a href="view-received.php" style="color:rgb(255,255,255);">View Received</a>
                    <a href="view-pharmacy-received.php" style="color:rgb(255,255,255);">Pharmacy Received</a>
                    <a href="view-supplier.php" style="color:rgb(255,255,255);">View Supplier</a>
                    <a href="product-stock.php" style="color:rgb(255,255,255);" title="Items running out of stock">
                        <p class="bg-danger text-danger" title="Items running out of stock"  id="StockCounter"></p>
                    </a>
                    <a href="pharmacy-product-stock.php" style="color:rgb(255,255,255);" title="Pharmacy Items running out of stock">
                        <p class="bg-danger text-danger" title="Pharmacy Items running out of stock"  id="PharmacyStockCounter"></p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid">
                <a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="dropdown" style="width:150px;float:right;margin-top:5px;">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width:150px;background-color:rgb(252,252,252);color:rgb(20,19,19);border:1px solid rgb(252,252,252);text-align:right;"><i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> <span class="caret"></span></button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="settings.php"><i class="fa fa-wrench"></i> &nbsp;Settings</a></li>
                        <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="panel panel-default panel-table">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col col-xs-12">
                                                        <h3 class="panel-title">
                                                            <em class="fa fa-dashboard"></em> 
                                                            <b>Dahboard</b>
                                                         </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="row" style="margin:5px;padding:0px;margin-bottom:4%;">
                                                <div class="col col-xs-12 text-center" style="margin:0px;padding:0px;color:#000000;">
                                                    <div class="col col-xs-2 bg-info" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Items</h3>
                                                        <hr>
                                                        <p>
                                                            <?php 
                                                                if($total_pages > 999 && $total_pages <= 999999) {
                                                                    echo number_format(($total_pages / 1000),1). ' K';
                                                                }else
                                                                if($total_pages > 999999 && $total_pages <= 999999999) {
                                                                    echo number_format(($total_pages / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages > 999999999 && $total_pages <= 999999999999) {
                                                                    echo number_format(($total_pages / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages > 999999999999 && $total_pages <= 999999999999999) {
                                                                    echo number_format(($total_pages / 1000000000000),1). ' T';
                                                                }else {echo $total_pages;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="add-item.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-plus"></i> Add</p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-3 bg-info" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">P/Requisitions</h3>
                                                        <hr>
                                                        <p>
                                                            <?php 
                                                                if($total_pagesx > 999 && $total_pagesx <= 999999) {
                                                                    echo number_format(($total_pagesx / 1000),1). ' K';
                                                                }else
                                                                if($total_pagesx > 999999 && $total_pagesx <= 999999999) {
                                                                    echo number_format(($total_pagesx / 1000000),1). ' M';
                                                                }else
                                                                if($total_pagesx > 999999999 && $total_pagesx <= 999999999999) {
                                                                    echo number_format(($total_pagesx / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pagesx > 999999999999 && $total_pagesx <= 999999999999999) {
                                                                    echo number_format(($total_pagesx / 1000000000000),1). ' T';
                                                                }else {echo $total_pagesx;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="pharmacy_requisitions.php" title="Click to view Pharmacy requisitions">
                                                            <p title="Click to view Pharmacy requisitions" style="width:100%;margin:5px auto;padding:3px 0px;" class="bg-danger text-danger">
                                                                <label id="messageCounterx"></label>
                                                            </p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-3 bg-info" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Requisitions</h3>
                                                        <hr>
                                                        <p>
                                                            <?php 
                                                                if($total_pages2 > 999 && $total_pages2 <= 999999) {
                                                                    echo number_format(($total_pages2 / 1000),1). ' K';
                                                                }else
                                                                if($total_pages2 > 999999 && $total_pages2 <= 999999999) {
                                                                    echo number_format(($total_pages2 / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages2 > 999999999 && $total_pages2 <= 999999999999) {
                                                                    echo number_format(($total_pages2 / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages2 > 999999999999 && $total_pages2 <= 999999999999999) {
                                                                    echo number_format(($total_pages2 / 1000000000000),1). ' T';
                                                                }else {echo $total_pages2;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="requisitions.php" title="Click to view requisitions">
                                                            <p title="Click to view requisitions" style="width:100%;margin:5px auto;padding:3px 0px;" class="bg-danger text-danger">
                                                                <label id="messageCounter1"></label>
                                                            </p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-2 bg-info" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Received</h3>
                                                        <hr>
                                                        <p class="text-info">
                                                            <?php 
                                                                if($total_pages1 > 999 && $total_pages1 <= 999999) {
                                                                    echo number_format(($total_pages1 / 1000),1). ' K';
                                                                }else
                                                                if($total_pages1 > 999999 && $total_pages1 <= 999999999) {
                                                                    echo number_format(($total_pages1 / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages1 > 999999999 && $total_pages1 <= 999999999999) {
                                                                    echo number_format(($total_pages1 / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages1 > 999999999999 && $total_pages1 <= 999999999999999) {
                                                                    echo number_format(($total_pages1 / 1000000000000),1). ' T';
                                                                }else {echo $total_pages1;}
                                                            ?>
                                                        </p>
                                                        <hr>  
                                                        <a href="view-received.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-search"></i> View</p>
                                                        </a>
                                                    </div>
                                                    
                                                    <div class="col col-xs-2 bg-info" style="border:5px solid white;">
                                                        <h3 style="font-weight:bold;">Suppliers</h3>
                                                        <hr>
                                                        <p class="text-info">
                                                            <?php 
                                                                if($total_pages3 > 999 && $total_pages3 <= 999999) {
                                                                echo number_format(($total_pages3 / 1000),1). ' K';
                                                                }else
                                                                if($total_pages3 > 999999 && $total_pages3 <= 999999999) {
                                                                    echo number_format(($total_pages3 / 1000000),1). ' M';
                                                                }else
                                                                if($total_pages3 > 999999999 && $total_pages3 <= 999999999999) {
                                                                    echo number_format(($total_pages3 / 1000000000),1). ' B';
                                                                }else
                                                                if($total_pages3 > 999999999999 && $total_pages3 <= 999999999999999) {
                                                                    echo number_format(($total_pages3 / 1000000000000),1). ' T';
                                                                }else {echo $total_pages3;}
                                                            ?>
                                                        </p>
                                                        <hr>
                                                        <a href="add-supplier.php">
                                                            <p style="width:100%;background-color:white;margin:5px auto;padding:5px 0px;"><i class="fa fa-plus"></i> Add</p>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </form>
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
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>

    <script type="text/javascript">
            $(document).ready(function(){
            setInterval(function(){
                $("#messageCounter").load("include/pharmacy_&_stock_counter.php");
                $("#messageCounterx").load("include/pharmacy_counter.php");
                $("#messageCounter1").load("include/counter.php");
                $("#StockCounter").load("include/count_stock.php");
                $("#PharmacyStockCounter").load("include/count_pharmacy_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
</html>