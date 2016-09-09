<?php
	require_once('./dbConnection.php');
	session_start();
	
	if(!isset($_POST['name'])||!isset($_POST['password'])){
		echo "<script>location.href='account.php';</script>";
	}else{
		$name=$_POST['name'];
		$password=$_POST['password'];
		$sql="SELECT id,password FROM user WHERE name = '{$name}'";
		$res=db_select($sql);
		if(empty($res)){
			//no such username.
			echo "<script>location.href='account.php';</script>";
		}else{
			$userPassword=$res[0][1];
			if($userPassword==$password){
				//login success
				$_SESSION['username']=$name;
				$_SESSION['userid']=$res[0][0];
				if($name=="admin"){
					echo "<script>location.href='userManagement.php';</script>";
				}else{
					echo "<script>location.href='index.php';</script>";
				}
			}else{
				//password wrong
				echo "<script>location.href='account.php';</script>";
			}
		}
		
	}
?>