<?php 
    include'include/session.php';
    
    if(isset($_GET['no'])){
        if(mysql_escape_string($_GET['no']))
        {
            $getArray=$_GET['no'];
            $array = unserialize(base64_decode($getArray));
            $assign=implode(', ',$array);
            
            $query1 = "SELECT PID,name,Capacity,qty,price FROM product WHERE PID IN($assign) ORDER BY PID DESC";
            $results = mysql_query($query1);
            $count=  mysql_num_rows($results);
        }
    }else{$count='-1';}
    
    $no=  rand(1,999999999);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receive Item | Procurement | WAKA CMEC</title>
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
                <li class="sidebar-brand" style="color:rgb(255,255,255);"> <a href="#" style="font-weight:bold;color:rgb(254,254,254);">Proc | WAKA CMEC</a>
                </li>
                <li style="color:rgb(252,253,254);"> 
                    <a href="index.php" style="color:rgb(255,255,255);" class="col-md-12">
                        <p style="float:left;">Dashboard</p> 
                        <p style="float:left;text-align:center;padding:0px;margin:0px;color:red;"  id="messageCounter"></p>
                    </a>
                    <a href="view-item.php" style="color:rgb(255,255,255);">View Items</a>
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
                <form method="POST" >
                    
                
                <div class="row">
                    <div class="col-md-12">
                        <hr style="margin:0px;">
                        <h2 style="font-weight:bold;font-style:normal;">Receive Item</h2>
                        <hr style="margin:0px;">
                        <?php 
                            if($count <=0){
                                echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">Error occured while trying to retrieve information!</span>
                                    </div>';
                            }else{
                            //if capacity is not selected    
                            /*if(isset($_SESSION['capacity'])=='False')
                            {
                                echo'<div class="alert alert-warning absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-warning">
                                            <b>Select Quantity received for the following item(s):</b><br>
                                            '.implode("<br>",$_SESSION['items']).'
                                        </span>
                                    </div>';
                                unset($_SESSION['capacity']);
                            }*/
                            
                            include('validate/receive.php'); 
                        ?>
                            <div class="row" style="margin-bottom:10px;">
                                <div class="col-sm-2">
                                    <div class="form-group text-center">
                                        <label class="control-label">Pharmacy </label><br>
                                        <input name="checkbox" type="checkbox" id="checkbox[]" <?php if($check==true){echo 'checked="checked"';}?> value="1" class="btn" title="Receive to Pharmaceutical">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">LPO No.</label>
                                        <input class="form-control" type="text" name="lpo" value="<?php echo $contract;?>" placeholder="Enter LPO No.">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label class="control-label">Invoice No.</label>
                                        <input class="form-control" type="text" name="invoice" value="<?php echo $invoice;?>" placeholder="Enter Invoice No,">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label class="control-label">Delivery Note No. </label>
                                        <input class="form-control" type="text" name="delivery" value="<?php echo $delivery;?>" placeholder="Enter Delivery Note No.">
                                    </div>
                                </div>
                            </div>
                            <hr style="margin:0px;margin-bottom:20px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead style="background-color:#0dc181;color:rgb(252,254,255);"">
                                                <tr>
                                                    <th style="text-align:center;"># </th>
                                                    <th>Item </th>
                                                    <th>Capacity </th>
                                                    <th>Quantity </th>
                                                    <th>Unit Price</th>
                                                    <th>Supplier </th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $i=1;
                                                    while($row = mysql_fetch_array($results)) { 
                                                ?>

                                                <tr>
                                                    <td style="text-align:center;">
                                                        <label class="item"> <?php echo $i++; ?> </label>
                                                        <input type="hidden" class="item" name="pname[]" readonly value='<?php echo $row['name']; ?>' placeholder="Enter Item name">
                                                        <input type="hidden" name="productID[]" value="<?php echo $row['PID']; ?>" readonly style="display:none;" placeholder="Enter Product No.">
                                                        <input type="hidden" name="officer[]" value="<?php echo $staffID; ?>" readonly style="display:none;" placeholder="Enter officer No.">
                                                        <input type="hidden" name="formno[]" value="<?php echo $no; ?>" readonly style="display:none;" placeholder="Enter form No.">
                                                        <input type="hidden" name="date[]" value="<?php echo date("Y-m-d"); ?>" readonly style="display:none;" placeholder="Enter form No.">
                                                    </td>
                                                    <td><label class="item"> <?php echo $row['name']; ?> </label></td>
                                                    <td><label class="item"> <?php echo $row['Capacity']; ?> </label></td>
                                                    <td>
                                                        <input class="form-control" type="number" name="quantity[]" value="" step="any" min="0"/>
                                                        <input class="form-control" type="hidden" name="item_qty[]" value="<?php echo $row['qty'];?>" step="any" min="0" style="display:none;"/>
                                                    </td>
                                                    <td>
                                                        <input class="form-control" type="number" name="price[]" step="any" min="0"/>
                                                        <input class="form-control" type="hidden" name="item_price[]" value="<?php echo $row['price'];?>" step="any" min="0" style="display:none;"/>
                                                    </td>
                                                    <td>
                                                        <select class="form-control" name="supplier[]" style="cursor:pointer;">
                                                            <option>- Select Supplier -</option>
                                                            <?php 
                                                                if($supplier_rowcount <=0){
                                                                    echo '<option class="bg-danger text-danger">Supplier not found</option>';
                                                                }else{
                                                                mysql_data_seek($supplier_sql,0);    
                                                                while($rows = mysql_fetch_array($supplier_sql)) { 
                                                            ?>
                                                                <option value="<?php echo $rows['SID']; ?>"><?php echo $rows['name']; ?></option>
                                                            <?php } } ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12" style="text-align:right;">
                                    <button type="submit" name="submit" style="padding:2px 10px;color:black;">Receive</button>
                                </div>
                            </div>
                    </div>
                </div>
                    <?php }?>
                </form>    
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
    <script type="text/javascript">
            $(document).ready(function(){
            setInterval(function(){
                $("#messageCounter").load("include/pharmacy_&_stock_counter.php");
                $("#StockCounter").load("include/count_stock.php");
                $("#PharmacyStockCounter").load("include/count_pharmacy_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
</html>