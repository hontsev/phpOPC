<?php
	require_once('./dbConnection.php');
	session_start();
	
	if(isset($_GET['id'])){
		$userId=$_GET['id'];
		$sql="DELETE FROM user WHERE id='{$userId}'";
		db_exec($sql);
		echo "<script>location.href='userManagement.php';</script>";
	}else{
		echo "<script>location.href='userManagement.php';</script>";
	}
?>