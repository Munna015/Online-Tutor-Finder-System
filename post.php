<?php
session_start();
if(!isset($_SESSION['id']))
{
  header("location:index.php");
}


?>
<?php

include("confiq/db.php");

if(isset($_POST['Upload']))
{
	$display_name=$_POST["dis_name"];
	$department=$_POST["department"];
	$area=$_POST["area"];
	$salary=$_POST["salary"];
	$institution1=$_POST["institution1"];
	$email=$_SESSION['Email'];
	$fb=$_POST["fblink"];
	$year=$_POST["year"];
	$semister=$_POST["semister"];
	$experience=$_POST["experience"];
	$subject=$_POST["subject"];
	$username=$_SESSION['Username'];
	



	$uploadok=1;
	$file_name=$_FILES['feat_imag']['name'];
	$file_size=$_FILES['feat_imag']['size'];
	$file_tmp=$_FILES['feat_imag']['tmp_name'];
	$file_type=$_FILES['feat_imag']['type'];
	$target_dir="Tutor/featuredimages";
	$target_file=$target_dir.basename($_FILES['feat_imag']['name']);
	$check=getimagesize($_FILES['feat_imag']['tmp_name']);
	$text=explode('.',$_FILES['feat_imag']['name']);
	$ext=end($text);
	$file_ext=strtolower($ext);

  /*$data = array(
   	'file_name' =>$file_name ,
   	'file_size' =>$file_size ,
   	'file_tmp' =>$file_tmp ,
   	'file_type' =>$file_type ,
   	'target_dir ' =>$target_dir,
   	'check' =>$check,
   	'file_ext' =>$file_ext

   

   );*/

  //print_r($data);



   $extensions=array("jpg","jpeg","png");
   if (in_array($file_ext, $extensions)==false) {
   	$error= "please choose the image which has the extensions (.jpg ,.jpeg ,.png )";
   }
   if($check==false)
   {
   	$error= "Sorry! the file is not image";
   }
   if(empty($error)==true)
   {
   	move_uploaded_file($file_tmp, "featuredimages/".$file_name);
   	$url = $_SERVER['HTTP_REFERER'];
   	$seg=explode('/', $url);
   	$path=$seg[0].'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
   	$full_url=$path.'/'."featuredimages/".$file_name;
   	$id=$_SESSION['id'];

   // sql to delete a record
   	$sql1 = "DELETE FROM posts WHERE user_rule='$id'";
   	if( $conn->query($sql1) === TRUE)
   	{
   		$sql = "INSERT INTO posts(username,display_name,institution,year,semister,department,subject,experience,area,salary,email,fb,feat_imag,user_rule,approved) VALUES ('$username','$display_name','$institution1','$year','$semister','$department','$subject','$experience','$area','$salary','$email','$fb','$full_url','$id','0')";
   		
   		
   		if ($conn->query($sql) === TRUE) {
   			$error ="Saved Seccessfully!";
   		} else {
   			$error= "Failed to Upload Image!";
   		}

   	}
   	else{
   		$error= "Oops! Something went wrong.";
   	}
   }
   $conn->close();

}


?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='css/Header.css' rel='stylesheet' type='text/css'>
	<link href='css/Footer.css' rel='stylesheet' type='text/css'>
	<link href='css/User.css' rel='stylesheet' type='text/css'>
	<link href='css/Avatar.css' rel='stylesheet' type='text/css'>
	<link href='css/Profile.css' rel='stylesheet' type='text/css'>
	<link href='css/alert.css' rel='stylesheet' type='text/css'>

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	



</head>



<body>
	<div class="header">
		<a href="index.php" class="logo">Tution<span>Media</span></a>
		<div class="header-right">
			<a  href="index.php">Home</a>
			<a href="tutor.php">Tutors</a>
		</div>
	</div>
	<?php if(isset($_POST['Upload'])): ?>
		<div style="background-color: #5eb762;color: white;"   class="alert">
			<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
			<strong> <?php echo $error;?></strong>
		</div>
	
<?php endif; ?>

<h4 style="float: right;margin-right: 30px;">Welcome  <?php echo $_SESSION['Username'];?></h4>


<div class="row">
	<div class="column left">
		<table>
			<tr >
				<td><a href="User.php">Dashboard</a></td>

			</tr>
			<tr >
				<td><a href="Profile.php"> Add Profile</a></td>

			</tr>
			<tr>
				<td><a href="Post.php">Create Post</a></td>

			</tr>

			<tr>
				<td><a href="yourpost.php">Your Post</a></td>

			</tr>
			<tr >
				<td><a href="Logout.php">Logout</a></td>

			</tr>
		</table>

	</div>
	<div class="column right" style="height: 720px;" >



		<div>
			<form action="post.php" method="POST" enctype="multipart/form-data">

				<h2 style="font-size: 30px;"><b>Create Post</b></h2>
				<hr>
				<div class="profile-font">

					<label    for="dis_name" ><b>Display Name</b></label>
					<input  type="text" placeholder="Enter your name" name="dis_name" id="dis_name" required ><br>

					<label    for="institution1" ><b>&nbsp;&nbsp;&nbsp;Institution&nbsp;&nbsp;</b></label>
					<input  type="text" placeholder="Enter Institution name" name="institution1" id="institution1" required ><br>

					<label for="department" ><b>&nbsp;Department&nbsp;</b></label>
					<input type="text" placeholder="Enter department name" name="department" id="department" required ><br>

					<label for="year"><b>&nbsp;&nbsp;&nbsp;&nbsp;Year&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
					<select style="width: 462px;padding: 12px;background-color: #f1f1f1;margin-top: 7px;" name="year" id="year">
						<option value="First">First</option>
						<option value="Second">Second</option>
						<option value="Third">Third</option>
						<option value="Fourth">Fourth</option>
						<option value="Fifth">Fifth</option>
					</select><br>

					<label for="semister"><b>&nbsp;&nbsp;&nbsp;&nbsp;Semister&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
					<select style="width: 462px;padding: 12px;background-color: #f1f1f1;margin-top: 7px;" name="semister" id="semister">
						<option value="First">None</option>
						<option value="First">First</option>
						<option value="Second">Second</option>
						
					</select><br>

					<label for="subject" ><b>&nbsp;&nbsp;&nbsp;&nbsp;Subject&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
					<input type="text" placeholder="Write the subject name which you want to teach" name="subject" id="subject" required ><br>

					<label for="experience" ><b>&nbsp;&nbsp;Experience&nbsp;&nbsp;</b></label>
					<input type="text" placeholder="Add your experience here!" name="experience" id="experience" required ><br>

					



					<label for="area" ><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Area&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
					<input type="text" placeholder="Enter area name(e.g Dhanmondi,Shahbagh)" name="area" id="area" required ><br>

					<label for="salary" ><b>Salary range&nbsp;</b></label>
					<input type="text" placeholder="Enter salary range" name="salary" id="salary" required ><br>


					<label for="fblink" ><b>&nbsp;&nbsp;&nbsp;FB Link&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></label>
					<input type="text" placeholder="Enter facebook link" name="fblink" id="fblink" required ><br>


					<label for="feat_imag"><b>&nbsp;Add photo&nbsp;&nbsp;&nbsp;</b></label>
					<input type="file" placeholder="feat_imag" name="feat_imag" id="feat_imag" required >

				</div>
				<hr>


				<button   type="Submit" name="Upload" class="savebtn"  >Upload&nbsp;</button>

				<button type="reset" name="Cancel" class="savebtn" >Cancel&nbsp;</button>
			</form>
			</div>

		</div>
	</div>

	<div>

		<?php
		include 'inc/Footer.inc.php';
		?>
	</div>

</body>
</head>
</html>
