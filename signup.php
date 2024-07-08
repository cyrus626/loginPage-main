<?php
include "conn.php";
if(isset($_POST["submitBtn"])){
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$password = $_POST["password"];
	$repwrd = $_POST["repwrd"];
	$userName = $_POST["userName"];
	if($password == $repwrd){
		$query = "INSERT INTO signup ( UserName, FirstName, LastName, password) VALUES('$userName', '$firstName', '$lastName', '$password')";
		$execute = mysqli_query($conn, $query);
		if($execute){
			header("Location:index.php");
			echo"<script>window.pop('Account succesfully created...')</script>";
		}else{
			echo"An error occured!";
		}
	}else{
		echo"<script>window.alert('Password mismatched')</script>";
	}
}
?>
<!Doctype html>
<html>
	<head>
		<meta content="text/html; charset=UTF-8">
		<title>Signup page</title>
		<link rel="stylesheet" href="style.css"/>
	</head>
	<body>
		<form class="mainBody" method="post">
			<h1>SIGN UP</h1>
			<div>
				<input type="text" placeholder="First name" name="firstName"/>
				<input type="text" placeholder="Last name" name="lastName"/>
			</div>
			<div>
				<input type="email" placeholder="User name (enter your email)" name="userName"/>
			</div>
			<div>
				<input type="password" name="password" placeholder="Password"/>
			</div>
            <div>
				<input type="password" name="repwrd" placeholder="Retype password"/>
			</div>
			<div>
				<button name="submitBtn">Submit</button>
                <p>Or I have an account <run><a href="index.php">Sign in</a></run></p>
			</div>
		</form>
	</body>
</html>