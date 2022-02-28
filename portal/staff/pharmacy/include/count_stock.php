
<?php include('../../../../db_connect.php');
    
    $sq = "SELECT COUNT(*) AS num
                   FROM product p
                   LEFT JOIN (
                                SELECT t1.PID,t1.Bal2 
                                FROM pharmacy_supply t1
                                JOIN (SELECT PID,Bal2, MAX(PHID) AS PHID
                                        FROM pharmacy_supply  
                                        GROUP BY PID
                                    ) t2
                                ON t1.PHID = t2.PHID 
                            ) s
                    ON s.PID = p.PID
                    WHERE p.pharmacy_minimum >= s.Bal2"; 
    $pgs = mysql_fetch_array(mysql_query($sq));
    $count = $pgs['num'];
    if($count <= 0){
        echo '';
    }else
    if($count > 999 && $count <= 999999) {
        echo '<a href="stock-items.php"> <p style="color:red;padding:0px; margin:0px;"><i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000),1). ' K</p></a>';
    }else
    if($count > 999999 && $count <= 999999999) {
        echo '<a href="stock-items.php"> <p style="color:red;padding:0px; margin:0px;"><i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000),1). ' M</p></a>';
    }else
    if($count > 999999999 && $count <= 999999999999) {
        echo '<a href="stock-items.php"> <p style="color:red;padding:0px; margin:0px;"><i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000000),1). ' B</p></a>';
    }else
    if($count > 999999999999 && $count <= 999999999999999) {
        echo '<a href="stock-items.php"> <p style="color:red;padding:0px; margin:0px;"><i class="fa fa-envelope-o text-info"></i> &nbsp;'.number_format(($count / 1000000000000),1). ' T</p></a>';
    }else {
        echo '<a href="stock-items.php"> <p style="color:red;padding:0px; margin:0px;"><i class="fa fa-envelope-o"></i> &nbsp;'.$count.'</p></a>';
        
    }
    ?>

