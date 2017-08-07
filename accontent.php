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
        <title>CDG Home - Custom Content</title>
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
                    <li class="active"><a href="accontent.php"><em class="fa fa-edit">&nbsp;</em> Custom Content</a></li>
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
                        <li id="news" class="active">Custom Content</li>
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
                                    <h3>Current News Source:
                                    <?php 

                                        $res=mysql_query("SELECT sourcename FROM members WHERE memberID = '$memid'");
                                        $userRow=mysql_fetch_row($res);

                                        print_r($userRow[0]);
                                        ?>
                            </h3>
                                    <hr>
                                    <h4>Set News Source:</h4>
                                    <form action="<?php echo DIR ?>source.php" method="post">
                                        <select class="form-control" name="newsource">
                                            <optgroup label="CNN">
                                                <option value="http://rss.cnn.com/rss/cnn_topstories.rss|CNN Top Stories">Top Stories</option>
                                                <option value="http://rss.cnn.com/rss/cnn_us.rss|CNN U.S. News">U.S. News</option>
                                                <option value="http://rss.cnn.com/rss/cnn_world.rss|CNN World News">World News</option>
                                                <option value="http://rss.cnn.com/rss/money_latest.rss|CNN Business">Business</option>
                                                <option value="http://rss.cnn.com/rss/cnn_allpolitics.rss|CNN Politics">Politics</option>
                                                <option value="http://rss.cnn.com/rss/cnn_tech.rss|CNN Technology">Technology</option>
                                                <option value="http://rss.cnn.com/rss/cnn_showbiz.rss|CNN Entertainment">Entertainment</option>
                                                <optgroup label="Fox News">
                                                    <option value="http://feeds.foxnews.com/foxnews/most-popular|Fox News Top Stories">Top Stories</option>
                                                    <option value="http://feeds.foxnews.com/foxnews/national|Fox U.S. News">U.S. News</option>
                                                    <option value="http://feeds.foxnews.com/foxnews/world|Fox World News">World News</option>
                                                    <option value="http://feeds.foxnews.com/foxnews/politics| Fox News Politics">Politics</option>
                                                    <option value="http://feeds.foxnews.com/foxnews/tech|Fox News Technology">Technology</option>
                                                    <option value="http://feeds.foxnews.com/foxnews/entertainment|Fox News Entertainment">Entertainment</option>
                                                    <optgroup label="BBC">
                                                        <option value="http://feeds.bbci.co.uk/news/rss.xml|BBC Top Stories">Top Stories</option>
                                                        <option value="http://feeds.bbci.co.uk/news/uk/rss.xml|BBC UK News">UK News</option>
                                                        <option value="http://feeds.bbci.co.uk/news/world/rss.xml|BBC World News">World News</option>
                                                        <option value="http://feeds.bbci.co.uk/news/politics/rss.xml|BBC Politics">Politics</option>
                                                        <option value="http://feeds.bbci.co.uk/news/technology/rss.xml|BBC Technology">Technology</option>
                                                        <option value="http://feeds.bbci.co.uk/news/entertainment_and_arts/rss.xml|BBC Entertainment">Entertainment</option>
                                                        <optgroup label="ESPN">
                                                            <option value="http://www.espn.com/espn/rss/news|ESPN Top Headlines">Top Headlines</option>
                                                            <option value="http://www.espn.com/espn/rss/nfl/news|ESPN - NFL Headlines">NFL Headlines</option>
                                                            <option value="http://www.espn.com/espn/rss/nba/news|ESPN - NBA Headlines">NBA Headlines</option>
                                                            <option value="http://www.espn.com/espn/rss/mlb/news|ESPN - MLB Headlines">MLB Headlines</option>
                                                            <option value="http://www.espn.com/espn/rss/nhl/news|ESPN - NHL Headlines">NHL Headlines</option>
                                                            <option value="http://www.espn.com/espn/rss/rpm/news|ESPN Motorsports">Motorsports</option>
                                                            <option value="http://soccernet.espn.com/rss/news|ESPN Soccer">Soccer</option>
                                                            <option value="http://www.espn.com/espn/rss/ncb/news|ESPN College Basketball">College Basketball</option>
                                                            <option value="http://www.espn.com/espn/rss/ncf/news|ESPN College Football">College Football</option>
                                                            <optgroup label="Techcrunch">
                                                                <option value="http://feeds.feedburner.com/TechCrunch/|TechCrunch Top Stories">Top Stories</option>
                                                                <option value="http://feeds.feedburner.com/TechCrunch/startups|TechCrunch Startups">TechCrunch Startups</option>
                                                                <option value="http://feeds.feedburner.com/TechCrunch/social|TechCrunch Social">TechCrunch Social</option>
                                                                <option value="http://feeds.feedburner.com/Mobilecrunch|TechCrunch Mobile">TechCrunch Mobile</option>
                                                                <option value="http://feeds.feedburner.com/crunchgear|TechCrunch Gadgets">TechCrunch Gadgets</option>
                                        </select>
                                        <br>
                                        <br>
                                        <button type="submit" id="spotify" class="btn btn-primary">Change</button>
                                    </form>
                                    <br>
                                    <hr>
                                    <h3>Edit Spotify Widget

                            </h3>
                                    <hr>
                                    <h4>Change Playlist URI:</h4>
                                    <form action="<?php echo DIR ?>spotify.php" method="post">
                                        <input class="form-control" type="text" value="<?php 

                                            $res=mysql_query(" SELECT spotify FROM members WHERE memberID='$memid' ");
                                            $userRow=mysql_fetch_row($res);

                                            print_r($userRow[0]);
                                        ?>" required name="spotify"></input>
                                        <br>
                                        <h4>Change Playlist Name:</h4>
                                        <input value="<?php 

                                                      $res=mysql_query(" SELECT spotname FROM members WHERE memberID='$memid' ");
                                                      $userRow=mysql_fetch_row($res);

                                                      print_r($userRow[0]);
                                                      ?>" class="form-control" type="text" required name="spotname"></input>
                                        <br>
                                        <br>
                                        <button type="submit" id="stock" class="btn btn-primary">Change</button>
                                    </form>
                                    <br>
                                    <hr>
                                    <h3>Custom Stock Ticker:
                                        <?php 

                                        $res=mysql_query("SELECT stocks FROM members WHERE memberID = '$memid'");
                                        $userRow=mysql_fetch_row($res);
                                        $stock1 = $userRow[0];

                                        if (empty($stock1)) { echo "Disabled"; }
                                        else { echo "Enabled"; }
                                        ?>
                            </h3>
                                    <hr>
                                    <h4>Create Custom Ticker:</h4>
                                    <form action="<?php echo DIR ?>ticker.php" name="stocks3" method="post">
                                        <input class="form-control" type="text" pattern="^[a-zA-Z,]*$" title="Letters & Commas Only!" maxlength="500" name="stocks" style="width:570px" placeholder="Enter valid comma-seperated symbols to create new ticker. Ex:&nbsp;aapl,fb,vti,unh,ulta,amzn,googl" value="<?php 

                                        $res=mysql_query(" SELECT stocks FROM members WHERE memberID='$memid' ");
                                        $userRow=mysql_fetch_row($res);
                                        $stock2 = $userRow[0];

                                        if (empty($stock2))  { }
                                        else { print_r($stock2); }
                                        ?>" />
                                        <p>Enter multiple symbols, or a single symbol for detailed stats.
                                            <br>Clear & Submit to reset.</p>
                                        <br>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                    <br>
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