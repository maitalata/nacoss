<?php
session_start();
require("includes/connect.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM students WHERE username='$user'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>My Account</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
   
      <h1>Welcome <?php echo $row['fullname']; ?></h1>
    
	<a href="forum.php"><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Forum</h3><br>
		  <i class="fa fa-address-card-o w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
	
	<a href="resources.php"><div class="w3-quarter w3-hover-shadow w3-hover-opacity">
	  <div class="w3-card-2 w3-container w3-center">
		  <h3>Resources</h3><br>
		  <i class="fa fa-edit w3-margin-bottom w3-text-themed-d3" style="font-size:120px"></i>
	  </div>
	</div></a>
</div>


<?php include("includes/quote_of_the_day.inc.php"); ?>

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