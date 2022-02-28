<?php
    session_start();
    unset($_SESSION['staffID']);
    unset($_SESSION['category']);
    
    echo "<script type='text/javascript'> document.location = '../index'; </script>";
    exit();
?>;