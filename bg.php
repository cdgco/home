<?php require('includes/vars.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Custom Background';

//include header template
require('layout/header.php'); 
?>
<link rel="stylesheet" href="<?php 

require('includes/dbconnect.php');

$res=mysql_query("SELECT style FROM members WHERE memberID='$memid'");
$userRow=mysql_fetch_row($res);
$resultstyle = $userRow[0];

if ($resultstyle == "l") { echo 'css/main1'; } 
else { echo 'css/night1'; }

?>.css">
<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Custom Background - <?php echo $uname; ?></h2>
				<p>Back to <a href='account.php'>Settings</a> | <a href='logout.php'>Logout</a></p>
				<hr>
<center>
<h4>Background Image URL: </h4>
<form action="bg2.php" method="post">
<input type="url" style="width: 500px;" title="URL's ending in .png, .jpg, or .jpeg only!" pattern="^https?://(?:[a-z0-9\-]+\.)+[a-z]{2,6}(?:/[^/#?]+)+\.(?:jpg|jpeg|png)$" name="bgurl"></input><br><br>
<input type="Submit" value="Change"></input>
</form>
</center>
</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>