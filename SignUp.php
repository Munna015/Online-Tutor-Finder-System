<?php
include("confiq/db.php");
if(isset($_POST['register']))
{
 $tutorusername=$_POST["username"];
 $tutoremail=$_POST["email"];
 $tutorpassword=$_POST["psw"];
 $tutorrepeatpassword=$_POST["psw-repeat"];
 $sql="select * from signuptutor where (username='$tutorusername' or email='$tutoremail');";
 $res=mysqli_query($conn,$sql);
 if (mysqli_num_rows($res) > 0) {
            // output data of each row
  $row = mysqli_fetch_assoc($res);
  if ($tutorusername==$row['username'])
  {
    $error= "Username already exists";
  }
  elseif($tutoremail==$row['email'])
  {
    $error= "Email already exists";
  }


}
else if($tutorpassword!=$tutorrepeatpassword)
{
  $error= "Password and Repeat Password dont match";
}

        else { //here you need to add else condition
          $sql = "INSERT INTO signuptutor(username,email,password) VALUES ('$tutorusername','$tutoremail','$tutorpassword')";


          if ($conn->query($sql) === TRUE) {
           header('Location:SignIn.php');
         } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();

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
      <link href='css/alert.css' rel='stylesheet' type='text/css'>
      <!--link href='css/SignUp.css' rel='stylesheet' type='text/css'-->


      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

      <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
      <link href='css/signup&signin.css' rel='stylesheet' type='text/css'>


      



    </head>

    <body>

      <div class="header">
        <a href="index.php" class="logo">Tution<span>Media</span></a>
        <div class="header-right">
          <a  href="index.php">Home</a>
          <a href="tutor.php">Tutors</a>

        </div>
      </div>
      
      <?php if(isset($_POST['register'])): ?>
       <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
        <strong> <?php echo $error;?></strong>
      </div>
    </div>
  <?php endif; ?>



  <div >
    <form action="SignUp.php" method="POST">
      <div class="container">
        <h2 style="font-size: 30px;"><b>Sign Up</b></h2>
        <hr>
        <div class="font">
          <label for="username"><b>UserName</b></label>
          <input type="text" placeholder="Enter Username" name="username" id="username" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Enter Email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Provide a valid email address!" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

          <label for="psw-repeat"><b>Repeat Password</b></label>
          <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
        </div>
        <hr>
        <p>By creating an account you agree to our <a href="privatepolicy.php">Terms & Privacy</a>.</p>

        <button type="submit" name="register" class="registerbtn">Register</button>
      </div>

      <div class="container signin">
        <p>Already have an account? <a href="SignIn.php">Sign in</a>.</p>
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
