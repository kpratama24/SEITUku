<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: ./");
}

$dbh = include './dbconn.php';
$sql = "INSERT INTO `deposit` (`student_id`, `deposit_date`, `amount_deposit`, `dummy`) VALUES (:studentID, :date, :amount, :dummy)";
$params = array(
  ':studentID' => $_POST['studentID'],
  ':date' => $_POST['date'],
  ':amount' => $_POST['amount'],
  ':dummy' => "NO"
);
$sth = $dbh->prepare($sql);
$sth->execute($params);

header("refresh:1;./add_depo_other.php?depositrecordsuccess");
 ?>
 <h1>Please wait...</h1>
