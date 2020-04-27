<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM users WHERE username='$user'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<a href=""><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>View Profile</h3><br>
		  <i class="fa fa-address-card-o w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
	
	<a href="edit_basic_info.php"><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Edit Basic Info</h3><br>
		  <i class="fa fa-edit w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
	
	<a href="institutions.php"><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Institutions</h3><br>
		  <i class="fa fa-graduation-cap w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
	
	<a href="work.php"><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Work Experience</h3><br>
		  <i class="fa fa-bank w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
	
	<a href=""><div class="w3-quarter w3-margin-top w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Publications</h3><br>
		  <i class="fa fa-file-text-o w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
</div>


<div class="w3-container w3-blue-gray w3-center  w3-padding-16">
    <h1 class="w3-margin w3-xlarge">Quote of the day:</h1>
	<p class="w3-large">He who has never failed somewhere that man cannot be great<br><span class="w3-small"><i>- William A. Ward</i></span></p>
</div>

<?php include("includes/footer.inc.php"); ?>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html>