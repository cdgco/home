<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'CDG Home - Gmail Integration';

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
			
				<h2>Gmail Integration - <?php echo $_SESSION['username']; ?></h2>
				<p>Back to <a href='account.php'>Settings</a> | <a href='logout.php'>Logout</a></p>
				<hr>

<center><h4 id="name1"></h4>
<h4 id="email"></h4> 
<form action="auth2.php" method="post">
<input name="token" type="text" style="display:none;" id="hiddeninput"></input><br>
<input type="submit" value="Verify"/>
</form></center>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<meta name="google-signin-client_id" content="INSERT-GOOGLE-CLIENT-ID">
<div class="g-signin2" style=""data-onsuccess="onSignIn"></div>
<script>
function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  document.getElementById('name1').innerHTML = profile.getName();
  document.getElementById('email').innerHTML = profile.getEmail(); // This is null if the 'email' scope is not present.
}
</script>
<script>
var hash1 = location.hash.substring(1).replace('&token_type=Bearer&expires_in','');
var hash2 = hash1.replace('access_token=','');
document.getElementById('hiddeninput').value = hash2;
</script>
</html>