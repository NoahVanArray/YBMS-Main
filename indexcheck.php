<?php

	// Session Storage

	session_start();
	session_unset();

	// Login
	
	if (isset($_POST['loginSubmit'])) { 
		$email1 = $_POST['emailvar'];
		$password1 = $_POST['passwordvar'];
		$conn = mysqli_connect("localhost", "root", "", "ydpbms");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn -> connect_error);
		}
		else {
			$stmt = $conn->prepare("select * from users where email = ? and password = ?");
			$stmt->bind_param("ss", $email1, $password1);
			$stmt->execute();
			$stmt_result = $stmt -> get_result();
			$row = $stmt_result -> fetch_assoc();
			if ($stmt_result->num_rows == 1) {
				// create/add to log query
				$date = date("Y/m/d");
				$stmt = $conn -> prepare("select * from logs where date = ?");
				$stmt -> bind_param("s", $date);
				$stmt -> execute();
				$result = $stmt -> get_result();
				if ($result->num_rows < 1) { 
					$stmt = $conn -> prepare("select sum(stock) as totalsum from books");
					$stmt -> execute();
					$result = $stmt -> get_result();
					$row = $result -> fetch_assoc(); 
					$sum = $row['totalsum'];
					$stmt = $conn -> prepare("insert into logs (visits, stockDiff, bookStock, adminComment) VALUES (1, 0, ?, NULL)");
					$stmt -> bind_param("i", $sum);
					$stmt -> execute();
				}
				else { 
					$stmt = $conn -> prepare("update logs set visits = (visits + 1) where date = ?");
					$stmt -> bind_param("s", $date);
					$stmt -> execute();
				}
				
				$_SESSION["userEmail"] = $email1;
				// create a select * from logs where date = getdate(), and if no num_rows, create a new row with that date set
				if ($row["isAdmin"] == "1") {
					$_SESSION["isAdmin"] = $row["isAdmin"];
					header('Refresh: 0; url=admin/adminHome.php');
				}
				else {
					header('Refresh: 0; url=home.php');
				}
			}
			else {
				$_SESSION["error"] = "The email or password is incorrect.";
				header('Refresh: 0; index.php');
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}

	// Registration

	if (isset($_POST['registerSubmit'])) {
		$fname2 = $_POST['fname2'];
		$lname2 = $_POST['lname2'];
		$grade2 = $_POST['grade2'];
		$section2 = $_POST['section2'];
		$email2 = $_POST['email2'];
		$conn = mysqli_connect("localhost", "root", "", "ydpbms");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			if ($grade2 > 12 || $grade2 < 1) { 
				$_SESSION["error"] = "The grade level is invalid.";
				header('Refresh: 0; index.php');
				exit;
			}
			$stmt = $conn->prepare("select email from users where email = ?"); 
			$stmt->bind_param("s", $email2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				$_SESSION["error"] = "Email is already used.";
				header('Refresh: 0; index.php');
				exit;
			}
			$stmt = $conn->prepare("select lname from users where fname = ? and lname = ?");
			$stmt->bind_param("ss", $fname2, $lname2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				$_SESSION["error"] = "The combination of names are already used.";
				header('Refresh: 0; index.php');
				exit;
			}
			$stmt = $conn->prepare("select email from requests where email = ? and type = 'Account Creation'");
			$stmt->bind_param("s", $email2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				$_SESSION["error"] = "A registration request from this email is already made.";
				header('Refresh: 0; index.php');
				exit;
			}
			else {
				$stmt = $conn->prepare("insert into requests(fname, lname, grade, section, email, type, status) values(?, ?, ?, ?, ?, 'Account Creation', 'ongoing')");
				$stmt->bind_param("ssiss", $fname2, $lname2, $grade2, $section2, $email2);
				$stmt->execute();
				$_SESSION["error"] = "Request to register is successful. Check your email regularly for the one-time password to use in your login. You may change it within the main site once you have logged in.";
				header('Refresh: 0; index.php');
				$_SESSION["success"] = 1;
				$stmt->close();
				$conn->close();
				exit;
			}
		}
	}

	// Forgot Password
	
	else if (isset($_POST['forgotSubmit'])) { 
		$email3 = $_POST['email3'];
		$conn = mysqli_connect("localhost", "root", "", "ydpbms");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			$stmt = $conn->prepare("select * from users where email = ?"); 
			$stmt->bind_param("s", $email3); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows == 0) { 
				echo '<script>alert("There is no such email in the system.");</script>';
				header('Refresh: 0; forgot.php');
				exit;
			}
			$stmt = $conn->prepare("select * from requests where email = ? and type = 'Password Reset'");
			$stmt->bind_param("s", $email3);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) {
				echo '<script>alert("A request with the email is already made.");</script>';
				header('Refresh: 0; forgot.php');
				exit;
			}
			else {
				$stmt = $conn->prepare("insert into requests(type, email, status) values('Password Reset', ?, 'ongoing')");
				$stmt->bind_param("s", $email3);
				$stmt->execute();
				$stmt_result = $stmt->get_result();
				$_SESSION["error"] = "A password reset request has been successfully created. Once the request is recognized and accepted, a one-time password will be sent to your email.";
				$_SESSION["success"] = 1;
				header('Refresh: 0; index.php');
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>