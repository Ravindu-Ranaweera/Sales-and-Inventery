<?php
session_start();

require '../config/db.php';

$errors =array();
$username= "";
$email= "";

if (isset($_POST['signup-btn'])){
	// var_dump($_POST);
	// exit;
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordConf = $_POST['passwordConf'];
	$usertype = $_POST['usertype'];

	if(empty($username)){
		$errors['username']="username required";
	}

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email']= "Email adress is invalid";
	}
	if(empty($email)){
		$errors['email']="email required";
	}

	if(empty($password)){
		$errors['password']="password required";
	}
	if(!(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/',$password))){
		$errors['password']="password required capita simple 8 letter";
	}
	if($password !== $passwordConf){
		$errors['password']="password not match";
	}

	$emailQuery = "SELECT * FROM user_login WHERE email=? LIMIT 1";
	$userCount = mysqli_query($conn, $emailQuery);

	if(mysqli_num_rows($userCount) > 0){
		$errors['email']= "email exists";
	}

	if(count($errors)== 0){
		$password = password_hash($password, PASSWORD_DEFAULT);

		$sql = "INSERT INTO user_login (user_name, user_email, user_pw, user_type) VALUES  ('{$username}', '{$email}', '{$password}', '{$usertype}')";
		// echo $sql;
		// exit;
		$stmtm = mysqli_query($conn, $sql);
		
		if ($stmtm) {
			
			$user_id = $conn->insert_id;
			$_SESSION['id']= $user_id;
			$_SESSION['username']= $username;
			$_SESSION['email']= $email;
			$_SESSION['usertype']= $usertype;

			$_SESSION['message']= "You are now logged in";
			$_SESSION['alert-class']= "alert-succes";
			header('location: index.php');
			exit();
			 

		}else{
			$errors['db_error']= "Database error: faild to register";
		}
	}

}



if (isset($_POST['signin-btn'])){
	$email = $_POST['email'];
	$password = $_POST['password'];

	

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email']= "Email adress is invalid";
	}
	if(empty($email)){
		$errors['email']="email required";
	}
	if(empty($password)){
		$errors['password']="password required";
	}
	$emailQuery = "SELECT * FROM user_login WHERE user_email='$email' LIMIT 1";
		$userCount = mysqli_query($conn, $emailQuery);
		// var_dump($userCount) ;
		// exit;
		if(mysqli_num_rows($userCount) == 1){
			
			$user= mysqli_fetch_assoc($userCount);
		}else{
			$errors['email']= "email does not exists";
		}

	if(count($errors)== 0){
		if (password_verify($password, $user['user_pw'])){
			
			$_SESSION['id']= $user['id'];
			$_SESSION['username']= $user['user_name'];
			$_SESSION['email']= $user['user_email'];
			$_SESSION['usertype']= $user['user_type'];

			$_SESSION['message']= "You are now logged in";
			$_SESSION['alert-class']= "alert-succes";
			header('location: dashboard.php');
			exit();

		}else{
			$errors['login_fail']= "wrong credentials";
		}
	}

}
if (isset($_GET['logout'])) {
	session_destroy;
	unset($_SESSION['id']);
	unset($_SESSION['username']);
	unset($_SESSION['email']);
	unset($_SESSION['verified']);
	header('location: login.php');
	exit();
}
function verifyUser($token)
{
	global $conn;
	$sql= "SELECT * FROM user WHERE token ='$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		
		$user = mysqli_fetch_assoc($result);
		$update_query="UPDATE user SET verified=1 WHERE token='$token'";

		if (mysqli_query($conn, $update_query)) {
			$_SESSION['id']= $user['id'];
			$_SESSION['username']= $user['username'];
			$_SESSION['email']= $user['email'];
			$_SESSION['verified']= 1;

			$_SESSION['message']= "You are now verified user";
			$_SESSION['alert-class']= "alert-succes";
			header('location: index.php');
			exit();
		}
	}else{
		echo "not found";
	}
	
}

if (isset($_POST['frogot-password'])) {
	$email = $_POST['email'];

	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errors['email']= "Email adress is invalid";
	}
	if(empty($email)){
		$errors['email']="email required";
	}

	if(count($errors)== 0){
		$sql= "SELECT * FROM user WHERE email= '$email' LIMIT 1";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param('s',$email);
		$stmt->execute();
		$result= $stmt->get_result();
		$user = $result->fetch_assoc();
		$token= $user['token'];

		sendPasswordResultLink($email, $token);
		header('location: password_message.php');
		exit();

	}

}

function resetPassword($token)
{
	global $conn;
	$sql = "SELECT * FROM user WHERE token='$token' LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$user = mysqli_fetch_assoc($result);
	$_SESSION['email']= $user['email'];
	header('location: reset_password.php');
	exit();

}

if (isset($_POST['reset-btn'])) {
	$password= $_POST['password'];
	$passwordConf= $_POST['passwordConf'];

	if(empty($password)){
		$errors['password']="password required";
	}
	if(!(preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,}$/',$password))){
		$errors['password']="password required capita simple 8 letter";
	}
	if($password !== $passwordConf){
		$errors['password']="password not match";
	}
	$password = password_hash($password, PASSWORD_DEFAULT);
	$email= $_SESSION['email'];

	if(count($errors)== 0){
		$sql="UPDATE user SET password ='$password' WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header('location: login.php');
			exit(0);
		}
	}
}

?>