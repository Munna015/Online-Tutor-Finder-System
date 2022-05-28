<?php

include("confiq/db.php");

$sql="SELECT * FROM posts";
$result=mysqli_query($conn,$sql) or die("Oop! Something went wrong!");
		
 $num=0;
 //echo "$num";

 if(mysqli_num_rows($result) > 0)
		{
			while($posts=mysqli_fetch_assoc($result))
			{
				$approved=$posts['approved'];
				if($approved==1)
				{
					$num=$num+1;
				}
			}
		}


?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='css/Header.css' rel='stylesheet' type='text/css'>
	<link href='css/footer.css' rel='stylesheet' type='text/css'>
	<link href='css/slideshow.css' rel='stylesheet' type='text/css'>
	<link href='css/Subheader.css' rel='stylesheet' type='text/css'>
	<link href='css/bodyOfHome.css' rel='stylesheet' type='text/css'>
	<link href='css/counter.css' rel='stylesheet' type='text/css'>
	<!--meta name="keywords" content="footer, address, phone, icons" /-->
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    	
</head>

<body>
	<div class="header">
    <a href="index.php" class="logo">Tution<span>Media</span></a>
    <div class="header-right">
    <a class="active" href="index.php">Home</a>
    <a href="tutor.php">Tutors</a>
    
 </div>
</div>
  

<div class="tutor">
	 <b>Are you a tutor?</b>
	 <a href="SignIn.php">Sign In</a>
	 <a href="SignUp.php">Sign Up</a>

</div>



  <div class="row">
    <div class="column left">
      <div class="slideshow-container">

		<div class="mySlides fade">
		  <img src="images/one.jpg" style="width:100%">
		</div>

		<div class="mySlides fade">
		  <img src="images/two.jpg" style="width:100%">
		</div>

		<div class="mySlides fade">
		  <img src="images/three.jpg" style="width:100%">
		</div>

		</div>

		<br>

		<div style="float: left; margin-left: 250px;">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>

    </div>
    <div class="column right">

    	<h1 style="text-align: center;margin-top: 100px; color: red; ">Largest Tuition Media in Khulna!</h1>


    	<div class="counter-container">
	 		<h2  class="counter" ><?php echo $num; ?></h2>
			<h1>Tutors</h1>   		
    	</div>
      
     </div>
   </div>





<script src="script/slideshow.js"></script>
<!--script src="script/animatedcounter.js"></script-->

		
<div>
	
	<?php
					include 'inc/Footer.inc.php';
	?>

</div>
	

</body>
</head>
</html>