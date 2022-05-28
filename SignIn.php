<?php
session_start();

  include("confiq/db.php");

if(isset($_POST['login']))
{
$tutorusername=$_POST["username"];
$tutorpassword=$_POST["psw"];
 $sql="select * from signuptutor where (username='$tutorusername' && password='$tutorpassword');";
      $res=mysqli_query($conn,$sql);
      $num=mysqli_num_rows($res);
      if($num==1)
      {
        $row = mysqli_fetch_assoc($res);
        $id=$row['id'];
        $username=$row['username'];
        $email=$row['email'];
        $password=$row['password'];
        
        $_SESSION['id']=$id;
        $_SESSION['Username']=$username;
        $_SESSION['Email']=$email;
        $_SESSION['Password']=$password;
        if($id==1)
        {
           header("Location: http://localhost/Tutor/admin.php");
        }
        else
        {

        
        header("Location: http://localhost/Tutor/User.php");
       }
       setcookie ("username",$_POST["username"],time()+ 3600);
      }
      else
      {
        $error= "Username or Password is incorrect.Try again";
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
  <link href='css/signup&signin.css' rel='stylesheet' type='text/css'>
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

<?php if(isset($_POST['login'])): ?>
       <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong> <?php echo $error;?></strong>
      </div>
    </div>
  <?php endif; ?>





  <div >
    <form action="SignIn.php" method="POST">
      <div class="container">
        <h1 style="margin-top: 50px;"><b>Sign In</b></h1>
        <hr>
        <label for="username"><b>UserName</b></label>
        <input type="text" placeholder="Enter Username" name="username" id="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" id="psw" required>



        <button type="submit" name="login" class="registerbtn" style="margin-top: 15px;">Sign In</button>
      </div>

      <div class="container signin">
        <p>Don't have an account? <a href="SignUp.php">Sign Up</a>.</p>
      </div>
    </form>
  </div>

  <div>

   <?php
   include 'inc/Footer.inc.php';
   ?>
 </div>

</body>
</head>
</html>