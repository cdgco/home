<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>
<link rel="stylesheet" href="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT style FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$resultstyle = $userRow[0];

if ($resultstyle == "l") { echo 'style/main'; } 
else { echo 'style/night'; }

?>.css">
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
<?php 
$swal = $_GET['s'];
if ($swal == "s") {echo '<script>swal("Success!", "Setting Updated Successfully!", "success")</script>'; }
if ($swal == "e") {echo '<script>swal("Oops...", "Try Again or Contact Support. Error: ' .  $_GET['e'] . '.", "error")</script>'; }
?>
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Account Settings - <?php echo $_SESSION['username']; ?></h2>
				<p>Back <a href='./'>Home</a> | <a href='logout.php'>Logout</a></p>
				<hr>
<h3>Custom Stock Ticker: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT stocks FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$stock1 = $userRow[0];

if (empty($stock1)) { echo "Disabled"; }
else { echo "Enabled"; }
?>
</h3><hr>
<h4>Create Custom Ticker:</h4>
<form action="includes/change/ticker.php" name="stocks3" method="post">
<input type="text" pattern="^[a-zA-Z,]*$" title="Letters & Commas Only!" maxlength="500" name="stocks" style="width:570px" placeholder="Enter valid comma-seperated symbols to create new ticker. Ex:&nbsp;aapl,fb,vti,unh,ulta,amzn,googl" value="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT stocks FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$stock2 = $userRow[0];

if (empty($stock2))  { }
else { print_r($stock2); }
?>" /><p>Enter multiple symbols, or a single symbol for detailed stats. Clear & Submit to reset.</p>
<input type="Submit" value="Submit"></input>
</form>
<hr>
<h3>Current Style: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT style FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$style1 = $userRow[0];

if ($style1 == l) { echo "Light Theme";}
else { echo "Dark Theme"; } 

?>
</h3><hr>
<h4>Change Default Style:</h4>
<form action="includes/change/style.php" method="post">
<input type="radio" name="style" value="l"> Light Theme</input>
<input type="radio" name="style" value="d"> Dark Theme</input>
<br><br><input type="Submit" value="Change"></input>
</form>
<hr>
<h3>Current Clock Format: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT clockname FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);
?>
</h3><hr>
<h4>Change Clock Format:</h4>
<form action="includes/change/clock.php" method="post">
<input type="radio" name="newclock" value="12|12 Hour"> 12 Hour</input>
<input type="radio" name="newclock" value="24|24 Hour"> 24 Hour</input>
<br><br><input type="Submit" value="Change"></input>
</form>
<hr>
<h3>Current News Source: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT sourcename FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);
?>
</h3><hr>
<h4>Set News Source:</h4>
<form action="includes/change/source.php" method="post">
<select name="newsource">
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
<br><br>
<input type="Submit" value="Save"></input>
</form>
<hr>
<h3>Edit Spotify Widget 

</h3><hr>
<h4>Change Playlist URI:</h4>
<form action="includes/change/spotify.php" method="post">
<input type="text" value="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT spotify FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);
?>" required name="spotify"></input><h4>Change Playlist Name:</h4><input value="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT spotname FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);
?>" type="text" required name="spotname"></input><br><br>
<input type="Submit" value="Change"></input>
</form>
<hr>
<h3>Current Temperature Format: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT temp FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$temp1 = $userRow[0];

if ($temp1 == "f") { echo "Fahrenheit"; }
elseif ($temp1 == "c") { echo "Celsius"; }
?>
</h3><hr>
<h4>Change Temperature Format:</h4>
<form action="includes/change/temp.php" method="post">
<input type="radio" name="temp" value="f"> Fahrenheit</input>
<input type="radio" name="temp" value="c"> Celsius</input>
<br><br><input type="Submit" value="Change"></input>
</form>
<hr>
<h3>Custom Location: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT CustomLocation FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$result1 = $userRow[0];

if ($result1 == "N") {echo "Disabled";}
else {echo "Enabled";}
?>
<hr>
<h3>Custom Location: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT city FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);

$res=mysql_query("SELECT state FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r(',&nbsp;'.$userRow[0]);
?><hr>
<h4>Change Weather Location:</h3> 
<form action="includes/change/location.php" method="post">
<input type="radio" name="customlocation" value="N"> Current Location</input>
<input type="radio" name="customlocation" onclick="window.location='includes/select/weather.php';"> Custom Location</input>
<br><br><input type="submit" />
</form><hr>
<h3>Gmail Integration: <?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT gmail FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$gstat = $userRow[0];

if ($gstat == "no") { echo "Disabled"; }
if ($gstat == "yes") { echo "Enabled"; }
?></h3><hr>
<h4>Connect Gmail Account (Authorize Here Once, Quick-Login From Front Page):</h4><?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT tstat FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$tstat = $userRow[0];

if ($gstat == "no") { echo '<form action="includes/gmail.php"><input id="red" style="background-color: #e74c3c;" type="submit" value="Login with Google" /></form>'; }
if ($gstat == "yes") { echo '<form action="disconnect.php"><input id="red" style="background-color: #e74c3c;" type="submit" value="Disconnect" /></form>'; }
?>
<hr>
<h3>Account Email Address: 
<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT email FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);

print_r($userRow[0]);
?>
</h3><hr>
<h4>Change Account Email:</h4>
<form action="includes/change/email.php" method="post">
<form action="includes/change/email.php" method="post">
<input type="text" name="changeemail"></input><br><br>
<input type="Submit" value="Change"></input>
</form>
<hr>


		</div>
	</div>


</div>
<?php 
//include header template
require('layout/footer.php'); 
?>