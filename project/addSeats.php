<?php

$conn = mysqli_connect("localhost", "root", "", "moviesite") or die("couldn't connect");

$rows = array('A', 'B', 'C', 'D', 'E');
$nums = array(1, 2, 3, 4, 5, 6, 7, 8);
$rows = array_map('strval', $rows);
for ($x = 76534; $x <= 76570; $x++) {
	echo "$x";
foreach ($rows as $row) {
	foreach ($nums as $num) {
		$seat = $row.$num;
		echo "$seat\r\n";
		$sql = "INSERT INTO seats VALUES($x, '$seat', 0);";
		$result = mysqli_query($conn, $sql);
		if(!$result) {
			echo "Couldn't add values\r\n";
			echo mysqli_error($conn);
			echo "\r\n";	
		}
	}
}
echo "\r\n";
}
?>