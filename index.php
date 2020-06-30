<?php
if (!file_exists('includes/config.php')) {
    header('Location: setup.php');
}
require('includes/dbconnect.php');
require('includes/vars.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="google" content="notranslate">
        <meta http-equiv="Content-Language" content="en">
        <meta name="msapplication-config" content="favicon/browserconfig.xml">
        <meta name="theme-color" content="#f5f5f5">

        <title>CDG Home</title>
        <base target="_parent">

        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
        <link rel="manifest" href="favicon/manifest.json">
        <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="favicon/favicon.ico">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link id="style1" rel="stylesheet" href="css/<?php require('includes/grab/light3.php'); ?>.css">

        <style>
            body {
                background-size: cover;
                <?php

                if ($user->is_logged_in()) {
                    $sql = sprintf(
                        "SELECT bg FROM members WHERE memberID ='%s'",
                        mysqli_real_escape_string($link, $memid)
                    );
                    $res = mysqli_query($link, $sql);
                    $userRow = mysqli_fetch_row($res);
                    $bgresult = $userRow[0];

                    if ($bgresult == 'y') {
                        $sql = sprintf(
                            "SELECT bgurl FROM members WHERE memberID ='%s'",
                            mysqli_real_escape_string($link, $memid)
                        );
                        $res = mysqli_query($link, $sql);
                        $userRow = mysqli_fetch_row($res);
                        $bgurl1 = $userRow[0];

                        echo 'background-image: url("'.$bgurl1.'");';
                    }
                } ?>
            }
        </style>

        <script src="js/first.js" type="text/javascript"></script>
        <script src="js/modernizr.js" type="text/javascript"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-1.6.4.min.js"></script>
        <script src="js/moment.min.js"></script>
        <script src="js/jquery.rss.min.js"></script>
        <script>
            jQuery(function($) {
                $("#rss-feeds").rss("<?php require('includes/grab/rss.php'); ?>", {
                    entryTemplate: '<a style="text-decoration: none; color:white;" href="{url}">{title}</a><br><br><br><br>',
                    ssl: true,
                    limit: '20'
                });
            });
        </script>

    </head>

    <body id="htinsert" onload="startTime()">

        <div style="margin:0 auto;position:absolute;top:-2 px;left:-145px;width:180%;float:left;overflow:hidden" class="filter">
            <script src="https://www.macroaxis.com/widgets/url.jsp?t=42"></script>

        </div><br><br><br><br>

        <div id="filtertoggle" class="container">
            <div class="switch white">
                <?php require('includes/grab/light.php'); ?>
                <label>Day</label>
                <label>Night</label>
                <span class="toggle"></span>
            </div>
        </div>

        <?php

        if ($user->is_logged_in()) {
            $sql = sprintf(
                "SELECT gmail FROM members WHERE memberID ='%s'",
                mysqli_real_escape_string($link, $memid)
            );
            $res = mysqli_query($link, $sql);
            $userRow = mysqli_fetch_row($res);
            $gmresult = $userRow[0];

            if ($gmresult == 'yes') {
                $sql = sprintf(
                    "SELECT tstat FROM members WHERE memberID ='%s'",
                    mysqli_real_escape_string($link, $memid)
                );
                $res = mysqli_query($link, $sql);
                $userRow = mysqli_fetch_row($res);
                $tsresult = $userRow[0];

                if ($tsresult != 'y') {
                    echo '<div class="tooltip"><a href="includes/quickauth.php"><img alt="Login to Gmail" class="hover" style="display:inline;position: fixed;bottom: 4%;left: 2%; height:80px;" src="img/auth.png"/></a> <span class="tooltiptext">Login to Gmail</span></div>';
                }
            }
        }
        ?>
        <div class="dashboard display-animation" style="position:relative; top: -15px;margin: 0 auto; width: 1130px;">

            <a class="tile tile-lg tile-pink ripple-effect" href="https://calendar.google.com/calendar/render?pli=1#main_7%7Cmonth">
                <span class="content-wrapper">
                    <span class="tile-content" style="text-align:center;">
                        <br><br>
                            <span class="title" style="font-size:80px;">
                                <div id="time"></div>
                            </span>
                            <span class="title" style="font-size:35px;"><?php echo date("l F j Y") . "<br>"; ?></span>
                        <span class="tile-holder tile-holder-sm"></span>
                    </span>
                </span>
            </a>

            <a class="tile tile-lg tile-sqr tile-purple ripple-effect" id="emaila" href="https://mail.google.com/mail/u/0/#inbox">
                <span class="content-wrapper">
                    <span id="gmaildiv" class="tile-content" style="text-align:center;">
                        <?php require('includes/grab/email.php'); ?>
                    </span>
                </span>
            </a>

            <form class="tile tile-lg tile-sqr tile-cyan lightfilter" id="notes" target="transFrame" method="post" action="notesave.php">
                <span>
                    <span>
                        <div class=notepad>
                            <h1>Notes</h1>
                            <textarea maxlength="1000" name="notes" placeholder="Enter your notes here!"><?php
                                if ($user->is_logged_in()) {
                                    $sql = sprintf(
                                        "SELECT notes FROM members WHERE memberID ='%s'",
                                        mysqli_real_escape_string($link, $memid)
                                    );
                                    $res = mysqli_query($link, $sql);
                                    $userRow = mysqli_fetch_row($res);
                                    $notes = $userRow[0];

                                    if ($notes != NULL) { echo $notes; }
                                }
                                ?></textarea>
                        </div>
                    </span>
                </span>
                <?php
                    if ($user->is_logged_in()) {
                        echo '<img class="hover" id="notesimg" style="cursor:pointer;display:inline;position: fixed;bottom: 5%;right: 5%; height:40px;" src="img/save.png"/>';
                    }
                ?>
                <iframe style="display:none;" name="transFrame" id="transFrame"></iframe>
            </form>

            <a class="tile tile-lg tile-sqr tile-amber filter ripple-effect" href="#" style="text-align:center;">
                <iframe class="calendar" src="includes/calendar.html" frameborder="0" style="margin:7px;" height="320" width="320" allowtransparency="true"></iframe>
            </a>

            <span class="tile tile-lg tile-light-blue ripple-effect">
                <section class="loaders"><span class="loader loader-quart"> </span> Loading...</section>
                <span class="content-wrapper">
                    <span class="tile-content">
                        <span class="tile-holder tile-holder-sm">
                            <span style="font-size:40px">
                                <div style="text-align:center;">
                                    <marquee class="scrollingtext" style="opacity:0;" behavior="scroll" direction="up" scrollamount="6.5" height="230" width="500">
                                        <p id="rss-feeds"></p>
                                    </marquee>
                                </div>
                            </span>
                            <span style="display:none;" class="title marqueetitle">Recent News</span>
                        </span>
                    </span>
                </span>
            </span>

            <a class="tile tile-lg tile-sqr tile-red filter ripple-effect" href="#">
                <iframe class="ripple-effect spotify" src="https://open.spotify.com/embed?uri=<?php require('includes/grab/spotify.php'); ?>" frameborder="0" height="280" width="270" allowtransparency="true" allow="encrypted-media"></iframe>
            </a>

            <a class="tile tile-lg tile-sqr tile-indigo ripple-effect" href="<?php if (!$user->is_logged_in()) { echo "login.php"; } else { echo "account.php"; }; ?>">
                <span class="content-wrapper">
                    <span class="tile-content" style="text-align:center;"><br><br>
                            <img src="<?php if (!$user->is_logged_in()) { echo "img/user.png"; } else { echo "img/settings.png"; }; ?>" height="120"><br>
                        <span class="tile-holder tile-holder-sm">
                            <span class="title"><?php if (!$user->is_logged_in()) { echo "Login"; } else { echo "Settings"; }; ?></span>
                        </span>
                    </span>
                </span>
            </a>

            <a class="tile tile-lg tile-sqr tile-deep-orange ripple-effect" href="#">
                <span class="content-wrapper">
                    <span class="tile-content">
                        <span class="tile-holder tile-holder-sm">
                            <span class="title"></span>
                        </span>
                    </span>
                </span>
            </a>

            <a class="tile tile-lg tile-light-green ripple-effect" id="weatherblock" href="#">
                <span class="content-wrapper">
                    <span class="tile-content" style="text-align:center;">
                            <span style="font-size:65px">
                                <span><div style="display:inline;" id="weather"></div>&#176; <?php require('includes/grab/temp.php'); ?></span>
                                <div style="display:inline-grid; font-size:25px;"><img id="weather3"/><span id="weather2" ></span></div>
                            </span><br>
                            <hr style="height:14pt; visibility:hidden;" />
                            <span style="font-size:1.5vw;white-space:nowrap" class="title">Weather in <?php require('includes/grab/location.php'); ?> </span>
                        <span class="tile-holder tile-holder-sm"></span>
                    </span>
                </span>
            </a>
        </div>

        <script><?php 
        
            echo "\nvar lat, lon, coord, state;\n";
            if (!$user->is_logged_in()) { 
                echo "var loggedin = 'no';\nvar tempunit = '&units=imperial';\nvar token = '';";
            } 
            else {
                echo "var loggedin = 'yes';\nvar form = document.getElementById('notes');\nvar notesimg = document.getElementById('notesimg');\nnotesimg.onclick = function(){form.submit();};\n";
                $sql = sprintf("SELECT temp FROM members WHERE memberID ='%s'", mysqli_real_escape_string($link, $memid));
                $res = mysqli_query($link, $sql);
                $userRow = mysqli_fetch_row($res);
                $resulttemp = $userRow[0];
                if ($resulttemp = 'f') {
                    echo "var tempunit = '&units=imperial';\n";
                } elseif ($resulttemp = 'c') {
                    echo "var tempunit = '&units=metric'\n;";
                }
                $sql = sprintf("SELECT token FROM members WHERE memberID ='%s'", mysqli_real_escape_string($link, $memid));
                $res = mysqli_query($link, $sql);
                $userRow = mysqli_fetch_row($res);
                $gtoken = $userRow[0];
                echo "var token = '".$gtoken."';\n";
            } ?>
            $('.scrollingtext')
                .delay(3600)
                .queue(function(next) {
                    $(this).css("opacity", "1");
                    next();
                });
            $(function() {
                $(".marqueetitle").delay(3250).fadeIn(500);
            });
            $(function() {
                $(".loaders").delay(3200).fadeOut(500);
            });
            $.get("https://ipinfo.io", function(response) {
                coord = response.loc.split(',');
                lat = coord[0];
                lon = coord[1];
                $("#address").html(response.city);
                $("#state").html(states[response.region]);
                $.get("https://api.openweathermap.org/data/2.5/weather?<?php require('includes/grab/weather.php'); ?>&appid=<?php echo OWAPIKEY; ?>" + tempunit, function(response) {

                    $("#weather").html(response.main.temp);
                    $("#weather2").html(response.weather[0].description);
                    $("#weather3").attr("src", "http://openweathermap.org/img/wn/"+response.weather[0].icon + "@2x.png");
                    $("#weatherblock").attr("href", "https://openweathermap.org/city/" + response.id);

                }, "jsonp");
            }, "jsonp");
            if(token != ''){
                var data = null;
                var xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.addEventListener("readystatechange", function() {
                    if (this.readyState === 4) {
                        var response = this.responseText;
                        var jsonResponse = JSON.parse(response);
                        if (jsonResponse["threadsUnread"] == null) {
                            document.getElementById("gmaildiv").innerHTML = '<br><br><img src="img/gmail.png" height="120"><br><span class="tile-holder tile-holder-sm"><span class="title">Email</span></span>';
                            var d1 = document.getElementById('htinsert');

                            if (loggedin === "yes") {
                                d1.insertAdjacentHTML('beforeend', '<div class="tooltip" style="z-index:99"><a href="includes/quickauth.php"><img alt="Login to Gmail" class="hover" style="display:inline;position: fixed;bottom: 4%;left: 2%; height:80px;" src="img/auth.png"/></a> <span class="tooltiptext">Login to Gmail</span></div>');
                            }

                        } else {
                            document.getElementById("unreademails").innerHTML = jsonResponse["threadsUnread"];
                        }
                    }
                });

                xhr.open("GET", "https://www.googleapis.com/gmail/v1/users/me/labels/INBOX");
                xhr.setRequestHeader("authorization", "Bearer " + token);
                xhr.send(data);
            }
            function toggle() {
                var a = document.getElementById("style1");
                a.x = 'css/<?php require('includes/grab/light2.php'); ?>' == a.x ? 'css/<?php require('includes/grab/light3.php'); ?>' : 'css/<?php require('includes/grab/light2.php'); ?>';
                a.href = a.x + '.css';
            }
            $(function() {
                setTimeout("  $('body').load(window.location.href,'body');", <?php

                    if (!$user->is_logged_in()) {
                        echo "300000";
                    } else {

                        $sql = sprintf("SELECT refresh FROM members WHERE memberID ='%s'", mysqli_real_escape_string($link, $memid));
                        $res = mysqli_query($link, $sql);
                        $userRow = mysqli_fetch_row($res);
                        $refresh = $userRow[0];
                        echo $refresh;
                    };

                ?>);
            });
        </script>
        <script src="js/<?php require('includes/grab/clock.php'); ?>hr.js"></script>
        <script src="js/index.js"></script>
    </body>
</html>