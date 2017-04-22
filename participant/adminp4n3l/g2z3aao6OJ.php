<?php
	  $dbh = include '../../dbconn.php';
    $sql = "SELECT name from participant";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $row = $sth->fetchall(PDO::FETCH_ASSOC);
    ?>
   	<!DOCTYPE html>
   	<html>
   	<head>
   		<title>Update Payment</title>
   		<meta name="viewport" content="width=device-width, initial-scale=1">
   	</head>
   	<body>
   		<form action="./g2z3aao6OJupdate.php" method="POST">
   			<select name="participant">
   				<?php foreach($row as $rowData){
            echo "<option value='".$rowData['name']."'>".$rowData['name']."</option>";
          }
   				?>
   			</select>
        <input type="number" name="payment">
        <input type="submit" name="submit">
   		</form>
   	</body>
   	</html>

