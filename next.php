<?php
$json = $_GET['name'];
$no = $_GET['no'];
$cat = $_GET['category'];
$myDataArray = json_decode($json,true);


$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());

$select = @mysql_select_db("movie") or die(mysql_error());
$showid=$_GET['id'];

$screen = @mysql_query("SELECT screen_id FROM showtime WHERE unique_id='$showid'") or die(mysql_error());
$row = @mysql_fetch_assoc($screen);
$scrid = $row['screen_id'];

$data = @mysql_query("SELECT seat FROM seats WHERE screen_id='$scrid'") or die(mysql_error());
$res = @mysql_fetch_assoc($data);

$x = $res['seat'];
$result=$myDataArray."".$x;
$string = implode(",",(array) $myDataArray);
echo $string;


$extract = @mysql_query("UPDATE seats SET seat='$result' where screen_id='$scrid'") or die(mysql_error());
header("Location: payment.php?id=$showid&seats=$json&no=$no&cat=$cat");

?>