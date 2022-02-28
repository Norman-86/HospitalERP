<?php 
    include'include/session.php';
    
    $tableName="request";
    $limit = 1;
    
    $sql = "SELECT COUNT(DISTINCT RNO) as num FROM $tableName WHERE QtyI >= 0 AND bar = 0 "; 
    $total_pgs = mysql_fetch_array(mysql_query($sql));
    $total_pages = $total_pgs['num'];
    
    $stages = 3;
    if(isset($_GET['page'])){
        $page = mysql_escape_string($_GET['page']);
    }else {$page=0;}
    
    if($page){
    $start = ($page - 1) * $limit;
    }else{
    $start = 0;
    }
    
    $query = "SELECT r.RNO,r.Designation,r.Iuse,r.Rdate,CONCAT(s.fname,' ',s.sname)AS Officer
                FROM $tableName r,`staff` s
                WHERE r.staffID = s.staffID 
                AND r.QtyI >= 0  
                AND r.bar = 0 
                GROUP BY r.RNO 
                ORDER BY r.RID DESC 
                LIMIT $start,$limit";
    $result1 = mysql_query($query);
    $rowcount1=  mysql_num_rows($result1);
    
    while($ros = mysql_fetch_array($result1)) {
        $rNo = $ros['RNO'];
        $query1 = "SELECT   p.PID,p.name,p.capacity,r.RID,r.RNO,r.QtyR,r.QtyI
                        FROM product p,request r 
                        WHERE r.PID = p.PID 
                        AND r.QtyI >= 0 
                        AND r.bar = 0 
                        AND r.RNO ='$rNo' 
                        ORDER BY r.Rdate DESC";
        $result = mysql_query($query1);
        $rowcount=  mysql_num_rows($result);
    }
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previous Requisitions | Procurement | WAKA CMEC Hospital</title>
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
                    <a href="index.php" class="col-md-12" style="color:rgb(255,255,255);">
                        <p style="float:left;">Dashboard</p> 
                        <p style="float:left;text-align:center;padding:0px;margin:0px;color:red;" id="messageCounter"></p>
                    </a>
                    <a href="view-item.php" style="color:rgb(255,255,255);">View Items</a>
                    <a href="view-requisitoned.php" class="bg-info"> View Requisitions </a>
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
            <div class="container-fluid">
                <a class="btn btn-link" role="button" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></a>
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
                                                            <em class="fa fa-registered"></em> &nbsp;
                                                            <b>Previous Requisitions</b>
                                                         </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                             <div class="row" style="margin:5px;;padding:0px;margin-bottom:4%;">
                                                <div class="col col-xs-12 text-center" style="margin:0px;padding:0px;color:#000000;">
                                                    <?php
                                                        if($rowcount1<=0){
                                                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                                                    <span class="text-danger">No pending requisitions found</span>
                                                                </div>';
                                                        }else{
                                                            
                                                            mysql_data_seek($result1,0);
                                                            while($ros = mysql_fetch_array($result1)) { 
                                                     ?>
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="font-size:14px;">R/No. &nbsp; <label style="font-weight:normal;"><?php echo $ros['RNO']; ?></label></th>
                                                                            <th style="font-size:14px;">R/Officer. &nbsp; <label style="font-weight:normal;"><?php echo $ros['Officer']; ?></label></th>
                                                                            <th style="font-size:14px;">Date. &nbsp; <label style="font-weight:normal;"><?php echo date_format(date_create($ros['Rdate']),"D d-M, Y H:i A"); ?></label></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody></tbody>
                                                                </table>
                                                            </div>
                                                        <?php }?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped">
                                                                        <thead>
                                                                            <tr style="border-bottom:1px solid rgb(115,135,156);background-color:rgb(21,164,113);color:#ffffff">
                                                                                <td style="font-size:16px;font-weight:bold;border:none;text-align:left;" >Item </td>
                                                                                <td style="font-size:16px;font-weight:bold;text-align:center;border:none;">Capacity </td>
                                                                                <td style="font-size:16px;font-weight:bold;text-align:center;border:none;">Qty/R </td>
                                                                                <td class="col-md-2" style="font-size:16px;font-weight:bold;border:none;">Qty/A <a class="text-danger">*</a></td>
                                                                            </tr>
                                                                        </thead>
                                                                            <?php while($rows = mysql_fetch_array($result)) { ?>
                                                                                <tr style="color:black;">
                                                                                    <td style="text-align:left;">
                                                                                        <?php echo $rows['name'];?>
                                                                                    </td>
                                                                                    <td style=";text-align:center;"><?php echo $rows['capacity']; ?></td>
                                                                                    <td style=";text-align:center;"><?php echo number_format($rows['QtyR']); ?></td>
                                                                                    <td><?php echo $rows['QtyI']; ?></td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <?php
                                                                                mysql_data_seek($result1,0);
                                                                                while($ros = mysql_fetch_array($result1)) { 
                                                                            ?>
                                                                                <tr>
                                                                                    <td class="col-md-2" style="font-size:16px;font-weight:bold;">Designation: </td>
                                                                                    <td colspan="7" style="color:rgb(1,1,1);">
                                                                                        <?php echo $ros['Designation']; ?>
                                                                                        <input type="hidden" name="designation" value="<?php echo $ros['Designation']; ?>">
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td class="col-md-2" style="font-size:16px;font-weight:bold;">Point of Use:</td>
                                                                                    <td colspan="7" style="color:rgb(1,1,1);"><?php echo $ros['Iuse']; ?></td>
                                                                                </tr>
                                                                            <?php } ?> 
                                                                        </tbody>
                                                                    </table>
                                                                    <div class="text-left">
                                                                        <?php

                                                                            if(isset($_GET['page'])){
                                                                                $page = mysql_real_escape_string($_GET['page']);
                                                                            }else{$page=0;}
                                                                            $total_records = ceil($total_pages / $limit);  
                                                                            $displayLimit=5  ; // May be what you are looking for

                                                                            if($total_records >=1 && $page <= $total_records)
                                                                            {
                                                                                $counter = 1;
                                                                                $link = "<nav><ul class='pagination'>";  
                                                                                if($page > ($displayLimit/2))
                                                                                { 
                                                                                    $link .= "<li><a href=\"?page=1\">1 </a></li> <li><a>...</a><li> ";
                                                                                }
                                                                                for ($x=$page; $x<=$total_records;$x++)
                                                                                {
                                                                                    if($page==$x){
                                                                                        $r="background-color:#00aeef;color:white"; 
                                                                                    }else{
                                                                                        $r="background-color:none;"; 
                                                                                    }
                                                                                    if($counter < $displayLimit){
                                                                                        if($page == $x){
                                                                                            $link .= "<li><a style='$r' href=\"?page=" .$x."\">".$x." </a></li>";
                                                                                        }else{
                                                                                            $link .= "<li><a style='$r' href=\"?page=" .$x."\">".$x." </a></li>";
                                                                                        }
                                                                                    }
                                                                                    $counter++;
                                                                                }
                                                                                if($page < $total_records- ($displayLimit/2))
                                                                                { 
                                                                                    $link .= "<li><a>...</a><li> " . "<li><a href=\"?page=" .$total_records."\">".$total_records." </a></li>"; 
                                                                                }
                                                                            }
                                                                            echo $link. "</ul></nav>";                            
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
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
                $("#messageCounter1").load("include/counter.php");
                $("#StockCounter").load("include/count_stock.php");
                $("#PharmacyStockCounter").load("include/count_pharmacy_stock.php");
            }, 500); /* time in milliseconds (ie 2 seconds)*/
        });
    </script>
</html>