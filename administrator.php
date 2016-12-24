<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
	die("Redirected");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ./");
	die("Redirected");
}

include './header.php';
?>
