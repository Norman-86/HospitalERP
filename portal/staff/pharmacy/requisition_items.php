<?php 
    include'include/session.php';
    
    if(mysql_escape_string($_GET['id'])){
        $array = unserialize(base64_decode($_GET['id']));
        $arrays=implode(',',$array);
        // Get page data
        $query1 = "SELECT   PID,name,Capacity FROM product WHERE PID IN ($arrays)";
        $result = mysql_query($query1);
    }
    $ReqNo = rand(1,999999999);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requisition Items | Pharmacy | WAKA CMEC Hospital</title>
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
               <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-product-hunt"></i> &nbsp;Items</h2>
            </div>
            <?php 
                if(empty($result))
                {
                    echo'<div class="alert alert-danger absolue center text-center" role="alert">
                            <span class="text-danger">Fatal Error Occured!</span>
                        </div>';
                }else
                {
                include('validate/requisitionItem.php'); 
                
            ?>
            <div class="col-md-12" style="width:98%;">
                <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color:rgb(42,63,84);color:rgb(255,255,255);">
                                <th style="border:none;width:60%;">Item </th>
                                <th style="border:none;width:10%;text-align:center;">Capacity</th>
                                <th style="border:none;">Quantity <b style="color:red;">*</b></th>
                                <th style="border:none;">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                while($rows = mysql_fetch_assoc($result)) 
                                {
                                    $value = array_shift($quantity);
                            ?>
                            <tr>
                                <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);border:none;">
                                    <input type="text" name="item[]" style="width:100%;background-color:transparent;border:none;" value='<?php echo $rows["name"];?>' readonly>
                                    <input type="hidden" name="itemID[]" value="<?php echo $rows['PID']; ?>" readonly style="display:none;" placeholder="Enter Item ID.">
                                    <input type="hidden" name="req[]" value="<?php echo $ReqNo; ?>" readonly style="display:none;" placeholder="Enter Requisition No.">
                                    <input type="hidden" name="officer[]" value="<?php echo $staffID; ?>" readonly style="display:none;" placeholder="Enter Officer's No.">
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <input type="text" style="width:100%;background-color:transparent;border:none;text-align:center;" value='<?php echo $rows["Capacity"];?>' readonly>
                                </td>
                                
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <input type="number" style="width:100%;padding:5px;" step="any" min="0" name="qty[]" value='<?php echo $value; ?>' placeholder="Enter Qty to requisition">
                                </td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;"> 
                                    <button type="submit" name="remove" value="<?php echo $rows['PID'];?>" style="border:none;background-color:transparent; margin:0px;padding:0px;" onClick="return confirm('Are you sure you want to remove this item from list\nItem: <?php echo $rows['name'].'\nCapacity: '.$rows['Capacity']; ?>?');">
                                        <i class="fa fa-remove text-danger"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <hr style="padding:0px;">
                <div class="table-responsive" style="margin-right:auto;margin-left:auto;border:none;">
                    <table class="table table-striped">
                        <thead>
                            <tr style="background-color:rgb(42,63,84);color:rgb(255,255,255);"></tr>
                        </thead>
                        <tbody style="border:none;">
                            <tr style="background-color:transparent;">
                                <td style="font-size:12px;font-weight:bold;color:rgb(141,142,165);width:15%;border:none;">Designation <b style="color:red;">*</b></td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <input type="text" class="form-control" name="designation" value='Pharmacist' readonly placeholder="Enter Designation">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size:12px;font-weight:bold;color:rgb(141,142,165);width:15%;border:none;">Point of Use</td>
                                <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                    <input type="text" class="form-control" name="usage" value='<?php echo $usage; ?>' placeholder="Enter point of use (optional)">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12" style="text-align:center;width:100%;">
                <button name="save" type="submit" style="margin-bottom:3%;color:rgb(1,1,1);padding:5px 10px;">Requisition</button>
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