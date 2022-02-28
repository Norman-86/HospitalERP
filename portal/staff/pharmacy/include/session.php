<?php
    ob_start();
    session_start();
    
    date_default_timezone_set("Africa/Nairobi");
    
    //check if session exists
    if(!isset($_SESSION['staffID']))
    { 
        header("location:../../staff/index.php");
    }else
    //if session category is lecturer, return to lecturer's portal
    
    if(isset($_SESSION['category'])==="Procurement")
    { 
        header("location:../../staff/procurement/index.php");
    }else
    if(isset($_SESSION['category'])==="Regestry")
    { 
        header("location:../../staff/registry/index.php");
    }else
    if(isset($_SESSION['category'])==="Human Resource Manager")
    { 
        header("location:../../staff/HR/index.php");
    }else
    {
        $staffID = $_SESSION['staffID'];
    }
    
    include('../../../db_connect.php');
    
    $staffname = "SELECT * FROM staff WHERE staffID ='$staffID'";
    $staff = mysql_query($staffname);
   
    if (!$staff) { // add this check.
        die('Invalid query: ' . mysql_error());
    }else{
        while ($name = mysql_fetch_array($staff)) {
            $pro = $name['lname'];
        }
    }
?>