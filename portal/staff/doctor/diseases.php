<?php 
    include'include/session.php';
    
    //$limit = 1500;
    
    $queryx = "SELECT * FROM disease";
    $resultx = mysql_query($queryx);
    $rowcountx=  mysql_num_rows($resultx);
    
    // Get page data
    $query1 = "SELECT d.*,COUNT(s.name) AS symptoms,f.fname,f.lname,f.sname 
                FROM disease d 
                LEFT JOIN staff f 
                ON d.staffID = f.staffID
                LEFT JOIN disease_symptom ds
                ON ds.diseaseID = d.diseaseID
                LEFT JOIN symptom s
                ON ds.symptomID = s.symptomID";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseases | Doctor | WAKA CMEC Hospital</title>
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
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-paw" style="margin-right:5px;"></i>
                                Disease
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="add-disease.php">Add Disease</a></li>
                                <li class="active" role="presentation"><a href="diseases.php">View Disease</a></li>
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
        <form method="POST">
        <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
            <div class="col-md-2">
                <h2 style="margin-left:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                    <i class="fa fa-paw"></i> 
                    &nbsp;View Diseases
                </h2>
            </div>
            <?php 
                if(isset($_SESSION["patient"]) && isset($_SESSION["visit"]) && isset($_SESSION["diagnosedSymptoms"])){
            ?>
                <div class="col-md-2">
                    <button type="submit" name="prescribe" title="Prescribe Medication" style="padding:5px 20px;color:rgb(1,1,1);">Prescribe Medication</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="lab" title="Send patient to lab for tests" style="padding:5px 20px;color:rgb(1,1,1);">Send to lab</button>
                </div>
            <?php 
                }else
                if(isset($_SESSION["patient"]) && isset($_SESSION["visit"]) && isset($_SESSION["symptoms"])){
            ?>
                <div class="col-md-2">    
                    <button type="submit" name="prescribe" title="Prescribe Medication" style="padding:5px 20px;color:rgb(1,1,1);">Prescribe Medication</button>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="lab" title="Send patient to lab for tests" style="padding:5px 20px;color:rgb(1,1,1);">Send to lab</button>
                </div>
             <?php 
                }else
                if(isset($_SESSION["patient"]) && isset($_SESSION["visit"]) && isset($_SESSION["results"])){
            ?>
                <div class="col-md-2">    
                    <button type="submit" name="prescribe" title="Prescribe Medication" style="padding:5px 20px;color:rgb(1,1,1);">Prescribe Medication</button>
                </div>
            <?php } ?>
        </div>
        <div class="row" style="padding:10px;">
            <div class="col-md-12">
                
                    <?php 
                        include 'validate/prescribe_medication.php';
                        include 'validate/lab_test.php';
                        if($rowcountx<=0){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found</span>
                                </div>';
                        }else{
                            
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
                            if(isset($_SESSION['assign'])=='true' && isset($_SESSION['symptoms']) && isset($_SESSION['disease']))
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">
                                        <b>'.$_SESSION['symptoms'].'</b> Symptom(s) have been successfully assigned to <b>'.$_SESSION['disease'].'</b> </span>
                                    </div>';
                                unset($_SESSION['assign']); 
                                unset($_SESSION['symptoms']); 
                                unset($_SESSION['disease']); 
                            }
                            if(isset($_SESSION['deassign'])=='True' && isset($_SESSION['disease']))
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Symptom Deassigned successfully</span>
                                    </div>';
                                unset($_SESSION['deassign']);
                                unset($_SESSION['disease']); 
                            }
                    ?>
                    <div class="col-md-12" style="width:100%;">
                            <table class="table table-striped" id="myTable">
                                <thead style="background-color:rgb(42,63,84);color:rgb(254,255,255);">
                                    <tr>
                                        <th><i class="fa fa-check"></i></th>
                                        <th>Disease Name</th>
                                        <th>Associated Gender</th>
                                        <th>Associated Age</th>
                                        <th style="text-align:center;">Symptoms</th>
                                        <th>Date Added</th>
                                        <th>Doctor</th>
                                         <th><i class="fa fa-cog ml-3x"></i> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i=1;
                                        while($row = mysql_fetch_array($result)) { 
                                    ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);">
                                            <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['diseaseID']; ?>">
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['name'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['gender'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['age'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);text-align:center;"> 
                                            <!-- Button HTML (to Trigger Modal) -->
                                            <a href="#myModal<?php echo $i;?>" data-toggle="modal" title="View Disease' details, Signs & Symptoms" style="display:block;">
                                                 <?php echo $row['symptoms'];?>
                                            </a>
                                           
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo date_format(date_create($row['added']),"D d M Y H:i A");?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['fname'].' '.$row['lname'].' '.$row['sname'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                            <!-- Button HTML (to Trigger Modal) -->
                                            <a href="#myModal<?php echo $i;?>" data-toggle="modal" title="View Disease' details, Signs & Symptoms" style="margin-right:10px;">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <?php  
                                                if(isset($_SESSION["patient"]) && isset($_SESSION["visit"]) && isset($_SESSION["diagnosedSymptoms"])){
                                                }else
                                                if(isset($_SESSION["patient"]) && isset($_SESSION["visit"]) && isset($_SESSION["symptoms"])){
                                                }else{
                                            ?>
                                                <a href="update-disease.php?id=<?php echo $row['diseaseID'];?>" title="Update Disease" onClick="return confirm('Want to update this disease?');">
                                                    <i class="fa fa-edit" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                                <a href="symptoms.php?did=<?php echo $row['diseaseID'];?>" title="Assign Symptoms" onClick="return confirm('Want to assign symptoms to this disease?');">
                                                    <i class="fa fa-check text-success" style="font-size:14px;margin-right:10px;"></i>
                                                </a>
                                                <a href="symptoms.php?dsid=<?php echo $row['diseaseID'];?>" title="Deassign Assigned Symptoms" onClick="return confirm('Want to deassign symptoms from this disease?');">
                                                    <i class="fa fa-trash-o text-danger" style="font-size:14px;"></i>
                                                </a>
                                            <?php } ?>
                                            <div class="bs-example">
                                                <!-- Modal HTML -->
                                                <div id="myModal<?php echo $i;?>" class="modal fade">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                <h4 class="modal-title" style="font-weight:bold;">Details, Signs & Symptoms of <?php echo $row['name'];?></h4>
                                                            </div>
                                                            <div class="modal-body" style="color:black;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Associated Gender</label>
                                                                                <p><?php echo $row['gender'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Associated Age</label>
                                                                                <p><?php echo $row['age'];?></p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12"><hr></div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Symptoms include:</label>
                                                                                <p>
                                                                                    <?php 
                                                                                        // Get page data
                                                                                        $query2 = "SELECT s.name FROM 
                                                                                                    disease_symptom ds
                                                                                                    LEFT JOIN symptom s 
                                                                                                    ON ds.symptomID = s.symptomID
                                                                                                    LEFT JOIN disease d 
                                                                                                    ON ds.diseaseID = d.diseaseID";
                                                                                        $result2 = mysql_query($query2);
                                                                                        $rowcount2=  mysql_num_rows($result2);
                                                                                        if(empty($result2)){
                                                                                            echo "";
                                                                                        }else
                                                                                        if($rowcount2 < 1){
                                                                                            echo "";
                                                                                        }else{
                                                                                            while($rows = mysql_fetch_array($result2)) { 
                                                                                                $symptom[] = $rows['name'];
                                                                                            }
                                                                                            echo '<ol><li style="float:left;margin-right:20px;">'.implode('</li><li style="float:left;margin-right:20px;"> ',$symptom).'</li></ol>';
                                                                                        }
                                                                                    ?>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12"><hr></div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label>Other Details</label>
                                                                                <p><?php echo $row['other_details'];?></p>
                                                                            </div>
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