<?php 
    include'include/session.php';
    
    $tableName="patient";
    //$limit = 1500;
    
    // Get page data
    $query1 = "SELECT p.*,v.visitNo AS visitID,v.dov,v.level
            FROM $tableName p
                   LEFT JOIN (
                                SELECT t1.visitID,t1.visitNo,t1.level,t1.dov,t1.patientNo,t1.status,t1.eov  
                                FROM visit t1
                                JOIN (SELECT MAX(visitID) AS visitID
                                        FROM visit
                                        GROUP BY patientNo
                                    ) t2
                                ON t1.visitID = t2.visitID 
                            ) v
                    ON v.patientNo = p.patientNo
                    WHERE v.status = 'Out Patient'
                    AND v.level = 4";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Pharmacy | WAKA CMEC Hospital</title>
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
                        <li class="active" role="presentation">
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
    <div style="width:98%;padding:0px;padding-right:0px;padding-left:auto;background-color:rgba(57,12,12,0);margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);">
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-home"></i> &nbsp;Dashboard</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    <?php
                        if(isset($_SESSION['prescription_successful'])=='success')
                        {
                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <span class="text-success">Patient Prescription successful!</span>
                                </div>';
                            unset($_SESSION['prescription_successful']); 
                        }
                        
                        if($rowcount<=0){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found</span>
                                </div>';
                        }else{
                    ?>
                        <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                            <table class="table table-striped" id="myTable">
                                <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                    <tr>
                                        <th>Patient No.</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>Checked In</th>
                                        <th>Visit No</th>
                                        <th><i class="fa fa-cog ml-3x"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                        while($row = mysql_fetch_array($result)) { 
                                    ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['patientNo'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['name'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['gender'];?>
                                        </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                            <?php 
                                                $today = date("Y-m-d");
                                                $diff = date_diff(date_create($row['dob']), date_create($today));
                                                echo $diff->format('%y')." yrs.";
                                            ?> 
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo date_format(date_create($row['dov']),"d M Y, H:i A");?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo sprintf('%09d',$row['visitID']);?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                            <a href="prescription.php?id=<?php echo $row['patientNo']?>&no=<?php echo $row['visitID']?>" title="Check Patient Prescriptions">
                                                <i class="fa fa-eye" style="font-size:14px;margin-right:10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } ?>
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
</body>
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
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