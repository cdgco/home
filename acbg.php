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
    <title>CDG Home - Custom Background</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
    <script src="js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
</head>

<body>

            <?php 
            $swal = $_GET['s'];
            if ($swal == "s") {echo '<script>swal("Success!", "Setting Updated Successfully!", "success")</script>'; }
            if ($swal == "e") {echo '<script>swal("Oops...", "Try Again or Contact Support. Error: ' .  $_GET['e'] . '.", "error")</script>'; }
            ?>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
                <a class="navbar-brand" href="#"><span>CDG Home</span> Dashboard</a>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="img/personal.png" class="img-responsive" alt="">
            </div>
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
            <li class="active"><a href="acbg.php"><em class="fa fa-image">&nbsp;</em> Custom Background</a></li>
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
                    <a href="#">
                        <em class="fa fa-home"></em>
                    </a>
                </li>
                <li class="active">Custom Background</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <br>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">



                <div class="panel panel-default">

                    <div class="panel-body">
                        <div class="col-md-6">
                            <h3>Custom Background:
                                <?php 

                                $res=mysql_query("SELECT bg FROM members WHERE memberID = '$memid'");
                                $userRow=mysql_fetch_row($res);
                                $bgstat = $userRow[0];

                                if ($bgstat == "y") { 
                                    echo "Enabled";}
                                elseif ($bgstat == "n") { echo "Disabled"; }
                                ?>
                            </h3>
                            <hr>

                            <h4>Custom Background:</h4>
                            <form action="<?php echo DIR ?>bgoff.php" method="post">
                                <input type="radio" name="bg" onclick="window.location='bg.php';"> Set Custom Background</input><br>
                                <input type="radio" name="bg"> Disable</input>
                                <br><br><button type="submit" class="btn btn-primary">Change</button>
                            </form>
                            <br><br>
                        </div>


                    </div>
                </div>
            </div>
            <!-- /.panel-->
            <?php 
                $res=mysql_query("SELECT bgurl FROM members WHERE memberID = '$memid'");
                $userRow=mysql_fetch_row($res);
                $bg = $userRow[0];

                if ($bgstat == "y") { 
                echo '<div class="col-md-12">
				        <div class="panel panel-primary">
					       <div class="panel-heading">Background Preview<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span></div>
					       <div class="panel-body">
						      <img src="'. $bg .'" style="height:300px;">
					       </div>
				        </div>
			         </div><!--/.col-->';}
            ?>
        </div>



    </div>
    <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function() {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };

    </script>

</body>

</html>
