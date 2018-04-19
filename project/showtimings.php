<?php
session_start();
$movieid = $_GET["id"];
$loc = $_GET["loc"];

$username = $_SESSION['user_name'];
$conn = mysqli_connect("localhost", "root", "", "moviesite") or die("Couldn't connect");

$sql1 = "SELECT movie_name, poster_loc FROM movies WHERE movie_id = $movieid;";

$result = mysqli_query($conn, $sql1);
if(!$result) {
  die("Error: " . mysqli_error($conn));
} else {
  $row = mysqli_fetch_array($result);
}

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link type="text/css" rel="stylesheet" href="./CSS/shows.css" />
    <link rel="stylesheet" type="text/css" href="./CSS/style1.css" />  
  </head>

  <body>
    <div class="myHeader">
      	<div class="header1">
        	<div class="MHimage">
      			<a href="./index.php"><img src="./images/logo.jpg" /></a>
	        </div>
  	    	<div class="searchBar">
    	  		<input type="text" name="searchBar" placeholder="Search" />
      			<input type="image" name="searchB" src="./images/search.png" class="searchButton" />
      		</div>
      		<br /><br /><br />
          <div class="headerA">
              <span class="htext">Welcome <?php echo $username; ?></span>
              <a href="./logout.php">Log Out</a>
          </div>
	      </div>
	  </div>
    <div>
      <ul>
        <li><a href="?date=2018-04-19" class="active">19</a></li>
        <li><a href="?date=2018-04-19">20</a></li>
        <li><a href="?date=2018-04-19">21</a></li>
        <li><a href="?date=2018-04-19">22</a></li>
        <li><a href="?date=2018-04-19">23</a></li>
      </ul>
    </div>
    <div class="movieposter">
      <img src="<?php htmlspecialchars($row['poster_loc']); ?>" />
    </div>
    <div class="showtimings" >
      <table>
        <?php 
          $sql2 = "SELECT DISTINCT screen_id FROM shows WHERE movie_id=$movieid;";

          $result1 = mysqli_query($conn, $sql2);

          while($row = mysqli_fetch_assoc($result1)) {

            $str1 = "SELECT theatre_name, location FROM theatres WHERE theatre_id IN (SELECT theatre_id FROM screens WHERE ";
            $str2 = "screen_id=".$row['screen_id'].") AND city='$loc';";
            $str3 = $str1 . $str2;
            $sql3 = $str3; 
            
            $result2 = mysqli_query($conn, $sql3);
            if(!$result2) {
              die ("Error: " . mysqli_error($conn));
            } else {
              while($row1 = mysqli_fetch_assoc($result2)) {
                echo "<tr>";
                echo "<td>";
                echo $row1['theatre_name'].": ".$row1['location'];
                echo "</td>";
                $sql4 = "SELECT timing FROM shows WHERE screen_id=".$row['screen_id'].";";
                $result3 = mysqli_query($conn, $sql4);
                if(!$result2) {
                  die ("Error: " . mysqli_error($conn));
                } else { 
                  echo "<td>";
                  while($row2 = mysqli_fetch_assoc($result3)) {
                    echo "<a href='./rst.php?='".$row2['timing']." class='tlinks'>".$row2['timing']."</a>";
                  }
                  echo "</td>";
                }
                echo "</tr>";
              }
            }
          }
        ?>
      </table>
    </div>
  </body>
</html>   