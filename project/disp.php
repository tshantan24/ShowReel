<?php
session_start();

$username = $_SESSION['user_name'];

$conn = mysqli_connect("localhost", "root", "", "moviesite");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$movie_id = $_GET['id'];
$loc = $_GET['loc'];
$sql = "SELECT * from movies where movie_id = $movie_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
  <head>
  <script>
  function fun() {
	  window.location.replace("citysel.php");
  }
  </script>
    <title> <?php echo htmlspecialchars($row["movie_name"]); ?> </title>
    <link rel="stylesheet" type="text/css" href="./CSS/info.css" />
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
        <div class="headerA">
          <span class="htext">Welcome <?php echo $username; ?></span>
          <a href="./logout.php">Log Out</a>
        </div>
      </div>
  </div>
	  <img alt="img 1" src="<?php echo htmlspecialchars($row["poster_loc"]); ?>" width = "280px" height = "400px" style="float: left;
	margin-left: 30px;
	margin-top: 50px; padding-right: 20px;" />
	  
	  <p id="box">
	  <?php
  
  if (mysqli_num_rows($result) > 0) {
  
        echo "<u><b>Name</b></u>: " . $row["movie_name"]. "<br>" ."<br>" . "<u><b>Language</b></u>: " .$row["language"]. "<br>" ."<br>" . "<u><b>Genre</b></u>: " .$row["genre"]. "<br>" . "<br>" . "<u><b>Rating</b></u>: " .$row["rating"]."<br>" . "<br>" . "<u><b>Cast</b></u>: " .$row["cast"]. "<br>" . "<br>" . "<u><b>Director</b></u>: " .$row["director"]. "<br>" ."<br>" . "<u><b>Description</b></u>: " .$row["description"]. "<br>" ."<br>" ;
    
} else {
    echo "0 results";
}

mysqli_close($conn);
  ?>
  </p><br><br><br>
  <center>
      <a href="citysel.php" class="button3">GO BACK</a>
      <?php echo '<a class="button3" href="showtimings.php?id='.$movie_id.'&loc='.$loc.'">BOOK NOW</a>'?>
  <center>
	</body>
    <script type="text/javascript" src="./JS/lg.js"></script>
</html>