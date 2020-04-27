<?php
session_start();
require("includes/connect.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM resources WHERE filetype='ppt' OR filetype='pptx'");

?>
<!DOCTYPE html>
<html>
<title>My Account</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<h1 class="w3-xxlarge"> Presentations</h1>
	<ul class="w3-ul w3-hoverable w3-white">
		<?php
			while($row = $query->fetch_array()){
				echo "<li class=\"w3-padding-16\">
						<i class=\"fa fa-file-pdf-o w3-xxlarge\" ></i>
						<span class=\"w3-large\">".$row['filename']."</span><br>
						<span>added by ".$row['addedBy']."</span> <a href=\"".$row['filetype']."/".$row['id'].".".$row['filetype']."\"><i class=\"fa fa-download w3-right w3-xlarge\"></i></a>
					  </li>";
			}
		?> 
    </ul>
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