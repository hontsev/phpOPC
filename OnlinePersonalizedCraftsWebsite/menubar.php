<?php
	require_once('./config.php');
	session_start();
?>
<!--header-->	
<div class=" header-product">
	<div class="header-top com">
		<div class="container">
			<div class="header-top-in grid-1">
				<ul class="support">
					<li ><a href="mailto:info@example.com" ><i > </i>lvmengyu@bupt.com</a></li>
					<li ><span ><i class="tele-in"> </i>0 462 261 61 61</span></li>			
				</ul>
				<ul class=" support-right">
					<?php 
						if(!isset($_SESSION['username'])){
							echo '<li ><a href="account.php" ><i class="men"> </i>Login</a></li>';
							echo '<li ><a href="register.php" ><i class="tele"> </i>Create an Account</a></li>';
						}else{
								if($_SESSION['username']=="admin"){
									echo "<li >Welcome, <a href=\"userManagement.php\" ><i class=\"men\"> </i> {$_SESSION['username']}</a></li>";
								}else{
									echo "<li >Welcome, <a href=\"userinfo.php\" ><i class=\"men\"> </i> {$_SESSION['username']}</a></li>";
								}
							echo '<li ><a href="logout.php" ><i class="tele"> </i>Log out</a></li>';
						}
					?>
				</ul>
				<div class="clearfix"> </div>
			</div>
		</div>
			<div class="header-bottom bottom-com">
			<div class="container">			
				<div class="logo">
					<h1><a href="index.php">Online Personalized Crafts</a></h1>
				</div>
				<div class="top-nav">
				<!-- start header menu -->
				<ul class="megamenu skyblue">
				  <li><a  href ="index.php"><font color="#000000">Home</font></a></li>
				  <li class="active grid"><a  href="#"><font color="#000000">Company</font></a>
				    <div class="megapanel">
				    <div class="row">
				      <div class="col1">
				        <div class="h_nav">
				          <h4>CONTENT</h4>
				          <ul>
				            <li><a href="aboutcompany.php">Our Comapany</a></li>
				            <li><a href="aboutproduct.php">Development Team</a></li>
			              </ul>
			            </div>
				        <div class="col1">
				          <div class="h_nav"></div>
			            </div>
				        <div class="col1 col5"></div>
			          </div>
			        </div>
			      </li>
				  </li>
			    </ul>
				<!---->
				 <!---->

				 
				<!---->
					<div class="search-in" >
						<div class="search" >
							<form>
								<input id='searchKeyword' type="text" value="Keywords" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Keywords';}" class="text">
								<input type="button" style="width:80px" value="SEARCH" onclick="search()">
							</form>
							<div class="close-in"><img src="images/close.png" alt="" /></div>
						</div>
						<div class="right"><button> </button></div>
					</div>
				<!---->
				<script type="text/javascript">
					$('.search').hide();
					$('button').click(function (){
						$('.search').show();
						$('.text').focus();
					});
					$('.close-in').click(function(){
						$('.search').hide();
					});
					
					function search(){
						url="index.php?search=" + $("#searchKeyword").val();
						window.location.href=url;
					}
				</script>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		</div>
		
	</div>