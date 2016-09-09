<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['userid']);
	echo "<script>location.href='index.php';</script>";
?>