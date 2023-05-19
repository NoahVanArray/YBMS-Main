<?php session_start(); if(!isset($_SESSION["userEmail"])) { header('Refresh: 0; url=index.php'); } ?>

<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
	Back-End: Angelo Kurt B. Rosal
-->

<!--
	NOTE!!

	This part of the website is supposedly for the about section, if applicable. (To be assessed)

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
	<body class="no-sidebar is-preload">
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

			<!-- Main -->
				<div id="main" class="wrapper style2">
					<div class="title">About Us</div>
					<div class="container">

						<!-- Content -->
							<div id="content">
								<article class="box post">
									<header class="style1">
										<h2>Learn More About Us</h2>
										<p>The People Behind This Website</p>
									</header>
									
									<p>Welcome to the <strong>Yverdon de Pestalozzi School Inc.</strong> book management website! We are a team of senior high school students who have worked hard to create a space where students can explore new worlds, expand their knowledge and discover a love for reading.</p>
									<p>As a team, we believe that books have the power to shape our understanding of the world around us, spark our curiosity and inspire us to take action. That's why we have curated a diverse collection of books that reflect different perspectives, cultures, and experiences.</p>
									<p>Our goal is to provide a welcoming and inclusive space where students can find books that resonate with them and inspire them to think critically and creatively. We are passionate about creating a love for reading in our community and hope that our library will serve as a place where students can connect with one another, share ideas and explore the world of literature together.</p>
									<p>Thank you for visiting our website and we hope you find what you are looking for. Happy reading!</p>
									
								</article>
							</div>

					</div>
				</div>

			<!-- Highlights -->
				<section id="highlights" class="wrapper style3">
					<div class="title">The Team</div>
					<div class="container">
						<div class="row aln-center">
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/mamauag.png" alt="" class="image featured"/>
									<h3>Jefferson G. Mamauag</h3>
									<h4>Leader</h4>
									<p style="text-align: left;">Jefferson, our team leader, combines project management and web development expertise to drive our team to success. With clear communication and collaborative skills, he ensures on-time and on-budget project delivery.</p>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/navarra.png" alt="" class="image featured"/>
									<h3>John Yohan J. Navarra</h3>
									<h4>Front-End Developer</h4>
									<p style="text-align: left;">Front-end developer Yohan brings websites to life with expertise in HTML, CSS, and JavaScript. Passionate about creating intuitive user interfaces, Yohan pushes the boundaries of web development with stunning and responsive designs.</p>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/rosal.jpg" alt="" class="image featured"/>
									<h3>Angelo Kurt Rosal</h3>
									<h4>Back-End Developer</h4>
									<p style="text-align: left;">Our back-end expert Angelo builds and maintains smooth-functioning website backbones with secure databases. His dedication to quality code and troubleshooting makes him an invaluable team member.</p>
									</ul>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/armel.png" alt="" class="image featured"/>
									<h3>Armel Dominic Jalos</h3>
									<h4>Researcher</h4>
									<p style="text-align: left;">Armel, our skilled researcher, keeps us up-to-date on web dev best practices and user experience. His expertise ensures our websites are visually stunning and user-friendly.</p>
									</ul>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/reyes.png" alt="" class="image featured"/>
									<h3>Jan Andrei M. Reyes</h3>
									<h4>Data Collector</h4>
									<p style="text-align: left;">Reyes is a meticulous data collector with strong organizational skills, collecting large amounts of data accurately and efficiently. He constantly improves our data collection processes, making him a valuable team member. </p>
									</ul>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/ponferrada.png" alt="" class="image featured"/>
									<h3>Alexi Jude R. Ponferrada</h3>
									<h4>Data Collector</h4>
									<p style="text-align: left;">Our data collector Alexi has a passion for both collecting data and analyzing it to uncover insights that can inform our business decisions. His ability to think creatively and outside of the box allows us to gain new perspectives on our data and make data-driven decisions.</p>
									</ul>
								</section>
							</div>
							<div class="col-3 col-12-medium">
								<section class="highlight">
									<img src="images/tompong.png" alt="" class="image featured"/>
									<h3>Judelyn R. Tompong</h3>
									<h4>Data Collector</h4>
									<p style="text-align: left;">Our data collector Judelyn is a skilled researcher who knows how to find the information we need quickly and efficiently. With her expertise in a variety of research tools and techniques, she is able to gather and organize data in a way that makes it easy for our team to use.</p>
									</ul>
								</section>
							</div>
						</div>
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