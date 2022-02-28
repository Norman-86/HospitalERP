<?php 
    include'include/session.php';
    
    $tableName="pharmacy_product_stock";
    
    $sql = "SELECT COUNT(*) AS num
            FROM $tableName s
                LEFT JOIN product p
                ON s.PID = p.PID     
                LEFT JOIN supplier c
                ON s.SID = c.SID
                WHERE p.minimum >= s.Bal2"
            ; 
    $total_pgs = mysql_fetch_array(mysql_query($sql));
    $total_pages = $total_pgs['num'];
   // $result = mysql_query ($sql); //run the query
    
    // Get page data
    $query1 = "SELECT p.name,p.Capacity,p.minimum,c.name AS supplier,s.dateReceived,s.Qty,s.Bal1,s.Bal2,(s.bal2 - p.minimum)AS Difference
                FROM $tableName s
                LEFT JOIN product p
                ON s.PID = p.PID     
                LEFT JOIN supplier c
                ON s.SID = c.SID
                WHERE p.minimum >= s.Bal2
                ORDER BY p.name ASC";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Product Stock | Procurement | WAKA CMEC</title>
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
                    <a href="view-requisitoned.php" style="color:rgb(255,255,255);" class="col-md-12">View Items</a>
                    <a href="view-requisitoned.php" style="color:rgb(255,255,255);">View Requisitions</a>
                    <a href="view-pharmacy-requisitoned.php" style="color:rgb(255,255,255);"> Pharmacy Requisitions </a>
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
                        <h2 class="bg-warning text-warning" style="font-weight:bold;font-style:normal;">The following Pharmacy items are running out of stock</h2>
                        <hr>
                        <div class="row">
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
                                        include 'validate/receiveProduct.php';
                                        include 'validate/deleteProduct.php';
                                        
                                        if(isset($_SESSION['update'])=='success')
                                        {
                                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <span class="text-success">Item update Successful!</span>
                                                </div>';
                                            unset($_SESSION['update']); 
                                        }

                                        if(isset($_SESSION['del'])=='True')
                                        {
                                            echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    <span class="text-success">Delete Successful!</span>
                                                </div>';
                                            unset($_SESSION['del']); 
                                        }
                                ?>
                                    <div class="col-md-12">
                                            <table class="table table-striped" id="myTable">
                                                <thead style="background-color:#0dc181;color:rgb(252,254,255);">
                                                    <tr>
                                                        <th><strong>Item Name</strong></th>
                                                        <th style="text-align:center;"><strong>Capacity</strong></th>
                                                        <th style="text-align:center;"><strong>Min.</strong></th>
                                                        <th style="text-align:center;"><strong>Stock</strong></th>
                                                        <th style="text-align:center;"><strong>Qty. Received</strong></th>
                                                        <th style="text-align:center;"><strong>Qty. After</strong></th>
                                                        <th style="text-align:center;"><strong>Supplier</strong></th>
                                                        <th><strong>Date Received</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($row = mysql_fetch_array($result)) { ?>
                                                    <tr>
                                                        <td style="padding:3px 5px 3px 5px;"><?php echo substr($row['name'],0,100); ?></td>
                                                        <td style="text-align:center;"><?php echo $row['Capacity'];?></td>
                                                        <td style="text-align:center;"><?php echo $row['minimum']; ?></td>
                                                        <td style="text-align:center;"> <?php echo $row['Bal2']; ?></td>
                                                        <td style="text-align:center;"> <?php echo $row['Qty']; ?></td>
                                                        <td style="text-align:center;"> <?php echo $row['Bal1']; ?></td>
                                                        <td style="text-align:center;"> <?php echo substr($row['supplier'],0,100); ?></td>
                                                        <td> <?php echo date_format(date_create($row['dateReceived']),"D d-M-Y"); ?></td>
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
                $("#StockCounter").load("include/count_stock.php");
                $("#PharmacyStockCounter").load("include/count_pharmacy_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
</html>