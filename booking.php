<?php

	if(isset($_POST['submit'])){
	$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());
	$select = @mysql_select_db("movie") or die(mysql_error());
	
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$moviename = $_POST['moviename'];
	$theater = $_POST['theater'];
	$addr = $_POST['address'];
	$scrname = $_POST['screen'];
	$time = $_POST['time'];
	$date = $_POST['date'];
	$myDataArray = $_POST['seats'];
	$total = $_POST['amount'];
	
	$data = @mysql_query("INSERT INTO bookings VALUES ('','$moviename','$theater','$addr','$scrname','$time','$date','$myDataArray','$total','$email')") or die(mysql_error());
	header('Location:homepage.php');
	}
	?>