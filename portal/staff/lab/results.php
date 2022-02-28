<?php 
    include'include/session.php';
    
    $tableName="patient";
    //$limit = 1500;
    
    if(isset($_GET['id']) && isset($_GET['no']))
    {
        $id = mysql_real_escape_string($_GET['no']);
        // Get page data
        $query1 = "SELECT p.*,v.visitNo AS visitID,v.dov,v.level
                FROM $tableName p
                       LEFT JOIN (
                                    SELECT t1.visitID,t1.visitNo,t1.dov,t1.patientNo,t1.status,t1.eov,t1.level  
                                    FROM visit t1
                                    JOIN (SELECT MAX(visitID) AS visitID
                                            FROM visit
                                            GROUP BY patientNo
                                        ) t2
                                    ON t1.visitID = t2.visitID 
                                ) v
                        ON v.patientNo = p.patientNo
                        LEFT JOIN payment m
                        ON v.visitNo = m.visitNo
                        LEFT JOIN rates r
                        ON m.rateID = r.rateID
                        WHERE v.status = 'Out Patient'
                        AND v.level = '2'
                        AND r.name='Lab Test'
                        AND m.visitNo='$id'";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Laboratory | WAKA CMEC Hospital</title>
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
                    Laboratory | Waka CMEC Hospital
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
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-simplybuilt" style="margin-right:5px;"></i>
                                Test
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="add-test.php">Add Test</a></li>
                                <li role="presentation"><a href="tests.php">View Test</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-product-hunt" style="margin-right:5px;"></i>
                                Item
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="requisitions.php">View Requisitions</a></li>
                                <li role="presentation"><a href="items.php">View Items</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="row" style="width:100%;max-width:960px;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <?php
            if(!isset($_GET['id']))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <span class="text-danger">Error: Records not found</span>
                    </div>';
            }else
            if(!isset($_GET['no']))
            {
                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                        <span class="text-danger">Error: Records not found</span>
                    </div>';
            }else{
        ?>
            <div style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                    <i class="fa fa-binoculars"></i> 
                    &nbsp;Recommended Lab Tests
                </h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    <form method="POST">
                        <?php 
                            if(isset($_SESSION['update'])=='True')
                                {
                                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <span class="text-success">Updated successful</span>
                                        </div>';
                                        unset($_SESSION['update']); 
                                }
                            if($rowcount<=0){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <span class="text-danger">No records found</span>
                                    </div>';
                            }else{
                                while($row = mysql_fetch_array($result)) {

                        ?>
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <label>Patient No.</label>
                                <p><?php echo $row['patientNo'];?></p>
                            </div> 
                            <div class="col-md-3">
                                <label>Gender</label>
                                <p><?php echo $row['gender'];?></p>
                            </div>
                            <div class="col-md-3">
                                <label>Age.</label>
                                <p>
                                    <?php 
                                        $today = date("Y-m-d");
                                        $diff = date_diff(date_create($row['dob']), date_create($today));
                                        echo $diff->format('%y')." yrs.";
                                    ?>
                                </p>
                            </div> 
                            <div class="col-md-3">
                                <label>Visit No.</label>
                                <p><?php echo $row['visitID'];?></p>
                            </div> 
                        </div> 
                        
                        <div class="col-md-12"> 
                            <hr style="margin-top:0px;"> 
                        </div>
                              
                        <div class="col-md-12">
                        <?php include 'validate/results.php';?>
                        
                            <table class="table table-striped" style="width:100%;">
                                <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                    <tr>
                                        <th style="width:20px;">#</th>
                                        <th>Test <a class="text-danger">*</a></th>
                                        <th>Results <a class="text-danger">*</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        // Get page data
                                        $query2 = "SELECT l.labTestID,t.testID,t.name 
                                                    FROM lab_test l 
                                                    LEFT JOIN test t  
                                                    ON l.testID = t.testID
                                                    WHERE l.patientNo = '".$row['patientNo']."' 
                                                    AND l.visitNo = '".$row['visitID']."' ";
                                        $result2 = mysql_query($query2);
                                        $rowcount2=  mysql_num_rows($result2);
                                        
                                        if(empty($result2)){
                                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                    <span class="text-danger">Error occured while trying to fetch recommended tests info</span>
                                                </div>';
                                        }else
                                        if($rowcount2 < 1){
                                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                    <span class="text-danger">Error: No recomended tests found</span>
                                                </div>';
                                        }else{
                                            $l=1;
                                            while($rows = mysql_fetch_array($result2)) { 
                                                //$testID = $rows['labTestID'];
                                    ?>
                                        <tr>
                                            <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $l++;?>
                                            </td>
                                            <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $rows['name'];?>
                                            </td>
                                            <td class="text-right" style="font-size:12px;font-weight:normal;color:rgb(3,3,3);">
                                                <input type="hidden" name="labTestID[]" value=" <?php echo $rows['labTestID'];?>">
                                                <textarea name="results[]" required="" class="form-control" style="max-width:100%;max-height:100%;" placeholder="Enter Test Results here..."><?php //echo $other_details;?></textarea>
                                            </td>
                                        </tr>
                                    <?php    
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center">
                            <button type="submit" name="submit"  style="padding:5px 20px;color:rgb(1,1,1);">Submit</button>
                        </div>
                     <?php }} ?>
                    </form> 
                </div>
            </div>
        <?php } ?>
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