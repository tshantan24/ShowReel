<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="./CSS/style1.css" />
    <link rel="stylesheet" type="text/css" href="./CSS/style2.css" />
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
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
  	    		<button id="myBtn1" class="headB">Login</button>
    	  		<button id="myBtn" class="headB">Sign Up</button>
      		</div>
	    </div>
	</div>
	<div class="slideshow">
	  	<div class="container">
		  	<div class="mySlides fade">
  	  			<img src="./images/movies/english/avengers4/avg1.jpg" style="width:100%">
  			</div>

	  		<div class="mySlides fade">
  	  		<img src="./images/movies/telugu/ban/ban1.jpg" style="width:100%">
  			</div>

 	 			<div class="mySlides fade">
  	  		<img src="./images/movies/hindi/oct/oct1.jpg" style="width:100%">
  			</div>

 	  		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  			<a class="next" onclick="plusSlides(1)">&#10095;</a>
		  </div>
	 	  <br />	
	 	  <div style="text-align:center">
  			<span class="dot" onclick="currentSlide(1)"></span> 
  			<span class="dot" onclick="currentSlide(2)"></span> 
  			<span class="dot" onclick="currentSlide(3)"></span> 
			</div>
			<script type="text/javascript" src="./JS/slideshow.js"></script>

		</div>
	<div id="myModal" class="modal">

    <!-- Modal content -->
    	<div class="modal-contents">
           <div class="content">
			<img class="bg-img" src="./images/bg.jpg" alt="">	
				<div class="boxmodal">
					<div class="contact-form" id="cform">
					

						<form id="signup" action="./connection.php" method="POST">
						<span class="close">&times;</span>
						<br/><br/><br/><br/>
						
						<br /><br /><br />
						<label class="ll">USERNAME</label>
						<input  id="uname" name="uname" type="text" />
						<p id="p1"></p>
					
						<label class="ll">E-MAIL</label>
						<input id="email" name="email" type="text" />
						<p id="p2"></p>	
					
						<label class="ll">PASSWORD</label>
						<input id="pass" name="pass" type="password" />
						<p id="p3"></p>
					
						<label class="ll">CONFIRM PASSWORD</label>
						<input id="cpass" name="cpass" type="password" />
						<p id="p4"></p>
						
						<label class="ll">PHONE</label>
						<input id="pnum" name="pnum" type="number" />
						<p id="p5"></p>	
						<br /><br />
						<input class="submit" id="sub" name="submit" value="SIGN UP" type="submit" />	
						</form>
					</div>
					<span id="result" style="display: none;"></span>
					<span class="close1" id="close2" style="display: none;">&times;</span>
				</div>

			</div>
 		</div>
    </div>	
    <script src="./JS/modal.js" type="text/javascript"></script>
    
	<div id="myModal1" class="modal">

    <!-- Modal content -->
    	<div class="modal-contents">
           <div class="content">
			<img class="bg-img" src="./images/bg.jpg" alt="">	
				<div class="boxmodal">
					<div class="contact-form" class="lform">
						<form id="login" method="post" class="loginForm" action="./validate.php">
							<br/><br/><br/><br/>
							<span class="close1">&times;</span>
							<br /><br /><br />
							<label>USERNAME</label>
							<input id="username" name="username" placeholder="" type="text" /><br />
							<p id="l1"></p>
					
							<label>PASSWORD</label>
							<input id="password" name="password" placeholder="" type="password" /><br />
							<p id="l2"></p>

							<br /><br />
							<input class="submit" value="LOGIN" type="submit">	
						</form>
						<span id="result1" style="display: none;"></span>
						<span class="close1" id="close1" style="display: none;">&times;</span>
					</div>
				</div>
			</div>
 		</div>
    </div>	
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="./JS/modal1.js" type="text/javascript"></script>
    <script src="./JS/formValidation.js" type="text/javascript"></script>
  </body>
</html>