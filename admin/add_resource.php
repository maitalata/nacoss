<?php
session_start();
include("../includes/connect.inc.php");
$page = "settings";

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$name= $response= "";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $validator = new DataValidation();

  $name = $validator->validate($_POST['name']);
  
  if(!empty($name) && is_uploaded_file($_FILES['file']['tmp_name'])){
	  if($_FILES['file']['type'] == 'application/pdf'){
		  if($db->query("INSERT INTO resources(filename, filetype, addedBy) VALUES ('$name','pdf','$user')")){
				  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
								<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Resource added successfully</h6>
								</div>";
				$id = $db->query("SELECT * FROM resources ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
				$filename = $id.".pdf";
				move_uploaded_file($_FILES['file']['tmp_name'],"../pdf/".$filename);
			}else{
				  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add resource </h6>
								</div>";
			}
	  }else if($_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'){
		  if($db->query("INSERT INTO resources(filename, filetype, addedBy) VALUES ('$name','docx','$user')")){
				  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
								<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Resource added successfully</h6>
								</div>";
				$id = $db->query("SELECT * FROM resources ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
				$filename = $id.".docx";
				move_uploaded_file($_FILES['file']['tmp_name'],"../docx/".$filename);
			}else{
				  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add resource</h6>
								</div>";
			}
	  }else if($_FILES['file']['type'] == 'application/msword'){
		  if($db->query("INSERT INTO resources(filename, filetype, addedBy) VALUES ('$name','doc','$user')")){
				  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
								<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Resource added successfully</h6>
								</div>";
				$id = $db->query("SELECT * FROM resources ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
				$filename = $id.".doc";
				move_uploaded_file($_FILES['file']['tmp_name'],"../doc/".$filename);
			}else{
				  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add resource</h6>
								</div>";
			}
	  }else if($_FILES['file']['type'] == 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
		  if($db->query("INSERT INTO resources(filename, filetype, addedBy) VALUES ('$name','pptx','$user')")){
				  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
								<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Resource added successfully</h6>
								</div>";
				$id = $db->query("SELECT * FROM resources ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
				$filename = $id.".pptx";
				move_uploaded_file($_FILES['file']['tmp_name'],"../pptx/".$filename);
			}else{
				  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add resource</h6>
								</div>";
			}
	  }else if($_FILES['file']['type'] == 'application/vnd.ms-powerpoint'){
		  if($db->query("INSERT INTO resources(filename, filetype, addedBy) VALUES ('$name','ppt','$user')")){
				  $response = "<div class=\"w3-panel w3-green w3-leftbar \">
								<h6><i class=\"fa fa-check w3-green w3-margin-right\"></i> Resource added successfully</h6>
								</div>";
				$id = $db->query("SELECT * FROM resources ORDER BY id DESC LIMIT 0, 1")->fetch_array()['id'];
				$filename = $id.".ppt";
				move_uploaded_file($_FILES['file']['tmp_name'],"../ppt/".$filename);
			}else{
				  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> System unable to add resource</h6>
								</div>";
			}
	  }else{
		  $response = "<div class=\"w3-panel w3-red w3-leftbar \">
								<h6><i class=\"fa fa-times w3-deep-orange w3-margin-right\"></i> Unsupported resource file format</h6>
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
    <h3><b><i class="fa fa-plus"></i> Add Resource</b></h3>
  </header>
	<form action="" enctype="multipart/form-data" method="POST">
		<div class="w3-panel">
		<?php echo $response; ?>
		  <label>Name</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Resource Name" name="name" required >
		  <label>File</label>
		  <input class="w3-input w3-border w3-margin-bottom" type="file" placeholder="Username" name="file" required >
		  <div class="w3-section"> 
			<button type="submit" class="w3-button w3-left w3-theme-d3" title="Sign Up">Add Resource</button>
		  </div> 
		</form>
    </div>


 </div>

<?php include("../includes/admin_footer.inc.php"); ?>
</body>
</html>
