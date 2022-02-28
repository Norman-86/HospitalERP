
<?php include('../../../../db_connect.php');
    
    //count stock
    $sq = "SELECT COUNT(DISTINCT RNO) as num FROM request WHERE bar = '1'"; 
    $pgs = mysql_fetch_array(mysql_query($sq));
    $stock = $pgs['num'];
    
    //count pharmacy stock
    $sq1 = "SELECT COUNT(DISTINCT RNO) as num FROM pharmacy_request WHERE bar = '1'"; 
    $pgs1 = mysql_fetch_array(mysql_query($sq1));
    $pharmacy = $pgs1['num'];
    
    //add to get total general and pharmacy stock
    $count = $pharmacy + $stock;
    
    if($count <= 0){
        echo '';
    }else
    if($count > 999 && $count <= 999999) {
        echo number_format(($count / 1000),1). ' K';
    }else
    if($count > 999999 && $count <= 999999999) {
        echo number_format(($count / 1000000),1). ' M';
    }else
    if($count > 999999999 && $count <= 999999999999) {
        echo number_format(($count / 1000000000),1). ' B';
    }else
    if($count > 999999999999 && $count <= 999999999999999) {
        echo number_format(($count / 1000000000000),1). ' T';
    }else {echo $count;}
    ?>

