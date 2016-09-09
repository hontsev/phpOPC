<!DOCTYPE html>
<html>
<head>
<title>Register</title>
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
		Register
	</h6>
</div>
<div class="container" style="background-image:url(images/back22.jpg)">
	<div class="register">
		<h3>PERSONAL INFORMATION</h3>
		 <form method="post" action="registerController.php"> 
			<div class="mation" >
				<div>
					<span><label style="width:100px">UserID</label><input type="text" name='name'></span>
				</div>
				<div>
				  <span><label style="width:100px">Password</label><input type="Password" name='password'></span>
				</div>
				<div>
				  <span><label style="width:100px">Vertify Password</label><input type="Password" name='password2'></span>
				</div>
			</div>
			<input type="submit" formenctype="application/x-www-form-urlencoded" value="Submit" >
		</form>
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