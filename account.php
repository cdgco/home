<?php require('includes/vars.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 
require('includes/dbconnect.php');
?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CDG Home - Dashboard</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/cpanel.css" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        <script async src="js/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/sweetalert.css"> </head>

    <body>
        <?php 
            $swal = $_GET['s'];
            if ($swal == "s") {echo '<script>swal("Success!", "Setting Updated Successfully!", "success")</script>'; }
            if ($swal == "e") {echo '<script>swal("Oops...", "Try Again or Contact Support. Error: ' .  $_GET['e'] . '.", "error")</script>'; }
            ?>
            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="#"><span>CDG Home</span> Dashboard</a> </div>
                </div>
                <!-- /.container-fluid -->
            </nav>
            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
                <div class="profile-sidebar">
                    <div class="profile-userpic"> <img src="img/personal.png" class="img-responsive" alt=""> </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            <?php echo $uname; ?>
                        </div>
                        <div class="profile-usertitle-status"><span class="indicator label-success"></span>Active</div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="divider"></div>
                <ul class="nav menu">
                    <li class="active"><a href="account.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                    <li><a href="accontent.php"><em class="fa fa-edit">&nbsp;</em> Custom Content</a></li>
                    <li><a href="acbg.php"><em class="fa fa-image">&nbsp;</em> Custom Background</a></li>
                    <li><a href="aclocation.php"><em class="fa fa-map-marker">&nbsp;</em> Custom Location</a></li>
                    <li><a href="acpref.php"><em class="fa fa-gear">&nbsp;</em> Preferences</a></li>
                    <li><a href="index.php"><em class="fa fa-home">&nbsp;</em> Home</a></li>
                    <li><a href="logout.php"><em class="fa fa-sign-out">&nbsp;</em> Logout</a></li>
                </ul>
            </div>
            <!--/.sidebar-->
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                <div class="row">
                    <ol class="breadcrumb">
                        <li>
                            <a href="#"> <em class="fa fa-home"></em> </a>
                        </li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
                <!--/.row-->
                <div class="row">
                    <div class="col-lg-12">
                        <br> </div>
                </div>
                <!--/.row-->
                <div class="alert bg-success" role="alert">Current News Source: <b><?php 

$sql = sprintf("SELECT sourcename FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r($userRow[0]);
?></b> <a href="accontent.php#news" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-success" role="alert">Current Spotify Playlist: <b><?php 

$sql = sprintf("SELECT spotname FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r($userRow[0]);
?></b> <a href="accontent.php#spotify" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-success" role="alert">Custom Stock Ticker: <b><?php 

$sql = sprintf("SELECT stocks FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$stock1 = $userRow[0];

if (empty($stock1)) { echo "Disabled"; }
else { echo "Enabled"; }
?></b> <a href="accontent.php#stock" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-info" role="alert">Custom Background: <b><?php 

$sql = sprintf("SELECT bg FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$bgstat = $userRow[0];

if ($bgstat == "y") { echo "Enabled"; }
elseif ($bgstat == "n") { echo "Disabled"; }
?></b> <a href="acbg.php" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-info" role="alert">Current Location: <b><?php 

$sql = sprintf("SELECT CustomLocation FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$result1 = $userRow[0];

if ($result1 == "N") {echo "Disabled";}
else {echo "Enabled";
$sql = sprintf("SELECT city FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r('&nbsp;-&nbsp;'.$userRow[0]);

$sql = sprintf("SELECT state FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r(',&nbsp;'.$userRow[0]);}

?></b> <a href="aclocation.php" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-teal" role="alert">Page Refresh Rate: <b><?php 

$sql = sprintf("SELECT refreshname FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r($userRow[0]);
?></b> <a href="acpref.php#refresh" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-teal" role="alert">Current Style: <b><?php 

$sql = sprintf("SELECT style FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$style1 = $userRow[0];

if ($style1 == 'l') { echo "Light Theme";}
else { echo "Dark Theme"; } 

?></b> <a href="acpref.php#theme" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-teal" role="alert">Time Format: <b><?php 

$sql = sprintf("SELECT clockname FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);

print_r($userRow[0]);
?></b> <a href="acpref.php#clock" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-teal" role="alert">Temperature Format: <b><?php 

$sql = sprintf("SELECT temp FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$temp1 = $userRow[0];

if ($temp1 == "f") { echo "Fahrenheit"; }
elseif ($temp1 == "c") { echo "Celsius"; }
?></b> <a href="acpref.php#temp" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
                <div class="alert bg-teal" role="alert">Gmail Integration: <b><?php 

$sql = sprintf("SELECT gmail FROM members WHERE memberID = '%s'",
          mysqli_real_escape_string($link, $memid));
$res=mysqli_query($link, $sql);
$userRow=mysqli_fetch_row($res);
$gstat = $userRow[0];

if ($gstat == "no") { echo "Disabled"; }
if ($gstat == "yes") { echo "Enabled"; }
?></b> <a href="acpref.php#gmail" class="pull-right"><em class="fa fa-lg fa-arrow-right"></em></a></div>
               
            </div>
            <!--/.main-->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/custom.js"></script>
    </body>

    </html>