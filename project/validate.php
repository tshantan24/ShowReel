<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "moviesite") or die("Couldn't connect");

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT * FROM customers WHERE username = '$username' AND password = '$password';";

$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if($count == 1) {
	$_SESSION['user_name'] = $row['username'];
	header('Location: http://localhost/project/citysel.php');
	exit();
	echo true;
} else {
	echo mysqli_error($conn);
}
