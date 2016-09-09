<!DOCTYPE html>
<html>
<head>
<title>Orderinfo</title>
<!--header-->
<?php
	require_once('./header.php');
?>
<!--/header-->
</head>
<body> 
<!--menubar-->
<?php
	require_once('./menubar.php');
?>
<!--/menubar-->
<!--container-->
<div class="container">
	<hr style="margin:0;height:1px;border:none;border-top:1px solid #555555;" />
	<h6 class="dress">
		<a href="index.php">Home</a>
		<i></i> 
		<a href="userinfo.php">Userinfo</a>
		<i></i> 
		Orderinfo
	</h6>
</div>

<div class="container" style="margin-left:20%;min-height:300px">
	<div>
	<h3>ORDER INFORMATION</h3>
	<br/>
	<br/>
		<table border="1" style="width:45%;">
			<tbody>
				<?php
					require_once('./dbConnection.php');
					if(!isset($_GET))
					{
						echo "<script>location.href='userinfo.php';</script>";
						exit();
					}
					$orderId=$_GET['id'];
					$sql="SELECT contacts,address,phone,quantity,specificDemand,typeName,materialName,colorName,`order`.id ".
						"FROM `order` ".
						"LEFT JOIN type ON `order`.typeId = type.id ".
						"LEFT JOIN material ON `order`.materialId = material.id ".
						"LEFT JOIN color ON `order`.colorId = color.id ".
						"WHERE `order`.id = '{$orderId}'";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++)
					{
						echo "<tr><td>Contacts</td><td>{$res[$i][0]}</td></tr>";
						echo "<tr><td>Address</td><td>{$res[$i][1]}</td></tr>";
						echo "<tr><td>Phone</td><td>{$res[$i][2]}</td></tr>";
						echo "<tr><td>Quantity</td><td>{$res[$i][3]}</td></tr>";
						echo "<tr><td>Type</td><td>{$res[$i][5]}</td></tr>";
						echo "<tr><td>Mateiral</td><td>{$res[$i][6]}</td></tr>";
						echo "<tr><td>Color</td><td>{$res[$i][7]}</td></tr>";
						echo "<tr><td>Specific Demand</td><td>{$res[$i][4]}</td></tr>";
					}
					echo "<tr><td>Design Drafts</td><td>";
					$sql="SELECT filePath FROM designDraft WHERE orderId = '{$orderId}'";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++)
					{
						$tmp=explode('/', $res[$i][0]);
						$fileName= end($tmp);
						echo "<a style='color:#666' href='{$res[$i][0]}' target='_blank' >{$fileName}</a> <br/>";
					}
					echo "</td></tr>";
				?>
			</tbody>
		</table>
		<br/>
		<div class="login-left" style="margin-left:17%">
		<a class="acount-btn" href="javascript:history.go(-1);">Back</a>
		</div>
   </div>
	</div>
<!--/container-->
<!--footer-->
	<?php
		require_once('./footer.php');
	?>
<!--/footer-->
</body>
</html>