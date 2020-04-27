<?php
session_start();
require("../includes/connect.inc.php");

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$user = $_SESSION['user'];

$last = date('j F Y');
$db->query("UPDATE administrators SET last='$last' WHERE username='$user'");

session_destroy();
header("Location: login.php");
?>