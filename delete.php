<?php
session_start();
include("confiq/db.php");
if(!isset($_SESSION['id']))
{
  header("location:index.php");
}
if(isset($_POST['delete']))
{
	$id=$_SESSION['id'];
	$feat_imag=$_POST['feat_imag'];
	$seg=explode('/', $feat_imag);
	$image=$seg[5];

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
		header("location:User.php");
	}

	
}



?>