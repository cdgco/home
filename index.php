<?php require( 'includes/vars.php'); ?>
<!DOCTYPE html>
<html>

<head>
     <meta charset="UTF-8">
    <meta name="google" content="notranslate">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=1200px, initial-scale=1.0">
<base target="_parent">
    <title>CDG Home</title>
<script>
if(self==top) {
if (screen.width > 1550 && screen.width <= 1650) {
    window.location = "s/90.php";
  }
if (screen.width > 1350 && screen.width <= 1550) {
    window.location = "s/80.php";
  }
if (screen.width > 1250 && screen.width <= 1350) {
    window.location = "s/75.php";
  }
if (screen.width > 1140 && screen.width <= 1250) {
    window.location = "s/67.php";
  }
if (screen.width > 1000 && screen.width <= 1140) {
    window.location = "s/60.php";
  }
if (screen.width <= 1000) {
    window.location = "mobile";
  }}
</script>
<style>
.tooltip {
    position: absolute;
    display: inline-block;
    bottom: 14%;
    left: 1.5%; 
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 10px;

    /* Position the tooltip */
    position: static;
    z-index: 1;
    bottom: 6%;
    left: 1%; 
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
</style>
    <script src="js/modernizr.js" type="text/javascript"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-1.6.4.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/jquery.rss.js"></script>
<style>
.hover {-webkit-filter: brightness(100%); transition: all .3s linear;}
.hover:hover {-webkit-filter: brightness(80%);}
</style>
    <script>
        jQuery(function($) {
            $("#rss-feeds").rss("<?php require( 'includes/grab/rss.php'); ?>", {
                entryTemplate: '<a style="text-decoration: none; color:white;" href="{url}">{title}</a><br><br><br><br>',
                limit: '20'
            })
        })
    </script>
    <!-- 
<style>
html {
    zoom: 0.9; /* Old IE only */
    -moz-transform: scale(0.9);
    -webkit-transform: scale(0.9);
    transform: scale(0.9);
}
</style>
-->
    <link rel="stylesheet" href="css/normalize.min.css">
    <link id="style1" rel="stylesheet" href="css/<?php require( 'includes/grab/light3.php'); ?>.css">
    <link rel="stylesheet" href="css/toggle.css">


</head>

<body onload="startTime()" >
<div style="margin:0 auto;position:absolute;top:0px;left:-100px;width:180%;float:left;overflow:hidden"><script  src="http://widgets.macroaxis.com/widgets/url.jsp?t=42<?php require( 'includes/grab/stock.php'); ?>" 
style="overflow:hidden"></script></div><br><br><br><br>
<div class="container">

		<div class="switch white">
<?php require( 'includes/grab/light.php'); ?>
			<label>Day</label>
			<label>Night</label>

			<span class="toggle"></span>

      </div> <!-- end switch -->

	</div> <!-- end container -->

<?php

if(!$user->is_logged_in()){} 

else {

require('includes/dbconnect.php');

$res=mysql_query("SELECT gmail FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$gmresult = $userRow[0];

if ($gmresult == yes) { 

$res=mysql_query("SELECT tstat FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$tsresult = $userRow[0];

if ($tsresult == y) {}
else { echo '<div class="tooltip"><a href="includes/quickauth.php"><img alt="Login to Gmail" class="hover" style="display:inline;position: fixed;bottom: 4%;left: 2%; height:80px;" src="img/auth.png"/></a> <span class="tooltiptext">Login to Gmail</span></div>'; }}} ?>
 <div class="dashboard display-animation" style="position:relative; top: -15px;margin: 0 auto; width: 1130px;">
  <a class="tile tile-lg tile-pink ripple-effect" href="https://calendar.google.com/calendar/render?pli=1#main_7%7Cmonth">
   <center> <span class="content-wrapper">
      <span class="tile-content"><center><br><br><span class="title" style="font-size:80px;"><div id="time"></div></span>
<span class="title"><?php echo date("l F j Y") . "<br>"; ?></span></center>
        <span class="tile-holder tile-holder-sm">
        </span>
      </span>      
    </span></center>
  </a>
  <a class="tile tile-lg tile-sqr tile-purple ripple-effect" href="https://mail.google.com/mail/u/0/#inbox">
    <span class="content-wrapper">
      <span class="tile-content"><center><?php require( 'includes/grab/email.php'); ?></span>
      </span>      
    </span>
  </a>
  <a class="tile tile-lg tile-sqr tile-cyan ripple-effect" href="#">
    <span class="content-wrapper">
      <span class="tile-content">
        <span class="tile-holder tile-holder-sm">
          <span class="title"></span>
        </span>
      </span>      
    </span>
  </a>
  <a class="tile tile-lg tile-sqr tile-amber ripple-effect" href="#">
    <span class="content-wrapper">
      <span class="tile-content">
        <span class="tile-holder tile-holder-sm">
          <span class="title"></span>
        </span>
      </span>      
    </span>
  </a>
<span class="tile tile-lg tile-light-blue ripple-effect" >
    <span  class="content-wrapper">
      <span class="tile-content">
        <span class="tile-holder tile-holder-sm">
<span style="font-size:40px"><div style="text-align:center; white-space:pre-wrap;margin-left:-20px; margin-right:20px;display:inline;"><marquee behavior="scroll" direction="up" scrollamount="6.5 height="230" width="500"><p id="rss-feeds"></p>
</marquee></div>
</span>
          <span class="title">Recent News</span>

        </span>
      </span>      
   </span> </span>
  <a class="tile tile-lg tile-sqr tile-red ripple-effect" href="#">
    <span>
      <span><center><iframe class="ripple-effect spotify" src="https://open.spotify.com/embed?uri=<?php require( 'includes/grab/spotify.php'); ?>&view=coverart" frameborder="0" height="280" width="270" allowtransparency="true"></iframe></center>

        <span class="tile-holder tile-holder-sm">
          <span class="title"></span>
        </span>
      </span>      
    </span>
  </a>
  <a class="tile tile-lg tile-sqr tile-indigo ripple-effect" href="<?php if(!$user->is_logged_in()){ echo "login.php"; } else {echo "account.php";}; ?>">
    <span class="content-wrapper">
      <span class="tile-content">
<br><br><center><img src="<?php if(!$user->is_logged_in()){ echo "img/user.png"; } else {echo "img/settings.png";}; ?>" height="120"></center><br>
        <span class="tile-holder tile-holder-sm">
          <span class="title"><?php if(!$user->is_logged_in()){ echo "Login"; } else {echo "Settings";}; ?></span>
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
  <a class="tile tile-lg tile-light-green ripple-effect" id="weatherblock" "href="#">
    <span class="content-wrapper">
      <span class="tile-content">

<center><br><br><span style="font-size:65px"><div style="display:inline;" id="weather"></div>&#176; <?php require('includes/grab/temp.php'); ?> 

<div style="display:inline; font-size:2vw;" id="weather2"></div></span><br><hr style="height:14pt; visibility:hidden;" />

<span style="font-size:vw" class="title">Weather in <?php require('includes/grab/location.php'); ?> </span></center>


        <span class="tile-holder tile-holder-sm">
          
        </span>
      </span>      
    </span>
  </a>

</div><script src="js/<?php require('includes/grab/clock.php'); ?>hr.js"></script>

<script>

$.get("https://ipinfo.io", function (response) {
  var state = response.region;
  getStateAbbr(state);
}, "jsonp");

var states = {
  'Alabama': 'AL',
  'Alaska': 'AK',
  'American Samoa': 'AS',
  'Arizona': 'AZ',
  'Arkansas': 'AR',
  'California': 'CA',
  'Colorado': 'CO',
  'Connecticut': 'CT',
  'Delaware': 'DE',
  'District Of Columbia': 'DC',
  'Federated States Of Micronesia': 'FM',
  'Florida': 'FL',
  'Georgia': 'GA',
  'Guam': 'GU',
  'Hawaii': 'HI',
  'Idaho': 'ID',
  'Illinois': 'IL',
  'Indiana': 'IN',
  'Iowa': 'IA',
  'Kansas': 'KS',
  'Kentucky': 'KY',
  'Louisiana': 'LA',
  'Maine': 'ME',
  'Marshall Islands': 'MH',
  'Maryland': 'MD',
  'Massachusetts': 'MA',
  'Michigan': 'MI',
  'Minnesota': 'MN',
  'Mississippi': 'MS',
  'Missouri': 'MO',
  'Montana': 'MT',
  'Nebraska': 'NE',
  'Nevada': 'NV',
  'New Hampshire': 'NH',
  'New Jersey': 'NJ',
  'New Mexico': 'NM',
  'New York': 'NY',
  'North Carolina': 'NC',
  'North Dakota': 'ND',
  'Northern Mariana Islands': 'MP',
  'Ohio': 'OH',
  'Oklahoma': 'OK',
  'Oregon': 'OR',
  'Palau': 'PW',
  'Pennsylvania': 'PA',
  'Puerto Rico': 'PR',
  'Rhode Island': 'RI',
  'South Carolina': 'SC',
  'South Dakota': 'SD',
  'Tennessee': 'TN',
  'Texas': 'TX',
  'Utah': 'UT',
  'Vermont': 'VT',
  'Virgin Islands': 'VI',
  'Virginia': 'VA',
  'Washington': 'WA',
  'West Virginia': 'WV',
  'Wisconsin': 'WI',
  'Wyoming': 'WY'
}

function getStateAbbr(name) {
  $("#state").html(states[name]);

$.get("https://ipinfo.io", function (response) {   
var settings = {
  "crossDomain": true,
  "url": "https://api.wunderground.com/api/<?php echo WUAPIKEY; ?>/conditions/q/<?php require('includes/grab/weather.php'); ?>.json",
  "method": "GET",
}
$.ajax(settings).done(function (response) {
  $("#weather").html(response.current_observation.temp_<?php 
if(!$user->is_logged_in()){ echo "f"; } else {

require('includes/dbconnect.php');


$res=mysql_query("SELECT temp FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$resulttemp = $userRow[0];

echo $resulttemp; }?>
);
  $("#weather2").html(response.current_observation.icon);
$("#weatherblock").attr("href",response.current_observation.forecast_url);
});

$("#address").html(response.city);
}, "jsonp");

}

<?php
require('includes/dbconnect.php');

$res=mysql_query("SELECT token FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$gtoken = $userRow[0];

$_SESSION['gmtoken'] = $gtoken;
?>
var data = null;

var xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === 4) {
    var response = this.responseText;
var jsonResponse = JSON.parse(response);
document.getElementById("unreademails").innerHTML = jsonResponse["threadsUnread"];
  }
});

xhr.open("GET", "https://www.googleapis.com/gmail/v1/users/me/labels/INBOX");
xhr.setRequestHeader("authorization", "Bearer <?php print_r($_SESSION['gmtoken']); ?>");
xhr.send(data);

function toggle() { 

var a = document.getElementById("style1"); 
a.x = 'css/<?php require('includes/grab/light2.php'); ?>' == a.x ? 'css/<?php require('includes/grab/light3.php'); ?>' : 'css/<?php require('includes/grab/light2.php'); ?>'; 
a.href = a.x + '.css';
}
</script>
<script src="js/index.js"></script>
</body>
</html>