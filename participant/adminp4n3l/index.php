<?php if($_GET['id']==b9a0cb0e34c4eb9fa80f3fbaa5dfe3026b1d3e81){
    
    $dbh = include '../../dbconn.php';
    $sql = "SELECT name,student_id,unique_key from participant";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $row = $sth->fetchall(PDO::FETCH_ASSOC);
?>
<html>
    <head>
        <title>Authenticated</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <style>
    table,th,td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
    <body>
        <table>
            <tr>
                <td>Name</td>
                <td>Student ID</td>
                <td>unique_key</td>
            <tr>
            <?php
		if($row>0){
      foreach ($row as $rowData) {
     ?>
			<tr>
        <td><?php echo $rowData['name'] ?>
        <td><?php echo $rowData['student_id']; ?></td>
        <td><?php echo $rowData['unique_key']; ?></td>
      </tr>
  <?php }} ?>
        </table>
    </body>
</html>
<?php }
else{
    echo "You don't have permission to access this page";
}?>