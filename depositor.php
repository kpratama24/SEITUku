<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
} else if ($_SESSION['roleId'] != 2) {
	header("Location: ./");
}

include './header.php';
?>
