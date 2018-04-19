<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "moviesite") or die("Couldn't connect");
$showid = $_GET['showid'];

function setChecked($status) {

}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Rangasthalam</title>
		<link rel="stylesheet" type="text/css" href="./CSS/cbstyle.css" />
		<link rel="stylesheet" type="text/css" href="./CSS/style1.css" />	
	</head>
	<body bgcolor= #f5f5f5>
		<div class="myHeader">
    	<div class="header1">
    		<div class="MHimage">
      			<a href="./index.php"><img src="./images/logo.jpg" /></a>
	      	</div>
  	    	<div class="searchBar">
    	  		<input type="text" name="searchBar" placeholder="Search" />
      			<input type="image" name="searchB" src="./images/search.png" class="searchButton" />
      		</div>
	    	<div class="headerA">
          		<span class="htext">Welcome <?php //echo $username; ?></span>
          		<a href="./logout.php">Log Out</a>
        	</div>
	    </div>
		</div> 
		<div class="seat-layout" >
			<div class="seats">
				<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				<table>
					<?php 
					$rows = $rows = array('A', 'B', 'C', 'D', 'E');
					$nums = array(1, 2, 3, 4, 5, 6, 7, 8);
					$rows = array_map('strval', $rows);
					foreach ($rows as $row1) {
						echo "<tr>";
						$sql = "SELECT seat_no, booked FROM seats WHERE seat_no LIKE '$row1%' AND show_id = $showid;";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							die("Couldn't complete query: " . mysqli_error($conn)) ;
						} else {
							while($row = mysqli_fetch_assoc($result)) {
								echo '<td>';
								echo '<input type="checkbox" class="cb" name="seats[]" id="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'), '" value="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'). ($row['booked']==1 ? 'checked' : '').' />';
								echo '<label for="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'), '" class="checkbox" ><span class="text">'.$row['seat_no'].'</span></label>';
								echo "</td>";
							}
						}	
						echo "</tr>";
					}		
						
				?>
				</table>
				<hr />
				<p>Screen this way</p>
			</div>
			<div class="booking">	
				<div class="MovHeader">
					<br /><br /><br />
					<h1>LOL</h1>
				</div>
				<div class="details">
					<br /><br /><br />
					<ul>
						<li>Theatre :</li>
						<br /><br />
						<li>Date :</li>
						<br /><br />
						<li>Showtime :</li>
						<br /><br />
						<li>Tickets :</li>
						<br /><br />
					</ul>
					<a href="rst.php?bk=1">Book Tickets</a>
			    </div>
			<br / ><br /><br />
			<!--<img class="image" src="./images/screen.png" />-->
		</div>
	</body>
	<script type="text/javascript">
		var count = 0;

		function chkBox(){
			var ch = document.getElementsByClassName("cb");
			for

		}
	</script>
</html>
<?php 
/*if(isset($_GET['bk'])){
	if(!empty($_POST['seats'])) {
    	foreach($_POST['seats'] as $seat) {
    		$bk = 1;
    		echo "$bk";
    		echo "$seat";
            /*$sql = "UPDATE seats SET booked=$bk WHERE seat_id=$seat;";
            $result = mysqli_query($conn, $sql);
            if(!$result) {
            	die("Couldn't connect");
            }
    	}
	}
}*/
?>