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
	.details{
		position:relative;
		width:100%;
		height:400px;
		box-shadow: inset 0px 0px 400px 110px rgba(0, 0, 0, .7);
		
		
	}
	.details h2{
		position:absolute;
		color:white;
		bottom:20%;
		padding:5px;
		margin-left:5px;
	}
	.details h4{
		float:left;
		position:absolute;
		color:white;
		bottom:10%;
		border:1px solid white;
		border-radius:3px;
		padding:5px;
		margin-left:10px;
	}
	#genre{
		position:absolute;
		bottom:10%;
		left:80px;	
	}
	#duration{
		position:absolute;
		bottom:1%;
		border:none;
	}
	.cinemas{
		margin:20px;
	}
	.cinemas a{
		text-decoration:none;
		color:black;
		padding:10px;
	}
	.name{
		padding:20px 20px;
		width:100%;
		border-bottom:1px solid gray;
	}
	.name a{
		padding:5px 10px;
		margin-left:25px;
		box-shadow:1px 1px 1px 2px black;
		border-radius:3px;
	}
	.name a:hover{
		
		box-shadow:1px 1px 1px 2px #0099ff;
		
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
    margin-left:20px;
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
input[type=date]{
	color: black;
    padding: 5px ;
    margin-left:5px;
    border: 1px solid black;
	border-radius:2px;
    cursor: pointer;
}
#datebutton{
	width:initial;
	border-radius:2px;
	padding:8px;
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
	$moviename=$_GET['id'];
	
	}
	
	$poster= @mysql_query("SELECT * FROM poster where movie_name like '%$moviename%' and type='medium' ") or die(mysql_error());
	$num=@mysql_num_rows($poster);
	if($num==0){?>
		<h3>Sorry,No Results Found!!</h3>
		<?php
	}
	else{
	$row=@mysql_fetch_assoc($poster);
	$path=$row['poster'];
	$moviename=$row['movie_name'];
	?>
<div class="details" style="background-size:100% 100%;background-image:url('<?php echo $path;?>');">
<?php 
	
	$movie= @mysql_query("SELECT * FROM movies where movie_name='$moviename'  ") or die(mysql_error());
	$description=@mysql_fetch_assoc($movie);
?>
<h2><?php echo $description['movie_name'];?> </h2><br>
<h4><?php echo $description['language'];?> </h4>
<h4 id="genre"><?php echo $description['genre'];?> </h4>

<?php
	$date=date("Y-m-d");
	$time_string=$description['duration'];
	$hour=substr($time_string, 0, 2);
	$min=substr($time_string, 3, 2);?>
<h4 id="duration"><?php echo $hour." Hrs ".$min." min ";?> </h4>


</div>
<div class="cinemas">
	<form action="<?PHP echo $_SERVER['PHP_SELF']; ?>?id=<?php echo $moviename;?>" method="post">
	<?php
	if(isset($_POST['date'])){
		$date=$_POST['date'];
	}?>
	<b>Select Date :</b><input type="date" name="date" value="<?php echo $date;?>">
	<input type="submit" id="datebutton" value="check">
	</form>
	<?php
	$i=1;
	$movie = @mysql_query("SELECT * FROM theater where movie_name='$moviename' ") or die(mysql_error());
	while($data=@mysql_fetch_assoc($movie)){
	
?>

<div class="name">
	<b><?php echo $i.". ".$data['theater_name'];?></b>
	<br><br><br>
<?php
	
	$id=$data['show_id'];
	$time=@mysql_query("SELECT * FROM showtime where show_id='$id' and date='$date'") or die(mysql_error());
	$i++;
	while($timedata=@mysql_fetch_assoc($time)){
		$time_string=$timedata['time'];
		$hour=substr($time_string, 0, 2);
		$min=substr($time_string, 3, 2);
		?>
	
	<a href="theater.php?id=<?php echo $timedata['unique_id'];?>"><?php echo $hour.":".$min;?></a>
	<?php } ?>
</div>
<?php
	
	}
	}
	?>


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
