<?php
session_start();
require("includes/connect.inc.php");

$username= $password= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$username = $data_check->validate($_POST['username']);
	$password = $data_check->validate($_POST['password']);
	
	$empty = $data_check->emptyCheck($username, $password);
	
	if(!$empty){
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> All fields must be filled</h6>
					</div>";
	}else{
		$password = sha1($password);
		$query = $db->query("SELECT * FROM students WHERE username='$username' AND password='$password'");
		if($query->num_rows == 1){
			if($query->fetch_array()['status'] == 'PENDING'){
				$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Your registration has not been verified, check back later</h6>
						</div>";
			}else{
				$_SESSION['user'] = $username;
				$_SESSION['logged'] = true;
				header("Location: account.php");
			}
			
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Incorrect username or password</h6>
						</div>";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/inner_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	 <h1>Sign In</h1>
	 <?php echo $response; ?>
    <div class="w3-twothird">
	<form action="" method="POST">
	  <div class="w3-section">      
        <input class="w3-input" type="text" name="username" placeholder="Enter Your Username" autocomplete="off" required>
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="password" name="password" placeholder="Enter Your Password" autocomplete="off" required>
      </div>
	  <button type="submit" class="w3-button w3-right w3-theme-d3" title="Sign Up">Sign In</button>
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
