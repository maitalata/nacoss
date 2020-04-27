<?php
session_start();
require("includes/connect.inc.php");

if(!isset($_SESSION['admin_logged'])){
	header("Location: login.php");
}

if(!isset($_GET['id'])){
	header("Location: account.php");
}

$id = $_GET['id'];

$db->query("DELETE FROM institutions WHERE id='$id'");

header("Location: institutions.php");
?>