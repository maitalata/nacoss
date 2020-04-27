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
<title>My Profile</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<h2>Personal Info</h2>
	<table class="w3-table w3-striped w3-bordered">
<tbody>
	<?php  
		echo "<tr>
				<td>Name</td>
				<td>".$row['fullname']."</td></tr>
				<tr>
				<td>Registration Number</td>
				<td>".$row['regNo']."</td></tr>
				<td>Program</td>
				<td>".$row['programme']."</td></tr>
				<tr>
				<td>Email</td>
				<td>".$row['email']."</td></tr>
				<tr>
				<td>Username</td>
				<td>".$row['username']."</td></tr>
				<tr>
				<td>Status</td>
				<td>".$row['status']."</td></tr>
				";
	?>
</tbody>
</table>
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