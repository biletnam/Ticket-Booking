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
		height:50px;
		padding:0;
		background-color:black;
		position:fixed;
		top:0;
		left:0;
		z-index:100;
	}
	.scroll{
		position:absolute;
		top:0px;
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
	.details{
		position:relative;
		width:100%;
		height:250px;
		box-shadow: inset 100px 100px 300px 110px rgba(0, 0, 0, .5);
		
		
	}
	.details h2{
		position:absolute;
		color:white;
		bottom:20%;
		padding:5px;
		margin-left:5px;
	}
	.details h5{
		float:left;
		position:absolute;
		color:white;
		bottom:10%;
		padding:5px;
		margin-left:10px;
	}
	.image{
		float:left;
		margin:20px;
	}
	.describe{
		float:left;
		margin-left:20px;
	}
	.box{
		display:inline;
		padding:5px;
		margin-right:7px;
		background-color:#d9d9d9;
		border-radius:5px;
	}
	.describe a{
		position:relative;
		top:20px;
		width:10%;
		text-decoration:none;
		padding:10px;
		border-radius:2px;
		background-color:#990000;
		color:white;
		text-align:center;
	}
	.describe a:hover{
		box-shadow: inset 100px 100px 100px 80px rgba(0, 0, 0, .4);
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
form {
    border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=text], input[type=password],input[type=email],input[type=submit],input[type=number],select {
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

<?php
	$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());
	$select = @mysql_select_db("movie") or die(mysql_error());
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	}
	
	?>
<div class="details">
<?php 
	
	$show= @mysql_query("SELECT * FROM showtime NATURAL JOIN theater NATURAL JOIN theaterData where unique_id='$id'") or die(mysql_error());
	$description=@mysql_fetch_assoc($show);
	$screenid = $description['screen_id'];
	$showid = $description['show_id'];
?>
<h2><?php echo $description['theater_name'];?> </h2><br>
<h5><?php echo $description['address'];?> </h5>
</div>
<?php
	$time_string=$description['time'];
	$hour=substr($time_string, 0, 2);
	$min=substr($time_string, 3, 2);?>
	
<div class="image">
	<?php
	$moviename=$description['movie_name'];
	$poster= @mysql_query("SELECT poster FROM poster where movie_name='$moviename' and type='small'") or die(mysql_error());
	$path=mysql_fetch_assoc($poster);?>
	
	<img src="<?php echo $path['poster'];?>" width="250px" height="350px">
	
</div>
<div class="describe">
<?php
	
	
	$movie= @mysql_query("SELECT * FROM movies NATURAL JOIN cast where movie_name='$moviename'") or die(mysql_error());
	$row=mysql_fetch_assoc($movie);?>
	<h4><?php echo $row['movie_name']." (U/A)";?></h4>
	<h5 class="box"><?php echo $row['language'];?></h5><h5 class="box"><?php echo $row['genre'];?></h5>
	<h5>Director : <?php echo $row['director_name'];?> </h5>
	<h5>Cast & Crew : <?php echo $row['cast'];?></h5>
	<h5>Date : <?php echo $description['date'];?></h5><h5>Time : <?php echo $hour.":".$min;?></h5>
	<a href="#" onclick="document.getElementById('id03').style.display='block'">BUY TICKETS</a>
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
<?php 
	
	$price= @mysql_query("SELECT * FROM screens where screen_id='$screenid' and seat_type='gold'") or die(mysql_error());
	$data=@mysql_fetch_assoc($price);
	$gold=$data['price'];
	
	$price= @mysql_query("SELECT * FROM screens where screen_id='$screenid' and seat_type='silver'") or die(mysql_error());
	$data=@mysql_fetch_assoc($price);
	$silver=$data['price'];
	
	$price= @mysql_query("SELECT * FROM screens where screen_id='$screenid' and seat_type='platinum'") or die(mysql_error());
	$data=@mysql_fetch_assoc($price);
	$platinum=$data['price'];	
?>  
<div id="id03" class="modal">
  
  <!-- Modal Content -->
  <form class="modal-content animate" action="seats.php?showid=<?php echo $id; ?>&screenid=<?php echo $screenid; ?>" method="post" >
  
	<div class="container">
	<span onclick="document.getElementById('id03').style.display='none'" 
class="close" title="Close Modal">&times;</span>
	</div>
    <div class="container">
      <label><b>No. of Tickets</b></label>
      <input type="number" placeholder="Enter Number of Tickets" name="number" min="0" required>

	
	  <label><b>Ticket type</b></label>
      <select name="category">
		  <option value="platinum" >Platinum(<?php echo $platinum;?> Rs)</option>
		  <option value="gold" >Gold(<?php echo $gold;?> Rs)</option>
		  <option value="silver" >Silver(<?php echo $silver;?> Rs)</option>
	  </select>

     <input type="submit" name="submit" value="Proceed">
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id03').style.display='none'" class="cancelbtn">Cancel</button>
      
    </div>
  </form>
</div>
</body>
</html>
