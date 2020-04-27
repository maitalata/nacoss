<?php  
require("includes/connect.inc.php");

$name= $email= $message= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$data_check = new DataValidation();
	
	$name = $data_check->validate($_POST['name']);
	$email = $data_check->validate($_POST['email']);
	$message = $data_check->validate($_POST['message']);
	
	if($data_check->emptyCheck($name, $email, $message)){
		if($db->query("INSERT INTO messages(name, email, message) VALUES ('$name','$email','$message')")){
			$response = "<div class=\"w3-panel w3-green w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> Message sent successfully</h6>
						</div>";
			//header("Location: #contact");
			
		}else{
			$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> System unable to send message</h6>
						</div>";
			//header("Location: #contact");
			
		}
	}else{
		$response = "<div class=\"w3-panel w3-red w3-leftbar w3-padding-10\">
							<h6><i class=\"fa fa-times\"></i> All fields must be filled</h6>
						</div>";
		//header("Location: #contact");
		
	}
}

?>
<!DOCTYPE html>
<html>
<title>Nigeria Association of Computer Science Students - Yusuf Maitama Sule University Chapter</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/inner_header.inc.php"); ?>

<!-- Header -->
<header class="w3-container w3-blue w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Nigeria Association of Computer Science Students</h1>
  <p class="w3-xlarge">Yusuf Maitama Sule University Kano Chapter</p>
	<img src="images/y.png" style="width:120px;height:120px;" class="w3-margin">
	<img src="images/n.png" style="width:120px;height:120px;" class="w3-margin">
</header>

<!-- First Grid -->
<div id="about" class="w3-row-padding w3-padding-64 w3-container">
  <div  class="w3-content">
      <h1 >About</h1>
      <h5 class="w3-padding-32" style="text-align:justify;"><?php echo nl2br($db->query("SELECT * FROM about")->fetch_array()['about']); ?></h5>
  </div>
</div>

<!-- Second Grid -->
<div id="contact" class="w3-row-padding w3-light-gray w3-padding-64 w3-container">
  <div  class="w3-content">
      <h1>Contact</h1>
	  <?php echo $response; ?>
      <h5 class="w3-padding-32">Send Direct Message To Admin</h5>
		<form action="" method="POST">
      <div class="w3-section">      
        <input class="w3-input" type="text" name="name" placeholder="Your Name" required>
      </div>
	  <div class="w3-section">      
        <input class="w3-input" type="email" name="email" placeholder="Your Email"  required>
      </div>
	  <div class="w3-section">      
        <textarea class="w3-input" name="message" placeholder="Your Message" required></textarea>
      </div>
	  <button type="submit" class="w3-button w3-right w3-theme-d3" title="Send Message">Send Message</button>
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
