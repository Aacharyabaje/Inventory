<?php 
	
	$host="localhost";
	$user="root";
	$password="";
	$db="kuims";

	$data = mysqli_connect($host,$user,$password,$db);
	
	if($data===false){
		die("Connection error");
	}else{

	if($_GET['id']){
		$id = $_GET['id'];

		$sql = "DELETE FROM returns WHERE id = '$id'";

		$result = mysqli_query($data,$sql);

		if($result){
			header('location:returnreq.php');
		}

	}
	}
?>
