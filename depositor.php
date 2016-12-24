<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
} else if ($_SESSION['roleId'] != 2) {
	header("Location: ./");
}

include './header.php';

$dbh = include './dbconn.php';
$sql = "SELECT username FROM user WHERE id = :id";
$params = array(':id' => $_SESSION['id']);
$sth = $dbh->prepare($sql);
$sth->execute($params);

$row = $sth->fetch(PDO::FETCH_ASSOC);

$count = 1;
$total = 0;
$sqlDeposit = "SELECT deposit_date, amount_deposit FROM deposit WHERE student_id = :id";
$paramsDeposit = array(':id' => $row['username']);
$sthDeposit = $dbh->prepare($sqlDeposit);
$sthDeposit->execute($paramsDeposit);

$rowDeposit = $sthDeposit->fetchall(PDO::FETCH_ASSOC);
?>
<style>
table {
    border: 1px solid black;
}
</style>
<div class="container">
  <header>
    <h2 class="alt" style="text-align:center">SEITUku</h2>
    <p style="text-align:center">Welcome <?php echo $row['username']; ?> ! <a href="./logout.php">Logout</a></p>
  </header>
  <table>
    <tr>
      <td>Number</td>
      <td>Date</td>
      <td>Amount</td>
    </tr>
    <?php
      foreach ($rowDeposit as $rowdepo) {
     ?>
      <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $rowdepo['deposit_date']; ?></td>
        <td>IDR <?php echo $rowdepo['amount_deposit']; ?></td>
      </tr>
      <?php $count++; ?>
      <?php }
      foreach ($rowDeposit as $rowdepo) {
        $total += $rowdepo['amount_deposit'];
      }
      ?>
      <h2>Deposit Total : IDR <?php echo $total; ?></h2>
  </table>
</div>
