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

$count = 1;
$total = 0;
$sqlDeposit = "SELECT deposit_date, amount_deposit FROM deposit WHERE student_id = :id";
$paramsDeposit = array(':id' => $row['username']);
$sthDeposit = $dbh->prepare($sqlDeposit);
$sthDeposit->execute($paramsDeposit);

$rowDeposit = $sthDeposit->fetchall(PDO::FETCH_ASSOC);
?>
<style>
table,th,td {
    border: 1px solid black;
    padding: 5px;
}
</style>
<div class="container">
  <header>
    <h2 class="alt" style="text-align:center">SEITUku <?php if ($_SESSION['id']==1) {?> <b>(Super Administrator)</b> <?php } else { ?><b>(Administrator)</b> <?php } ?> </h2>
    <p style="text-align:center">Welcome <?php echo $row['username']; ?> ! <a href="./logout.php">Logout</a></p>
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
  </table>
	<?php if($total>0) echo "Total : IDR". $total ?>
	<hr>
	<h1>Administrator Section</h1>
  <div style="text-align:center">
    <h2>Search Depositor Data</h2>
    <form action="depositor_search.php" method="get">
      <input type="text" name="studentID" placeholder="Student ID" style="text-align:center" maxlength="10" required><br>
      <input type="submit" value="Search">
    </form>
    <br>
    <h2>Actions</h2>
    <a href="./add_depo_other.php"><button class="button">Add Deposit (Other Depositor)</button></a><br><br>
    <a href="./add_depo_own.php"><button class="button">Add Deposit (Own Deposit)</button></a>

  </div>
</div>
<?php include "./footer.php" ?>
