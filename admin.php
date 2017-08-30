<?php

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
		z-index:100;
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
	#right{
		float:right;
	}
	.slideshow{
		position:relative;
		width:100%;
		height:480px;
	
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
		padding:20px;
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
		background-color:white;
		position:absolute;
		left:0;
		top:0;
		width:20%;
		float:left;
	}
	input[type=text]{
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
	.dropbtn {
	background-color:transparent;
	color:white;
	font-size:17px;
    border: none;
    cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
    display: none;
	right:0;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
	
}

/* Links inside the dropdown */
.nav li .dropdown-content a {
    color: white;
	background-color:black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.nav li .dropdown-content a:hover {background-color: #f1f1f1;color:black}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    color:#00e6e6;
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
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content{
	position:relative;
    background-color: #fefefe;
    margin: 0px auto; /* 15% from the top and centered */
    border: 1px solid #888;
    width: 30%; /* Could be more or less, depending on screen size */
}

/* The Close Button */
.close {
    /* Position it in the top right corner outside of the modal */
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
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text],input[type=date],input[type=time],input[type=password],input[type=file],select,input[type=submit],input[type=number] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
.container button,input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

/* Extra style for the cancel button (red) */
.container .cancelbtn {
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
	
</style>

</head>

<body>

	<div class="nav">
	<ul>
	<li><a href="Homepage.php">Home</a></li>
	<li><a href="Homepage.php">Movies</a></li>
	<li><a href="Homepage.php">Events</a></li>
	<li><a href="Homepage.php">Trailers</a></li>
	<ul id="right">
	<li><a href="Homepage.php">Offers</a></li>
	<li><div class="dropdown">
  <button class="dropbtn">Add New</button>
  <div class="dropdown-content">
    <a href="#" onclick="document.getElementById('id01').style.display='block'">Movie</a>
	<a href="#" onclick="document.getElementById('id06').style.display='block'">Theater</a>
    <a href="#" onclick="document.getElementById('id02').style.display='block'">Show</a>
    <a href="#" onclick="document.getElementById('id03').style.display='block'">Showtime</a>
	<a href="#" onclick="document.getElementById('id04').style.display='block'">Movie Cast</a>
	<a href="#" onclick="document.getElementById('id05').style.display='block'">Movie Poster</a>
	<a href="#" onclick="document.getElementById('id07').style.display='block'">Screens</a>
	<a href="#" onclick="document.getElementById('id08').style.display='block'">Tickets</a>
  </div>
</div></li>
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
 <a href="">NOW SHOWING</a>
 <a href="">COMING SOON</a>	
</div>
<br><br>

<div class="main">
	<div class="filter">
	<form action="homepage.php">
	<input type="text" name="search" placeholder="Search Movies"><br><br>
	<b>Filter By</b><br>
	<hr>
	<b>LANGUAGE</b><br><br>
	<input type="checkbox" name="language" value="hindi">Hindi<br>
	<input type="checkbox" name="language" value="english">English<br>
	<input type="checkbox" name="language" value="gujarati">Gujarati<br>
	
	<hr>
	<b>GENRE</b><br><br>
	<input type="checkbox" name="genre" value="action">Action<br>
	<input type="checkbox" name="genre" value="drama">Drama<br>
	<input type="checkbox" name="genre" value="comedy">Comedy<br>
	<input type="checkbox" name="genre" value="adventure">Adventure<br>
	<input type="checkbox" name="genre" value="biography">Biography<br>
	<input type="checkbox" name="genre" value="scifi">Sci-fi<br>
	<input type="checkbox" name="genre" value="horror">Horror<br>
	
	<hr>
	<b>FORMAT</b><br><br>
	<input type="checkbox" name="format" value="3d">3D<br>
	<input type="checkbox" name="format" value="2d">2D<br>
	</form>
	</div>
	<div class="movies">
	<?php
	$movies = @mysql_query("SELECT * FROM poster NATURAL JOIN movies where type='small' ") or die(mysql_error());
	
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
<!--movie-->
<div id="id01" class="modal">
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=1" method="post" enctype="multipart/form-data">
	<div class="container">
	<span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Movie Name</b></label>
      <input type="text" placeholder="Enter Movie Name " name="moviename" required>

      <label><b>Release Date</b></label>
      <input type="date" name="date" required>
	  
	  <label><b>Duration</b></label>
      <input type="time" name="time" required>
		
		<label><b>Language</b></label>
	   <select name="language">
		  <option value="Hindi" >Hindi</option>
		  <option value="English" >English</option>
	  </select>
		
		<label><b>Genre</b></label>
	   <select name="genre">
		  <option value="Action" >Action</option>
		  <option value="Drama" >Drama</option>
		   <option value="Thriller" >Thriller</option>
		  <option value="Comedy" >Comedy</option>
		  <option value="Adventure" >Adventure</option>
		  <option value="Biography" >Biography</option>
		  <option value="Sci-Fi" >Sci-Fi</option>
		  <option value="Horror" >Horror</option>
	  </select>
		<label><b>Status</b></label>
	   <select name="status">
		  <option value="coming soon" >Coming Soon</option>
		  <option value="now showing" >Now Showing</option>
	  </select>
      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!--theater-->
<div id="id06" class="modal">
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=6" method="post">
	<div class="container">
	<span onclick="document.getElementById('id06').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Theater name</b></label>
      <input type="text" placeholder="Enter Theater Name " name="theatername" required>

     <label><b>Address</b></label>
      <input type="text" placeholder="Enter Address " name="address" required>
	  
	  <label><b>City Name</b></label>
      <input type="text" placeholder="Enter City Name " name="cityname" required>
	  

      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id06').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!--show-->
<div id="id02" class="modal">
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=2" method="post">
	<div class="container">
	<span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Theater name</b></label>
      <input type="text" placeholder="Enter Theater Name " name="theatername" required>

     <label><b>Movie Name</b></label>
      <input type="text" placeholder="Enter Movie Name " name="moviename" required>
	  
	 <label><b>Show ID</b></label>
      <input type="text" placeholder="Enter Show ID " name="showid" required>

      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>
<!--showtime-->
<div id="id03" class="modal">
  

  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=3" method="post">
	<div class="container">
	<span onclick="document.getElementById('id03').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>

    <div class="container">
      <label><b>Show ID</b></label>
      <input type="text" placeholder="Enter Show ID" name="showid" required>
	  
	  <label><b>Screen ID</b></label>
      <input type="text" placeholder="Enter Screen ID" name="screenid" required>

      <label><b>Date</b></label>
      <input type="date" placeholder="Enter Date" name="date" required>
	  
	  <label><b>Show Time</b></label>
      <input type="time" placeholder="Enter Time" name="showtime" required>

      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>
<!--cast-->
<div id="id04" class="modal">
 
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=4" method="post">
  
	<div class="container">
	<span onclick="document.getElementById('id04').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Movie Name</b></label>
      <input type="text" placeholder="Enter Movie Name" name="moviename" required>
		
	<label><b>Director Name</b></label>
      <input type="text" placeholder="Enter Director Name" name="directorname" required>
	  
      <label><b>Cast & Crew</b></label>
      <input type="text" placeholder="Enter Cast Name" name="castname" required>

      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id04').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>
<!--poster-->
<div id="id05" class="modal">
  
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=5" method="post" enctype="multipart/form-data">
  
	<div class="container">
	<span onclick="document.getElementById('id05').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Movie Name</b></label>
      <input type="text" placeholder="Enter Movie Name" name="moviename" required>

      <label><b>Poster</b></label>
      <input type="file" name="image" id="image">
	  
	  <label><b>Poster type</b></label>
      <select name="scale">
		  <option value="large" >Large</option>
		  <option value="medium" >Medium</option>
		  <option value="small" >Small</option>
	  </select>

     <input type="submit" name="submit" value="Add">
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id05').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>
<div id="id07" class="modal">
  

  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=7" method="post">
	<div class="container">
	<span onclick="document.getElementById('id07').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>

    <div class="container">
      <label><b>Screen ID</b></label>
      <input type="text" placeholder="Enter Screen ID" name="screenid" required>
	  
	  <label><b>Theater Name</b></label>
      <input type="text" placeholder="Enter Theater Name" name="theatername" required>

      <label><b>Screen Name</b></label>
      <input type="text" placeholder="Enter Screen Name" name="screenname" required>
	  
	  <label><b>Total Seats</b></label>
      <input type="text" placeholder="Enter Total no. of Seats" name="seats" required>

      <button type="submit">Add</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id07').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>
</div>
<div id="id08" class="modal">
  
  <!-- Modal Content -->
  <form class="modal-content animate" action="entry.php?item=8" method="post" enctype="multipart/form-data">
  
	<div class="container">
	<span onclick="document.getElementById('id08').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>Screen ID</b></label>
      <input type="text" placeholder="Enter Screen ID" name="screenid" required>

	  <label><b>Seat type</b></label>
      <select name="seattype">
		  <option value="platinum" >Platinum</option>
		  <option value="gold" >Gold</option>
		  <option value="silver" >Silver</option>
	  </select>
	
		<label><b>Price</b></label>
      <input type="number" placeholder="Enter Ticket Price" name="price" required>
     <input type="submit" name="submit" value="Add">
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id08').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>
</body>
</html>
