<?php
session_start();
if(!isset($_SESSION['id']))
{
  header("location:index.php");
} 
include("confiq/db.php");
if(isset($_GET['id']))
{
	$id=$_GET['id'];
	//$feat_imag=$_POST['feat_imag'];
	//$seg=explode('/', $feat_imag);
	//$image=$seg[5];

	// $data = array(
	// 	'id' => $id,
	// 	'feat_imag' => $feat_imag,
	// 	'seg' => $seg,
	// 	'image'=> $image,
	// );
	// print_r($data);
	$sql = "DELETE FROM posts WHERE user_rule='$id'";
	$query=$conn->query($sql);
	unlink("featuredimages/".$image);
	if($query){
		header("location:admin.php");
	}

	
}



?>