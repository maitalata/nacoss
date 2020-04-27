<?php
require("includes/connect.inc.php");

?>
<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<?php include("includes/outer_header.inc.php"); ?>
<body>

<?php include("includes/inner_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
	<h1 class="w3-margin w3-center w3-xxlarge">Registered successfully! You can login after your registration has been verified by site adninistrators</h1>
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
