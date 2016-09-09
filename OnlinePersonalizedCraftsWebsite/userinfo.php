<!DOCTYPE html>
<html>
<head>
<title>Userinfo</title>
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
		Userinfo
	</h6>
</div>

<div class="container" style="min-height:300px">
	<div>
	<h3>ORDER INFORMATION</h3>
		<table border="1" style="width:95%;">
			<thead>
				<tr>
					<th>id</th>
					<th>type</th>
					<th>material</th>
					<th>color</th>
					<th>quantity</th>
					<th>specific demand</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once('./dbConnection.php');
					//session_start();
					$userId=$_SESSION['userid'];
					$sql="SELECT typeName,materialName,colorName,quantity,specificDemand, `order`.id ".
						"FROM `order` ".
						"LEFT JOIN type ON `order`.typeId = type.id ".
						"LEFT JOIN material ON `order`.materialId = material.id ".
						"LEFT JOIN color ON `order`.colorId = color.id ".
						"WHERE userId = '{$userId}'";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++){
						$no=$i+1;
						echo '<tr>';
						echo "<td>{$no}</td>";
						echo "<td>{$res[$i][0]}</td>";
						echo "<td>{$res[$i][1]}</td>";
						echo "<td>{$res[$i][2]}</td>";
						echo "<td>{$res[$i][3]}</td>";
						echo "<td>{$res[$i][4]}</td>";
						echo "<td><a style='color:#080' href=\"orderinfo.php?id={$res[$i][5]}\">Check</a></td>";
						echo '</tr>';
					}
				?>
			</tbody>
		</table>
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