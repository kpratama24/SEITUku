<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ./");
}

include './header.php';
?>
