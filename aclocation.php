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
        <title>CDG Home - Custom Location</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
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
                    <li class="active"><a href="aclocation.php"><em class="fa fa-map-marker">&nbsp;</em> Custom Location</a></li>
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
                        <li class="active">Custom Location</li>
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
                                    <h3>Custom Location: 
                                        <?php 
 
                                        $sql = sprintf("SELECT CustomLocation FROM members WHERE memberID = '%s'",
                                                  mysql_real_escape_string($memid));
                                        $res=mysql_query($sql);
                                        $userRow=mysql_fetch_row($res);
                                        $result1 = $userRow[0];

                                        if ($result1 == "N") {echo "Disabled";}
                                        else {echo "Enabled";

                                              $sql = sprintf("SELECT city FROM members WHERE memberID = '%s'",
                                                        mysql_real_escape_string($memid));
                                              $res=mysql_query($sql);
                                              $userRow=mysql_fetch_row($res);

                                              print_r('&nbsp;-&nbsp;'.$userRow[0]);

                                              $sql = sprintf("SELECT state FROM members WHERE memberID = '%s'",
                                                        mysql_real_escape_string($memid));
                                              $res=mysql_query($sql);
                                              $userRow=mysql_fetch_row($res);

                                              print_r(',&nbsp;'.$userRow[0]);}

                                        ?><hr>
                                        <h4>Change Weather Location:</h3>
                                    <form action="<?php echo DIR ?>location.php" method="post">
                                        <input type="radio" name="customlocation" value="N"> Current Location</input>
                                        <br>
                                        <input type="radio" name="customlocation" onclick="window.location='selectweather.php';"> Custom Location</input>
                                        <br>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <hr>
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