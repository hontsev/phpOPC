<!DOCTYPE html>
<html>
<head>
<title>User Management</title>
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
		User Management
	</h6>
</div>

<div class="container" style="min-height:300px">
	<div>
	<h3>USER INFORMATION</h3>
		<table border="1" style="width:95%;">
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>password</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require_once('./dbConnection.php');
					$userId=$_SESSION['userid'];
					$sql="SELECT id,name,password FROM user";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++){
						$no=$i+1;
						echo '<tr>';
						echo "<td>{$res[$i][0]}</td>";
						echo "<td>{$res[$i][1]}</td>";
						echo "<td>{$res[$i][2]}</td>";
						echo "<td><a style='color:#080' href=\"userController.php?id={$res[$i][0]}\">Delete</a></td>";
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