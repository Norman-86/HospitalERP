<?php 
    include'include/session.php';
    
    //$limit = 1500;
    
    
    //if patient has been diagnosed, display symptoms he or she is suffering
    if(isset($_GET['dpid']) && isset($_GET['dpvno'])){
        $dpid = mysql_real_escape_string($_GET['dpid']);
        $dpvno = mysql_real_escape_string($_GET['dpvno']);
        // Get page data
        $query1 = "SELECT s.*,f.fname,f.lname,f.sname
                    FROM patient_diagnosed_symptoms pds
                    LEFT JOIN symptom s
                    ON pds.symptomID = s.symptomID
                    LEFT JOIN staff f 
                    ON s.staffID = f.staffID
                    WHERE pds.patientNo = '$dpid'
                    AND pds.visitNo = '$dpvno' ";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }else
    if(isset($_GET['did'])){
        $id = mysql_real_escape_string($_GET['did']);
        
        $query2 = "SELECT name FROM disease WHERE diseaseID = '$id' ";
        $result2 = mysql_query($query2);
        $rowcount2 =  mysql_num_rows($result2);
        
        while($raw = mysql_fetch_array($result2)) { 
            $disease = $raw['name'];
        }
        
        // Get page data
        $query1 = "SELECT s.*,f.fname,f.lname,f.sname FROM symptom s LEFT JOIN staff f ON s.staffID = f.staffID";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }else    
    if(isset($_GET['dsid'])){
        $id = mysql_real_escape_string($_GET['dsid']);
        
        $query2 = "SELECT name FROM disease WHERE diseaseID = '$id' ";
        $result2 = mysql_query($query2);
        $rowcount2 =  mysql_num_rows($result2);
        
        while($raw = mysql_fetch_array($result2)) { 
            $disease = $raw['name'];
        }
        
        $query1 = "SELECT s.*,f.fname,f.lname,f.sname 
                    FROM disease_symptom ds
                    LEFT JOIN symptom s
                    ON ds.symptomID = s.symptomID
                    LEFT JOIN staff f 
                    ON s.staffID = f.staffID";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }else{
        // Get page data
        $query1 = "SELECT s.*,f.fname,f.lname,f.sname FROM symptom s LEFT JOIN staff f ON s.staffID = f.staffID";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Symptoms | Doctor | WAKA CMEC Hospital</title>
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
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-simplybuilt" style="margin-right:5px;"></i>
                                Symptom
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="add-symptom.php">Add Symptom</a></li>
                                <li class="active" role="presentation"><a href="symptoms.php">View Symptom</a></li>
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
    <div class="row" style="width:100%;max-width:960px;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
        <?php 
            if(isset($_GET['dpid']) && isset($_GET['dpvno'])){
        ?>
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-6">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                        <i class="fa fa-paw"></i> 
                        &nbsp;Diagnosed Symptoms for patient no <?php echo $_GET['dpid'];?>
                    </h2>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="associateDisease" title="Associate symptoms disease" style="padding:5px 20px;color:rgb(1,1,1);">
                       Diagnose Symptoms
                    </button>
                </div>
                <div class="col-md-2">
                    <?php 
                            while($row = mysql_fetch_array($result)) { 
                                $diagnosedSymptoms[] = $row['symptomID'];
                            }
                    ?>
                    <button type="submit" name="addSymptom" class="bg-primary" title="Add diagnosed symptoms" style="padding:5px 20px;">
                        Add Symptom
                    </button>
                </div>
            </div>
        <?php
            }else 
            if(isset($_GET['did'])){
        ?>
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-6">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                        <i class="fa fa-paw"></i> 
                        &nbsp;Select Symptoms for <?php echo $disease;?>
                    </h2>
                </div>
                <div class="col-md-6">
                    <button type="submit" name="assign" title="Assign symptoms to disease" onClick="return confirm('You are about to assign symptoms for <?php echo $disease;?>\nWant to continue?');" style="padding:5px 20px;color:rgb(1,1,1);">
                        Assign symptoms to disease
                    </button>
                </div>
            </div>
        <?php
            }else
            if(isset($_GET['dsid'])){
        ?>
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-12">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                        <i class="fa fa-paw"></i> 
                        &nbsp;Deassign Symptoms for <?php echo $disease;?>
                    </h2>
                </div>
            </div>
        <?php }else
            if(isset($_GET['id']) && isset($_GET['no'])){
        ?>
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-3">
                    <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                        <i class="fa fa-paw"></i> 
                        &nbsp;View Symptoms
                    </h2>
                </div>
                <div class="col-md-9">
                    <button type="submit" name="diagnose" title="Diagnose Symptoms" onClick="return confirm('You are about to diagnose selected symptoms\nWant to continue?');" style="padding:5px 20px;color:rgb(1,1,1);">
                       Diagnose Symptoms
                    </button>
                </div>
            </div>
        <?php 
            }else
            if(isset($_SESSION['addSymptom1']) && isset($_SESSION['addSymptom2'])){
        ?>
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-8">
                    <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                        <i class="fa fa-paw"></i> 
                        &nbsp;Add Diagnosed Symptoms for patient No. <?php echo $_SESSION['addSymptom1']; ?>
                    </h2>
                </div>
                <div class="col-md-4">
                    <button type="submit" name="add" title="Diagnose Symptoms" onClick="return confirm('You are about to diagnose patient with selected symptoms\nWant to continue?');" style="padding:5px 20px;color:rgb(1,1,1);">
                       Add
                    </button>
                </div>
            </div>
        <?php }else{ ?>    
            <div style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                    <i class="fa fa-paw"></i> 
                    &nbsp;View Symptoms
                </h2>
            </div>
        <?php } ?>
        <div class="row" style="padding:10px;">
            <div class="col-md-12">
                
                    <?php 
                        
                            include 'validate/assignSymptom.php';
                            include 'validate/deassignSymptom.php';
                            
                            if(isset($_SESSION['symptom']))
                            {
                                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-warning">
                                            <i class="fa fa-warning"></i>&nbsp;
                                            The following <b>symptoms</b> are already assigned to <b>'.$disease.'</b>
                                            <br>
                                            <ol>
                                                <li>'
                                                    .implode('</li><li>',$_SESSION['symptom']).
                                                '</li>
                                            </ol>
                                        </span>
                                    </div>';
                                    unset($_SESSION['symptom']); 
                            }
                            if(isset($_SESSION['update'])=='True')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Symptom update successful</span>
                                    </div>';
                                    unset($_SESSION['update']); 
                            }
                            if(isset($_SESSION['added'])=='true')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Symptom added successfully</span>
                                    </div>';
                                    unset($_SESSION['added']); 
                                    unset($_SESSION['addSymptom1']); 
                                    unset($_SESSION['addSymptom2']); 
                            }
                            if(isset($_SESSION['delete'])=='true')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Diagonised symptom removed successfully</span>
                                    </div>';
                                    unset($_SESSION['delete']); 
                            }
                            if($rowcount<=0){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found</span>
                                </div>';
                        }else{
                    ?>
                    <div class="col-md-12" style="width:100%;">
                            <table class="table table-striped" id="myTable">
                                <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                    <tr>
                                        <?php 
                                            if(!isset($_GET['dsid'])){
                                        ?>
                                            <th><i class="fa fa-check"></i></th>
                                        <?php } ?>
                                        <th>Symptom Name</th>
                                        <th>Date Added</th>
                                        <th>Doctor</th>
                                        <?php 
                                            if(isset($_SESSION['addSymptom1']) && isset($_SESSION['addSymptom2'])){
                                            }else
                                            if(isset($_GET['id']) && isset($_GET['no'])){
                                            }else
                                            if(isset($_GET['did'])){
                                            }else{
                                        ?>
                                            <th><i class="fa fa-cog ml-3x"></i> </th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                        mysql_data_seek($result, 0);
                                        while($row = mysql_fetch_array($result)) { 
                                    ?>
                                    <tr>
                                        <?php 
                                            if(!isset($_GET['dsid'])){
                                        ?>
                                            <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);">
                                                <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['symptomID']; ?>">
                                            </td>
                                        <?php } ?>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['name'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo date_format(date_create($row['added']),"D d M Y H:i A");?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['fname'].' '.$row['lname'].' '.$row['sname'];?>
                                        </td>
                                        <?php 
                                            if(isset($_SESSION['addSymptom1']) && isset($_SESSION['addSymptom2'])){
                                            }else
                                            if(isset($_GET['did'])){
                                            }else
                                            if(isset($_GET['id']) && isset($_GET['no'])){
                                            }else
                                            if(isset($_GET['dpid']) && isset($_GET['dpvno'])){
                                        ?>
                                            <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                                <button name="unassign" value="<?php echo $row['symptomID'];?>" class="text-danger" style="border:none;background-color:transparent;" title="Remove diagnosed Symptom" onClick="return confirm('Critical records might be altered\nSure you want to deassign this symptom?');">
                                                    <i class="fa fa-times" style="font-size:14px;"></i>
                                                </button
                                            </td>
                                        <?php }else
                                            if(isset($_GET['dsid'])){
                                        ?>
                                            <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                                <button name="deassign" value="<?php echo $row['symptomID'];?>" class="text-danger" style="border:none;background-color:transparent;" title="Deassign Symptom" onClick="return confirm('Critical records might be altered\nSure you want to deassign this symptom?');">
                                                    <i class="fa fa-trash" style="font-size:14px;"></i>
                                                </button
                                            </td>
                                        <?php }else{ ?>  
                                            <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                                <a href="update-symptom.php?id=<?php echo $row['symptomID'];?>" title="Update Symptom">
                                                    <i class="fa fa-edit" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                            </td>
                                        <?php } ?>    
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
</html>