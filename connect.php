<?php
session_start();
$connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());

$Username = $_POST['uname'];
$Password = $_POST['psw'];

	if($Username=="admin" && $Password=="admin"){
			header('location:admin.php');
		}
		else{
$select = @mysql_select_db("movie") or die(mysql_error());

$extract = @mysql_query("SELECT * FROM user WHERE userid = '$Username' AND password = '$Password'") or die(mysql_error());

$rows = @mysql_num_rows($extract);
	
$data = @mysql_fetch_assoc($extract);


	if($data['userid']==$Username && $data['password']==$Password)
	{
		
	
		$_SESSION['username']=$data['name'];
		header('Location: Homepage.php');
	

	}
	else
	{
		?>
		<html>

		<body>
		<script type="text/javascript">

		alert("invalid id or password");
		location.href="homepage.php";
		</script>
		</body>
		</html>
		<?php
	}
		}
	
?>