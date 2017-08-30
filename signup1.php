<?php

session_start();

$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());

$select = @mysql_select_db("javatest") or die(mysql_error());

$name = $_POST['name'];
$Email = $_POST['mail'];
$Username = $_POST['uname'];
$Password = $_POST['psw'];


$write = @mysql_query("INSERT INTO users VALUES('','$name','$Email','$Username','$Password')") or die(mysql_error());

$_SESSION['username']=$name;
header('Location: member1.php');

?>

