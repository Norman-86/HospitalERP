<?php 
    include'include/session.php';
    
    $tableName="payment";
    // Get page data
    if(isset($_GET['id'])){
       $id = mysql_real_escape_string($_GET['id']);
       
        if(isset($_GET['from']) && isset($_GET['to'])){
            $from = mysql_real_escape_string($_GET['from']);
            $to = mysql_real_escape_string($_GET['to']);
            
            $sql = "SELECT SUM(p.cost) as num FROM $tableName p LEFT JOIN rates r ON  p.rateID = r.rateID WHERE p.rateID='$id' AND DATE(p.dop) >= '$from' AND DATE(p.dop) <= '$to'"; 
            $pages = mysql_fetch_array(mysql_query($sql));
            $total = $pages['num'];

            $query1 = "SELECT p.*,s.fname,s.lname,s.sname,s.staffNo FROM $tableName p LEFT JOIN staff s ON p.staffID = s.staffID WHERE p.rateID = '$id' AND DATE(p.dop) >= '$from' AND DATE(p.dop) <= '$to'";
            $result = mysql_query($query1);
            $rowcount=  mysql_num_rows($result);
        }else{
            $sql = "SELECT SUM(p.cost) as num FROM $tableName p LEFT JOIN rates r ON  p.rateID = r.rateID WHERE p.rateID='$id'"; 
            $pages = mysql_fetch_array(mysql_query($sql));
            $total = $pages['num'];

            $query1 = "SELECT p.*,s.fname,s.lname,s.sname,s.staffNo FROM $tableName p LEFT JOIN staff s ON p.staffID = s.staffID WHERE p.rateID = '$id'";
            $result = mysql_query($query1);
            $rowcount=  mysql_num_rows($result);
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amount Collected | Accounts | WAKA CMEC Hospital</title>
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
    <link href="../../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
    
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
                        <li class="dropdown active">
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
                                <li class="active" role="presentation">
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
    <div id="printReport">
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
               <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                   <i class="fa fa-thermometer"></i> 
                   &nbsp; Rate Amount Collected
               </h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                        <?php
                            include 'validate/amount.php';
                        ?>
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Total Amount</label><br>
                                <?php if(isset($total)){ echo "Kshs. ".number_format($total,2);}?>
                            </div>
                            <div class="col-md-2">
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="date" name="from" value="<?php if(isset($_GET['from'])){echo $_GET['from'];}else{echo $from;}?>" placeholder="From (yyyy-mm-dd)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar">
                                    </span>
                                </div>
                                <input type="hidden" id="dtp_input2" value="" />
                            </div>
                            <div class="col-md-2">
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="date" name="to" value="<?php if(isset($_GET['to'])){echo $_GET['to'];}else{echo $to;}?>" placeholder="To (yyyy-mm-dd)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar">
                                    </span>
                                </div>
                                <input type="hidden" id="dtp_input2" value="" />
                            </div>
                            <div class="col-md-3">
                                <button name="submit" type="submit" style="padding:5px 20px;"><i class="fa fa-search"></i>&nbsp; Search</button>
                            </div>
                        </div>
                        <div class="col-md-12">
                        <?php
                            if($rowcount<=0){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">No records found</span>
                                    </div>';
                            }else{
                        ?>
                        
                            <hr>
                        </div>
                        <div class="col-md-12">
                                <table class="table table-striped" id="myTable">
                                    <thead style="background-color:#0dc181;color:rgb(252,254,255);">
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Patient No.</th>
                                            <th>Visit No.</th>
                                            <th>Cost</th>
                                            <th>Paid</th>
                                            <th>Balance</th>
                                            <th>Served By</th>
                                            <th>Staff No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $i = 1;
                                            while($row = mysql_fetch_array($result)) { 
                                        ?>
                                            <tr>
                                                <td style="text-align:center;">
                                                    <?php echo $i++; ?>
                                                </td>
                                                <td><?php echo date_format(date_create($row['dop']),"d M. Y, H:i A");?></td>
                                                <td><?php echo $row['patientNo'];?></td>
                                                <td><?php echo $row['visitNo'];?></td>
                                                <td><?php echo number_format($row['cost'],2)."/=";?></td>
                                                <td><?php echo number_format($row['paid'],2)."/=";?></td>
                                                <td><?php echo number_format($row['balance'],2)."/=";?></td>
                                                <td><?php echo $row['fname'].' '.$row['lname'].' '.$row['sname'];?></td>
                                                <td><?php echo $row['staffNo'];?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>              
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div> 
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
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>