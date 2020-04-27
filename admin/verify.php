<?php
session_start();
require("../includes/connect.inc.php");

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

$id = $_GET['id'];


$db->query("UPDATE students SET status='VERIFIED' WHERE id='$id'");

header("Location: all_students.php");
?>