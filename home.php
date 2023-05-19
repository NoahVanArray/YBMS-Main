<?php session_start(); if(!isset($_SESSION["userEmail"])) { header('Refresh: 0; url=index.php'); } ?>

<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
	Back-End: Angelo Kurt B. Rosal
-->

<html>
	<head>
		<title>Yverdon Book Management System</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<!--The icon beside the title on the website's tab on the browser, change directory accordingly.-->
		<link rel="apple-touch-icon" sizes="180x180" href="images/favicon_io/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="images/favicon_io/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="images/favicon_io/favicon-16x16.png">
		<link rel="manifest" href="images/favicon_io/site.webmanifest">


	</head>
	
	<body class="homepage is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><span><a href="home.php">Yverdon Book Management System</a></span></h1>
							<p><b>The online book management system for Yverdon de Pestalozzi School</b></p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="home.php"><strong>Home</strong></a></li>
								<li>
									<a href="books.php"><strong>Books</strong></a>
									<ul>
										<li><a href="books.php">Non-fiction</a></li>
										<li><a href="books.php">Education</a></li>
										<li><a href="books.php">Fiction</a></li>
										<li><a href="books.php">Literature</a></li>
										<li><a href="books.php">Entertainments</a></li>
										<li><a href="books.php">Philosophy</a></li>
									</ul>
								</li>
								<li><a href="userProfile.php"><strong>User Profile</strong></a></li>
								
								<!--Add logout link here-->
								<li><a href="index.php"><strong>Logout</strong></a></li>
							</ul>
						</nav>
				</section>

			<!-- Intro -->
				<section id="intro" class="wrapper style1">
					<div class="title">WELCOME!</div>
					<div class="container">
						<p class="style1">Are you interested in books?</p>
						<p class="style2">
							Well you're in luck!<br class="mobile-hide" />
						</p>
						<p class="style1">
							This website is created for the library of Yverdon de Pestalozzi School, Inc. for your convenience in discovering books.
						</p>
						<ul class="actions">
							<li><a href="books.php" class="button style3 large">Proceed</a></li> 
						</ul>
					</div>
				</section>
			
			<!-- Highlights (Random Features) -->
				<section id="highlights" class="wrapper style2">
					<div class="title">Random Features</div>
						<div class="container">
							<div class="row aln-center">
								<?php
									$conn = mysqli_connect("fdb1028.awardspace.net", "4299657_ydpbmsdatabase", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
									if ($conn->connect_error) {
										echo "$conn->connect_error";
										die("Connection Failed : ". $conn->connect_error);
									}
									else {
										$a = array(); $b = array(); $c = array(); $d = array(); $e = array();
										
										$sql = "select * from books";
										$result = $conn -> query($sql);
										if ($result -> num_rows > 0) {
											while ($row = $result -> fetch_assoc()) {
												$e[] = $row["name"]; // $row must have a specified identifier to avoid nested array/system error
											}
											shuffle($e);
											foreach ($e as $shuffledrow) {
												$stmt = $conn->prepare("select * from books where name = ?");
												$stmt -> bind_param("s", $shuffledrow);
												$stmt -> execute();
												$result = $stmt -> get_result();
												$row = $result -> fetch_assoc();
												$a[] = $row["name"];
												$b[] = $row["description"];
												$c[] = $row["imgUrl"];
												$d[] = $row["siteUrl"];
											}
											shuffle($row);
										} else {
											exit;
										}
										for ($x = 0; $x < 3; $x++) {
											$num = range(1, ($result -> num_rows) - 1); // to make unique randomizer, create and then shuffle array with every book number.
											shuffle($num);
											echo "
												<div class='col-4 col-12-medium'>
													<section class='highlight'>
														<a class='image featured' style='width: 100%;'><img src='".$c[$x]."' alt='' style='margin-bottom: 25px; width: 100%;'/></a>
														<h3><a href='#'>".$a[$x]."</a></h3>
														<p style='margin-bottom: -15px;'>".$b[$x]."</p>
													<ul class='actions'>
															<li><a href='".$d[$x]."' class='button style1'>Learn More</a></li>
														</ul>
													</section>
												</div>
											";
										}
									}
								?>
						</div>
					</div>
				</section>

			<!-- Categories -->
				<section id="main" class="wrapper style3">
					<div class="title">Categories</div>
					<div class="container">

						<!-- Features -->
							<section id="features">
								<header class="style1">
									<h2>Are you looking for your next great read?</h2>
									<p>Discover a world of possibilities in our book categories! From fiction and literature to science and history, we have something for every reader. Browse our extensive collection and find your next favorite book!</p>
								</header>
								<div class="feature-list">
									<div class="row">
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon"><a href="books.php"><span ><img src="images/nonfic.png" style="width: 45px; height: auto;"></span>Non-fiction</h3></a>
												<p>Based on factual information and real events, providing readers with an opportunity to learn and expand their knowledge on various topics.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon"><a href="books.php"><span ><img src="images/edu.png" style="width: 45px; height: auto;"></span>Education</h3></a>
												<p>Designed to help readers acquire new knowledge and skills, and to improve their understanding of specific subjects.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon"><a href="books.php"><span ><img src="images/fic.png" style="width: 45px; height: auto;"></span>Fiction</h3></a>
												<p>These books are works of the imagination, taking readers on a journey to new worlds, introducing them to new characters and telling them stories that entertain, inspire and move.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon solid"><a href="books.php"><span ><img src="images/literature.png" style="width: 45px; height: auto;"></span>Literature</h3></a>
												<p>Recognized for literary value, cultural importance, and complex themes, challenging readers to think deeply and critically.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon solid"><a href="books.php"><span ><img src="images/entert.png" style="width: 45px; height: auto;"></span>Entertainment</h3></a>
												<p>Provides readers with enjoyment and amusement, makes them laugh or feel entertained, and offer an escape from reality.</p>
											</section>
										</div>
										<div class="col-6 col-12-medium">
											<section>
												<h3 class="icon solid"><a href="books.php"><span ><img src="images/philo.png" style="width: 45px; height: auto;"></span>Philosophy</h3></a>
												<p>Explore fundamental questions about existence, reality, and values, insights into the human condition, moral and ethical dilemmas, and the nature of knowledge and truth.</p>
											</section>
										</div>
									</div>
								</div>
							</section>

					</div>
				</section>

			<!-- Footer -->
				<section id="footer" class="wrapper">
					<div class="title">Want to know more?</div>
					<div class="container">
						<header class="style1">
							<h2>Check out the library.<br> Visit us to check out those awesome books!</h2>
							<p style="color: rgb(72, 77, 85);">Or hit us up with a message...</p>

						</header>
						<div class="row">
							<div class="col-6 col-12-medium">

								<!-- Contact Form -->
								<section>
									<script src="assets/js/request.js"></script>
									<form method="post">
										<div class="row gtr-50">
											<div class="col-12">
												<textarea style="max-width: 100%;" name="message" id="contact-message" placeholder="Message" rows="4" required></textarea>
											</div>
											<div class="col-12">
												<ul class="actions">
													<li><input type="submit" class="style1" value="Send" onclick="return requestAccept('Feedback')" /></li>
													<li><input type="reset" class="style2" value="Reset" style="color: #484d55;" /></li>
												</ul>
											</div>
										</div>
									</form>
								</section>
								<p id="demo"></p>

							</div>
							<div class="col-6 col-12-medium">

								<!-- Contact -->
									<section class="feature-list small">
										<div class="row">
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-home">Address</h3>
													<p>
														Official Yverdon de Pestalozzi School, Inc.<br />
														Igay Rd., Sto. Cristo, SJDM
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-comment">Social</h3>
													<p>
														<a href="https://www.facebook.com/1997ydpsi">facebook.com/1997ydpsi</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-envelope">Email</h3>
													<p>
														<a href="#">ydpsedu@ymail.com</a>
													</p>
												</section>
											</div>
											<div class="col-6 col-12-small">
												<section>
													<h3 class="icon solid fa-phone">Phone/Mobile</h3>
													<p>
														(044) 307 3381<br>
														09178504350
													</p>
												</section>
											</div>
										</div>
									</section>

							</div>
						</div>
						<div id="copyright">
							<ul>
								<li>&copy; Das Kumarades LLC. EST. 2023. All rights reserved.</li><li><a href="about.php" style="text-decoration: none;">About us</a></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
							</ul>
						</div>
					</div>
				</section>

		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>