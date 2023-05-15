<!DOCTYPE HTML>

<!--
	Author: 
	Front-End: John Yohan J. Navarra
-->

<!--
	NOTE!!

	This part of the website includes the book section, specifically the categories, supposedly with a search bar for easier searching of books.
	
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
		
		<script type="text/javascript">
			var sqlPriority = "name";
			var sqlOrder = "asc";
		</script>
	</head>
	<body class="left-sidebar is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<section id="header" class="wrapper">

					<!-- Logo -->
						<div id="logo">
							<h1><span><a href="home.html">Yverdon Book Management System</a></span></h1>
							<p><b>The online book management system for Yverdon de Pestalozzi School</b></p>
						</div>

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li class="current"><a href="home.html"><strong>Home</strong></a></li>
								<li>
									<a href="books.html"><strong>Books</strong></a>
									<ul>
										<li><a href="#">Non-fiction</a></li>
										<li><a href="#">Education</a></li>
										<li><a href="#">Fiction</a></li>
										<li><a href="#">Literature</a></li>
										<li><a href="#">Entertainments</a></li>
										<li><a href="#">Philosophy</a></li>
									</ul>
								</li>
								<li><a href="userProfile.html"><strong>User Profile</strong></a></li>
								
								<!--Add logout link here-->
								<li><a href=""><strong>Logout</strong></a></li>
							</ul>
						</nav>
				</section>

			<!-- Main -->
				<section id="main" class="wrapper style3">
					<div class="title">Books</div>
					<div class="container">
						<div class="row gtr-150">
							<div class="col-4 col-12-medium">

								<!-- Sidebar -->
									<div id="sidebar">
										<section class="box">
											<header>
												<h2>Categories</h2>
											</header>
											<ul class="style2">
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/nonfic.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Non-fiction</a></h3>
														<p>Based on factual information and real events, providing readers with an opportunity to learn and expand their knowledge on various topics.</p>
													</article>
												</li>
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/edu.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Education</a></h3>
														<p>Designed to help readers acquire new knowledge and skills, and to improve their understanding of specific subjects. </p>
													</article>
												</li>
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/fic.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Fiction</a></h3>
														<p>books are works of the imagination, taking readers on a journey to new worlds, introducing them to new characters and telling them stories that entertain, inspire and move.</p>
													</article>
												</li>
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/literature.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Literature</a></h3>
														<p>Recognized for literary value, cultural importance, and complex themes, challenging readers to think deeply and critically.</p>
													</article>
												</li>
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/entert.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Entertainment</a></h3>
														<p>Provides readers with enjoyment and amusement, makes them laugh or feel entertained, and offer an escape from reality.</p>
													</article>
												</li>
												<li>
													<article class="box post-excerpt">
														<a href="#" class="image left"><img src="images/philo.png" alt="" style="border:none;"/></a>
														<h3><a href="#">Philosphy</a></h3>
														<p>Explore fundamental questions about existence, reality, and values, insights into the human condition, moral and ethical dilemmas, and the nature of knowledge and truth. </p>
													</article>
												</li>
											</ul>
										</section>
									</div>

							</div>

							<div class="col-8 col-12-medium imp-medium">
							
								<!-- Sorting -->
								<script src="assets/js/toggleDisplay.js"></script>
								<button value="sortTable" onclick="toggleDisplay(this.value)" style="color: #FFFFFF; margin-bottom: 24px;">Sort By</button>
								
								<ul id="sortTable" style="margin-bottom: 24px; display: none;">
									<li>
										<ul>
											<li><h1 id="sortOrder">Order: Ascending</h1></li>
											<li><button value="asc" onclick="printMessage(this.value)" style="color: #FFFFFF;">Ascending</button></li>
											<li><button value="desc" onclick="printMessage(this.value)" style="color: #FFFFFF;">Descending</button></li>
										</ul>
									</li>
									<li>
										<ul>
											<li><h1 id="sortPriority">Priority: Name</h1></li>
											<li><button value="name" onclick="printMessage(this.value)" style="color: #FFFFFF;">Name</button></li>
											<li><button value="id" onclick="printMessage(this.value)" style="color: #FFFFFF;">ID</button></li>
											<li><button value="author" onclick="printMessage(this.value)" style="color: #FFFFFF;">Author</button></li>
										</ul>
									</li>
								</ul>
								
								<!-- Search Bar -->
									<form style="margin-bottom: 50px;">
										<input type="text" placeholder="Search Here" name="search" id="searchBar" onkeyup="showSearch(this.value)">
									</form>

								<!-- Content -->
									<div id="content">
									
										<div class="row gtr-150" id="txtHint">
											<?php

												// Books.html Search Tool

												// Array with names
												$a = array();
												$conn = mysqli_connect("fdb1028.awardspace.net", "4299657_ydpbmsdatabase", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
												if ($conn -> connect_error) {
													die("Connection failed:". $conn -> connect_error);
												}
												$sql = "select name from books";
												$result = $conn -> query($sql);
												if ($result -> num_rows > 0) {
													while ($row = $result -> fetch_assoc()) {
														$a[] = $row["name"]; // $row must have a specified identifier to avoid nested array/system error
													}
												} else {
													exit;
												}
												
												// default display
												$stmt = $conn->prepare("select * from books order by name asc");
												$stmt->execute();
												$stmt_result = $stmt->get_result();
												
												while ($row = $stmt_result->fetch_assoc()) {
													echo '
														<div class="col-4 col-12-small">
															<section class="box books">
																<img src="'.$row["imgUrl"].'" alt="" class="image featured" style="margin-bottom: 1em;" />
																<center>
																	<header>
																		<h2 style="margin: 0 0 -10px 0; color: #484d55;">'.$row["name"].'</h2>
																	</header>
																	<a href="'.$row["siteUrl"].'" class="button style1" style="margin-bottom: 20px;">More</a>
																</center>
															</section>
														</div>
													';
												}
											
												$conn -> close();	
												
											?>
										</div>
										
									</div>

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

						</header>
						<div class="row">
							<div class="col-6 col-12-medium">

								<!-- Contact Form -->
									<section>
										<form method="post" action="#">
											<div class="row gtr-50">
												<div class="col-6 col-12-small">
													<input type="text" name="name" id="contact-name" placeholder="Name" />
												</div>
												<div class="col-6 col-12-small">
													<input type="text" name="email" id="contact-email" placeholder="Email" />
												</div>
												<div class="col-12">
													<textarea style="max-width: 100%;" name="message" id="contact-message" placeholder="Message" rows="4"></textarea>
												</div>
												<div class="col-12">
													<ul class="actions">
														<li><input type="submit" class="style1" value="Send" /></li>
														<li><input type="reset" class="style2" value="Reset" /></li>
													</ul>
												</div>
											</div>
										</form>
									</section>

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
														<a href="#">facebook.com/1997ydpsi</a>
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
								<li>&copy; Das Kumarades LLC. EST. 2023. All rights reserved.</li><li><a href="about.html" style="text-decoration: none;">About us</a></li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
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
		<script src="assets/js/sort.js"></script>
		<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
		<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

	</body>
</html>

