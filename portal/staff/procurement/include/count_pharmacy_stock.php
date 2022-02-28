
<?php include('../../../../db_connect.php');
    
    $sq = "SELECT COUNT(*) AS num
            FROM pharmacy_product_stock s
                LEFT JOIN product p
                ON s.PID = p.PID     
                LEFT JOIN supplier c
                ON s.SID = c.SID
                WHERE p.minimum >= s.Bal2"; 
    $pgs = mysql_fetch_array(mysql_query($sq));
    $count = $pgs['num'];
    if($count <= 0){
        echo '';
    }else
    if($count > 999 && $count <= 999999) {
        echo '<i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000),1). ' K';
    }else
    if($count > 999999 && $count <= 999999999) {
        echo '<i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000),1). ' M';
    }else
    if($count > 999999999 && $count <= 999999999999) {
        echo '<i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000000),1). ' B';
    }else
    if($count > 999999999999 && $count <= 999999999999999) {
        echo '<i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000000000),1). ' T';
    }else {
        echo '<i style="" class="fa fa-envelope-o"></i> &nbsp;'.$count;
        
    }
    ?>

