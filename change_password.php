<?php
session_start();
require("includes/connect.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$old_password= $new_password= $confirm= "";
	$data_check = new DataValidation();
	
	$old_password = $data_check->validate($_POST['old_password']);
	$new_password = $data_check->validate($_POST['new_password']);
	$confirm = $data_check->validate($_POST['confirm']);
	
	if($data_check->emptyCheck($old_password, $new_password, $confirm)){
		$old_password = sha1($old_password);
		$query = $db->query("SELECT * FROM students WHERE username='$user' AND password='$old_password'");
		if($query->num_rows == 1){
			if(strlen($new_password) >= 8){
				if($new_password === $confirm){
					$new_password = sha1($new_password);
					if($db->query("UPDATE students SET password='$new_password' WHERE username='$user'")){
						$response = "<div class=\"w3-panel w3-green w3-leftbar w3-padding-10\">
										<h6><i class=\"fa fa-times\"></i> Password changed successfully</h6>
									</div>";
					}else{
						$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
										<h6><i class=\"fa fa-times\"></i> Password cannot be changed for unknown reason</h6>
									</div>";
					}
				}else{
					$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
								<h6><i class=\"fa fa-times\"></i> New password and confirm did not match</h6>
							</div>";
				}
			}else{
				$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> New password must be at least 8 characters</h6>
						</div>";
			}
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Incorrect old password</h6>
						</div>";
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> All fieds must be filled/h6>
						</div>";
	}
}

?>
<!DOCTYPE html>
<html>
<title>Change Password</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>Change Password</h1>
<?php echo $response; ?>
	<div class="w3-section w3-twothird">
	<form action="" method="POST">
		<div class="w3-section">      
			<input class="w3-input" type="password" name="old_password" placeholder="Old Password" required>
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="password" name="new_password" placeholder="New Password" required>
		</div>
		<div class="w3-section">      
			<input class="w3-input" type="password" name="confirm" placeholder="Confirm New Password" required>
		</div>
		<button type="submit" class="w3-button w3-right w3-theme-d3" title="Change Password">Change Password</button>
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