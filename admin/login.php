<?php
session_start();
require("../includes/connect.inc.php");

$response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username= $password= "";
	$data_check = new DataValidation();
	
	$username = $data_check->validate($_POST['username']);
	$password = $data_check->validate($_POST['password']);
	
	$password = md5($password);
	$query = $db->query("SELECT * FROM administrators WHERE username='$username' AND password='$password'");
	
	if($query->num_rows == 1){
		$row = $query->fetch_row();
		$_SESSION['admin_logged'] = true;
		$_SESSION['user'] = $row[2];
		header("Location: index.php");
	}else{
		$response = "<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> Incorrect username or password</h6>";
	}
}
?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/w3-theme-blue-grey.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<body class="w3-white">
	<div class="w3-content w3-padding-large w3-margin-top" id="login">
		<div class="w3-light-grey w3-padding-large w3-padding-32 w3-margin-top" id="contact">
			<h3 class="w3-center">Login</h3>
			<hr>
			<div class="w3-panel w3-red w3-leftbar ">
			<?php echo $response; ?>
		  </div>
			<form action="" method="POST">
			  <div class="w3-section">
				<input class="w3-input w3-border" type="text" placeholder="Username" required name="username">
			  </div>
			  <div class="w3-section">
				<input class="w3-input w3-border" type="password" placeholder="Password" required name="password">
			  </div>
			  <button type="submit" class="w3-button w3-block w3-dark-grey">Login</button>
			</form><br>
		</div>
	</div>
</body>
</html>
