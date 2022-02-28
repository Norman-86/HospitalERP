<?php 
    include'include/session.php';
    
    $tableName="pharmacy_request";
    $tableName1="product";
    $tableName2="staff";
    $tableName3="staff";
    
    // Get page data
    $query1 = "SELECT p.Name,p.Capacity,CONCAT(s.fname,' ',s.sname)AS officer,CONCAT(t.fname,' ',t.sname) AS IOfficer,
                        r.RNO,r.Rdate,r.QtyR,r.Designation,r.QtyI 
                FROM $tableName r 
                LEFT JOIN $tableName1 p
                    ON r.PID = p.PID 
                LEFT JOIN $tableName2 s 
                    ON r.staffID = s.staffID 
                LEFT JOIN $tableName3 t 
                    ON r.pro = t.staffID 
                WHERE r.QtyI >= 0 
                GROUP BY r.PRID
                ORDER BY r.Rdate DESC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pharmacy Requisitioned Items | Procurement | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Romanesco">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
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
</head>

<body style="background-color:rgb(252,252,252);">
    <div></div>
    <div id="wrapper">
        <div id="sidebar-wrapper" style="background-color:rgb(21,164,113);">
            <ul class="sidebar-nav">
                <li class="sidebar-brand" style="color:rgb(255,255,255);"> <a href="#" style="font-weight:bold;color:rgb(254,254,254);">Proc | WAKA CMEC</a></li>
                <li style="color:rgb(252,253,254);"> 
                    <a href="index.php" style="color:rgb(255,255,255);" class="col-md-12">
                        <p style="float:left;">Dashboard</p> 
                        <p style="float:left;text-align:center;padding:0px;margin:0px;color:red;"  id="messageCounter"></p>
                    </a>
                    <a href="view-item.php" style="color:rgb(255,255,255);">View Items</a>
                    <a href="view-requisitoned.php" style="color:rgb(255,255,255);">View Requisitions</a>
                    <a class="bg-info"> Pharmacy Requisitions </a>
                    <a href="view-received.php" style="color:rgb(255,255,255);">View Received</a>
                    <a href="view-pharmacy-received.php" style="color:rgb(255,255,255);">Pharmacy Received</a>
                    <a href="view-supplier.php" style="color:rgb(255,255,255);">View Supplier</a>
                    <a href="product-stock.php" style="color:rgb(255,255,255);" title="Items running out of stock">
                        <p class="bg-danger text-danger" title="Items running out of stock"  id="StockCounter"></p>
                    </a>
                    <a href="pharmacy-product-stock.php" style="color:rgb(255,255,255);" title="Pharmacy Items running out of stock">
                        <p class="bg-danger text-danger" title="Pharmacy Items running out of stock"  id="PharmacyStockCounter"></p>
                    </a>
                </li>
            </ul>
        </div>
        <div class="page-content-wrapper">
            <div class="container-fluid"><a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
                <div class="dropdown" style="width:150px;float:right;margin-top:5px;">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false" type="button" style="width:150px;background-color:rgb(252,252,252);color:rgb(20,19,19);border:1px solid rgb(252,252,252);text-align:right;"><i class="fa fa-user"></i> &nbsp; <?php echo $pro;?> <span class="caret"></span></button>
                    <ul role="menu" class="dropdown-menu dropdown-menu-right">
                        <li role="presentation"><a href="settings.php"><i class="fa fa-wrench"></i> &nbsp;Settings</a></li>
                        <li role="presentation"><a href="../validate/logout.php"><i class="fa fa-power-off"></i> &nbsp; Logout</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr style="margin:0px;">
                        <h2 style="font-weight:bold;font-style:normal;">Pharmacy Requisitioned Items</h2>
                        <hr>
                        <div class="row">
                            <form method="post" action="" onSubmit="return validate();">    
                                <?php 
                                    if($rowcount<=0){
                                        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                            <span class="text-danger">No records found</span>
                                        </div>';
                                    }else{
                                        
                                        if(isset($_SESSION['update'])=='success')
                                        {
                                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <span class="text-success">Item requisition successful!</span>
                                                </div>';
                                            unset($_SESSION['update']); 
                                        }
                                ?>
                                    <div class="col-md-12">
                                            <table class="table table-striped" id="myTable">
                                                <thead style="background-color:#0dc181;color:rgb(252,254,255);">
                                                    <tr>
                                                        <th style="text-align:left;">Requisitioned Item</th>
                                                        <th style="text-align:center;">Unit of Issue</th>
                                                        <th style="text-align:center;">Form S11 No.</th>
                                                        <th style="text-align:left;">R/Officer</th>
                                                        <th style="text-align:left;">Designation</th>
                                                        <th style="text-align:left;">Date Requisitioned</th>
                                                        <th style="text-align:left;">Qty/R</th>
                                                        <th style="text-align:left;">Qty/I</th>
                                                        <th style="text-align:left">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($row = mysql_fetch_array($result)){?>
                                                    <tr>
                                                        <td style="padding-left:5px;"><?php echo $row['Name']; ?></td>
                                                        <td style="text-align:center;"><?php echo $row['Capacity']; ?></td>
                                                        <td style="text-align:center;">
                                                            <?php echo '<a href="form-S11_pharmacy.php?id='.$row["RNO"].'" target="_blank">'.sprintf('%09d',$row['RNO']).' </a>'; ?>
                                                            <?php //echo '<a href="">'.sprintf('%09d',$row['RNO']).' </a>'; ?>
                                                        </td>
                                                        <td style="padding-left:5px;"><?php echo $row['officer']; ?></td>
                                                        <td style="padding-left:5px;"><?php echo $row['Designation']; ?></td>
                                                        <td><?php echo date_format(date_create($row['Rdate']),"D d-M, Y.").date(" g:i A", strtotime($row['Rdate']));?></td>
                                                        
                                                        <td style="text-align:center;"><?php if($row['QtyR']<0){echo '<em>Null</em>';}else {echo $row['QtyR'];} ?></td>
                                                        <td style="text-align:center;"><?php if($row['QtyI']==NULL){echo '<em>Null</em>';}else {echo $row['QtyI'];} ?></td>
                                                        <td class="<?php  
                                                                        if($row['QtyI'] == NULL)
                                                                        {
                                                                            echo 'bg-info text-info';
                                                                        }
                                                                        if($row['QtyI']==0)
                                                                        {
                                                                            echo 'bg-danger text-danger';
                                                                        }else 
                                                                        if($row['QtyI']>0)
                                                                        {
                                                                            echo 'bg-success text-success';
                                                                        }
                                                            ?>">
                                                            <?php 
                                                                if($row['QtyI'] == NULL)
                                                                {
                                                                    echo 'Pending';
                                                                }else
                                                                if($row['QtyI']==0)
                                                                {
                                                                    echo 'Rejected';
                                                                }else 
                                                                if($row['QtyI']>0)
                                                                {
                                                                    echo 'Issued';
                                                                }
                                                            ?>
                                                            
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
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
</body>
    <script>
        $(document).ready(function(){
            $('#myTable').dataTable();
            setInterval(function(){
                $("#messageCounter").load("include/pharmacy_&_stock_counter.php");
                $("#messageCounterx").load("include/pharmacy_counter.php");
                $("#messageCounter1").load("include/counter.php");
                $("#StockCounter").load("include/count_stock.php");
                $("#PharmacyStockCounter").load("include/count_pharmacy_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
</html>