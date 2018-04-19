<?
session_start();
session_destroy();

header('Location: http://localhost/project/index.php');
exit();
?>
<a href="./index.php">Click here if not redirected.</a>