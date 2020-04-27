<?php
session_start();
require("includes/connect.inc.php");

if(!isset($_SESSION['logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$query = $db->query("SELECT * FROM students WHERE username='$user'");
$row = $query->fetch_array();

?>
<!DOCTYPE html>
<html>
<title>Forum</title>
<?php include("includes/outer_header.inc.php"); ?>
<script src="jquery-3.2.1.js"></script>
<script>
function update()
{
    $.post("server.php", {}, function(data){ $("#screen").html(data);});  
	
	var div = document.getElementById('scroller');
	div.scrollTop = div.scrollHeight;
 
    setTimeout('update()', 1000);
}
 
$(document).ready(
 
function() 
{
	update();
 
	$("#button").click(    
		function() 
		{         
			$.post("server.php", 
				{ message: $("#message").val(), cur_user: "<?php echo $_SESSION['user']; ?>"},
				function(data){ 
					$("#screen").val(data); 
					$("#message").val("");
				}
			);
		}
    );
});
</script>
<body onload="showBottom()">

<?php include("includes/account_header.inc.php"); ?>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
<h1>CSC Forum <?php echo $user; ?></h1>
	<div class="w3-section w3-col w3-light-gray"  style="height:300px;overflow:auto;" id="scroller" >
		<div class="w3-section" id='screen' >
			
		</div>
	</div>
	<div class="w3-section w3-col">
		
			<div class="w3-section">      
				<textarea class="w3-input" type="text" name="hobbies" placeholder="Enter Your Message" id="message" ></textarea>
			</div>
			<button id="button" class="w3-button w3-right w3-theme-d3" title="Update"><i class="fa fa-send"></i></button>
		
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

function showBottom(){
	var div = document.getElementById('scroller');
	div.scrollTop = div.scrollHeight;
}

</script>

</body>
</html>