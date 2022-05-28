
<?php

/*$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "registration";

$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

if(isset($_POST["username"]))
{
     $sql="SELECT * FROM registrationastutor WHERE username='".$_POST["username"]."'";
     $result=mysqli_query($conn,$sql);
     if (mysqli_num_rows($res) > 0) {
          echo '<span class="text-danger">Usename not avaiable</span>';
           }
     else
     {
       echo '<span class="text-danger">Usename avaiable</span>';   
     }

}*/

//************Check user and password is unique or not after submitting the form************************************************************





$tutorusername=$_POST["username"];
$tutoremail=$_POST["email"];
$tutorpassword=$_POST["psw"];





$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "signup";

// Create connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
      $sql="select * from signuptutor where (username='$tutorusername' or email='$tutoremail');";
            $res=mysqli_query($conn,$sql);
            if (mysqli_num_rows($res) > 0) {
            // output data of each row
            $row = mysqli_fetch_assoc($res);
            if ($tutorusername==$row['username'])
            {
                echo "Username already exists";
            }
            elseif($tutoremail==$row['email'])
            {
                echo "Email already exists";
            }
        }else { //here you need to add else condition
          $sql = "INSERT INTO signuptutor(username,email,password) VALUES ('$tutorusername','$tutoremail','$tutorpassword')";
         

       if ($conn->query($sql) == TRUE) {
             header('Location:tutor.php');
     } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
           }
         $conn->close();
            
        }
//***************************************************************************************************************************************/

?>


 