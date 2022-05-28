<?php
session_start();


if(!isset($_SESSION['id']))
{
  header("location:index.php");
} 
?>
<?php
include("confiq/db.php");
$url=$_SERVER['PHP_SELF'];
$seg=explode('/', $url);
$path="http://127.0.0.1".$seg[0].'/'.$seg[1];
$full_url=$path.'/'.'images'.'/'.'Avatar.jpg';

$id=$_SESSION['id'];
$sql="select * from profile where user_rule= '$id'";



$res=mysqli_query($conn,$sql) or die('error');



if (mysqli_num_rows($res) > 0) {
            // output data of each row

  while($row = mysqli_fetch_assoc($res))
  {
    $id=$row['id'];
    $Institution=$row['Institution'];
    $Avatar=$row['Avatar'];
  
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
  <link href='css/Footer.css' rel='stylesheet' type='text/css'>
  <link href='css/User.css' rel='stylesheet' type='text/css'>
  
  <link href='css/Avatar.css' rel='stylesheet' type='text/css'>

  <link href='css/signup&signin.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>


  <style type="text/css">
    input[type=text] {
      width: 35%;
      padding: 12px 20px;
      margin: 10px 10px;
      box-sizing: border-box;
      border: none;
      background-color: white;
      font-size: 15px;
      color: black;
    }
  </style>

</head>



<body>
	<div class="header">
    <a href="index.php" class="logo">Tution<span>Media</span></a>
    <div class="header-right">
      <a  href="index.php">Home</a>
      <a href="tutor.php">Tutors</a>
    </div>
  </div>

  <h4 style="float: right;margin-right: 30px;">Welcome  <?php echo $_SESSION['Username'];?></h4>




  <div class="row">
    <div class="column left">
      <table>
        <tr >
          <td ><a href="User.php">Dashboard</a></td>

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
    <div class="column right" style="height: 450px; ">
      <div>
        
       <p style="text-align: center;">
        <?php if(isset($Avatar)): ?>
        <img src=<?php echo $Avatar;?> "" class="avatar">
       <?php else:?>
         <img src=<?php echo $full_url;?> "" class="avatar">
        <?php endif;?>
        </p>
      <table  style="margin-left: 300px;">
        <tr >
          <td >&nbsp;Username&nbsp;&nbsp;</td>
          <td style="background-color: white;font-size: 18px;"><?php echo $_SESSION['Username'];?></td>

        </tr>
          <tr>
          <td>Email</td>
          <td style="background-color: white;font-size: 20px;padding:0px 7px 0px 7px;"><?php echo $_SESSION['Email'];?></td>

        </tr>
            <tr>
          <td>Institution</td>
          <td style="background-color: white;font-size: 18px;">
             <?php if(isset($Institution)): echo $Institution;?>
             <?php else:echo "";?>
               <?php endif;?>
            </td>

        </tr>





      </table>

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
