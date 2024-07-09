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