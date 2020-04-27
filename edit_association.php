<?php
session_start();
require("includes/connect.inc.php");
require("includes/classes.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

if(!isset($_GET['id'])){
	header("Location: institutions.php");
}

$id = $_GET['id'];

$user = $_SESSION['user'];

$rank= $association= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$rank = $data_check->validate($_POST['rank']);
	$association = $data_check->validate($_POST['association']);
	
	if($data_check->emptyCheck($rank, $association)){
		if($db->query("UPDATE associations SET rank='$rank', association='$association' WHERE id='$id'")){
			header("Location: associations.php");
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> System unable to update</h6>
						</div>";
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> All Fields must be filled</h6>
					</div>";
	}
	
}

$query = $db->query("SELECT * FROM associations WHERE id='$id'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>Edit Association</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Edit Association</h1>
<?php echo $response; ?>
	<div class="w3-section w3-twothird">
	<form action="" method="POST">
		<div class="w3-section">      
			<input class="w3-input" type="text" name="rank" placeholder="Publication/Paper Title and Date" value="<?php echo $row['rank']; ?>" >
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="text" name="association" placeholder="Publication/Paper Title and Date" value="<?php echo $row['association']; ?>" >
		</div>
		<button type="submit" class="w3-button w3-right w3-theme-d3" title="Update">Update</button>
		</form>
	</div>
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