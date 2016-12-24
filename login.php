<?php
if (isset($_POST['username']) && preg_match('/^[ ]*[a-zA-Z0-9_]{4,32}[ ]*$/', $_POST['username'])) {
  $username = strtolower(trim($_POST['username']));
} else {
  header("Location: ./index.php?");
}
if (isset($_POST['password']) && $_POST['password']) {
  $password = $_POST['password'];
} else {
  header("Location: ./index.php?");
}

$dbh = include './dbconn.php';
$sql = "SELECT id, password, role_id FROM user WHERE username = :username";
$params = array(':username' => $username);
$sth = $dbh->prepare($sql);
$sth->execute($params);

if ($sth->rowCount()) {
  $row = $sth->fetch(PDO::FETCH_ASSOC);
  if ($row['password']==$password) {
    session_start();
    $_SESSION['id'] = $row['id'];
    /*For depositor_search.php purpose **/$_SESSION['username'] = $row['username'];//
    $_SESSION['roleId'] = $row['role_id'];

    header("Location: ./index.php");
  } else {
    header("Location: ./index.php");
  }
} else {
  header("Location: ./index.php");
}
 ?>
