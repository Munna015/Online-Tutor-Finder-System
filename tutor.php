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
    <!--link href='css/search.css' rel='stylesheet' type='text/css'-->


	
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>

    <style type="text/css">
        input[type=text]:focus {
    background-color: lightblue;
    }
    </style>

    
	





</head>



<body>
	<div class="header">
		<a href="index.php" class="logo">Tution<span>Media</span></a>
		<div class="header-right">
			<a  href="index.php">Home</a>
			<a class="active" href="tutor.php">Tutors</a>
		</div>
	</div>

    <form action="tutor.php" method="POST"> 
                    <div >
                        <input style="margin:10px 0 10px 500px;width: 400px;border: 1px solid black;border-radius: 25px;" type="text" name="search_val"  placeholder="Search By Subjects..." >
                        <button style="font-size: 18px;" >Search</button>
                        
                    </div>
                    
    </form>

	<div style="min-height: 250px;overflow: hidden;">
		<?php
        
        if(isset($_POST['search_val']))
        {
            //echo "ok";
            $search_key = $_POST['search_val'];
            //echo $search_key;
            $posts_query = "SELECT * FROM posts WHERE subject LIKE '%$search_key%' ";
        }
        else
        {
           // echo "ok1";
          $posts_query="SELECT * FROM posts";
          $search_key="";
        }
       

		
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
                    if($approved==1)
                    {
            		?>
            		<div class="card-container" style="height: 500px;">

            			<img src=<?php echo $feat_imag;?> />
            			<h2><?php echo $display_name;?></h2>
            			<h5><?php echo $institution;?></h5>
            			<p><b>Dept: <?php echo $department;?> </b><br/> <?php echo $year;?>&nbsp;Year&nbsp;<?php echo $semister;?>&nbsp;Semister</p>
                        <p><b>Teaching Subjcts: <?php echo $subject;?> </b><br/> 
            			<div class="buttons">
            				<button class="primary">
            					<a style="font-size: 15px;text-decoration: none;color: white"   href="details.php?id=<?php echo $id;?>">Details</a>   
            				</button>
            				<!--button class="primary ghost">
            					<a style="font-size: 15px;text-decoration: none;color: white" href="message.php?id=<?php echo $id;?>">Send Request</a>
            				</button-->
            			</div>
            			<div class="area">
            				<h5>Area</h5>
            				<ul>
            					<li style="font-size: 14px;"><?php echo $area;?></li>
            					
            				</ul>
            			</div>
            		</div>
            		

            		<?php
                }

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
