<?php
session_start();
if (!isset($_SESSION['id'])) {
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
$total= 0;
$sqlDeposit = "SELECT deposit_date, amount_deposit FROM deposit WHERE student_id = :id";
$params = array(':id' => $_GET['studentID']);
$sthDeposit = $dbh->prepare($sqlDeposit);
$sthDeposit->execute($params);

$rowDeposit = $sthDeposit->fetchall(PDO::FETCH_ASSOC);
?>
<style>
table,th,td {
    border: 1px solid black;
    padding: 5px;
}
</style>
<div class="container" style="text-align:center">
  <header>
    <h2 class="alt" style="text-align:center">SEITUku</h2>
    <a href="./administrator.php"><button class="button">Go back to Administrator Main Page </button></a>
    <p style="text-align:center">Deposit for <?php echo $_GET['studentID']; ?></p>
  </header>
    <?php
    if($rowDeposit>0){
      foreach ($rowDeposit as $rowdepo) {
     ?>
     <table>
       <tr>
         <td>Number</td>
         <td>Date</td>
         <td>Amount</td>
       </tr>
      <tr>
        <td><?php echo $count; ?></td>
        <td><?php echo $rowdepo['deposit_date']; ?></td>
        <td>IDR <?php echo $rowdepo['amount_deposit']; ?></td>
      </tr>
      <?php $count++; ?>
      <?php }}
      foreach ($rowDeposit as $rowdepo) {
        $total += $rowdepo['amount_deposit'];
      }
      ?>
      <h2>Deposit Total : IDR <?php echo $total; ?></h2>
  </table>
</div>
<?php include "./footer.php" ?>
