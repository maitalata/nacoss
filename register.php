<?php
require("includes/connect.inc.php");

$name= $reg_number= $programme= $email= $username= $password= $confirm= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$name = $data_check->validate($_POST['name']);
	$reg_number = $data_check->validate($_POST['reg_number']);
	$programme = $data_check->validate($_POST['programme']);
	$email = $data_check->validate($_POST['email']);
	$username = $data_check->validate($_POST['username']);
	$password = $data_check->validate($_POST['password']);
	$confirm = $data_check->validate($_POST['confirm']);
	
	$empty = $data_check->emptyCheck($name, $reg_number, $programme, $email, $username, $password, $confirm);
	
	if(!$empty){
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
						<h6><i class=\"fa fa-times\"></i> All Fields must be filled</h6>
					</div>";
	}else{
		if(strlen($username) > 15){
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Username must not be greater than 15 characters</h6>
						</div>";
		}else{
			if(strlen($password) < 8){
				$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Password must be at least 8 characters</h6>
						</div>";
			}else{
				if($password === $confirm){
					$query = $db->query("SELECT * FROM students WHERE username='$username'");
					if($query->num_rows != 1){
						$password = sha1($password);
						if($db->query("INSERT INTO students(fullname, regNo, programme, email, username, password) VALUES ('$name','$reg_number','$programme',
						'$email','$username','$password')")){		
							header("Location: registered.php");
						}else{
							$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
											<h6><i class=\"fa fa-times\"></i> System unable to register you</h6>
										</div>";
						}
					}else{
						$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
										<h6><i class=\"fa fa-times\"></i> Username already in use by someone</h6>
									</div>";
						$username = "";
					}
				}else{
					$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
									<h6><i class=\"fa fa-times\"></i> Password and confirm password did not match</h6>
								</div>";
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
<title>Registration Page</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/inner_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<h1>Sign Up</h1>
	<p>Note: Only Computer Science And ICT Students of Yusuf Maitama Sule University are allowed register</p>
	<?php echo $response; ?>
    <div class="w3-twothird">
	  <form action="" method="POST">
	  <div class="w3-section">      
        <input class="w3-input" type="text" name="name" placeholder="Enter Your Name" value="<?php echo $name; ?>" required>
      </div>
      <div class="w3-section">      
        <input class="w3-input" type="text" name="reg_number" placeholder="Enter Your Registration Number" value="<?php echo $reg_number; ?>" required>
      </div>
      <div class="w3-section"> 
      	<select class="w3-input" name="programme">
      		<option value="">--Please Choose your Program--</option>
      		<option value="Computer Science">Computer Science</option>
      		<option value="ICT">ICT</option>
      	</select>     
        <!--<input class="w3-input" type="text" name="name" placeholder="Enter Your Name" value="<?php //echo $name; ?>" required>-->
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="email" name="email" placeholder="Enter Email Address" value="<?php echo $email; ?>" required>
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="text" name="username" placeholder="Enter Username" value="<?php echo $username; ?>" autocomplete="off" required>
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="password" name="password" placeholder="Enter Password" autocomplete="off" required>
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="password" name="confirm" placeholder="Confirm Password" autocomplete="off" required>
      </div>
	  <button type="submit" class="w3-button w3-right w3-theme-d3" title="Sign Up">Sign Up</button>
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
