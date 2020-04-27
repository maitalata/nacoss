<?php
session_start();
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '123';

$conn = mysqli_connect($dbhost, $dbuser, $dbpass) 
or die ('Error connecting to mysql');
 
$dbname = 'nacoss';
 
mysqli_select_db($conn, $dbname);
 
@$message = $_POST['message'];
$cur_user = $_SESSION['user'];
 
if($message != "")
{
 $sql = "INSERT INTO cscforum(user, message) VALUES('$cur_user','$message')";
 mysqli_query($conn, $sql);
}
 
$sql = "SELECT user, message FROM cscforum";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)){
	if($row['user'] == $cur_user){
		echo "<div class=\"w3-white w3-panel w3-right-align\">
		<span style='color:green;'>".$row['user'].":</span><br>".$row['message']."</div>";
	}else{
		echo "<div class=\"w3-white w3-panel\">
		<span style='color:green;'>".$row['user'].":</span><br>".$row['message']."</div>";
	}
}
 
 
?>