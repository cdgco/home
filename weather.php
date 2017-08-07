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
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">
        <!--Custom Font-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
        <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
        <script src="js/sweetalert.min.js"></script>
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
                                    <h3>Please Verify Location: <?php echo $_POST['city']; ?>, <span id="sid2"></span></h3>
                                    <form action="<?php echo DIR ?>weather2.php" method="post">
                                        <input type="hidden" id="sid" name="state" />
                                        <input type="hidden" id="cid" value="<?php echo $_POST['city']; ?>" name="city" />
                                        <br>
                                        <button type="submit" class="btn btn-primary">Verify</button>
                                    </form>
                                    <script>
                                    var response = abbrState('<?php echo $_POST['state']; ?>', 'abbr');
                                    function abbrState(input, to){

                                        var states = [
                                            ['Arizona', 'AZ'],
                                            ['Alabama', 'AL'],
                                            ['Alaska', 'AK'],
                                            ['Arizona', 'AZ'],
                                            ['Arkansas', 'AR'],
                                            ['California', 'CA'],
                                            ['Colorado', 'CO'],
                                            ['Connecticut', 'CT'],
                                            ['Delaware', 'DE'],
                                            ['Florida', 'FL'],
                                            ['Georgia', 'GA'],
                                            ['Hawaii', 'HI'],
                                            ['Idaho', 'ID'],
                                            ['Illinois', 'IL'],
                                            ['Indiana', 'IN'],
                                            ['Iowa', 'IA'],
                                            ['Kansas', 'KS'],
                                            ['Kentucky', 'KY'],
                                            ['Kentucky', 'KY'],
                                            ['Louisiana', 'LA'],
                                            ['Maine', 'ME'],
                                            ['Maryland', 'MD'],
                                            ['Massachusetts', 'MA'],
                                            ['Michigan', 'MI'],
                                            ['Minnesota', 'MN'],
                                            ['Mississippi', 'MS'],
                                            ['Missouri', 'MO'],
                                            ['Montana', 'MT'],
                                            ['Nebraska', 'NE'],
                                            ['Nevada', 'NV'],
                                            ['New Hampshire', 'NH'],
                                            ['New Jersey', 'NJ'],
                                            ['New Mexico', 'NM'],
                                            ['New York', 'NY'],
                                            ['North Carolina', 'NC'],
                                            ['North Dakota', 'ND'],
                                            ['Ohio', 'OH'],
                                            ['Oklahoma', 'OK'],
                                            ['Oregon', 'OR'],
                                            ['Pennsylvania', 'PA'],
                                            ['Rhode Island', 'RI'],
                                            ['South Carolina', 'SC'],
                                            ['South Dakota', 'SD'],
                                            ['Tennessee', 'TN'],
                                            ['Texas', 'TX'],
                                            ['Utah', 'UT'],
                                            ['Vermont', 'VT'],
                                            ['Virginia', 'VA'],
                                            ['Washington', 'WA'],
                                            ['West Virginia', 'WV'],
                                            ['Wisconsin', 'WI'],
                                            ['Wyoming', 'WY'],
                                        ];
                                        if (to == 'abbr'){
                                            input = input.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
                                            for(i = 0; i < states.length; i++){
                                                if(states[i][0] == input){
                                                return(states[i][1]);
                                                }
                                            }    
                                        } 
                                    }
                                    document.getElementById("sid").value = response;
                                    document.getElementById("sid2").innerHTML = response;
                                    </script>
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
            <script src="js/chart.min.js"></script>
            <script src="js/chart-data.js"></script>
            <script src="js/easypiechart.js"></script>
            <script src="js/easypiechart-data.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
            <script src="js/custom.js"></script>
            <script>
                window.onload = function () {
                    var chart1 = document.getElementById("line-chart").getContext("2d");
                    window.myLine = new Chart(chart1).Line(lineChartData, {
                        responsive: true
                        , scaleLineColor: "rgba(0,0,0,.2)"
                        , scaleGridLineColor: "rgba(0,0,0,.05)"
                        , scaleFontColor: "#c5c7cc"
                    });
                };
            </script>
    </body>

    </html>
