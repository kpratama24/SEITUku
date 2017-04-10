<?php
	if(!isset($_POST['unique'])){
		header("Location:./index.html");
	}

	$dbh = include '../dbconn.php';
	$sql = "SELECT name,student_id,payment_total,unique_key from participant where unique_key = :unique_key";
	$params = array(':unique_key' => $_POST['unique']);
	$sth = $dbh->prepare($sql);
	$sth->execute($params);

	$row = $sth->fetch(PDO::FETCH_ASSOC);
?>
<html>
	<head>
		<title><?php echo $row['name']?></title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-diamond"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Hi <?php echo $row['name']?></h1>
								<p>Welcome to SEITU 2017</p>
							</div>
						</div>
						<nav>
							<ul>
								<li><a href="#payment">Payment</a></li>
								<li><a href="#detail">Detail</a></li>
								<li><a href="./">Exit</a></li>
							</ul>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- Intro -->
							<article id="payment">
								<h2 class="major">Payment Status</h2>
								<h3><?php if($row['payment_total']==600000){
									echo "Full Payment";
								}
								else if($row['payment_total']>0){
									echo "Partial Payment";
								}
								else{
									echo "No Payment Data";
								}?></h3>
								<p><?php if($row['payment_total']>0) {
									echo "Your payment total is ".$row['payment_total'];
								}?></p>
							</article>

						<!-- Work -->
							<article id="detail">
								<h2 class="major">Your Detail</h2>
								<ul>
									<li> Name : <b><?php echo $row['name']?></b></li>
									<li> Student ID : <b><?php echo $row['student_id']?></b></li>
									<li> Unique Key : <b><?php echo $row['unique_key']?></b></li>
								</ul>
								<b><p style="color:red">Don't share your unique key !</p></b>
							</article>
					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; SEITU 2017. Property of <a href="http://nearkevin.cu.cc">NearKevin</a>.</p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
