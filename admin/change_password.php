<?php
session_start();
include("../includes/connect.inc.php");
$page = "settings";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$old= $new= $confirm= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $validator = new DataValidation();

  $old = $validator->validate($_POST['old']);
  $new = $validator->validate($_POST['new']);
  $confirm = $validator->validate($_POST['confirm']);
  
  if($validator->emptyCheck($old, $new, $confirm)){
	  $old = md5($old);
	  $new = md5($new);
	  $confirm =md5($confirm);
	  if($db->query("SELECT * FROM administrators WHERE username='$user' AND password='$old'")->num_rows == 1){
		  if($new === $confirm){
			  if($db->query("UPDATE administrators SET password='$new' WHERE username='$user'")){
                  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
                                <h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Password changed successfully</h6>
                                </div>";
			  }else{
                  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
                                <h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to change password</h6>
                                </div>";
			  }
		  }else{
			  $$response = "<div class=\"w3-panel w3-red w3-leftbar \">
                            <h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> Password and confirm did not match</h6>
                            </div>";
		  }
	  }else{
          $response = "<div class=\"w3-panel w3-red w3-leftbar \">
                        <h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> Incorrect old password</h6>
                        </div>";
	  }
  }else{
      $response = "<div class=\"w3-panel w3-red w3-leftbar \">
                    <h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> All fields must be filled</h6>
                    </div>";
  }
}
?>
<!DOCTYPE html>
<html>
<title>NACOSS</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-light-grey">

<?php include("../includes/admin_header.inc.php"); ?>

<?php include("../includes/admin_side_bar.inc.php"); ?>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h3><b><i class="fa fa-key"></i> Change Password</b></h3>
  </header>
	<form action="" method="POST">
	<div class="w3-panel">
		<?php echo $response; ?>
		  <label>Old Password</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="password" name="old" required >
		  <label>New Password</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="password" name="new" required >
		  <label>Re-type New Password</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="password" name="confirm" required >
		  <div class="w3-section"> 
			<button type="submit" class="w3-button w3-left w3-theme-d3" title="Sign Up">Change Password</button>
		  </div>
    </div>
	</form>


 </div>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
