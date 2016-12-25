<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./");
}

$dbh = include './dbconn.php';
$sql = "SELECT username FROM user WHERE id = :id";
$params = array(':id' => $_SESSION['id']);
$sth = $dbh->prepare($sql);
$sth->execute($params);

$row = $sth->fetch(PDO::FETCH_ASSOC);

$sql = "INSERT INTO `deposit` (`student_id`, `deposit_date`, `amount_deposit`) VALUES (:studentID, :date, :amount)";
$params = array(
  ':studentID' => $row['username'],
  ':date' => $_POST['date'],
  ':amount' => $_POST['amount']
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

header("refresh:1;./add_depo_own.php?depositrecordsuccess");
 ?>
 <h1> Please wait... </h1>
