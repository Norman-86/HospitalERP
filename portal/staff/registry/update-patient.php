<?php 
    include'include/session.php';
    
    // Get page data
    $query1 = "SELECT * FROM faculty ORDER BY name ASC ";
    $result = mysql_query($query1);
    
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient | Registry | WAKA CMEC Hospital</title>
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
    <link href="../../../assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
</head>

<body style="background-color:rgba(42,63,84,0);">
    <nav class="navbar navbar-default" style="background-color:rgb(52,73,94);">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand navbar-link" href="#" style="font-weight:bold;background-color:rgb(52,73,94);">
                    Registry | Waka CMEC Hospital
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
                            </a>
                        </li>
                        <li role="presentation">
                            <a href="add-patient.php">
                                <i class="fa fa-book" style="margin-right:5px;"></i>
                                Add Patient 
                            </a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-users" style="margin-right:5px;"></i>
                                Patient
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="background-color:rgb(249,249,249);">
                                <li role="presentation"><a href="patient.php">All Patient</a></li>
                                <li role="presentation"><a href="out-patient.php">Out Patient</a></li>
                                <!--<li role="presentation"><a href="in-patient.php">In Patient</a></li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container" style="">
        <div>
            <form method="POST">
                <div class="form-group">
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:5px;padding-bottom:5px;background-color:rgb(239,239,239);">
                            <div class="col-md-12" style="width:100%;height:auto;">
                                <h2 style="height:auto;margin:0px;font-size:16px;color:rgb(1,1,1);font-weight:bold;margin-left:1%;">
                                    <i class="fa fa-user"></i>&nbsp;
                                    Add Patient
                                </h2>
                            </div>
                        </div>
                        <?php 
                            include('validate/add-patient.php'); 

                            if(isset($_SESSION['new'])=='True')
                            {
                                echo'<div class="alert alert-success absolue center text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <span class="text-success">Patient successfully Added</span>
                                    </div>';
                                    unset($_SESSION['new']); 
                            }
                        ?>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Name <a class="text-danger">*<a/></p>
                                <input class="form-control" type="text" name="name" value="<?php echo $name;?>" placeholder="Enter Patient Name" style="margin-left:0px;font-family:Roboto, sans-serif;">
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Gender <a class="text-danger">*<a/></p>
                                <select class="form-control" name="gender">
                                    <option value="">- Select Gender -</option>
                                    <optgroup label="Gender">
                                        <option value="Male" <?php if($gender=="Male"){echo "selected=selected";}?> >Male</option>
                                        <option value="Female" <?php if($gender=="Female"){echo "selected=selected";}?> >Female</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Date of Birth. <a class="text-danger">*<a/></p>
                                <div class="input-group date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                                    <input class="form-control" type="date" name="dob" value="<?php echo $dob;?>" placeholder="yyyy-mm-dd" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <span class="fa fa-calendar"></span>
                                    </span>
                                </div>
                                <input type="hidden" id="dtp_input2" value="" />
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">ID/Passport No. (Optional)</p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="id" value="<?php echo $id;?>" placeholder="National ID (Optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-id-card"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Phone No.(Optional)</p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="phone" value="<?php echo $phone;?>" placeholder="Enter phone number" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <p style="margin-left:2%;font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Country <a class="text-danger">*<a/></p>
                                <select class="form-control" name="country">
                                    <option value="Kenya">Kenya</option>
                                    <optgroup label="Select Country">
                                        <option value="Afganistan" <?php if($country == "Afganistan"){echo 'selected="selected"';}?> >Afghanistan</option>
                                        <option value="Albania" <?php if($country == "Albania"){echo 'selected="selected"';}?> >Albania</option>
                                        <option value="Algeria" <?php if($country == "Algeria"){echo 'selected="selected"';}?> >Algeria</option>
                                        <option value="American Samoa" <?php if($country == "American Samoa"){echo 'selected="selected"';}?> >American Samoa</option>
                                        <option value="Andorra" <?php if($country == "Andorra"){echo 'selected="selected"';}?> >Andorra</option>
                                        <option value="Angola" <?php if($country == "Angola"){echo 'selected="selected"';}?> >Angola</option>
                                        <option value="Anguilla" <?php if($country == "Anguilla"){echo 'selected="selected"';}?> >Anguilla</option>
                                        <option value="Antigua &amp; Barbuda" <?php if($country == "Antigua &amp; Barbuda"){echo 'selected="selected"';}?> >Antigua &amp; Barbuda</option>
                                        <option value="Argentina" <?php if($country == "Argentina"){echo 'selected="selected"';}?> >Argentina</option>
                                        <option value="Armenia" <?php if($country == "Armenia"){echo 'selected="selected"';}?> >Armenia</option>
                                        <option value="Aruba" <?php if($country == "Aruba"){echo 'selected="selected"';}?> >Aruba</option>
                                        <option value="Australia" <?php if($country == "Australia"){echo 'selected="selected"';}?> >Australia</option>
                                        <option value="Austria" <?php if($country == "Austria"){echo 'selected="selected"';}?> >Austria</option>
                                        <option value="Azerbaijan" <?php if($country == "Azerbaijan"){echo 'selected="selected"';}?> >Azerbaijan</option>
                                        <option value="Bahamas" <?php if($country == "Bahamas"){echo 'selected="selected"';}?> >Bahamas</option>
                                        <option value="Bahrain" <?php if($country == "Bahrain"){echo 'selected="selected"';}?> >Bahrain</option>
                                        <option value="Bangladesh" <?php if($country == "Bangladesh"){echo 'selected="selected"';}?> >Bangladesh</option>
                                        <option value="Barbados" <?php if($country == "Barbados"){echo 'selected="selected"';}?> >Barbados</option>
                                        <option value="Belarus" <?php if($country == "Belarus"){echo 'selected="selected"';}?> >Belarus</option>
                                        <option value="Belgium" <?php if($country == "Belgium"){echo 'selected="selected"';}?> >Belgium</option>
                                        <option value="Belize" <?php if($country == "Belize"){echo 'selected="selected"';}?> >Belize</option>
                                        <option value="Benin" <?php if($country == "Benin"){echo 'selected="selected"';}?> >Benin</option>
                                        <option value="Bermuda" <?php if($country == "Bermuda"){echo 'selected="selected"';}?> >Bermuda</option>
                                        <option value="Bhutan" <?php if($country == "Bhutan"){echo 'selected="selected"';}?> >Bhutan</option>
                                        <option value="Bolivia" <?php if($country == "Bolivia"){echo 'selected="selected"';}?> >Bolivia</option>
                                        <option value="Bonaire" <?php if($country == "Bonaire"){echo 'selected="selected"';}?> >Bonaire</option>
                                        <option value="Bosnia &amp; Herzegovina" <?php if($country == "Bosnia &amp; Herzegovina"){echo 'selected="selected"';}?> >Bosnia &amp; Herzegovina</option>
                                        <option value="Botswana" <?php if($country == "Botswana"){echo 'selected="selected"';}?> >Botswana</option>
                                        <option value="Brazil" <?php if($country == "Brazil"){echo 'selected="selected"';}?> >Brazil</option>
                                        <option value="British Indian Ocean Ter" <?php if($country == "British Indian Ocean Ter"){echo 'selected="selected"';}?> >British Indian Ocean Ter</option>
                                        <option value="Brunei" <?php if($country == "Brunei"){echo 'selected="selected"';}?> >Brunei</option>
                                        <option value="Bulgaria" <?php if($country == "Bulgaria"){echo 'selected="selected"';}?> >Bulgaria</option>
                                        <option value="Burkina Faso" <?php if($country == "Burkina Faso"){echo 'selected="selected"';}?> >Burkina Faso</option>
                                        <option value="Burundi" <?php if($country == "Burundi"){echo 'selected="selected"';}?> >Burundi</option>
                                        <option value="Cambodia" <?php if($country == "Cambodia"){echo 'selected="selected"';}?> >Cambodia</option>
                                        <option value="Cameroon" <?php if($country == "Cameroon"){echo 'selected="selected"';}?> >Cameroon</option>
                                        <option value="Canada" <?php if($country == "Canada"){echo 'selected="selected"';}?> >Canada</option>
                                        <option value="Canary Islands" <?php if($country == "Canary Islands"){echo 'selected="selected"';}?> >Canary Islands</option>
                                        <option value="Cape Verde" <?php if($country == "Cape Verde"){echo 'selected="selected"';}?> >Cape Verde</option>
                                        <option value="Cayman Islands" <?php if($country == "Cayman Islands"){echo 'selected="selected"';}?> >Cayman Islands</option>
                                        <option value="Central African Republic" <?php if($country == "Central African Republic"){echo 'selected="selected"';}?> >Central African Republic</option>
                                        <option value="Chad" <?php if($country == "Chad"){echo 'selected="selected"';}?> >Chad</option>
                                        <option value="Channel Islands" <?php if($country == "Channel Islands"){echo 'selected="selected"';}?> >Channel Islands</option>
                                        <option value="Chile" <?php if($country == "Chile"){echo 'selected="selected"';}?> >Chile</option>
                                        <option value="China" <?php if($country == "China"){echo 'selected="selected"';}?> >China</option>
                                        <option value="Christmas Island" <?php if($country == "Christmas Island"){echo 'selected="selected"';}?> >Christmas Island</option>
                                        <option value="Cocos Island" <?php if($country == "Cocos Island"){echo 'selected="selected"';}?> >Cocos Island</option>
                                        <option value="Colombia" <?php if($country == "Colombia"){echo 'selected="selected"';}?> >Colombia</option>
                                        <option value="Comoros" <?php if($country == "Comoros"){echo 'selected="selected"';}?> >Comoros</option>
                                        <option value="Congo" <?php if($country == "Congo"){echo 'selected="selected"';}?> >Congo</option>
                                        <option value="Cook Islands" <?php if($country == "Cook Islands"){echo 'selected="selected"';}?> >Cook Islands</option>
                                        <option value="Costa Rica" <?php if($country == "Costa Rica"){echo 'selected="selected"';}?> >Costa Rica</option>
                                        <option value="Cote DIvoire" <?php if($country == "Cote DIvoire"){echo 'selected="selected"';}?> >Cote D'Ivoire</option>
                                        <option value="Croatia" <?php if($country == "Croatia"){echo 'selected="selected"';}?> >Croatia</option>
                                        <option value="Cuba" <?php if($country == "Cuba"){echo 'selected="selected"';}?> >Cuba</option>
                                        <option value="Curaco" <?php if($country == "Curaco"){echo 'selected="selected"';}?> >Curacao</option>
                                        <option value="Cyprus" <?php if($country == "Cyprus"){echo 'selected="selected"';}?> >Cyprus</option>
                                        <option value="Czech Republic" <?php if($country == "Czech Republic"){echo 'selected="selected"';}?> >Czech Republic</option>
                                        <option value="Denmark" <?php if($country == "Denmark"){echo 'selected="selected"';}?> >Denmark</option>
                                        <option value="Djibouti" <?php if($country == "Djibouti"){echo 'selected="selected"';}?> >Djibouti</option>
                                        <option value="Dominica" <?php if($country == "Dominica"){echo 'selected="selected"';}?> >Dominica</option>
                                        <option value="Dominican Republic" <?php if($country == "Dominican Republic"){echo 'selected="selected"';}?> >Dominican Republic</option>
                                        <option value="East Timor" <?php if($country == "East Timor"){echo 'selected="selected"';}?> >East Timor</option>
                                        <option value="Ecuador" <?php if($country == "Ecuador"){echo 'selected="selected"';}?> >Ecuador</option>
                                        <option value="Egypt" <?php if($country == "Egypt"){echo 'selected="selected"';}?> >Egypt</option>
                                        <option value="El Salvador" <?php if($country == "El Salvador"){echo 'selected="selected"';}?> >El Salvador</option>
                                        <option value="Equatorial Guinea" <?php if($country == "Equatorial Guinea"){echo 'selected="selected"';}?> >Equatorial Guinea</option>
                                        <option value="Eritrea" <?php if($country == "Eritrea"){echo 'selected="selected"';}?> >Eritrea</option>
                                        <option value="Estonia" <?php if($country == "Estonia"){echo 'selected="selected"';}?> >Estonia</option>
                                        <option value="Ethiopia" <?php if($country == "Ethiopia"){echo 'selected="selected"';}?> >Ethiopia</option>
                                        <option value="Falkland Islands" <?php if($country == "Falkland Islands"){echo 'selected="selected"';}?> >Falkland Islands</option>
                                        <option value="Faroe Islands" <?php if($country == "Faroe Islands"){echo 'selected="selected"';}?> >Faroe Islands</option>
                                        <option value="Fiji" <?php if($country == "Fiji"){echo 'selected="selected"';}?> >Fiji</option>
                                        <option value="Finland" <?php if($country == "Finland"){echo 'selected="selected"';}?> >Finland</option>
                                        <option value="France" <?php if($country == "France"){echo 'selected="selected"';}?> >France</option>
                                        <option value="French Guiana" <?php if($country == "French Guiana"){echo 'selected="selected"';}?> >French Guiana</option>
                                        <option value="French Polynesia" <?php if($country == "French Polynesia"){echo 'selected="selected"';}?> >French Polynesia</option>
                                        <option value="French Southern Ter" <?php if($country == "French Southern Ter"){echo 'selected="selected"';}?> >French Southern Ter</option>
                                        <option value="Gabon" <?php if($country == "Gabon"){echo 'selected="selected"';}?> >Gabon</option>
                                        <option value="Gambia" <?php if($country == "Gambia"){echo 'selected="selected"';}?> >Gambia</option>
                                        <option value="Georgia" <?php if($country == "Georgia"){echo 'selected="selected"';}?> >Georgia</option>
                                        <option value="Germany" <?php if($country == "Germany"){echo 'selected="selected"';}?> >Germany</option>
                                        <option value="Ghana" <?php if($country == "Ghana"){echo 'selected="selected"';}?> >Ghana</option>
                                        <option value="Gibraltar" <?php if($country == "Gibraltar"){echo 'selected="selected"';}?> >Gibraltar</option>
                                        <option value="Great Britain" <?php if($country == "Great Britain"){echo 'selected="selected"';}?> >Great Britain</option>
                                        <option value="Greece" <?php if($country == "Greece"){echo 'selected="selected"';}?> >Greece</option>
                                        <option value="Greenland" <?php if($country == "Greenland"){echo 'selected="selected"';}?> >Greenland</option>
                                        <option value="Grenada" <?php if($country == "Grenada"){echo 'selected="selected"';}?> >Grenada</option>
                                        <option value="Guadeloupe" <?php if($country == "Guadeloupe"){echo 'selected="selected"';}?> >Guadeloupe</option>
                                        <option value="Guam" <?php if($country == "Guam"){echo 'selected="selected"';}?> >Guam</option>
                                        <option value="Guatemala" <?php if($country == "Guatemala"){echo 'selected="selected"';}?> >Guatemala</option>
                                        <option value="Guinea" <?php if($country == "Guinea"){echo 'selected="selected"';}?> >Guinea</option>
                                        <option value="Guyana" <?php if($country == "Guyana"){echo 'selected="selected"';}?> >Guyana</option>
                                        <option value="Haiti" <?php if($country == "Haiti"){echo 'selected="selected"';}?> >Haiti</option>
                                        <option value="Hawaii" <?php if($country == "Hawaii"){echo 'selected="selected"';}?> >Hawaii</option>
                                        <option value="Honduras" <?php if($country == "Honduras"){echo 'selected="selected"';}?> >Honduras</option>
                                        <option value="Hong Kong" <?php if($country == "Hong Kong"){echo 'selected="selected"';}?> >Hong Kong</option>
                                        <option value="Hungary" <?php if($country == "Hungary"){echo 'selected="selected"';}?> >Hungary</option>
                                        <option value="Iceland" <?php if($country == "Iceland"){echo 'selected="selected"';}?> >Iceland</option>
                                        <option value="India" <?php if($country == "India"){echo 'selected="selected"';}?> >India</option>
                                        <option value="Indonesia" <?php if($country == "Indonesia"){echo 'selected="selected"';}?> >Indonesia</option>
                                        <option value="Iran" <?php if($country == "Iran"){echo 'selected="selected"';}?> >Iran</option>
                                        <option value="Iraq" <?php if($country == "Iraq"){echo 'selected="selected"';}?> >Iraq</option>
                                        <option value="Ireland" <?php if($country == "Ireland"){echo 'selected="selected"';}?> >Ireland</option>
                                        <option value="Isle of Man" <?php if($country == "Isle of Man"){echo 'selected="selected"';}?> >Isle of Man</option>
                                        <option value="Israel" <?php if($country == "Israel"){echo 'selected="selected"';}?> >Israel</option>
                                        <option value="Italy" <?php if($country == "Italy"){echo 'selected="selected"';}?> >Italy</option>
                                        <option value="Jamaica" <?php if($country == "Jamaica"){echo 'selected="selected"';}?> >Jamaica</option>
                                        <option value="Japan" <?php if($country == "Japan"){echo 'selected="selected"';}?> >Japan</option>
                                        <option value="Jordan" <?php if($country == "Jordan"){echo 'selected="selected"';}?> >Jordan</option>
                                        <option value="Kazakhstan" <?php if($country == "Kazakhstan"){echo 'selected="selected"';}?> >Kazakhstan</option>
                                        <option value="Kenya" <?php if($country == "Kenya"){echo 'selected="selected"';}?> >Kenya</option>
                                        <option value="Kiribati" <?php if($country == "Kiribati"){echo 'selected="selected"';}?> >Kiribati</option>
                                        <option value="Korea North" <?php if($country == "Korea North"){echo 'selected="selected"';}?> >Korea North</option>
                                        <option value="Korea South" <?php if($country == "Korea South"){echo 'selected="selected"';}?> >Korea South</option>
                                        <option value="Kuwait" <?php if($country == "Kuwait"){echo 'selected="selected"';}?> >Kuwait</option>
                                        <option value="Kyrgyzstan" <?php if($country == "Kyrgyzstan"){echo 'selected="selected"';}?> >Kyrgyzstan</option>
                                        <option value="Laos" <?php if($country == "Laos"){echo 'selected="selected"';}?> >Laos</option>
                                        <option value="Latvia" <?php if($country == "Latvia"){echo 'selected="selected"';}?> >Latvia</option>
                                        <option value="Lebanon" <?php if($country == "Lebanon"){echo 'selected="selected"';}?> >Lebanon</option>
                                        <option value="Lesotho" <?php if($country == "Lesotho"){echo 'selected="selected"';}?> >Lesotho</option>
                                        <option value="Liberia" <?php if($country == "Liberia"){echo 'selected="selected"';}?> >Liberia</option>
                                        <option value="Libya" <?php if($country == "Libya"){echo 'selected="selected"';}?> >Libya</option>
                                        <option value="Liechtenstein" <?php if($country == "Liechtenstein"){echo 'selected="selected"';}?> >Liechtenstein</option>
                                        <option value="Lithuania" <?php if($country == "Lithuania"){echo 'selected="selected"';}?> >Lithuania</option>
                                        <option value="Luxembourg" <?php if($country == "Luxembourg"){echo 'selected="selected"';}?> >Luxembourg</option>
                                        <option value="Macau" <?php if($country == "Macau"){echo 'selected="selected"';}?> >Macau</option>
                                        <option value="Macedonia" <?php if($country == "Macedonia"){echo 'selected="selected"';}?> >Macedonia</option>
                                        <option value="Madagascar" <?php if($country == "Madagascar"){echo 'selected="selected"';}?> >Madagascar</option>
                                        <option value="Malaysia" <?php if($country == "Malaysia"){echo 'selected="selected"';}?> >Malaysia</option>
                                        <option value="Malawi" <?php if($country == "Malawi"){echo 'selected="selected"';}?> >Malawi</option>
                                        <option value="Maldives" <?php if($country == "Maldives"){echo 'selected="selected"';}?> >Maldives</option>
                                        <option value="Mali" <?php if($country == "Mali"){echo 'selected="selected"';}?> >Mali</option>
                                        <option value="Malta" <?php if($country == "Malta"){echo 'selected="selected"';}?> >Malta</option>
                                        <option value="Marshall Islands" <?php if($country == "Marshall Islands"){echo 'selected="selected"';}?> >Marshall Islands</option>
                                        <option value="Martinique" <?php if($country == "Martinique"){echo 'selected="selected"';}?> >Martinique</option>
                                        <option value="Mauritania" <?php if($country == "Mauritania"){echo 'selected="selected"';}?> >Mauritania</option>
                                        <option value="Mauritius" <?php if($country == "Mauritius"){echo 'selected="selected"';}?> >Mauritius</option>
                                        <option value="Mayotte" <?php if($country == "Mayotte"){echo 'selected="selected"';}?> >Mayotte</option>
                                        <option value="Mexico" <?php if($country == "Mexico"){echo 'selected="selected"';}?> >Mexico</option>
                                        <option value="Midway Islands" <?php if($country == "Midway Islands"){echo 'selected="selected"';}?> >Midway Islands</option>
                                        <option value="Moldova" <?php if($country == "Moldova"){echo 'selected="selected"';}?> >Moldova</option>
                                        <option value="Monaco" <?php if($country == "Monaco"){echo 'selected="selected"';}?> >Monaco</option>
                                        <option value="Mongolia" <?php if($country == "Mongolia"){echo 'selected="selected"';}?> >Mongolia</option>
                                        <option value="Montserrat" <?php if($country == "Montserrat"){echo 'selected="selected"';}?> >Montserrat</option>
                                        <option value="Morocco" <?php if($country == "Morocco"){echo 'selected="selected"';}?> >Morocco</option>
                                        <option value="Mozambique" <?php if($country == "Mozambique"){echo 'selected="selected"';}?> >Mozambique</option>
                                        <option value="Myanmar" <?php if($country == "Myanmar"){echo 'selected="selected"';}?> >Myanmar</option>
                                        <option value="Nambia" <?php if($country == "Nambia"){echo 'selected="selected"';}?> >Nambia</option>
                                        <option value="Nauru" <?php if($country == "Nauru"){echo 'selected="selected"';}?> >Nauru</option>
                                        <option value="Nepal" <?php if($country == "Nepal"){echo 'selected="selected"';}?> >Nepal</option>
                                        <option value="Netherland Antilles" <?php if($country == "Netherland Antilles"){echo 'selected="selected"';}?> >Netherland Antilles</option>
                                        <option value="Netherlands" <?php if($country == "Netherlands"){echo 'selected="selected"';}?> >Netherlands (Holland, Europe)</option>
                                        <option value="Nevis" <?php if($country == "Nevis"){echo 'selected="selected"';}?> >Nevis</option>
                                        <option value="New Caledonia" <?php if($country == "New Caledonia"){echo 'selected="selected"';}?> >New Caledonia</option>
                                        <option value="New Zealand" <?php if($country == "New Zealand"){echo 'selected="selected"';}?> >New Zealand</option>
                                        <option value="Nicaragua" <?php if($country == "Nicaragua"){echo 'selected="selected"';}?> >Nicaragua</option>
                                        <option value="Niger" <?php if($country == "Niger"){echo 'selected="selected"';}?> >Niger</option>
                                        <option value="Nigeria" <?php if($country == "Nigeria"){echo 'selected="selected"';}?> >Nigeria</option>
                                        <option value="Niue" <?php if($country == "Niue"){echo 'selected="selected"';}?> >Niue</option>
                                        <option value="Norfolk Island" <?php if($country == "Norfolk Island"){echo 'selected="selected"';}?> >Norfolk Island</option>
                                        <option value="Norway" <?php if($country == "Norway"){echo 'selected="selected"';}?> >Norway</option>
                                        <option value="Oman" <?php if($country == "Oman"){echo 'selected="selected"';}?> >Oman</option>
                                        <option value="Pakistan" <?php if($country == "Pakistan"){echo 'selected="selected"';}?> >Pakistan</option>
                                        <option value="Palau Island" <?php if($country == "Palau Island"){echo 'selected="selected"';}?> >Palau Island</option>
                                        <option value="Palestine" <?php if($country == "Palestine"){echo 'selected="selected"';}?> >Palestine</option>
                                        <option value="Panama" <?php if($country == "Panama"){echo 'selected="selected"';}?> >Panama</option>
                                        <option value="Papua New Guinea" <?php if($country == "Papua New Guinea"){echo 'selected="selected"';}?> >Papua New Guinea</option>
                                        <option value="Paraguay" <?php if($country == "Paraguay"){echo 'selected="selected"';}?> >Paraguay</option>
                                        <option value="Peru" <?php if($country == "Peru"){echo 'selected="selected"';}?> >Peru</option>
                                        <option value="Phillipines" <?php if($country == "Phillipines"){echo 'selected="selected"';}?> >Philippines</option>
                                        <option value="Pitcairn Island" <?php if($country == "Pitcairn Island"){echo 'selected="selected"';}?> >Pitcairn Island</option>
                                        <option value="Poland" <?php if($country == "Poland"){echo 'selected="selected"';}?> >Poland</option>
                                        <option value="Portugal" <?php if($country == "Portugal"){echo 'selected="selected"';}?> >Portugal</option>
                                        <option value="Puerto Rico" <?php if($country == "Puerto Rico"){echo 'selected="selected"';}?> >Puerto Rico</option>
                                        <option value="Qatar" <?php if($country == "Qatar"){echo 'selected="selected"';}?> >Qatar</option>
                                        <option value="Republic of Montenegro" <?php if($country == "Republic of Montenegro"){echo 'selected="selected"';}?> >Republic of Montenegro</option>
                                        <option value="Republic of Serbia" <?php if($country == "Republic of Serbia"){echo 'selected="selected"';}?> >Republic of Serbia</option>
                                        <option value="Reunion" <?php if($country == "Reunion"){echo 'selected="selected"';}?> >Reunion</option>
                                        <option value="Romania" <?php if($country == "Romania"){echo 'selected="selected"';}?> >Romania</option>
                                        <option value="Russia" <?php if($country == "Russia"){echo 'selected="selected"';}?> >Russia</option>
                                        <option value="Rwanda" <?php if($country == "Rwanda"){echo 'selected="selected"';}?> >Rwanda</option>
                                        <option value="St Barthelemy" <?php if($country == "St Barthelemy"){echo 'selected="selected"';}?> >St Barthelemy</option>
                                        <option value="St Eustatius" <?php if($country == "St Eustatius"){echo 'selected="selected"';}?> >St Eustatius</option>
                                        <option value="St Helena" <?php if($country == "St Helena"){echo 'selected="selected"';}?> >St Helena</option>
                                        <option value="St Kitts-Nevis" <?php if($country == "St Kitts-Nevis"){echo 'selected="selected"';}?> >St Kitts-Nevis</option>
                                        <option value="St Lucia" <?php if($country == "St Lucia"){echo 'selected="selected"';}?> >St Lucia</option>
                                        <option value="St Maarten" <?php if($country == "St Maarten"){echo 'selected="selected"';}?> >St Maarten</option>
                                        <option value="St Pierre &amp; Miquelon" <?php if($country == "St Pierre &amp; Miquelon"){echo 'selected="selected"';}?> >St Pierre &amp; Miquelon</option>
                                        <option value="St Vincent &amp; Grenadines" <?php if($country == "St Vincent &amp; Grenadines"){echo 'selected="selected"';}?> >St Vincent &amp; Grenadines</option>
                                        <option value="Saipan" <?php if($country == "Saipan"){echo 'selected="selected"';}?> >Saipan</option>
                                        <option value="Samoa" <?php if($country == "Samoa"){echo 'selected="selected"';}?> >Samoa</option>
                                        <option value="Samoa American" <?php if($country == "Samoa American"){echo 'selected="selected"';}?> >Samoa American</option>
                                        <option value="San Marino" <?php if($country == "San Marino"){echo 'selected="selected"';}?> >San Marino</option>
                                        <option value="Sao Tome &amp; Principe" <?php if($country == "Sao Tome &amp; Principe"){echo 'selected="selected"';}?> >Sao Tome &amp; Principe</option>
                                        <option value="Saudi Arabia" <?php if($country == "Saudi Arabia"){echo 'selected="selected"';}?> >Saudi Arabia</option>
                                        <option value="Senegal" <?php if($country == "Senegal"){echo 'selected="selected"';}?> >Senegal</option>
                                        <option value="Serbia" <?php if($country == "Serbia"){echo 'selected="selected"';}?> >Serbia</option>
                                        <option value="Seychelles" <?php if($country == "Seychelles"){echo 'selected="selected"';}?> >Seychelles</option>
                                        <option value="Sierra Leone" <?php if($country == "Sierra Leone"){echo 'selected="selected"';}?> >Sierra Leone</option>
                                        <option value="Singapore" <?php if($country == "Singapore"){echo 'selected="selected"';}?> >Singapore</option>
                                        <option value="Slovakia" <?php if($country == "Slovakia"){echo 'selected="selected"';}?> >Slovakia</option>
                                        <option value="Slovenia" <?php if($country == "Slovenia"){echo 'selected="selected"';}?> >Slovenia</option>
                                        <option value="Solomon Islands" <?php if($country == "Solomon Islands"){echo 'selected="selected"';}?> >Solomon Islands</option>
                                        <option value="Somalia" <?php if($country == "Somalia"){echo 'selected="selected"';}?> >Somalia</option>
                                        <option value="South Africa" <?php if($country == "South Africa"){echo 'selected="selected"';}?> >South Africa</option>
                                        <option value="Spain" <?php if($country == "Spain"){echo 'selected="selected"';}?> >Spain</option>
                                        <option value="Sri Lanka" <?php if($country == "Sri Lanka"){echo 'selected="selected"';}?> >Sri Lanka</option>
                                        <option value="Sudan" <?php if($country == "Sudan"){echo 'selected="selected"';}?> >Sudan</option>
                                        <option value="Suriname" <?php if($country == "Suriname"){echo 'selected="selected"';}?> >Suriname</option>
                                        <option value="Swaziland" <?php if($country == "Swaziland"){echo 'selected="selected"';}?> >Swaziland</option>
                                        <option value="Sweden" <?php if($country == "Sweden"){echo 'selected="selected"';}?> >Sweden</option>
                                        <option value="Switzerland" <?php if($country == "Switzerland"){echo 'selected="selected"';}?> >Switzerland</option>
                                        <option value="Syria" <?php if($country == "Syria"){echo 'selected="selected"';}?> >Syria</option>
                                        <option value="Tahiti" <?php if($country == "Tahiti"){echo 'selected="selected"';}?> >Tahiti</option>
                                        <option value="Taiwan" <?php if($country == "Taiwan"){echo 'selected="selected"';}?> >Taiwan</option>
                                        <option value="Tajikistan" <?php if($country == "Tajikistan"){echo 'selected="selected"';}?> >Tajikistan</option>
                                        <option value="Tanzania" <?php if($country == "Tanzania"){echo 'selected="selected"';}?> >Tanzania</option>
                                        <option value="Thailand" <?php if($country == "Thailand"){echo 'selected="selected"';}?> >Thailand</option>
                                        <option value="Togo" <?php if($country == "Togo"){echo 'selected="selected"';}?> >Togo</option>
                                        <option value="Tokelau" <?php if($country == "Tokelau"){echo 'selected="selected"';}?> >Tokelau</option>
                                        <option value="Tonga" <?php if($country == "Tonga"){echo 'selected="selected"';}?> >Tonga</option>
                                        <option value="Trinidad &amp; Tobago" <?php if($country == "Trinidad &amp; Tobago"){echo 'selected="selected"';}?> >Trinidad &amp; Tobago</option>
                                        <option value="Tunisia" <?php if($country == "Tunisia"){echo 'selected="selected"';}?> >Tunisia</option>
                                        <option value="Turkey" <?php if($country == "Turkey"){echo 'selected="selected"';}?> >Turkey</option>
                                        <option value="Turkmenistan" <?php if($country == "Turkmenistan"){echo 'selected="selected"';}?> >Turkmenistan</option>
                                        <option value="Turks &amp; Caicos Is" <?php if($country == "Turks &amp; Caicos Is"){echo 'selected="selected"';}?> >Turks &amp; Caicos Is</option>
                                        <option value="Tuvalu" <?php if($country == "Tuvalu"){echo 'selected="selected"';}?> >Tuvalu</option>
                                        <option value="Uganda" <?php if($country == "Uganda"){echo 'selected="selected"';}?> >Uganda</option>
                                        <option value="Ukraine" <?php if($country == "Ukraine"){echo 'selected="selected"';}?> >Ukraine</option>
                                        <option value="United Arab Erimates" <?php if($country == "United Arab Erimates"){echo 'selected="selected"';}?> >United Arab Emirates</option>
                                        <option value="United Kingdom" <?php if($country == "United Kingdom"){echo 'selected="selected"';}?> >United Kingdom</option>
                                        <option value="United States of America" <?php if($country == "United States of America"){echo 'selected="selected"';}?> >United States of America</option>
                                        <option value="Uraguay" <?php if($country == "Uraguay"){echo 'selected="selected"';}?> >Uruguay</option>
                                        <option value="Uzbekistan" <?php if($country == "Uzbekistan"){echo 'selected="selected"';}?> >Uzbekistan</option>
                                        <option value="Vanuatu" <?php if($country == "Vanuatu"){echo 'selected="selected"';}?> >Vanuatu</option>
                                        <option value="Vatican City State" <?php if($country == "Vatican City State"){echo 'selected="selected"';}?> >Vatican City State</option>
                                        <option value="Venezuela" <?php if($country == "Venezuela"){echo 'selected="selected"';}?> >Venezuela</option>
                                        <option value="Vietnam" <?php if($country == "Vietnam"){echo 'selected="selected"';}?> >Vietnam</option>
                                        <option value="Virgin Islands (Brit)" <?php if($country == "Virgin Islands (Brit)"){echo 'selected="selected"';}?> >Virgin Islands (Brit)</option>
                                        <option value="Virgin Islands (USA)" <?php if($country == "Virgin Islands (USA)"){echo 'selected="selected"';}?> >Virgin Islands (USA)</option>
                                        <option value="Wake Island" <?php if($country == "Wake Island"){echo 'selected="selected"';}?> >Wake Island</option>
                                        <option value="Wallis &amp; Futana Is" <?php if($country == "Wallis &amp; Futana Is"){echo 'selected="selected"';}?> >Wallis &amp; Futana Is</option>
                                        <option value="Yemen" <?php if($country == "Yemen"){echo 'selected="selected"';}?> >Yemen</option>
                                        <option value="Zaire" <?php if($country == "Zaire"){echo 'selected="selected"';}?> >Zaire</option>
                                        <option value="Zambia" <?php if($country == "Zambia"){echo 'selected="selected"';}?> >Zambia</option>
                                        <option value="Zimbabwe" <?php if($country == "Zimbabwe"){echo 'selected="selected"';}?> >Zimbabwe</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-12">
                                <p style="font-family:Roboto, sans-serif;font-size:12px;font-weight:bold;">Home Town (Optional).</p>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="town" value="<?php echo $town;?>" placeholder="Enter Home Town (Optional)" style="margin-left:0px;">
                                    <span class="input-group-addon">
                                        <i class="fa fa-home"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px; text-align:center; padding-top:24px;">
                            <div class="col-md-12">
                                <button type="submit" name="submit" style="padding:5px 20px;color:rgb(1,1,1);">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="../../../assets/js/jquery.min.js"></script>
    <script src="../../../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="../../../assets/js/ebs-simple-login-form.js"></script>
    <script src="../../../assets/js/JLX-Fixed-Nav-on-Scroll.js"></script>
    <script src="../../../assets/js/Profile-Edit.js"></script>
    <script src="../../../assets/js/Sidebar-Menu.js"></script>
    <script src="ajax.js"></script>
    <script type="text/javascript" src="../../../assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>   
    <script type="text/javascript" src="../../../assets/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
</body>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });
	$('.form_date').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	$('.form_time').datetimepicker({
        language:  'fr',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 1,
		minView: 0,
		maxView: 1,
		forceParse: 0
    });
</script>
</html>