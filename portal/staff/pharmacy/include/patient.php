
<?php include('../../../../db_connect.php');
    
    $tableName="patient";
    //$limit = 1500;
    
    // Get page data
    $query1 = "SELECT p.*,v.visitNo AS visitID,v.dov,v.level
            FROM $tableName p
                   LEFT JOIN (
                                SELECT t1.visitID,t1.visitNo,t1.level,t1.dov,t1.patientNo,t1.status,t1.eov  
                                FROM visit t1
                                JOIN (SELECT MAX(visitID) AS visitID
                                        FROM visit
                                        GROUP BY patientNo
                                    ) t2
                                ON t1.visitID = t2.visitID 
                            ) v
                    ON v.patientNo = p.patientNo
                    WHERE v.status = 'Out Patient'
                    AND v.level = 4";
    $result = mysql_query($query1);
    $rowcount=  mysql_num_rows($result);
    
   
                        if($rowcount<=0){
                            echo'<div class="alert alert-danger absolue center text-center" role="alert">
                                    <span class="text-danger">No records found</span>
                                </div>';
                        }else{
                    
                                        $i=1;
                                        while($row = mysql_fetch_array($result)) { 
                                    ?>
                                    <tr>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> <?php echo $row['patientNo'];?> </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['name'];?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                            <?php echo $row['gender'];?>
                                        </td>
                                        <td style="font-weight:normal;font-size:12px;color:rgb(6,6,6);"> 
                                            <?php 
                                                $today = date("Y-m-d");
                                                $diff = date_diff(date_create($row['dob']), date_create($today));
                                                echo $diff->format('%y')." yrs.";
                                            ?> 
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo date_format(date_create($row['dov']),"d M Y, H:i A");?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;color:rgb(3,3,3);"> 
                                                <?php echo sprintf('%09d',$row['visitID']);?>
                                        </td>
                                        <td style="font-size:12px;font-weight:normal;padding-top:4px;padding-bottom:4px;"> 
                                            <a href="prescription.php?id=<?php echo $row['patientNo']?>&no=<?php echo $row['visitID']?>" title="Check Patient Prescriptions">
                                                <i class="fa fa-eye" style="font-size:14px;margin-right:10px;"></i>
                                            </a>
                                        </td>
                                    </tr>
                        <?php } }?>


<script>
        $(document).ready(function(){
            $('#myTable').dataTable();
        });
    </script>