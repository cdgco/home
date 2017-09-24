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
        <title>CDG Home - Preferences</title>
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
                    <li><a href="account.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                    <li><a href="accontent.php"><em class="fa fa-edit">&nbsp;</em> Custom Content</a></li>
                    <li><a href="acbg.php"><em class="fa fa-image">&nbsp;</em> Custom Background</a></li>
                    <li><a href="aclocation.php"><em class="fa fa-map-marker">&nbsp;</em> Custom Location</a></li>
                    <li class="active"><a href="acpref.php"><em class="fa fa-gear">&nbsp;</em> Preferences</a></li>
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
                        <li id="refresh" class="active">Preferences</li>
                    </ol>
                </div>
                <!--/.row-->
                <div class="row">
                    <div class="col-lg-12">
                        <br> </div>
                </div>
                <!--/.row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-md-6">
                                    <h3>Page Refresh Rate: 
                                        <?php 

                                        $sql = sprintf("SELECT refreshname FROM members WHERE memberID = '%s'",
                                                    mysql_real_escape_string($memid));
                                        $res=mysql_query($sql);
                                        $userRow=mysql_fetch_row($res);

                                        print_r($userRow[0]);
                                        ?>
                                    </h3>
                                    <hr>
                                    <h4>Set Refresh Rate:</h4>
                                    <form action="<?php echo DIR ?>refresh.php" method="post">
                                        <select class="form-control" name="rtime">
                                            <option value="60000|1 Minute">1 Minute</option>
                                            <option value="300000|5 Minutes">5 Minutes</option>
                                            <option value="600000|10 Minutes">10 Minutes</option>
                                            <option value="900000|15 Minutes">15 Minutes</option>
                                            <option value="1800000|30 Minutes">30 Minutes</option>
                                            <option value="3600000|1 Hour">1 Hour</option>
                                        </select>
                                        <br>
                                        <br>
                                        <button type="submit" id="theme" class="btn btn-primary">Change</button>
                                    </form>
                                    <hr>
                                    <h3>Current Style: 
                                        <?php 

                                          $sql = sprintf("SELECT style FROM members WHERE memberID = '%s'",
                                                    mysql_real_escape_string($memid));
                                          $res=mysql_query($sql);
                                          $userRow=mysql_fetch_row($res);
                                          $style1 = $userRow[0];

                                          if ($style1 == l) { echo "Light Theme";}
                                          else { echo "Dark Theme"; } 

                                        ?>
                                    </h3>
                                    <hr>
                                    <h4>Change Default Style:</h4>
                                    <form action="<?php echo DIR ?>style.php" method="post">
                                        <input type="radio" name="style" value="l"> Light Theme</input>
                                        <br>
                                        <input type="radio" name="style" value="d"> Dark Theme</input>
                                        <br>
                                        <br>
                                        <button type="submit" id="clock" class="btn btn-primary">Change</button>
                                    </form>
                                    <hr>
                                    <h3>Current Clock Format: 
                                        <?php 

                                          $sql = sprintf("SELECT clockname FROM members WHERE memberID = '%s'",
                                                    mysql_real_escape_string($memid));
                                          $res=mysql_query($sql);
                                          $userRow=mysql_fetch_row($res);

                                          print_r($userRow[0]);
                                        ?>
                                    </h3>
                                    <hr>
                                    <h4>Change Clock Format:</h4>
                                    <form action="<?php echo DIR ?>clock.php" method="post">
                                        <input type="radio" name="newclock" value="12|12 Hour"> 12 Hour</input>
                                        <br>
                                        <input type="radio" name="newclock" value="24|24 Hour"> 24 Hour</input>
                                        <br>
                                        <br>
                                        <button id="temp" type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    <hr>
                                    <h3>Current Temperature Format: 
                                        <?php 

                                            $sql = sprintf("SELECT temp FROM members WHERE memberID = '%s'",
                                                    mysql_real_escape_string($memid));
                                            $res=mysql_query($sql);
                                            $userRow=mysql_fetch_row($res);
                                            $temp1 = $userRow[0];

                                            if ($temp1 == "f") { echo "Fahrenheit"; }
                                            elseif ($temp1 == "c") { echo "Celsius"; }
                                        ?>
                                    </h3>
                                    <hr>
                                    <h4>Change Temperature Format:</h4>
                                    <form action="<?php echo DIR ?>temp.php" method="post">
                                        <input type="radio" name="temp" value="f"> Fahrenheit</input>
                                        <br>
                                        <input type="radio" name="temp" value="c"> Celsius</input>
                                        <br>
                                        <br>
                                        <button id="gmail" type="submit" class="btn btn-primary">Change</button>
                                    </form>
                                    <hr>
                                    <h3>Gmail Integration: <?php 

                                          $sql = sprintf("SELECT gmail FROM members WHERE memberID ='%s'",
                                                  mysql_real_escape_string($memid));
                                          $res=mysql_query($sql);
                                          $userRow=mysql_fetch_row($res);
                                          $gstat = $userRow[0];

                                          if ($gstat == "no") { echo "Disabled"; }
                                          if ($gstat == "yes") { echo "Enabled"; }
                                    ?></h3>
                                    <hr>
                                    <h4 id="email">Connect Gmail Account (Authorize Here Once, Quick-Login From Front Page):</h4>
                                    <?php 
                                        $sql = sprintf("SELECT tstat FROM members WHERE memberID = '%s'",
                                                  mysql_real_escape_string($memid));
                                        $res=mysql_query($sql);
                                        $userRow=mysql_fetch_row($res);
                                        $tstat = $userRow[0];

                                        if ($gstat == "no") { echo '<form action="' . DIR . 'includes/gmail.php"><input id="red" style="color:white;width: 100%;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;color:#ffffff; font-weight:bold; background-color:#4285F4;" type="submit" value="Login with Google" /></form>'; }
                                        if ($gstat == "yes") { echo '<form action="' . DIR . 'disconnect.php"><input id="red" style="width: 100%;color:white;padding: 14px 20px;margin: 8px 0;border: none;border-radius: 4px;cursor: pointer;background-color: #e74c3c;" type="submit" value="Disconnect" /></form>'; }
                                    ?>
<br>
                                        <br> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-->
                </div>
            </div>
            <!--/.main-->
            <script src="js/jquery-1.11.1.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/custom.js"></script>
    </body>

    </html>