<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
} else if ($_SESSION['roleId'] != 1) {
	header("Location: ./");
}

include './header.php';
$dbh = include './dbconn.php';
$sql = "SELECT username FROM user WHERE id = :id";
$params = array(':id' => $_SESSION['id']);
$sth = $dbh->prepare($sql);
$sth->execute($params);

$row = $sth->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
  <header>
    <h2 class="alt" style="text-align:center">SEITUku</h2>
    <p style="text-align:center">Welcome <?php echo $row['username']; ?> ! <a href="./logout.php">Logout</a></p>
  </header>
  <div style="text-align:center">
    <h2>Search Depositor Data</h2>
    <form action="depositor_search.php" method="get">
      <input type="text" name="studentID" placeholder="Student ID"><br>
      <input type="submit" value="Search">
    </form>
    <br>
    <h2>Actions</h2>
    <a href="./add_depo_other.php"><button class="button">Add Deposit (Other Depositor)</button></a>
    <a href="./add_depo_own.php"><button class="button">Add Deposit (Own Deposit)</button></a>

  </div>
</div>
