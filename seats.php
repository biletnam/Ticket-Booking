<?php
session_start();
?>
<html>
<head>
<style>
@import "color-schemer";
@import "susy";
*, *:before, *:after {
  box-sizing: border-box;
}

html {
  font-size: 16px;
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

.plane {
  margin:60px 80px;
  
  max-width: 780px;
}

.exit {
  position: relative;
  height: 50px;
}
.exit:before, .exit:after {
  content: "EXIT";
  font-size: 14px;
  line-height: 18px;
  padding: 0px 2px;
  font-family: "Arial Narrow", Arial, sans-serif;
  display: block;
  position: absolute;
  background: green;
  color: white;
  top: 50%;
  transform: translate(0, -50%);
}
.exit:before {
  left: 0;
}
.exit:after {
  right: 0;
}


ol {
  list-style: none;
  padding: 0;
  margin: 0;
}

.seats {
  display: flex;
  flex-direction: row;
  flex-wrap: nowrap;
  justify-content: flex-start;
}

.seat {
 
  flex: 0 0 7.15%;

  padding: 3px;

  position: relative;
}
.seat:nth-child() {
  margin-right: 14.28571428571429%;
}
.seat input[type=checkbox] {
  position: absolute;
  opacity: 0;
}
.seat input[type=checkbox]:checked + label {
  background: #bada55;
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat input[type=checkbox]:disabled + label {
  background: #dddddd;
  text-indent: -9999px;
  overflow: hidden;
}
.seat input[type=checkbox]:disabled + label:after {
  content: "X";
  text-indent: 0;
  position: absolute;
  top: 4px;
  left: 50%;
  transform: translate(-50%, 0%);
}
.seat input[type=checkbox]:disabled + label:hover {
  box-shadow: none;
  cursor: not-allowed;
}
.seat label {
  display: block;
  position: relative;
  width: 100%;
  text-align: center;
  font-size: 14px;
  font-weight: bold;
  line-height: 1.5rem;
  padding: 4px 0;
  background: #b7b9b9;
  border-radius: 5px;
  animation-duration: 300ms;
  animation-fill-mode: both;
}
.seat label:before {
  content: "";
  position: absolute;
  width: 75%;
  height: 75%;
  top: 1px;
  left: 50%;
  transform: translate(-50%, 0%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 3px;
}
.platinum{
	background-color:brown;
}
.gold{
	background-color:gold;
}
.silver{
	background-color:green;
}
.seat label:hover {
  cursor: pointer;
  box-shadow: 0 0 0px 2px #5C6AFF;
}

#platinum{
	float:left;
	margin-top:30px;
	width:20px;
	height:20px;
	background-color:brown;
}
.name{
	margin-left:30px;
	margin-top:30px;
}
#gold{
	clear:left;
	float:left;
	margin-top:15px;
	width:20px;
	height:20px;
	background-color:gold;
}
#silver{
	clear:left;
	float:left;
	margin-top:15px;
	width:20px;
	height:20px;
	background-color:green;
}

@-webkit-keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
@keyframes rubberBand {
  0% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
  30% {
    -webkit-transform: scale3d(1.25, 0.75, 1);
    transform: scale3d(1.25, 0.75, 1);
  }
  40% {
    -webkit-transform: scale3d(0.75, 1.25, 1);
    transform: scale3d(0.75, 1.25, 1);
  }
  50% {
    -webkit-transform: scale3d(1.15, 0.85, 1);
    transform: scale3d(1.15, 0.85, 1);
  }
  65% {
    -webkit-transform: scale3d(0.95, 1.05, 1);
    transform: scale3d(0.95, 1.05, 1);
  }
  75% {
    -webkit-transform: scale3d(1.05, 0.95, 1);
    transform: scale3d(1.05, 0.95, 1);
  }
  100% {
    -webkit-transform: scale3d(1, 1, 1);
    transform: scale3d(1, 1, 1);
  }
}
.rubberBand {
  -webkit-animation-name: rubberBand;
  animation-name: rubberBand;
}
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin-top:20px;
    border: none;
    cursor: pointer;
    width: 100px;
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
    <div class="plane">
      <ol class="seats" type="A">	
	  <?php
	  $connect = @mysql_connect("localhost","Gaurav","P@ssword") or die(mysql_error());

		$select = @mysql_select_db("movie") or die(mysql_error());
		
		$showid = $_GET['showid'];
		$scrid = $_GET['screenid'];
		$no= $_POST['number'];
		$category= $_POST['category'];
		$extract = @mysql_query("SELECT * FROM seats NATURAL JOIN screeninfo WHERE screen_id = '$scrid'") or die(mysql_error());
		
$rows = @mysql_num_rows($extract);
$data = @mysql_fetch_assoc($extract);
$s = $data['total_seats'];
$json = $data['seat'];
$array =str_split($json,3);
for($i=0;$i<sizeof($array);$i++){
	$array[$i]=substr($array[$i],0,2);
}			 
	  
	  $ch='A';
	  for($i=1;$i<=20;$i++){
	  ?>
        <li class="seat platinum">
          <input type="checkbox"  value="<?php echo "1".$ch; ?>" name="Z" id="<?php echo "1".$ch; ?>" />
          <label for="<?php echo "1".$ch; ?>"><?php echo "1".$ch; ?></label>
        </li>
		<?php
		$ch++;
		}
		?>
        
      </ol>
    
      <ol class="seats" type="A">
         <?php
	  
	  $ch='A';
	  for($i=1;$i<=20;$i++){
	  ?>
        <li class="seat platinum">
          <input type="checkbox"  value="<?php echo "2".$ch; ?>" name="Z" id="<?php echo "2".$ch; ?>" />
          <label for="<?php echo "2".$ch; ?>"><?php echo "2".$ch; ?></label>
        </li>
		<?php
		$ch++;
		}
		?>
      </ol>
    
      
	  <?php
	 
	  $s-=40;
	  $s/=16;
			for($i=1;$i<=$s-2;$i++){
				?>
				
				<ol class="seats" type="A">
				<?php
				 $ch='A';
		  for($j=1;$j<=20;$j++){
			  if($j==5 || $j==6 || $j==15 || $j==16){
				  ?>
				  <li class="seat"></li>
				  <?php
			  }
			  else{
				  ?>
			  
        <li class="seat gold">
          <input type="checkbox" value="<?php echo ($i+2).$ch; ?>" name="Z" id="<?php echo ($i+2).$ch; ?>" />
          <label for="<?php echo ($i+2).$ch; ?>"><?php echo ($i+2).$ch; ?></label>
		  <?php
				
				$ch++;
				}
			}
			?>
			 </ol>
			 <?php
			}
			for($i=$s-1;$i<=$s;$i++){
				?>
				
				<ol class="seats" type="A">
				<?php
				$ch='A';
		  for($j=1;$j<=20;$j++){
			  if($j==5 || $j==6 || $j==15 || $j==16){
				  ?>
				  <li class="seat"></li>
				  <?php
			  }
			  else{
				  ?>
			  
        <li class="seat silver">
          <input type="checkbox" value="<?php echo ($i+2).$ch; ?>" name="Z" id="<?php echo ($i+2).$ch; ?>" />
          <label for="<?php echo ($i+2).$ch; ?>"><?php echo ($i+2).$ch; ?></label>
		  <?php
				
				$ch++;
				}
			}
			?>
			 </ol>
			 <?php
			}
		?>
		
    <div id="platinum"></div><p class="name">Platinum</p>
	<div id="gold"></div><p class="name">Gold</p>
	<div id="silver"></div><p class="name">Silver</p>
     
  <button type="button" onclick='printChecked()'>Proceed</button>
    
</div>
       
</div>




<script>
myFunction();
function myFunction() {
	var jArray= <?php echo json_encode($array); ?>;
	 for(var i=0; i<jArray.length; i++){
    document.getElementById(jArray[i]).disabled = true;
	 }
}
function printChecked(){
                var items=document.getElementsByName('Z');
                var selectedItems="";
                var count=0;
                for(var i=0; i<items.length; i++){
                    if(items[i].type=='checkbox' && items[i].checked==true)
                        
                        selectedItems+=items[i].value+"\n";
                        
                }
              var arrayJson = JSON.stringify(selectedItems);
document.location.href='next.php?id=<?php echo $showid; ?>&no=<?php echo $no; ?>&category=<?php echo $category; ?>&name='+arrayJson;
                
            }   

</script>
</body>
</html>