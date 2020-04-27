<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM work WHERE user='$user'");
?>
<!DOCTYPE html>
<html>
<title>Work Experience</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Work Experience</h1>
		

<?php
	if($query->num_rows == 0){
		echo "<p>No Work History</p>";
	}else{
		echo "<table class=\"w3-table w3-striped w3-bordered\"><thead>
			<tr class=\"w3-theme-d3\">
			  <th>Position</th>
			  <th>Place of Work</th>
			  <th>From</th>
			  <th>To</th>
			  <th>Edit</th>
			  <th>Delete</th>
			</tr>
			</thead>
			<tbody>";
		while($row = $query->fetch_array()){
			echo "<tr>
					<td>".$row['position']."</td>
					<td>".$row['placeOfWork']."</td>
					<td>".$row['fromD']."</td>
					<td>".$row['toD']."</td>
					<td><a href='edit_work.php?id=".$row['id']."'><i class='fa fa-edit'></i><a></td>
					<td><a href='delete_work.php?id=".$row['id']."' onclick=\"return confirm('Are you sure you want to delete?')\"><i class='fa fa-trash'></i><a></td>
					</tr>";
		}
		echo "</tbody>
			</table>";
	}
?>

<button type="button" class="w3-button w3-margin-top w3-theme-d3" onclick="document.location='add_work.php'" title="Add Work"><i class="fa fa-institution"></i> Add Work History</button>
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