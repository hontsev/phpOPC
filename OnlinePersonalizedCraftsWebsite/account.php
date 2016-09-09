<!DOCTYPE html>
<html>
<head>
<title>Account</title>
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
		 Account
	</h6>
</div>

<div class="container" style="background-image:url(images/back22.jpg)"><div class="account_grid" >
	   <div class=" login-right" >
			<h3>REGISTERED CUSTOMERS</h3>
			<p>If you have an account with us, please log in.</p>
			<form method="post" action="accountController.php">
				<div>
					  <span><label style="width:80px">UserID</label><input type="text" name='name'></span>
				</div>
				<div>
					  <span><label style="width:80px">Password</label><input type="Password" name='password'></span>
				</div>
				<input type="submit" style="margin-left:70px" value="Login">
			</form>
	   </div>	
		<div class=" login-left">
		 <h3>NEW CUSTOMERS</h3>
		 <h3><a class="acount-btn" href="register.php">Create an Account</a></h3>
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