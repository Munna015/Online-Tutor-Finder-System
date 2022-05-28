<?php
session_start();


?>
<?php

include("confiq/db.php");
if(!isset($_SESSION['id']))
{
  header("location:index.php");
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
	<!--link href='css/User.css' rel='stylesheet' type='text/css'-->
	<link href='css/Avatar.css' rel='stylesheet' type='text/css'>
	<link href='css/profile-card.css' rel='stylesheet' type='text/css'>
	<link href='css/Profile.css' rel='stylesheet' type='text/css'>
    <link href='css/User.css' rel='stylesheet' type='text/css'>
    <link href='css/alert.css' rel='stylesheet' type='text/css'>

    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    
    



</head>



<body>
	<div class="header">
		<a href="index.php" class="logo">Tution<span>Media</span></a>
		<div class="header-right">
			<a  href="index.php">Home</a>
			<a  href="tutor.php">Tutors</a>
		</div>
	</div>

		<?php
        $id=$_SESSION['id'];
        


        $posts_query="SELECT * FROM posts WHERE user_rule='$id'";
        $posts_result=mysqli_query($conn,$posts_query) or die("Oop! Something went wrong!");

        if(mysqli_num_rows($posts_result) > 0)
        {
           while($posts=mysqli_fetch_assoc($posts_result))
           {
            $id=$posts['user_rule'];
            $year=$posts['year'];
            $semister=$posts['semister'];
            $approved=$posts['approved'];

            $department=$posts['department'];
            $subject=$posts['subject'];
            $experience=$posts['experience'];
            $username=$posts['username'];
            $display_name=$posts['display_name'];
            $institution=$posts['institution'];
            $area=$posts['area'];
            $salary=$posts['salary'];
            $email=$posts['email'];
            $fb=$posts['fb'];
            $feat_imag=$posts['feat_imag'];
            		/*$data = array(
            			'location :' =>$location ,
            			'area' =>$area ,
            			'salary' =>$salary ,
            		    'email' =>$email,
            	        'fb' =>$fb ,
            	        'feat_imag' =>$feat_imag
                        );

            		echo "<prev>";
            		print_r($data);
            		echo "</prev>";*/
            		?>
<div>


  <h4 style="float: right;margin-right: 30px;">Welcome  <?php echo $_SESSION['Username'];?></h4><br>
  <h6 style="float: right;color: red;"><?php if($approved==0): echo "your post still dont approved by the admin";?>
             
               <?php endif;?></h6>

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

                            <div class="column right" style="height: 520px;" >

                                <table style="margin-left: 50px;width: 850px;height: 400px;">
                                    <tr >
                                        <td >
                                           <img style="height: 150px;width: 150px;border-radius: 20%;" src=<?php echo $feat_imag;?> />
                                           <h2><?php echo $display_name;?></h2>
                                           <h5><?php echo $institution;?></h5>
                                           <p><b>Dept: <?php echo $department;?> </b><br/> <?php echo $year;?>&nbsp;Year&nbsp;<?php echo $semister;?>&nbsp;Semister</p>
                                       </td>

            			<!--div class="buttons">
            				<button class="primary">
            					<a style="font-size: 15px;text-decoration: none;color: white"   href="details.php?id=<?php //echo $id;?>">Details</a>   
            				</button>
            				<button class="primary ghost">
            					<a style="font-size: 15px;text-decoration: none;color: white" href="message.php?id=<?php //echo $id;?>">Send Request</a>
            				</button>
            			</div-->
            			<td>

                         <p><b>Subject:</b> &nbsp;&nbsp;<?php echo $subject; ?></p>

                         <p><b>Experience:</b>&nbsp;&nbsp;<?php echo $experience; ?></p>

                         <p><b>Salary range:</b>&nbsp;&nbsp;<?php echo $salary; ?></p>

                         <p><b>Area:</b>&nbsp;&nbsp;<?php echo $area; ?></p>

                         <p style="font-size: 16px;">Find me on</p>
                         <div class="footer-icons">
                            <a href=<?php echo $fb;?>><i class="fa fa-facebook"></i></a>

                        </div>
                        <br>
                        <br>
                        <button class="primary ghost" >
                            <a style="font-size: 15px;text-decoration: none;color: black" href="update.php"><b>Edit</b></a>

                        </button>
                        <button class="primary ghost">
                            <form action="delete.php"  method="POST">
                                <input type="hidden" name="feat_imag" value=<?php echo $feat_imag;?>>
                                <input type="submit" name="delete" value="Delete"   style="font-size: 15px;text-decoration: none;color: black;background: none;border: none;font-weight: bold;">
                            </form>
                            
                            
                        </button>



                    </td>
                </tr>


            </table>

        </div>

    </div>


    <?php

}
    
}
else{
?>
<div>


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

                            <div class="column right"  >

                               <h1 style="text-align: center;color: red;">No post available!!</h1> 
                               <h2 style="text-align: center; text-decoration: underline overline;"><a style="color: green" href="Post.php">Click Here!</a></h2>



                            </div>
                        </div>

</div>



                 



<?php
}



?>
</div>

<div>

 <?php
 include 'inc/Footer.inc.php';
 ?>
</div>

</body>
</head>
</html>
