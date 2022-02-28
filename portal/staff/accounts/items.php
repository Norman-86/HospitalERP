<?php 
    include'include/session.php';
    
    $tableName="product";
    $tableName1="productsupplied";
    
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
    <title>Items | Accounts | WAKA CMEC Hospital</title>
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
                        <li class="dropdown active">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-product-hunt" style="margin-right:5px;"></i>
                                    Items
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li class="active" role="presentation">
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
                        <li class="dropdown">
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
                                <li role="presentation">
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
               <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;"><i class="fa fa-product-hunt"></i> &nbsp;Items</h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">
                    <form method="post" action="" onSubmit="return validate();">    
                        <?php 
                            if($rowcount<=0){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">No records found</span>
                                    </div>';
                            }else{
                                if(isset($_SESSION['update'])=='success')
                                {
                                    echo'<div class="alert alert-success absolue center text-center" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <span class="text-success">Item price update Successful!</span>
                                        </div>';
                                    unset($_SESSION['update']); 
                                }
                        ?>
                            <div class="col-md-12">
                                <table class="table table-striped" id="myTable">
                                    <thead style="background-color:#0dc181;color:rgb(252,254,255);">
                                        <tr>
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
                                        <?php while($row = mysql_fetch_array($result)) { ?>
                                            <tr>
                                                <td style="padding-top:2px;padding-left:2px;">
                                                    <?php echo substr($row['name'],0,100) ?>
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;"><?php echo $row['Capacity'];?></td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;"><?php echo $row['qty'];?></td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;"><?php echo $row['minimum']; ?></td>
                                                <td style="padding-bottom:2px;padding-top:2px;text-align:center;">
                                                    <?php 
                                                        $query2 = "SELECT Bal2 FROM $tableName1 WHERE PID=".$row['PID']." ORDER BY PSID DESC LIMIT 0,1";
                                                        $result2 = mysql_query($query2);
                                                        $count=  mysql_num_rows($result2);
                                                        if($count <= 0){
                                                            echo '<a class="text-danger"><i class="fa fa-times"></i></a>';
                                                        }else{
                                                            mysql_data_seek($result2,0);
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
                                                        $query3 = "SELECT Bal2 FROM $tableName1 WHERE PID=".$row['PID']." ORDER BY PSID DESC LIMIT 0,1";
                                                        $result3 = mysql_query($query3);
                                                        $count3=  mysql_num_rows($result3);
                                                        if($count <= 0){
                                                            echo '<em>NILL</em>';
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
                                                        if($row['price'] == NULL){
                                                            echo "__";
                                                        }else{
                                                            echo number_format($row['price'],2)."/=";
                                                        }
                                                    ?>
                                                </td>
                                                <td style="padding-top:2px;padding-bottom:2px;text-align:center;">
                                                    <a href="update-price.php?id=<?php echo $row['PID']?>" class="text-info" style="cursor:pointer;margin-right:5px;">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
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