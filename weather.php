<?php require('includes/vars.php'); 

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
				<p>Back to <a href='selectweather.php'>Location</a> | <a href='logout.php'>Logout</a></p>
				<hr>
<center><h3>Please Verify Location: <?php echo $_POST['city']; ?>, <span id="sid2"></span></h3> 


<form action="weather2.php" method="post">
<input type="hidden" id="sid" name="state"/>
<input type="hidden" id="cid" value="<?php echo $_POST['city']; ?>" name="city"/>
<br>
<input type="submit" value="Verify"></center>
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
</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>