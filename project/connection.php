<?php
session_start();
$name = $_POST['uname'];
$email = $_POST['email'];
$password = $_POST['pass'];
$pnum = intval($_POST['pnum']);
$connection = mysqli_connect("localhost", "root", "", "moviesite"); // Establishing Connection with Server.. // Selecting Database

$sql = "INSERT INTO customers VALUES ('$name', '$email', '$password', $pnum);";
$result = mysqli_query($connection, $sql); //Insert Query

if(!isset($_POST['uname'])) {
	echo "Post isn't working";
}

if(!$result) {
	echo mysqli_error($connection);
} else { 
	$_SESSION['user_name'] = $name;
	header('Location: http://localhost/project/citysel.php');
	exit(); 
}

mysqli_close($connection); // Connection Closed
?>