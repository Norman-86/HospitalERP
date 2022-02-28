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
                    Doctor | Waka CMEC Hospital
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
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-simplybuilt" style="margin-right:5px;"></i>
                                Symptom
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="add-symptom.php">Add Symptom</a></li>
                                <li role="presentation"><a href="symptoms.php">View Symptom</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-paw" style="margin-right:5px;"></i>
                                Disease
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="add-disease.php">Add Disease</a></li>
                                <li role="presentation"><a href="diseases.php">View Disease</a></li>
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
                        <li role="presentation">
                            <a href="tests.php">
                                Lab Tests
                            </a>
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
                                        <th>Country</th>
                                        <th>Town</th>
                                        <th><i class="fa fa-cog ml-3x"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $p=$s=1;
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
                                                <?php echo $row['country'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo $row['town'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                            <a href="#myModal<?php echo $p++;?>" data-toggle="modal" href="preview.php?id=<?php echo $row['patientID']?>" title="Preview Patient History">
                                                <i class="fa fa-eye" style="font-size:14px;color:rgb(62,140,228);margin-right:10px;"></i>
                                            </a>
                                            
                                            
                                            
                                            <div class="bs-example">
                                                <!-- Modal HTML -->
                                                <div id="myModal<?php echo $s++;?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                
                                                            <p class="text-left">
                                                                <button type="submit" class="print" onclick="PrintElem('#printReport')" style="margin-left:4%;margin-top:10px;padding:3px 10px;color:rgb(1,1,1);"><a class="fa fa-print"></a> Print </button>
                                                            </p>
                                                            <div id="printReport">
                                                            <div class="modal-header">
                                                                <!--
                                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                -->
                                                                <div style="width:100%;text-align:center">
                                                                    <img class="img-responsive" src="../../../assets/img/logo.png" alt="Logo: WAKA CMEC" style="width:100px;margin-top:0px;margin-right:auto;margin-left:auto;">
                                                                    <h4 class="modal-title" style="font-weight:bold;">WAKA CMEC TRAINING INSTITUTE & HOSPITAL</h4>
                                                                    <h4 style="padding-top:0px;margin-top:0px;">Patient Health History</h4>
                                                                </div>
                                                            </div>
                                                            <div class="modal-body" style="color:black;">
                                                                <div class="row">
                                                                    <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                                                                        <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                                                                            Personal Info
                                                                        </h2>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Number</label>
                                                                                <p><?php echo $row['patientNo'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Name</label>
                                                                                <p><?php echo $row['name'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Gender</label>
                                                                                <p><?php echo $row['gender'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Age</label>
                                                                                <p>
                                                                                    <?php 
                                                                                        $today1 = date("Y-m-d");
                                                                                        $diff1 = date_diff(date_create($row['dob']), date_create($today1));
                                                                                        echo $diff1->format('%y')." yrs";
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Country</label>
                                                                                <p><?php echo $row['country'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-2">
                                                                            <div class="form-group">
                                                                                <label>Town</label>
                                                                                <p><?php echo $row['town'];?></p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <?php 
                                                                            // Get page data
                                                                            $query2 = "SELECT v.*,s.fname,s.lname,s.sname FROM visit v
                                                                                       LEFT JOIN staff s  
                                                                                       ON v.doc = s.staffID
                                                                                       WHERE v.patientNo = '".$row['patientNo']."'";
                                                                            $result2 = mysql_query($query2);
                                                                            $rowcount2=  mysql_num_rows($result2);
                                                                            if(empty($result2)){
                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                        <span class="text-danger">'. mysql_error().'</span>
                                                                                    </div>';
                                                                            }else
                                                                            if($rowcount2 < 1){
                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                        <span class="text-danger">Error occurred: No visits found</span>
                                                                                    </div>';
                                                                            }else{
                                                                                $v=1;
                                                                                while($rows = mysql_fetch_array($result2)) { 
                                                                        ?>

                                                                            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                                                                                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                                                                                    Visit <?php echo $v++; ?>
                                                                                </h2>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <div class="col-md-2">
                                                                                    <div class="form-group">
                                                                                        <label>visit No</label>
                                                                                        <p><?php echo $rows['visitNo'];?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Check In</label>
                                                                                        <p><?php echo date_format(date_create($rows['dov']),"d-m-Y H:i A");?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label>Doctor</label>
                                                                                        <p><?php echo $rows['fname'].' '.$rows['lname'].' '.$rows['sname'];?></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div class="form-group">
                                                                                        <label>Check Out</label>
                                                                                        <p><?php echo date_format(date_create($rows['eov']),"d-m-Y H:i A");?></p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12"><hr></div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label>Symptoms</label>
                                                                                    <p>
                                                                                        <?php 
                                                                                            // Get page data
                                                                                            $query3 = "SELECT s.name FROM patient_diagnosed_symptoms p
                                                                                                       LEFT JOIN symptom s  
                                                                                                       ON p.symptomID = s.symptomID
                                                                                                       WHERE p.patientNo = '".$row['patientNo']."'
                                                                                                       AND p.visitNo = '".$rows['visitNo']."'";
                                                                                            $result3 = mysql_query($query3);
                                                                                            $rowcount3=  mysql_num_rows($result3);
                                                                                            if(empty($result3)){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">'. mysql_error().'</span>
                                                                                                    </div>';
                                                                                            }else
                                                                                            if($rowcount3 < 1){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">Error occurred: No symptoms found</span>
                                                                                                    </div>';
                                                                                            }else{
                                                                                                $x=1;
                                                                                                while($rows3 = mysql_fetch_array($result3)) { 
                                                                                                    echo "&nbsp; [".$x++."] ".$rows3['name'];
                                                                                                }
                                                                                            } 
                                                                                        ?>
                                                                                    </p>
                                                                                </div>
                                                                                    
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12"> <hr> </div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                    <label>Lab Tests</label>
                                                                                    <p>
                                                                                        <?php 
                                                                                            // Get page data
                                                                                            $query4 = "SELECT t.name,l.result FROM lab_test l
                                                                                                       LEFT JOIN test t  
                                                                                                       ON l.testID = t.testID
                                                                                                       WHERE l.patientNo = '".$row['patientNo']."'
                                                                                                       AND l.visitNo = '".$rows['visitNo']."'";
                                                                                            $result4 = mysql_query($query4);
                                                                                            $rowcount4=  mysql_num_rows($result4);
                                                                                            if(empty($result4)){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">'. mysql_error().'</span>
                                                                                                    </div>';
                                                                                            }else
                                                                                            if($rowcount4 < 1){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">Error occurred: No tests found</span>
                                                                                                    </div>';
                                                                                            }else{
                                                                                                $y=1;
                                                                                                echo'<table ="table table-striped" style="width:98%;border:1px solid black;">
                                                                                                            <tr style="border:1px solid black;">
                                                                                                                <td style="padding-left:5px;font-weight:bold;border:1px solid black;text-align:center;">#</td>
                                                                                                                <td style="padding-left:5px;font-weight:bold;border:1px solid black;">Test</td>
                                                                                                                <td style="padding-left:5px;font-weight:bold;border:1px solid black;">Result</td>
                                                                                                            <tr>';
                                                                                                while($rows4 = mysql_fetch_array($result4)) { 
                                                                                                    echo "<tr style='border:1px solid black'>";
                                                                                                    echo "<td style='padding-left:5px;text-align:center;'>".$y++."</td>"; 
                                                                                                    echo "<td style='padding-left:5px;border:1px solid black;'>".$rows4['name']."</td>";
                                                                                                    echo "<td style='padding-left:5px;border:1px solid black;'>".$rows4['result']."</td>";
                                                                                                    echo "</tr>";
                                                                                                }
                                                                                                echo  '</tr>
                                                                                                    </table>';
                                                                                            } 
                                                                                        ?>
                                                                                    </p>
                                                                            </div>
                                                                            
                                                                            <div class="col-md-12"> <hr> </div>
                                                                            
                                                                            <div class="col-md-12">
                                                                                    <label>Prescriptions</label>
                                                                                    <p>
                                                                                        <?php 
                                                                                            // Get page data
                                                                                            $query5 = "SELECT p.name FROM prescription d
                                                                                                       LEFT JOIN product p  
                                                                                                       ON d.productID = p.PID
                                                                                                       WHERE d.patientNo = '".$row['patientNo']."'
                                                                                                       AND d.visitNo = '".$rows['visitNo']."'";
                                                                                            $result5 = mysql_query($query5);
                                                                                            $rowcount5=  mysql_num_rows($result5);
                                                                                            if(empty($result5)){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">'. mysql_error().'</span>
                                                                                                    </div>';
                                                                                            }else
                                                                                            if($rowcount5 < 1){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">Error occurred: No precriptions found</span>
                                                                                                    </div>';
                                                                                            }else{
                                                                                                $z=1;
                                                                                               
                                                                                                while($rows5 = mysql_fetch_array($result5)) { 
                                                                                                    echo "<b>[".$z++."] </b>".$rows5['name']." ";
                                                                                                }
                                                                                            } 
                                                                                        ?>
                                                                                    </p>
                                                                                    <hr>
                                                                                    
                                                                                    <label>Other Details</label>
                                                                                    <p>
                                                                                        <?php 
                                                                                            // Get page data
                                                                                            $query6 = "SELECT details FROM prescription_details
                                                                                                       WHERE patientNo = '".$row['patientNo']."'
                                                                                                       AND visitNo = '".$rows['visitNo']."'";
                                                                                            $result6 = mysql_query($query6);
                                                                                            $rowcount6=  mysql_num_rows($result6);
                                                                                            if(empty($result6)){
                                                                                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                                                        <span class="text-danger">'. mysql_error().'</span>
                                                                                                    </div>';
                                                                                            }else
                                                                                            if($rowcount6 < 1){
                                                                                                echo'';
                                                                                            }else{
                                                                                                while($rows6 = mysql_fetch_array($result6)) { 
                                                                                                    echo $rows6['details'];
                                                                                                }
                                                                                            } 
                                                                                        ?>
                                                                            </div>

                                                                        <?php }} ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>    
                                                            <div class="modal-footer">
                                                                <button type="button"  data-dismiss="modal"  style="padding:5px 20px;color:rgb(1,1,1);">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
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