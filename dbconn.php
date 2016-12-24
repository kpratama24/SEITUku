<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'seituku';
try {
	return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
} catch (PDOException $e) {
	die('Connection failed: ' . $e->getMessage());
}
?>
