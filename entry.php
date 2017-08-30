<?php

session_start();
$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());

$select = @mysql_select_db("movie") or die(mysql_error());
if(isset($_GET['item'])){
	$item=$_GET['item'];

if($item==1)
	{
	
$moviename = $_POST['moviename'];
$date = $_POST['date'];
$duration = $_POST['time'];
$language=$_POST['language'];
$genre=$_POST['genre'];
$status=$_POST['status'];


$write = @mysql_query("INSERT INTO movies VALUES('$moviename','$language','$genre','$date','$duration','$status')") or die(mysql_error());
header('Location: admin.php');
	
}
if($item==2)
	{
	
$moviename = $_POST['moviename'];
$theatername = $_POST['theatername'];
$showId = $_POST['showid'];


$write = @mysql_query("INSERT INTO theater VALUES('$showId','$theatername','$moviename')") or die(mysql_error());
header('Location: admin.php');
	
}
else if($item==3)
	{
	
$ShowId = $_POST['showid'];
$date = $_POST['date'];
$Showtime = $_POST['showtime'];
$ScreenId = $_POST['screenid'];

$write = @mysql_query("INSERT INTO showtime VALUES('','$ShowId','$ScreenId','$date','$Showtime')") or die(mysql_error());
header('Location: admin.php');
	
}
else if($item==4)
	{
	
$moviename = $_POST['moviename'];
$castname = $_POST['castname'];
$directorname = $_POST['directorname'];


$write = @mysql_query("INSERT INTO cast VALUES('$moviename','$directorname','$castname')") or die(mysql_error());
header('Location: admin.php');
	
}
else if($item==6)
	{
	
$theatername = $_POST['theatername'];
$address = $_POST['address'];
$city = $_POST['cityname'];


$write = @mysql_query("INSERT INTO theaterdata VALUES('$theatername','$address','$city')") or die(mysql_error());
header('Location: admin.php');
	
}
else if($item==7)
	{
	
$theatername = $_POST['theatername'];
$screenname = $_POST['screenname'];
$screenid = $_POST['screenid'];
$seats = $_POST['seats'];


$write = @mysql_query("INSERT INTO screeninfo VALUES('$screenid','$theatername','$screenname','$seats')") or die(mysql_error());
header('Location: admin.php');
	
}
else if($item==8)
	{
	
$screenid = $_POST['screenid'];
$seattype = $_POST['seattype'];
$price = $_POST['price'];


$write = @mysql_query("INSERT INTO screens VALUES('$screenid','$seattype','$price')") or die(mysql_error());
header('Location: admin.php');
	
}
else
	{
		

$target_dir = "poster/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
	
$moviename = $_POST['moviename'];
$poster = @$_POST['poster'];
$type = $_POST['scale'];


$write = @mysql_query("INSERT INTO poster VALUES('$moviename','$target_file','$type')") or die(mysql_error());
header('Location: admin.php');
	
}

}



?>

