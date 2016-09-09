<?php
	require_once('./dbConnection.php');
	session_start();
	
	//var_dump($_POST);
	$userId=$_SESSION['userid'];
	$sql="INSERT INTO ".
	"`order`(contacts,address,phone,quantity,specificDemand,userId,typeId,materialId,colorId) ".
	"VALUES('{$_POST['contacts']}', '{$_POST['address']}', '{$_POST['phone']}', '{$_POST['quantity']}', '{$_POST['specificDemand']}', '{$userId}', '{$_POST['type']}', '{$_POST['material']}' , '{$_POST['color']}')";
	db_exec($sql);
	$sql="SELECT max(id) FROM `order`";
	$res=db_select($sql);
	$orderId=$res[0][0];
	//var_dump($orderId);
	//var_dump($_FILES);
	foreach ($_FILES["designDraft"]["error"] as $key => $error){
        if ($error == UPLOAD_ERR_OK){
            $tmp_name = $_FILES["designDraft"]["tmp_name"][$key];
            $name = $_FILES["designDraft"]["name"][$key];
			$realPath="upload/$name";
            move_uploaded_file($tmp_name, $realPath);
			//var_dump($orderId);
			$sql="INSERT INTO designDraft(orderId,filePath) VALUES('{$orderId}','{$realPath}')";
			db_exec($sql);
        }
	}
	echo "<script>location.href='userinfo.php';</script>";
?>