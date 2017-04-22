<?php 
	$dbh = include '../../dbconn.php';
	$name = $_POST['participant'];
	$payment = $_POST['payment'];
	$sql = "UPDATE participant SET payment_total = :payment WHERE name = :name";
	$params = array(':payment' => $payment,':name' => $name);
	$sth = $dbh->prepare($sql);
	$sth->execute($params);
	echo "Update done";
	echo "<a href=./g2z3aao6OJ.php> <button> Go Back </button></a>"
 ?>