<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Weather Settings';

//include header template
require('layout/header.php'); 
?>
<link rel="stylesheet" href="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT style FROM members WHERE memberID=".$_SESSION['memberID']);
$userRow=mysql_fetch_row($res);
$resultstyle = $userRow[0];

if ($resultstyle == "l") { echo 'css/main1'; } 
else { echo 'css/night1'; }

?>.css">
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Weather Settings - <?php echo $_SESSION['username']; ?></h2>
				<p>Back to <a href='account.php'>Settings</a> | <a href='logout.php'>Logout</a></p>
				<hr>
<h3>Change Weather Location: </h3>
<form action="weather.php" method="post">
<input type="hidden" name="country" id="countryId" value="US"/>
<select name="state" class="states order-alpha" id="stateId">
    <option value="">Select State</option>
</select>
<select name="city" class="cities order-alpha" id="cityId">
    <option value="">Select City</option>
</select><br><br>
<input type="submit" value="Change"/></form>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> 
<script src="//geodata.solutions/includes/statecity.js"></script>

		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>