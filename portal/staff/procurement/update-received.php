<?php 
    include'include/session.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Received | Procurement | WAKA CMEC</title>
    <link rel="shortcut icon" href="../../../assets/img/logo.png" />
    <link rel="stylesheet" href="../../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_no-more-tables1.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="../../../assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <link rel="stylesheet" href="../../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit.css">
    <link rel="stylesheet" href="../../../assets/css/Profile-Edit1.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../../assets/css/styles.css">
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
                        <h2 style="font-weight:bold;font-style:normal;">Update Received Item</h2>
                        <hr style="margin:0px;">
                        
                        <form method="post" style="margin-top:20px;">
                            <?php 
                                $query = "SELECT SID,name FROM supplier";
                                $result = mysql_query($query);

                                if(!isset($_GET['id'])){
                                   echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-danger">Error occured while trying to retrieve information!</span>
                                    </div>'; 
                                }else{
                                    if(mysql_escape_string($_GET['id'])){
                                        // Get page data
                                        $query1 = "SELECT p.name AS Product,p.capacity,s.name AS Supplier,r.PSID,r.PID,r.SID,r.Qty,r.price,r.contract,r.received FROM productsupplied r LEFT JOIN product p ON r.PID=p.PID RIGHT JOIN supplier s ON r.SID=s.SID WHERE PSID=".$_GET['id'];
                                        $results = mysql_query($query1);
                                    }
                                
                                    include('validate/updateReceived.php');
                                    
                                    while($row = mysql_fetch_assoc($results)) {
                            ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Item Name <a class="text-danger">*</a></label>
                                        <input class="form-control" readonly disabled="" type="text" name="pname" value="<?php echo $row["Product"]; ?>" placeholder="Enter Item Name" autofocus="">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Quantity <a class="text-danger">*</a></label>
                                        <input class="form-control" type="number" readonly step="any" min="0" name="quantity" value="<?php echo $row['Qty'];?>" placeholder="Enter Quantity">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Capacity <a class="text-danger">*</a></label>
                                        <select class="form-control" disabled="" name="supplier">
                                            <option>-- Supplier --</option> 
                                            <optgroup label="Select Supplier">
                                                <option value="CYL" <?php if($row['capacity']=="CYL"){echo 'selected="selected" ';}?>>Cylinder</option> 
                                                <option value="BTL" <?php if($row['capacity']=="BTL"){echo 'selected="selected" ';}?>>Bottles</option> 
                                                <option value="Kgs" <?php if($row['capacity']=="Kgs"){echo 'selected="selected" ';}?>>Kilograms</option> 
                                                <option value="L" <?php if($row['capacity']=="L"){echo 'selected="selected" ';}?>>Liters</option> 
                                                <option value="M" <?php if($row['capacity']=="M"){echo 'selected="selected" ';}?>>Meters</option> 
                                                <option value="PKT" <?php if($row['capacity']=="PKT"){echo 'selected="selected" ';}?>>Packets</option> 
                                                <option value="PC" <?php if($row['capacity']=="PC"){echo 'selected="selected" ';}?>>Pieces</option> 
                                                <option value="Ream" <?php if($row['capacity']=="Ream"){echo 'selected="selected" ';}?>>Reams</option> 
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Price <a class="text-danger">*</a></label>
                                        <input class="form-control" type="number" step="any" min="0" name="price" value="<?php echo $row['price'];?>" placeholder="Enter price of product!">
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">LPO No. <a class="text-danger">*</a></label>
                                        <input class="form-control" type="text" name="contract" value="<?php echo $row['contract'];?>" placeholder="Enter Contract No.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Supplier <a class="text-danger">*</a></label>
                                        <select class="form-control" role="button" name="supplier">
                                            <option>-- Supplier --</option> 
                                            <optgroup label="Select Supplier">
                                                <?php while($rows = mysql_fetch_assoc($result)) { ?>
                                                    <option value="<?php echo $rows['SID']; ?>" <?php if($row['SID']==$rows['SID']){echo 'selected="selected" ';}?>>
                                                        <?php echo $rows['name']; ?>
                                                    </option> 
                                                <?php } ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group" style="margin-top:20px;">
                                        <button name="save" type="submit" value="<?php echo $row['PSID']; ?>" style="padding:5px 20px;color:rgb(1,1,1);margin-right:auto;margin-left:auto;">Update Received</button>
                                    </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
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