<?php 
    include'include/session.php';
    
    $tableName="patient";
    //$limit = 1500;
    
    $sql = "SELECT COUNT(*) as num FROM $tableName"; 
    $pages = mysql_fetch_array(mysql_query($sql));
    $total_records = $pages['num'];
    
    // Get page data
    $query1 = "SELECT * FROM $tableName ORDER BY name ASC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient | Registry | WAKA CMEC Hospital</title>
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
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Patient
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li class="active" role="presentation"><a href="patient.php">All Patient</a></li>
                                <li role="presentation"><a href="out-patient.php">Out Patient</a></li>
                                <!--<li role="presentation"><a href="in-patient.php">In Patient</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <div style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
            <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                <i class="fa fa-users"></i> 
                &nbsp;Patients
            </h2>
        </div>
        <div class="row" style="padding:10px;">
            <div class="col-md-12">
                <form method="POST">
                    <?php 
                        if($total_records<=0){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found</span>
                                </div>';
                        }else{
                            include 'validate/checkin.php';
                            if(isset($_SESSION['update'])=='True')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Patient updated successfully</span>
                                    </div>';
                                    unset($_SESSION['update']); 
                            }
                    ?>
                    <div class="col-md-12" style="width:100%;">
                        <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                            <table class="table table-striped" id="myTable">
                                <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                    <tr>
                                        <th>Patient No.</th>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Age</th>
                                        <th>ID No.</th>
                                        <th>Phone</th>
                                        <th>Country</th>
                                        <th>Town</th>
                                        <th>Added</th>
                                        <th><i class="fa fa-cog ml-3x"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                        while($row = mysql_fetch_array($result)) { 
                                            $query2 = "SELECT level FROM visit WHERE patientNo = '".$row['patientNo']."' ORDER BY visitID DESC LIMIT 1";
                                            $result2 = mysql_query($query2);
                                            
                                            while($rw = mysql_fetch_array($result2)) {
                                                $level = $rw['level'];
                                            }
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
                                                <?php echo $row['id'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $row['phone'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $row['country'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $row['town'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $row['added'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                            <?php 
                                                if($level <! 6){
                                            ?>
                                                <button name="checkin" value="<?php echo $row['patientNo']?>" title="Check In Patient" onClick="return confirm('You are about to check in patient: <?php echo $row['name'];?>\nWant to continue?');" style="background-color:transparent;border:none;">
                                                    <i class="fa fa-check text-success" style="font-size:14px;"></i>
                                                </button>
                                            <?php }else{ ?>
                                                <button name="" title="Check In Patient" onClick="return alert('Patient: <?php echo $row['name'];?> is already checked in');" style="background-color:transparent;border:none;">
                                                    <i class="fa fa-check text-success" style="font-size:14px;"></i>
                                                </button>
                                            <?php } ?>
                                            <a href="" onclick="return alert('Update of Patient Info not allowed');" title="Edit patient">
                                                <i class="fa fa-edit" style="font-size:14px;color:rgb(62,140,228);margin-right:10px;"></i>
                                            </a>
                                            <?php 
                                                if($level <! 6){
                                            ?>
                                                <a href="payment.php?id=<?php echo $row['patientID'];?>" title="Other Charges">
                                                    <i class="fa fa-dollar" style="font-size:14px;color:#987836;margin-right:10px;"></i>
                                                </a>
                                            <?php }else{ ?>
                                                <a title="Other Charges" onclick="return alert('Cannot charge patient untill s/he is checked in');">
                                                    <i class="fa fa-dollar" style="font-size:14px;;margin-right:10px;"></i>
                                                </a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                </form> 
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
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>
</html>