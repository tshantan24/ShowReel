<?php
	$conn = mysqli_connect("localhost", "root", "", "moviesite") or die("Couldn't connect");
	$showid = $_GET['showid'];
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Book Tickets</title>
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
          		<a href="./index1.php" onclick="logOut();">Log Out</a>
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
					foreach ($rows as $row) {
						echo "<tr>";
						$sql = "SELECT seat_no, booked FROM seats WHERE seat_no LIKE '$row%' AND show_id = $showid;";
						$result = mysqli_query($conn, $sql);
						if(!$result) {
							die("Couldn't complete query: " . mysqli_error($conn)) ;
						} else {
							while($row = mysqli_fetch_assoc($result)) {
								echo '<td>';
								echo '<input type="checkbox" class="cb" name="cb" id="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'), '" value="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'), '" />';
								echo '<label for="', htmlspecialchars($row['seat_no'],ENT_QUOTES, 'UTF-8'), '" class="checkbox" ><span class="text">'.$row['seat_no'].'</span></label>';
								echo "</td>";
							}
						}	
						echo "</tr>";
					}?>
				</table>
			</div>
			<div class="booking" style="height: 900px;">	
				<div class="MovHeader">
					<br /><br /><br />
					<h1>LOL</h1>
				</div>
				<?php
					$str1 = "SELECT movie_name, date, timing FROM movies, shows WHERE movies.movie_id IN (SELECT movie_id FROM shows ";
					$str2 = "WHERE show_id = $showid) AND show_id=$showid;";
					$sql1 = $str1.$str2;
					$result = mysqli_query($conn, $sql1);
					if(!$result) {
						die(mysqli_error($conn));
					}
					$row = mysqli_fetch_array($result);
				?>
				<div class="details">
					<br /><br /><br />
					<ul>
						<li>Theatre : <?php echo $row['movie_name'];?></li>
						<br /><br />
						<li>Date : <?php echo $row['date'];?></li>
						<br /><br />
						<li>Showtime : <?php echo $row['timing'];?></li>
						<br /><br />
						<br /><br />
					</ul>
					<input class="submit" id="sub" name="submit" value="BOOK" type="button" />
			    </div>
			<br / ><br /><br />
			<!--<img class="image" src="./images/screen.png" />-->
		</div>
	</body>
	<script type="text/javascript">
		document.getElementById('sub').addEventListener('click', showTickets);
		function showTickets(){
			var allSeats = document.getElementsByName("cb");
			var seats = [];
  			for (var i=0; i<allSeats.length; i++) {
    			if (allSeats[i].checked) {
        			seats.push(allSeats[i].value);
     			}
  			}
			alert("Seats booked: " + seats);
			setInterval(function() {window.location.replace("citysel.php")}, 5000);
		}
	</script>
</html>