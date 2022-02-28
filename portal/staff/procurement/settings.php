<?php include'include/session.php';?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings | Procurement | WAKA CMEC</title>
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
                <li class="sidebar-brand" style="color:rgb(255,255,255);"> 
                    <a href="#" style="font-weight:bold;color:rgb(254,254,254);">Proc | WAKA CMEC</a>
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
            
                <div class="row">
                    <div class="col-md-12">
                        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="POST">
                                        <div class="panel panel-default panel-table">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col col-xs-12">
                                                        <h3 class="panel-title">
                                                            <em class="fa fa-wrench"></i></em> 
                                                            <b>Settings</b>
                                                         </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="container" style="margin-bottom:2%;">
                                            <form method="POST">
                                                <?php 
                                                    mysql_data_seek($staff,0);
                                                    while ($name1 = mysql_fetch_array($staff)) {
                                                ?>
                                                <div class="row" style="width:98%;margin-left:auto;margin-right:auto;">
                                                    <div class="col-md-12">
                                                        <?php 
                                                            include 'validate/password.php';

                                                            if(isset($_SESSION['success'])=="true"){
                                                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                            <span aria-hidden="true">×</span>
                                                                        </button>
                                                                        <span class="text-success">Password successfully updated</span>
                                                                    </div>';
                                                                unset($_SESSION['success']); 
                                                            }
                                                        ?>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Name:</label>
                                                                    <input class="form-control" type="text" value ="<?php echo $name1['sname']." ".$name1['fname']." ".$name1['lname'];?>" readonly="" name="firstname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Staff: </label>
                                                                    <input class="form-control" type="text" value ="<?php echo $name1['staffNo'];?>" readonly="" placeholder="Staff No." name="staffNo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Gender</label>
                                                                    <input class="form-control" type="text"value ="<?php echo $name1['gender'];?>" readonly="" placeholder="Phone No (optional)" name="lastname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Phone </label>
                                                                    <input class="form-control" type="text" value ="<?php echo $name1['phone'];?>" readonly="" placeholder="Phone No." name="firstname">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Date of Birth</label>
                                                                    <input class="form-control" type="text" value ="<?php echo date_format(date_create($name1['dob']),"D d M.Y");?>" readonly="" placeholder="optional" name="lastname">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">E-mail </label>
                                                                    <input class="form-control" type="text" value ="<?php echo $name1['mail'];?>" readonly="" placeholder="example@mail.com" name="firstname">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="control-label">Current Password:</label>
                                                            <input class="form-control" type="password" required="" placeholder="current password" autocomplete="off" name="currentpass">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">New Password :</label>
                                                                    <input class="form-control" type="password" required="" placeholder="new password" name="newpass" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="control-label">Confirm New Password:</label>
                                                                    <input class="form-control" type="password" required="" placeholder="confirm new password" name="confirmpass" autocomplete="off">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                                <button name="update" type="submit" style="margin:5px auto;padding:5px;color:#000000;">Change Password</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </form>
                                        </div>
                                        </div>
                        </div>
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