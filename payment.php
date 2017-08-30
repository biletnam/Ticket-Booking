<?php
?>
<!DOCTYPE html>
<html>
<head>
<style>
	body{
		font-family:verdana;
		background-color:black;
		opacity:0.9;
	}
	.modal {
    display: block; /* Hidden by default */
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
    margin: 0px auto;
    border: 1px solid #888;
    width: 40%; /* Could be more or less, depending on screen size */
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
input[type=text],input[type=date],input[type=time],input[type=number],input[type=email],select,input[type=submit] {
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

	
  
  <div id="id01" class="modal">
  
  <!-- Modal Content -->
  <div class="modal-content animate">
  <div class="container" style="background-color:lightgray">
      <span><b><center>Ticket Summary</center></b></span>
	<span onclick="window.location.href='homepage.php'" 
class="close" title="Close Modal">&times;</span>

	</div>
	<?php
	$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());
	$select = @mysql_select_db("movie") or die(mysql_error());
	$showid = $_GET['id'];
	$json = $_GET['seats'];
	$no = $_GET['no'];
	$cat = $_GET['cat'];
	$myDataArray = json_decode($json,true);
	$extract = @mysql_query("SELECT * FROM showtime NATURAL JOIN theater WHERE unique_id='$showid'") or die(mysql_error());
	$row = mysql_fetch_assoc($extract);
	$moviename=$row['movie_name'];
	$theater = $row['theater_name'];
	$date = $row['date'];
	$time = $row['time'];
	$scrid = $row ['screen_id'];
	
	$data = @mysql_query("SELECT * FROM showtime NATURAL JOIN screeninfo NATURAL JOIN theaterdata WHERE screen_id='$scrid'") or die(mysql_error());
	$res = mysql_fetch_assoc($data);
	
	$scrname = $res['screen_name'];
	$addr = $res['address'];
	
	$data = @mysql_query("SELECT * FROM screens WHERE screen_id='$scrid' and seat_type='$cat'") or die(mysql_error());
	$res = mysql_fetch_assoc($data);
	$price= $res['price'];
	$total=$no*$price;
	?>
    <div class="container">
       <label><b>Movie : </b> </label><?php echo $moviename; ?><hr>
	    <label><b>Theater :</b> </label> <?php echo $theater; ?><hr>
		 <label><b>Address : </b> </label><?php echo $addr; ?><hr>
		  <label><b>Screen :</b> </label> <?php echo $scrname; ?><hr>
		   <label><b>Show Time :</b> </label> <?php echo $time; ?><hr>
		   <label><b>Date : </b> </label><?php echo $date; ?><hr>
		   <label><b>Seats : </b> </label><?php echo $myDataArray; ?><hr>
		    <label><b>Total amount : </b> </label><?php echo $no." X ".$price."=".$total." Rs"; ?><hr><br>
		   <label><b>Enter Personal Details :<hr>
			<form action="booking.php" method="post" >
			<label><b>Mobile No. </b></label><input type="number" name="mobile" required>
			<label><b>E-mail</b></label><input type="email" name="email" required>
			<input name="moviename" type="hidden" id="moviename" value="<?php echo $moviename; ?>">
			<input name="theater" type="hidden" id="theater" value="<?php echo $theater; ?>">
			<input name="address" type="hidden" id="address" value="<?php echo $addr; ?>">
			<input name="screen" type="hidden" id="screen" value="<?php echo $scrname; ?>">
			<input name="time" type="hidden" id="time" value="<?php echo $time; ?>">
			<input name="date" type="hidden" id="date" value="<?php echo $date; ?>">
			<input name="seats" type="hidden" id="seats" value="<?php echo $myDataArray; ?>">
			<input name="amount" type="hidden" id="amount" value="<?php echo $total; ?>">
			<input type="submit" name="submit" value="proceed to Payment">
			</form>
	</div>
	
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="window.location.href='homepage.php'" class="cancelbtn">Cancel</button>
      
    </div>
  </div>
</div>
 
</body>
</html>
