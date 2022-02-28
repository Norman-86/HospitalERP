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
    if(isset($_SESSION['category'])==="Lecturer")
    { 
        header("location:../../staff/lecturer/index.php");
    }else
    if(isset($_SESSION['category'])==="Librarian")
    { 
        header("location:../../staff/library/index.php");
    }else
    if(isset($_SESSION['category'])==="Admissions")
    { 
        header("location:../../staff/admissions/index.php");
    }else
    if(isset($_SESSION['category'])==="Secretary")
    { 
        header("location:../../staff/secretary/index.php");
    }else
    if(isset($_SESSION['category'])==="TimeTabler")
    { 
        header("location:../../staff/time-tabler/index.php");
    }else
    if(isset($_SESSION['category'])==="Accounts")
    { 
        header("location:../../staff/accounts/index.php");
    }else
    if(isset($_SESSION['category'])==="Admin")
    { 
        header("location:../../staff/admin/index.php");
    }else{
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
    
    $supplier_query = "SELECT SID,name FROM supplier";
    $supplier_sql = mysql_query($supplier_query);
    $supplier_rowcount=  mysql_num_rows($supplier_sql);
?>