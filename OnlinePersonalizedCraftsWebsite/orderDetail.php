<!DOCTYPE html>
<html>
<head>
<title>Order Detail</title>
<!--header-->
<?php
	require_once('./header.php');
?>
<link rel="stylesheet" href="css/etalage.css">
<script src="js/jquery.etalage.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->
<script>
	jQuery(document).ready(function($){

		$('#etalage').etalage({
			thumb_image_width: 300,
			thumb_image_height: 400,
			source_image_width: 900,
			source_image_height: 1200,
			show_hint: true,
			click_callback: function(image_anchor, instance_id){
				alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
			}
		});

	});
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  	ga('create', 'UA-48014931-1', 'codyhouse.co');
  	ga('send', 'pageview');

  	jQuery(document).ready(function($){
  		$('.close-carbon-adv').on('click', function(){
  			$('#carbonads-container').hide();
  		});
  	});
</script>
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
		Order Detail
	</h6>
</div>

		<div class="product">
			<div class="container">
				<!--leftbar-->
					<?php
						require_once("leftbar.php");
					?>
				<!--/leftbar-->
				<div class="col-md-9 product-price1">
					<div class="col-md-5 single-top">	
						<ul id="etalage">
							<?php
								require_once('./dbConnection.php');
								if(!isset($_GET["id"])){
									echo "<script>location.href='index.php';</script>";
									exit();
								}
								$orderId=$_GET["id"];
								$sql="SELECT filePath FROM designDraft WHERE orderId = '{$orderId}'";
								$res=db_select($sql);
								for($i=0;$i<count($res);$i++){
									echo "<li>";
									echo '<img class="etalage_thumb_image img-responsive" src="'.$res[$i][0].'" alt="" >';
									echo '<img class="etalage_source_image img-responsive" src="'.$res[$i][0].'" alt="" >';
									echo "</li>";
								}
							?>
							<!--
							<li>
								<a href="optionallink.html">
									<img class="etalage_thumb_image img-responsive" src="images/si1.jpg" alt="" >
									<img class="etalage_source_image img-responsive" src="images/si1.jpg" alt="" >
								</a>
							</li>
							<li>
								<img class="etalage_thumb_image img-responsive" src="images/si2.jpg" alt="" >
								<img class="etalage_source_image img-responsive" src="images/si2.jpg" alt="" >
							</li>
							<li>
								<img class="etalage_thumb_image img-responsive" src="images/si.jpg" alt=""  >
								<img class="etalage_source_image img-responsive" src="images/si.jpg" alt="" >
							</li>
						    <li>
								<img class="etalage_thumb_image img-responsive" src="images/si1.jpg"  alt="" >
								<img class="etalage_source_image img-responsive" src="images/si1.jpg" alt="" >
							</li>
							-->
						</ul>

					</div>	
					<div class="col-md-7 single-top-in simpleCart_shelfItem">
						<div class="single-para ">
						
							<div class="star-on">
								<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
								<div class="review">
									<a href="#"> 1 customer review </a>
									
								</div>
							<div class="clearfix"> </div>
							</div>
							
							<?php
								
								$sql="SELECT typeName,materialName,colorName,specificDemand FROM `order` ".
									"LEFT JOIN type ON `order`.typeId = type.id ".
									"LEFT JOIN material ON `order`.materialId = material.id ".
									"LEFT JOIN color ON `order`.colorId = color.id ".
									"WHERE `order`.id='{$orderId}'";
								$res=db_select($sql);
								echo "<p>Specific Demand : {$res[0][3]}</p>";
								echo '<ul class="tag-men">';
								echo '<li><span style="width:200px">Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="women1">: '.$res[0][0].'</span></li>';
								echo '<li><span style="width:200px">Material</span><span class="women1">: '.$res[0][1].'</span></li>';
								echo '<li><span style="width:200px">Color&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><span class="women1">: '.$res[0][2].'</span></li>';
								echo '</ul>';
							?>
							<!--
							<p>We believe the Light Bar works hard to deliver high-quality, stylish products backed by superior service. We are confident you will be pleased with your Light Bar experience.</p>

							<ul class="tag-men">
								<li><span>TAG</span>
								<span class="women1">: Floor lamp</span></li>
								<li><span>SKU</span>
								<span class="women1">: CK09</span></li>
							</ul>
							-->
								<a href="addOrder.php?id=<?php echo $orderId ?>" class="add-cart item_add">ORDER IT</a>
							
						</div>
					</div>
				<div class="clearfix"> </div>
			<!---->
					<div class="cd-tabs">
			<nav>
				<ul class="cd-tabs-navigation">
					<li><a data-content="fashion"  href="#0">Description </a></li>
					<li><a data-content="cinema" href="#0" >Addtional Informatioan</a></li>
					<li><a data-content="television" href="#0" class="selected ">Reviews (1)</a></li>
					
				</ul> 
			</nav>
	<ul class="cd-tabs-content">
		<li data-content="fashion" >
		<div class="facts">
									  <p > Beginning with design concepts from popular home fashions, we transform our ideas into lighting fixtures that blend timeless beauty with today¡¯s styling. As our designs take shape, we make sure that a high standard of quality goes into manufacturing each fixture. From the casting and forging to the hand-painted finishes and fine details, we strive to make our products the best in the industry.</p>
										<ul>
											<li>Research</li>
											<li>Design and Development</li>
											<li>Porting and Optimization</li>
											<li>System integration</li>
											<li>Verification, Validation and Testing</li>
											<li>Maintenance and Support</li>
										</ul>         
							        </div>

</li>
<li data-content="cinema" >
		<div class="facts1">
					
						<div class="color"><p>Color</p>
							<span >Blue, Black, Red</span>
							<div class="clearfix"></div>
						</div>
						<div class="color">
							<p>Size</p>
							<span >S, M, L, XL</span>
							<div class="clearfix"></div>
						</div>
					        
			 </div>

</li>
<li data-content="television" class="selected">
	<div class="comments-top-top">
				<div class="top-comment-left">
					<img class="img-responsive" src="images/co.png" alt="">
				</div>
				<div class="top-comment-right">
					<h6><a href="#">Hendri</a> - September 3, 2014</h6>
					<ul class="star-footer">
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
										<li><a href="#"><i> </i></a></li>
									</ul>
									<p>Wow nice!</p>
				</div>
				<div class="clearfix"> </div>
				<a class="add-re" href="#">ADD REVIEW</a>
			</div>

</li>
<div class="clearfix"></div>
	</ul> 
</div> 
				<div class="clearfix"> </div>
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