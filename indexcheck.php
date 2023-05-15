<?php

	// Session Storage

	session_start();
	session_unset();

	// Login
	
	if(isset($_POST['loginSubmit'])) { 
		$email1 = $_POST['emailvar'];
		$password1 = $_POST['passwordvar'];
		$conn = mysqli_connect("fdb1028.awardspace.net", "3306", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			$stmt = $conn->prepare("select * from users where email = ? and password = ?");
			$stmt->bind_param("ss", $email1, $password1);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows == 1) {
				$_SESSION["userEmail"] = $email1;
				header('Refresh: 0; url=home.html');
			}
			else {
				echo '<script type="text/javascript">
					alert("The email or password is incorrect.");
				</script>';
				header('Refresh: 0; url=index.php');
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>

<?php

	// Registration

	if(isset($_POST['registerSubmit'])) {
		$fname2 = $_POST['fname2'];
		$lname2 = $_POST['lname2'];
		$grade2 = $_POST['grade2'];
		$section2 = $_POST['section2'];
		$email2 = $_POST['email2'];
		$conn = mysqli_connect("fdb1028.awardspace.net", "3306", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			if ($grade2 > 12 || $grade2 < 1) { 
				echo '<script type="text/javascript"> alert("The grade level is invalid."); </script>';
				exit;
			}
			$stmt = $conn->prepare("select email from users where email = ?"); 
			$stmt->bind_param("s", $email2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				echo '<script type="text/javascript"> alert("Email is already used."); </script>';
				exit;
			}
			$stmt = $conn->prepare("select lname from users where fname = ? and lname = ?"); 
			$stmt->bind_param("ss", $fname2, $lname2); 
			$stmt->execute(); 
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) { 
				echo '<script type="text/javascript"> alert("The combination of names are already used."); </script>';
				exit;
			}
			$stmt = $conn->prepare("insert into requests(fname, lname, grade, section, email, type) values(?, ?, ?, ?, ?, 'Account Creation')");
			$stmt->bind_param("ssiss", $fname2, $lname2, $grade2, $section2, $email2);
			$stmt->execute();
			echo '<script type="text/javascript">
				alert("Request to register is successful. Check your email regularly for the one-time password to use in your login. You may change it within the main site once you have logged in. Please wait patiently!");
			</script>';
			header('Refresh: 0; url=index.php');
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>

<?php

	// Forgot Password
	
	if(isset($_POST['forgotSubmit'])) { 
		$email3 = $_POST['email3'];
		$conn = mysqli_connect("fdb1028.awardspace.net", "3306", "Yv3rd0nD3P3st@l0zz1", "4299657_ydpbmsdatabase");
		if ($conn->connect_error) {
			echo "$conn->connect_error";
			die("Connection Failed : ". $conn->connect_error);
		}
		else {
			$stmt = $conn->prepare("select * from requests where email = ? and type = 'Password Reset'");
			$stmt->bind_param("s", $email3);
			$stmt->execute();
			$stmt_result = $stmt->get_result();
			if ($stmt_result->num_rows > 0) {
				echo '<script type="text/javascript">
					alert("A request with the email is already made.");
				</script>';
				header('Refresh: 0; url=index.php');
			}
			else {
				$stmt = $conn->prepare("insert into requests(type, email) values('Password Reset', ?)");
				$stmt->bind_param("s", $email3);
				$stmt->execute();
				$stmt_result = $stmt->get_result();
				echo '<script type="text/javascript">
					alert("A password reset request has been successfully created. Once the request is recognized and accepted, a one-time password will be sent to your email. Please wait patiently!");
				</script>';
				header('Refresh: 0; url=index.php');
			}
			$stmt->close();
			$conn->close();
			exit;
		}
	}
?>