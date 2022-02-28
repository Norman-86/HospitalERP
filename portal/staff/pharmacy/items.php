<?php 
    include'include/session.php';
    
    $tableName="product";
    $tableName1="pharmacy_supply";
    
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
    <title>Items | Pharmacy | WAKA CMEC Hospital</title>
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
    <div class="row" style="width:98%;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST" action="" onSubmit="return validate();">
            <div class="col-md-12" style="margin-bottom:1%;padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
                <div class="col-md-2">
                    <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-product-hunt"></i> &nbsp;Items</h2>
                </div>
                <div class="col-md-2">
                    <button type="submit" name="request" style="padding:5px 20px;color:rgb(1,1,1);" onClick="return confirm('Sure you want to requisition selected items??');">Requisition</button>
                </div>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">    
                        <?php 
                            if($rowcount<=0){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">No records found</span>
                                    </div>';
                            }else{
                                if(isset($_SESSION['update'])=='sucess')
                                {
                                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <span class="text-success">Item requisition successful</span>
                                        </div>';
                                    unset($_SESSION['update']); 
                                }
                                include 'validate/requisition.php'; 
                                            
                        ?>
                            <div class="col-md-12">
                                <table class="table table-striped" id="myTable">
                                    <thead style="background-color:rgb(52,73,94);color:rgb(252,254,255);">
                                        <tr>
                                            <th style="width:10px;text-align:center;"><i class="fa fa-check"></i></th>
                                            <th>Item </th>
                                            <th style="text-align:center;">Capacity </th>
                                            <th style="text-align:center;">Qty/U</th>
                                            <th style="text-align:center;">Min. </th>
                                            <th style="text-align:center;">Status </th>
                                            <th style="text-align:center;">Stock </th>
                                            <th style="text-align:center;">P/Qty/U</th>
                                            <th style="text-align:center;"><i class="fa fa-cog"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            while($row = mysql_fetch_array($result)) { 
                                            
                                            $query2 = "SELECT Bal2,item_price FROM $tableName1 WHERE PID=".$row['PID']." ORDER BY PHID DESC LIMIT 0,1";
                                            $result2 = mysql_query($query2);
                                            $count=  mysql_num_rows($result2);
                                        ?>
                                            <tr>
                                                <td style="text-align:center">
                                                    <input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $row['PID']; ?>">
                                                </td>
                                                <td style="padding-top:2px;padding-left:2px;">
                                                    <?php echo substr($row['name'],0,100) ?>
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;"><?php echo $row['Capacity'];?></td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;"><?php echo $row['qty'];?></td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;">
                                                    <?php 
                                                        if($row['pharmacy_minimum']==NULL){
                                                            echo "__";
                                                        }else{
                                                            echo $row['pharmacy_minimum'];
                                                        }
                                                    ?>
                                                </td>
                                                <td style="padding-bottom:2px;padding-top:2px;text-align:center;">
                                                    <?php 
                                                        if($count <= 0){
                                                            echo '__';
                                                        }else{
                                                            while($rows = mysql_fetch_array($result2)) { 
                                                                IF($rows['Bal2'] > $row['minimum']){
                                                                    echo '<a class="text-success"><i class="fa fa-check-square"></i></a>';
                                                                }else 
                                                                IF($rows['Bal2'] <= $row['minimum'] && $rows['Bal2'] >0){
                                                                    echo '<a class="text-warning"><i class="fa fa-warning"></i></a>';
                                                                }else
                                                                IF($rows['Bal2'] < $row['minimum'] && $rows['Bal2'] == 0){
                                                                    echo '<a class="text-danger"><i class="fa fa-times-circle"></i></a>';
                                                                }else{
                                                                    echo '<a class="text-danger"><i class="fa fa-times-circle"></i></a>';
                                                                }
                                                            }
                                                        }
                                                    ?>        
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;height:0;text-align:center;">
                                                    <?php
                                                        if($count <= 0){
                                                            echo '__';
                                                        }else{
                                                            mysql_data_seek($result2,0);
                                                            while($rows = mysql_fetch_array($result2)) { 
                                                                IF($rows['Bal2'] > 0){
                                                                    echo $rows['Bal2'];
                                                                }else{
                                                                   echo 'O/S';
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;">
                                                    <?php 
                                                        if($count <= 0){
                                                            echo number_format(0,2)."/=";
                                                        }else{
                                                            mysql_data_seek($result2,0);
                                                            while($rows = mysql_fetch_array($result2)) { 
                                                                if($rows['item_price'] == NULL){
                                                                    echo number_format(0,2)."/=";
                                                                }else{
                                                                    echo number_format($rows['item_price'],2)."/=";
                                                                }
                                                            }
                                                        }
                                                    ?>
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;">
                                                    <a href="form-S3.php?id=<?php echo $row['PID']?>" target="_blank" title="Click to view Form-S3 Card" class="text-info" style="cursor:pointer;margin-right:5px;">
                                                        <i class="fa fa-eye"></i>
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