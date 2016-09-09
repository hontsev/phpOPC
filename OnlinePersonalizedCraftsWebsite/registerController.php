<?php
	require_once('./dbConnection.php');
	session_start();
	
	if(   
		  !isset($_POST['name'])
		||!isset($_POST['password'])
		||!isset($_POST['password2'])
		||strlen($_POST['name'])<2
		||strlen($_POST['password'])<2
		||strlen($_POST['password2'])<2
	){
		echo "<script>location.href='register.php';</script>";
	}else{
		$name=$_POST['name'];
		$password=$_POST['password'];
		$password2=$_POST['password2'];
		if($password!=$password2){
			//vertify password failed.
			echo "<script>location.href='register.php';</script>";
		}else{
			$sql="SELECT id FROM user WHERE name = '{$name}'";
			$res=db_select($sql);
			if(!empty($res)){
				//username already exist.
				echo "<script>location.href='register.php';</script>";
			}else{
				$sql="INSERT INTO user(name,password) VALUES('{$name}','{$password}')";
				db_exec($sql);
				//register success
				$_SESSION['username']=$name;
				$_SESSION['userid']=$password;
				if($name=="admin"){
					echo "<script>location.href='userManagement.php';</script>";
				}else{
					echo "<script>location.href='index.php';</script>";
				}
			}
		}
	}
?>