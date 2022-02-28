<?php 
    ob_start();
    session_start();
    
    include '../../db_connect.php';
    date_default_timezone_set("Africa/Nairobi");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Portal | WAKA CMEC Hospital</title>
    <link rel="shortcut icon" href="../../assets/img/logo.png" />
    
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400|Roboto:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form1.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form2.css">
    <link rel="stylesheet" href="../../assets/css/ebs-simple-login-form.css">
    <link rel="stylesheet" href="../../assets/css/FPE-Gentella-form-elements.css">
    <link rel="stylesheet" href="../../assets/css/FPE-Gentella-form-elements1.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">
    <link rel="stylesheet" href="../../assets/css/Navbar-Fixed-Side1.css">
    <link rel="stylesheet" href="../../assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="../../assets/css/Responsive-Form1.css">
    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu.css">
    <link rel="stylesheet" href="../../assets/css/Sidebar-Menu1.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-header  navbar-default navbar-static-top   page-nav-header">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="#">
                        WAKA CMEC | Staff Portal
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-right">                        
                        <li><a href="#" >Home</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
    <br><br><br><br><br>
    <?php
        if (isset($_GET['mail']) && preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/',base64_decode($_GET['mail'])))
        {
            $email = base64_decode($_GET['mail']);

        }
        if (isset($_GET['key']) && (strlen($_GET['key']) == 32))//The Activation key will always be 32 since it is MD5 Hash
        {
            $key = $_GET['key'];
        }


        if (isset($email) && isset($key))
        {
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8 col-md-offset-2 login-box">
                
                <div class="panel panel-default">
                    <div class="panel-heading">Reset Password</div>
                    <div id="login-box-heading" class="panel-heading">
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="post">
                                <?php 
                                    include 'validate/reset.php';
                                    
                                    if(isset($_SESSION['success'])=="true"){
                                        echo '<div class="alert alert-success absolue center text-center" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                                <span class="text-success">
                                                    Password reset successful. 
                                                    <a class="btn btn-success" href="index.php">Login</a>
                                                </span>
                                            </div>';
                                        unset($_SESSION['new']); 
                                    }
                                ?>
                                <div class="form-group">
                                    <label class="control-label control-label col-md-4">New Password </label>
                                    <div class="col-md-6">
                                        <input type="password" name="new" required value="<?php echo $new;?>" class="form-control change" id="password" placeholder="New Password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label control-label col-md-4">Confirm New Password </label>
                                    <div class="col-md-6">
                                        <input type="password" name="confirm" required value="<?php echo $confirm;?>" class="form-control change" id="password" placeholder="Confirm New Password"/>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <button class="btn btn-primary" name="submit" type="submit">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    }else{
        echo'<div class="alert alert-danger absolue center text-center" role="alert">
                <span class="text-danger">Opps! Error Occured.</span>
            </div>';
    }
?>
</div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../assets/js/Sidebar-Menu.js"></script>
</body>

</html>