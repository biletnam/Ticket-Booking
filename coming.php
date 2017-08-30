<?php
session_start();
?>
<html>
<head>
<style>
	body{
		font-family:verdana;
	}
	.nav{
		width:100%;
		background-color:black;
		position:fixed;
		top:0;
		left:0;
		z-index:1;
		height:50px;
	}
	.scroll{
		position:absolute;
		top:50px;
		left:0px;
		z-index=-1;
		width:100%;
	}
	.nav ul{
	
		padding:0;
	}
	.nav li{
		list-style-type:none;
		display:inline;
		padding:5px;
	}
	.nav li a{
		text-decoration:none;
		color:white;
		
	}
	.nav li a:hover{
		color:#00e6e6;

	}
	ul.right{
		float:right;
	}
	.slideshow{
		position:relative;
		width:100%;
		height:500px;
	
	}
	.prev, .next {
		  cursor: pointer;
		  position: absolute;
		  top: 50%;
		  width: auto;
		  margin-top: -22px;
		  padding: 16px;
		  color: white;
		  font-weight: bold;
		  font-size: 18px;
		  transition: 0.6s ease;
		  border-radius: 0 3px 3px 0;
	}
	.dot {
		position:relative;
		bottom:40px;
		left:50%;
		  cursor:pointer;
		  height: 13px;
		  width: 13px;
		  margin: 0 2px;
		  background-color: #bbb;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
}
	.prev:hover, .next:hover{
		background-color: rgba(0,0,0,0.8);
	}
	.active, .dot:hover {
		background-color: rgba(0,0,0,0.8);
	}

	.prev{
		left:0px;
	}
	.next{
		right:0px;
		border-radius: 3px 0 0 3px;
	}
	.showing{
		text-align:center;
		padding:25px;
	}
	.showing a{
		text-decoration:none;
		border-radius:3px;
		padding:10px;
		background-color:gray;
		color:white;
		
	}
	.main{
		background-color:#f2f2f2;
		position:relative;
		width:100%;
		height:100%;
		
		
	}
	.filter{
		margin-top:20px;
		margin-left:10px;
		background-color:white;
		position:absolute;
		left:0;
		top:0;
		width:20%;
		float:left;
	}
	.filter input[type=text]{
		width:100%;
		height:35px;

	}
	.movies{
		position:absolute;
		top:0;
		right:0;
		float:left;
		width:75%;
		
	}
	.box{
		position:relative;
		float:left;
		padding:0px;
		margin:20px;
		width:250px;
		height:330px;
		border:1px solid black;
	}
	.box a{
		position:absolute;
		bottom:0;
		width:100%;
		text-decoration:none;
		padding:10px 0px;
		background-color:#990000;
		color:white;
		text-align:center;
	}
	.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.5); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content{
	position:relative;
    background-color: #fefefe;
    margin: 50px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    position: absolute;
    right: 25px;
    top: 0; 
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

/* Close button on hover */
.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}


@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}


/* Full-width inputs */
input[type=text], input[type=password],input[type=email],input[type=submit] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
input[type=submit],button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra style for the cancel button (red) */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}


/* Add padding to containers */
.container {
    padding: 16px;
}

/* The "Forgot password" text */
span.psw {
    float: right;
    padding-top: 16px;
}
span.signup{
	float:right;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
        display: block;
        float: none;
    }
    .cancelbtn {
        width: 100%;
    }
}
.dropbtn {
	border-radius:100%;
	position:relative;
	bottom:-10px;
	cursor:pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
	float:right;
    position: relative;
	bottom:20px;
	padding:0px 10px;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
	right:0;
	margin-top:10px;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	
}

/* Links inside the dropdown */
.nav  .dropdown-content a {
    color:white;
	background-color:black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.nav  .dropdown-content a:hover {background-color:black;color:#75a3a3}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
#filter1{
	border:1px solid black;
	padding:5px;
}
	
</style>

</head>

<body>

	<div class="nav">
	<ul>
	<li><a href="Homepage.php">Home</a></li>
	<li><a href="Homepage.php">Movies</a></li>
	<li><a href="Homepage.php">Events</a></li>
	<li><a href="Homepage.php">Trailers</a></li>
	
	<ul class="right">
	<li><a href="Homepage.php">Offers</a></li>
<?php
	if(@$_SESSION['username']){
		$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());
		$select = @mysql_select_db("movie") or die(mysql_error());
		$name=$_SESSION['username'];
		$extract = @mysql_query("SELECT dp FROM user WHERE name='$name'") or die(mysql_error());
		$row = mysql_fetch_assoc($extract);
	?>
<div class="dropdown">
  <img class="dropbtn" src="<?php echo $row['dp'];?>" width="40px" height="40px">
  <div class="dropdown-content">
    <div style="height:40px;background-color:#e6e6e6;text-align:center"><?php
	echo "welcome ".$_SESSION['username']."";?>
	</div>
    <a href="#">Booking History</a>
    <a href="logout.php">Sign Out</a>
	
  </div>
</div>
<?php
	}
	else{
?>
	
	<li><a href="#" onclick="document.getElementById('id01').style.display='block'" >Sign In</a></li>
<?php
	}
	
?>
	</ul>
	</ul>
	
	</div>
<div class="scroll">

<div class="slideshow">

	<?php
	$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());
	$select = @mysql_select_db("movie") or die(mysql_error());

	$pictures = @mysql_query("SELECT * FROM poster where type='large' ") or die(mysql_error());
	
	
	while($data = mysql_fetch_assoc($pictures)){
?>
  <img class="mySlides" src="<?php echo $data['poster'];?>" style="width:100%;height:100%">
	<?php
	}
	?>
  
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 

</div>
<br>
<div class="showing">
 <a href="showing.php">NOW SHOWING</a>
 <a href="coming.php">COMING SOON</a>	
</div>
<br><br>
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
var slideIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("dot");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
	for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
	dots[slideIndex-1].className += " active";
    setTimeout(carousel, 3000); // Change image every 2 seconds
}
</script>
<div class="main">
	<div class="filter">
	<form action="book.php">
	<input type="text" name="id" placeholder="Search Movies"><br><br>
	</form>
	<form action="filter.php" method="post" id="filter1">
	<b>Filter By</b><br>
	<hr>
	<b>LANGUAGE</b><br><br>
	<input type="checkbox" name="language[]" value="hindi">Hindi<br>
	<input type="checkbox" name="language[]" value="english">English<br>
	<input type="checkbox" name="language[]" value="gujarati">Gujarati<br>
	
	<hr>
	<b>GENRE</b><br><br>
	<input type="checkbox" name="genre[]" value="action">Action<br>
	<input type="checkbox" name="genre[]" value="drama">Drama<br>
	<input type="checkbox" name="genre[]" value="comedy">Comedy<br>
	<input type="checkbox" name="genre[]" value="adventure">Adventure<br>
	<input type="checkbox" name="genre[]" value="biography">Biography<br>
	<input type="checkbox" name="genre[]" value="scifi">Sci-fi<br>
	<input type="checkbox" name="genre[]" value="horror">Horror<br>
	<input type="checkbox" name="genre[]" value="thriller">Thriller<br>
	
	<hr>
	<b>FORMAT</b><br><br>
	<input type="checkbox" name="format[]" value="3d">3D<br>
	<input type="checkbox" name="format[]" value="2d">2D<br>
	<input type="submit" value="Apply Filter">
	</form>
	</div>
	<div class="movies">
	<?php
	$movies = @mysql_query("SELECT * FROM poster NATURAL JOIN movies where type='small' and status='coming soon' ") or die(mysql_error());
	
	while($data = mysql_fetch_assoc($movies)){
	?>
	
		<div class="box">
		<img src="<?php echo $data['poster']; ?>" width="100%" height="70%">
		<?php echo $data['movie_name'];?><br>
		<?php echo $data['language'];?><br>
		<?php echo $data['genre'];?><br>
		<a href="book.php?id=<?php echo $data['movie_name'];?>">BOOK NOW</a>
		</div>
	<?php
	}
	?>

		
	</div>
</div>
  </div>
  
  <div id="id01" class="modal">
  
  <!-- Modal Content -->
  <form class="modal-content animate" action="connect.php" method="post">
  <div class="container">
	<span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>

      <button type="submit">Login</button>
      <input type="checkbox" checked="checked"> Remember me
	  <span class="signup">Still not connected ? <a href="#" onclick="document.getElementById('id01').style.display='none';document.getElementById('id02').style.display='block';">Sign Up</a></span>
    </div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
 <div id="id02" class="modal">
  
  <!-- Modal Content -->
  <form class="modal-content animate" action="signup.php" method="post" enctype="multipart/form-data">
  <div class="container">
	<span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
	  <label><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="name" required>
	
	  <label><b>E-mail</b></label>
      <input type="email" placeholder="Enter E-mail" name="mail" required>

      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
	  
	  <label><b>Profile Photo</b></label>
      <input type="file" name="image" id="image">

       <input type="submit" name="submit" value="submit">
	  
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Already connected? <a href="#" onclick="document.getElementById('id02').style.display='none';document.getElementById('id01').style.display='block';" >Sign In</a></span>
    </div>
  </form>
</div>
</body>
</html>
