<?php
session_start();
if (!isset($_SESSION['id'])) {
	header("Location: ./");
} else if ($_SESSION['id'] != 1) {
	header("Location: ./");
}
include './header.php';
$dbh = include './dbconn.php';
$sql = "SELECT * FROM deposit where dummy = :dummy";
$params = array(':dummy' => "NO");
$sth = $dbh->prepare($sql);
$sth->execute($params);
$row = $sth->fetchall(PDO::FETCH_ASSOC);
?>
<style>
table,th,td {
    border: 1px solid black;
    padding: 5px;
}
</style>
<div class="container" style="text-align:center">
  <header>
    <h2 class="alt" style="text-align:center">SEITUku <?php if ($_SESSION['id']==1) {?> <b>(Super Administrator)</b> <?php } else { ?><b>(Administrator)</b> <?php } ?> </h2>
    <a href="./administrator.php"><button class="button">Go back to Administrator Main Page </button></a>
  </header>
  <h1>Showing all non-dummy data</h1>
  <table>
    <tr>
      <td>Student ID</td>
      <td>Date</td>
      <td>Amount</td>
   </tr>
    <?php
		if($row>0){
      foreach ($row as $rowData) {
     ?>
			<tr>
        <td><?php echo $rowData['student_id'] ?>
        <td><?php echo $rowData['deposit_date']; ?></td>
        <td>IDR <?php echo $rowData['amount_deposit']; ?></td>
      </tr>
  <?php }} ?>
    </table>
  </div>
