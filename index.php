<?php
include "conn.php";
session_start();
if(isset($_POST["login"])){
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	$query = "SELECT * FROM signup WHERE username = '$userName'";
	$execute = mysqli_query($conn, $query);
	
	if(mysqli_num_rows($execute) > 0){
		
		while($row = mysqli_fetch_assoc($execute)){
			$uname = $row['UserName'];
			$pword = $row['password'];
		}

		if($password == $pword && $userName == $uname){
			// Verified password, redirects to another page
			
			$_SESSION['UserName'] = $uname;
			header("Location: welcome.php");
			exit();
		}else{
			echo"<script>window.alert('Invalid user\'s name or password')</script>";
		}
	}else{
		echo"<script>window.alert('No user\'s data found!')</script>";
	}
}
?>
<!Doctype html>
<html>
	<head>
		<meta content="text/html; charset=UTF-8">
		<title>Login page</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<div class="mainBody">
			<h1>LOG IN</h1>
			<form method="post">
				<div>
					<input type="text" placeholder="User's name" name="userName" required/>
				</div>
				<div>
					<input type="password" placeholder="Password" name="password" required/>
				</div>
				<div>
					<button name="login">SIGN IN</button>
					<p><a href="signup.php" id="SignUp">SIGN UP</a></p>
				</div>
			</form>
			<p></p>
		</div>
	</body>
</html>