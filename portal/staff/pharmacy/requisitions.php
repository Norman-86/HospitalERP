<?php 
    include'include/session.php';
    
    $tableName="pharmacy_request";
    $tableName1="product";
    $limit = 1;
    
    $stages = 3;
    if(isset($_GET['page'])){
        $page = mysql_escape_string($_GET['page']);
    }else {$page=0;}
    
    if($page){
    $start = ($page - 1) * $limit;
    }else{
    $start = 0;
    }
    
    if(isset($_GET['id'])){
        $id = mysql_real_escape_string($_GET['id']);
        $sql = "SELECT COUNT(DISTINCT RNO) as num FROM $tableName WHERE Designation='Pharmacist' AND RNO='$id' "; 
        $total = mysql_fetch_array(mysql_query($sql));
        $total_pages = $total['num'];
        // $result = mysql_query ($sql); //run the query

        $query = "SELECT r.PRID,r.RNO FROM $tableName r,`staff` s WHERE r.staffID = s.staffID AND r.Designation='Pharmacist' AND RNO='$id' GROUP BY r.RNO ORDER BY r.PRID DESC LIMIT $start,$limit";
        $result1 = mysql_query($query);
        $rowcount1=  mysql_num_rows($result1);
    }else
    {
        $sql = "SELECT COUNT(DISTINCT RNO) as num FROM $tableName WHERE Designation='Pharmacist' "; 
        $total = mysql_fetch_array(mysql_query($sql));
        $total_pages = $total['num'];
        // $result = mysql_query ($sql); //run the query

        $query = "SELECT r.PRID,r.RNO FROM $tableName r,`staff` s WHERE r.staffID = s.staffID AND r.Designation='Pharmacist' GROUP BY r.RNO ORDER BY r.PRID DESC LIMIT $start,$limit";
        $result1 = mysql_query($query);
        $rowcount1=  mysql_num_rows($result1);
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Requisitions | Pharmacy | WAKA CMEC Hospital</title>
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
    <div class="row" style="width:100%;max-width:960px;margin-right:auto;margin-left:auto;-webkit-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);-moz-box-shadow:0px 4px 4px 0px rgba(0,0,0,1);box-shadow:0px 4px 4px 0px rgba(0,0,0,1);margin-bottom:5%;overflow:hidden;">
        <form method="POST">
            <div style="padding-top:2px;padding-bottom:2px;background-color:rgb(239,239,239);">
               <h2 style="margin-left:1%;margin-bottom:1%;font-size:16px;color:rgb(1,1,1);font-weight:bold;">
                   <i class="fa fa-reorder"></i> 
                   &nbsp; Requisitions
               </h2>
            </div>
            <div class="row" style="padding:10px;">
                <div class="col-md-12">   
                    <?php 
                        if($total_pages <= 0)
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found!</span>
                                </div>';
                        }else
                        if(empty($result1))
                        {
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">Fatal Error Occured!</span>
                                </div>';
                        }else
                        {
                            if(isset($_GET['id'])){
                                $id = mysql_real_escape_string($_GET['id']);
                                $query = "SELECT s.fname,s.lname,s.sname,r.PRID,r.RNO,r.Designation,r.Iuse,r.Rdate FROM $tableName r,`staff` s WHERE r.staffID = s.staffID AND r.RNO='$id' GROUP BY r.RNO ORDER BY r.PRID DESC LIMIT $start,$limit";
                                $result1 = mysql_query($query);
                                $rowcount1=  mysql_num_rows($result1);
                            }else
                            {
                                $query = "SELECT s.fname,s.lname,s.sname,r.PRID,r.RNO,r.Designation,r.Iuse,r.Rdate FROM $tableName r,`staff` s WHERE r.staffID = s.staffID GROUP BY r.RNO ORDER BY r.PRID DESC LIMIT $start,$limit";
                                $result1 = mysql_query($query);
                                $rowcount1=  mysql_num_rows($result1);
                            }
                            while($ros = mysql_fetch_array($result1)) {
                                $rNo = $ros['RNO'];
                                // Get page data
                                $query1 = "SELECT p.Name,p.Capacity,r.RNO,r.Rdate,r.QtyR,r.Designation,r.QtyI FROM $tableName r,$tableName1 p WHERE r.PID = p.PID AND r.RNO='$rNo'  ORDER BY r.PRID DESC";
                                $result = mysql_query($query1);
                                $rowcount=  mysql_num_rows($result);
                            }

                            if(isset($_SESSION['requisition_successful'])=='success')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Item(s) requisition successful!</span>
                                    </div>';

                                unset($_SESSION['requisition_successful']); 
                            } 

                    ?>
                    <div class="row" style="width:98%;margin:0 auto;">
                        <?php
                            mysql_data_seek($result1,0);
                            while($ros = mysql_fetch_array($result1)) {             
                        ?>
                        <div class="col-md-2">
                            <label style="margin-top:2%;font-weight:bold;font-size:14px;">
                                Requisition No.
                            </label>
                        </div>
                        <div class="col-md-2">
                            <p style="margin-top:2%;font-size:14px;">
                                <!--<a href="form-S11.php?id=<?php //echo $ros["RNO"];?>" class="text-info" target="_blank">-->
                                    <?php echo sprintf('%09d',$ros['RNO']); ?>
                                <!--</a>-->    
                            </p>
                        </div>
                        <div class="col-md-1">
                            <label style="margin-top:2%;width:100%;font-weight:bold;font-size:14px;">
                                Date.
                            </label>
                        </div>
                        <div class="col-md-3">
                            <p style="margin-top:2%;width:100%;font-size:12px;">
                                 <?php echo date_format(date_create($ros['Rdate']),"D d-M-Y H:i A"); ?>
                            </p>
                        </div>
                        <div class="col-md-1">
                            <label style="margin-top:2%;width:100%;font-weight:bold;font-size:14px;">
                                Staff:
                            </label>
                        </div>
                        <div class="col-md-3">
                            <p style="margin-top:2%;width:100%;font-size:12px;">
                                 <?php echo $ros['fname'].' '.$ros['lname'].' '.$ros['sname']; ?>
                            </p>
                        </div>
                         <?php } ?>
                    </div>
                    <div class="col-md-12" style="width:98%;">
                        <div class="table-responsive" style="margin-right:auto;margin-left:auto;">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="background-color:rgb(42,63,84);color:rgb(255,255,255);">
                                        <th style="border:none;text-align:center;">#</th>
                                        <th style="border:none;width:60%;">Requisitioned Item </th>
                                        <th style="border:none;text-align:center;">Unit</th>
                                        <th style="border:none;text-align:center;">Qty/R</th>
                                        <th style="border:none;text-align:center;">Qty/I</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $i=1;
                                        while($rows = mysql_fetch_assoc($result)) 
                                        {
                                    ?>
                                    <tr>
                                        <td style="text-align:center;font-size:12px;font-weight:normal;color:rgb(3,3,3);border:none;">
                                            <?php echo $i++;?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);border:none;">
                                            <?php echo $rows["Name"];?>
                                        </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                            <?php echo $rows["Capacity"];?>
                                        </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                            <?php echo $rows["QtyR"]; ?>
                                        </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);text-align:center;border:none;">
                                            <?php 
                                                if($rows["QtyI"]<0){
                                                    echo 'Pending';
                                                }
                                                if($rows["QtyI"]==0){
                                                    echo "Rejected";
                                                }
                                                if($rows["QtyI"]>0){
                                                    echo $rows["QtyI"]; 
                                                }                                        
                                            ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <hr style="padding:0px;">

                            <?php
                                mysql_data_seek($result1,0);
                                while($ros = mysql_fetch_array($result1)) {             
                            ?>
                            <div class="row" style="width:98%;margin-right:auto;margin-left:auto;border:none;">
                                <div class="col-md-2">
                                    <label style="font-weight:bold;font-size:14px;">Designation:</label>
                                </div>
                                <div class="col-md-10">
                                    <p style="width:100%;font-size:12px;">
                                        <?php echo $ros['Designation']; ?>
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="width:98%;margin-right:auto;margin-left:auto;border:none;">
                                <div class="col-md-2">
                                    <label style="font-weight:bold;font-size:14px;">Point of Use:</label>
                                </div>
                                <div class="col-md-10">
                                    <p style="width:100%;font-size:12px;">
                                        <?php echo $ros['Iuse']; ?>
                                    </p>
                                </div>
                            </div>  
                            <?php } ?>

                    </div>
                    <div class="col-md-12" style="width:100%;margin:20px 0px;">

                                <?php
                            if(isset($_GET['page'])){
                                $page = mysql_real_escape_string($_GET['page']);
                            }else{$page=1;}
                        
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