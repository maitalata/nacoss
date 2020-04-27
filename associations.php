<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM associations WHERE user='$user'");
?>
<!DOCTYPE html>
<html>
<title>Membership of Professional Associations</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Membership of Professional Associations</h1>
		

<?php
	if($query->num_rows == 0){
		echo "<p>No Association</p>";
	}else{
		echo "<table class=\"w3-table w3-striped w3-bordered\"><thead>
			<tr class=\"w3-theme-d3\">
			  <th>Rank In Association</th>
			  <th>Association Name</th>
			  <th>Edit</th>
			  <th>Delete</th>
			</tr>
			</thead>
			<tbody>";
		while($row = $query->fetch_array()){
			echo "<tr>
					<td>".$row['rank']."</td>
					<td>".$row['association']."</td>
					<td><a href='edit_association.php?id=".$row['id']."'><i class='fa fa-edit'></i><a></td>
					<td><a href='delete_association.php?id=".$row['id']."' onclick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i><a></td>
					</tr>";
		}
		echo "</tbody>
			</table>";
	}
?>

<button type="button" class="w3-button w3-margin-top w3-theme-d3" onclick="document.location='add_association.php'" title="Add Association"><i class="fa fa-users"></i> Add Association</button>
<br>
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