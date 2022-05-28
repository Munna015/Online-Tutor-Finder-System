<?php
session_start();


?>
<?php

include("confiq/db.php");


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
	<link href='css/alert.css' rel='stylesheet' type='text/css'>

	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	
	



</head>



<body>
	<div class="header">
		<a href="index.php" class="logo">Tution<span>Media</span></a>
		<div class="header-right">
			<a  href="index.php">Home</a>
			<a class="active" href="tutor.php">Tutors</a>
		</div>
	</div>

	<div >
		<?php
        $id=$_GET['id'];
        


        $posts_query="SELECT * FROM posts WHERE user_rule='$id'";
        $posts_result=mysqli_query($conn,$posts_query) or die("Oop! Something went wrong!");

        if(mysqli_num_rows($posts_result) > 0)
        {
         while($posts=mysqli_fetch_assoc($posts_result))
         {
            $id=$posts['user_rule'];
            $year=$posts['year'];
            $semister=$posts['semister'];

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

                        <table style="margin: 70px 200px">
                            <tr >
                                <td style="text-align: center;">
                                 <img style="height: 150px;width: 150px;border-radius: 20%;" src=<?php echo $feat_imag;?> />
                                 <h2><?php echo $display_name;?></h2>
                                 <h5><?php echo $institution;?></h5>
                                 <p><b>Dept: <?php echo $department;?> </b><br/> <?php echo $year;?>&nbsp;Year&nbsp;<?php echo $semister;?>&nbsp;Semister</p>
                             </td>

            			<!--div class="buttons">
            				<button class="primary">
            					<a style="font-size: 15px;text-decoration: none;color: white"   href="details.php?id=<?php echo $id;?>">Details</a>   
            				</button>
            				<button class="primary ghost">
            					<a style="font-size: 15px;text-decoration: none;color: white" href="message.php?id=<?php echo $id;?>">Send Request</a>
            				</button>
            			</div-->
            			<td  style="margin-top: 50px">

                           <p style="margin-left: 100px;"><b>Subject:</b> &nbsp;&nbsp;<?php echo $subject; ?></p>

                           <p style="margin-left: 100px;"><b>Experience:</b>&nbsp;&nbsp;<?php echo $experience; ?></p>

                           <p style="margin-left: 100px;"><b>Salary range:</b>&nbsp;&nbsp;<?php echo $salary; ?></p>

                           <p style="margin-left: 100px;"><b>Area:</b>&nbsp;&nbsp;<?php echo $area; ?></p>

                           <br>
                           <br>
                           <p style="margin-left: 200px;font-size: 16px;">Find me on</p>
                           <div class="footer-icons">
                            <a style="margin-left: 200px;" href=<?php echo $fb;?>><i class="fa fa-facebook"></i></a>

                        </div>
                        <!--button class="primary ghost" style="margin:0px 180px;">
                            <a style="font-size: 15px;text-decoration: none;color: black" href="message.php?id=<?php echo $id;?>"><b>Send Request</b></a>
                        </button-->



                    </td>
                </tr>


            </table>

        </div>


        <?php

    }
            	//exit();
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
