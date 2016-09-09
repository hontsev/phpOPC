<!DOCTYPE html>
<html>
<head>
<title>Online Personalized Chair</title>
<!--header-->
<?php
	require_once('./header.php');
?>
<script src="js/simpleCart.min.js"> </script>
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
	</h6>
</div>
<div class="back">
	<h2><a href='./addOrder.php'>Order Your Own Chair!</a></h2>
</div>
		<!---->
		<div class="product">
			<div class="container">
				<!--leftbar-->
				<?php
					require_once("leftbar.php");
				?>
				<!--/leftbar-->
				<div class="col-md-9 product-price1">
					<div class="mens-toolbar">
						<p class="showing">All results</p>
	                 <div class="sort">
			            <select id="sorting_list" onchange="orderBy(this.value)">
			                <option value="type">Sorting By Type </option>
			                <option value="material">Sorting By Material </option>
			                <option value="color">Sorting By Color </option>
			            </select>
						<script>
							function orderBy(str){
								url="index.php?orderby=" + str;
								window.location.href=url;
							}
							<?php
								if(isset($_GET["orderby"]))
									echo '$("#sorting_list").val("'.$_GET["orderby"].'");';
							?>
						</script>
	    		     </div>
    	      
                	<div class="clearfix"></div>		
					</div>
					<div class="product-right-top">
						<div class="top-product">
							<div class="col-md-11 chain-grid  simpleCart_shelfItem">
								<div class="grid-span-1">
							<a  href="single2.html">
								<div class="link">
								<ul >
											<li><i> </i></li>
											<li><i class="white1"> </i></li>
											
								</ul>
							</div>
							</a>
						</div>
						<?php
							require_once('./dbConnection.php');
							
							$orderby="type";
							$search="";
							$type="";
							$material="";
							$color="";
							if(isset($_GET["orderby"]))$orderby=$_GET["orderby"];
							if(isset($_GET["search"]))$search=$_GET["search"];
							if(isset($_GET["type"]))$type=$_GET["type"];
							if(isset($_GET["material"]))$material=$_GET["material"];
							if(isset($_GET["color"]))$color=$_GET["color"];

							$orderSqlStr="";
							if($orderby=="type")$orderSqlStr="type.typeName";
							else if($orderby=="color")$orderSqlStr="color.colorName";
							else if($orderby=="material")$orderSqlStr="material.materialName";
							
							$sql="SELECT typeName,materialName,colorName,specificDemand, `order`.id ".
								"FROM `order` ".
								"LEFT JOIN type ON `order`.typeId = type.id ".
								"LEFT JOIN material ON `order`.materialId = material.id ".
								"LEFT JOIN color ON `order`.colorId = color.id ".
								"WHERE ";
							if($type!="")$sql=$sql."typeId='{$type}' AND ";
							if($material!="")$sql=$sql."materialId='{$material}' AND ";
							if($color!="")$sql=$sql."colorId='{$color}' AND ";
							$sql=$sql."specificDemand LIKE '%{$search}%' ORDER BY {$orderSqlStr} LIMIT 10";
							
							$res=db_select($sql);
							if(count($res)>0){
								for($i=0;$i<count($res);$i++){
									echo '<div class="grid-chain-bottom " style="border-top:1px solid #000"><h6>';
									echo "<a href='orderDetail.php?id={$res[$i][4]}'>";
									echo " {$res[$i][0]} ,";
									echo " {$res[$i][1]} ,";
									echo " {$res[$i][2]} ";
									echo '</a></h6><div class="star-price"><div class="price-at"><ul class="star-footer"><li><a><i> </i></a></li><li><a><i> </i></a></li><li><a><i> </i></a></li><li><a><i> </i></a></li><li><a><i> </i></a></li></ul></div><div class="clearfix"> </div></div><div>';
									$sql="SELECT filePath FROM designDraft WHERE orderId = '{$res[$i][4]}'";
									$file=db_select($sql);
									for($j=0;$j<min(3,count($file));$j++){
										echo '<div class="col-md-3"><img style="width:120px;height:150px;" src="'.$file[$j][0].'" alt=" "></div>';
									}
									echo '</div><div class="cart-add"><a class="add1 item_add" href="addOrder.php?id='.$res[$i][4].'">ORDER IT<i> </i></a><a class="add2"><i> </i></a><div class="clearfix"> </div></div></div>';
								}
							}else{
								echo '<div class="grid-chain-bottom " style="border-top:1px solid #000"><br/><br/><h6>No Result.</h6></div>';
							}

						?>
						<!--
							<div class="grid-chain-bottom ">
								<h6>White Light</h6>
								<div class="star-price">
									<div class="price-at">
										<ul class="star-footer">
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
											<li><a href="#"><i> </i></a></li>
										</ul>
										</div>
									<div class="clearfix"> </div>
								</div>
								<div>
									<div class="col-md-3"><img style="width:120px;height:150px;" src="images/pr4.jpg" alt=" "></div>
								</div>
								<div class="cart-add">
									<a class="add1 item_add" href="#">ORDER <i> </i></a>
									<a class="add2" href="#"><i> </i></a>
									<div class="clearfix"> </div>
								</div>
							</div>
						-->
						</div>
						<div class="clearfix"> </div>
						</div>
		        	
					</div>
				<!--
		        <ul class="start">
					<li><a href="#"><i> </i></a></li>
					<li><span>1</span></li>
					<li class="arrow"><a href="#">2</a></li>
					<li class="arrow"><a href="#">3</a></li>
					
					
					<li><a href="#"><i class="next"> </i></a></li>
				</ul>
				-->
					<div class="clearfix"> </div>
				</div>
				
			<div class="clearfix"> </div>
			
				<div class="shipping">
					<div class="col-md-3 col-md1">
						<div class=" phone">
						
							<div class="num">
								<span>010-102209</span>
								<p>Monday - Saturday: 8am - 5pm PST</p>
							</div>
							<i class="phone-in"> </i>
							<div class="clearfix"> </div>
						</div>
					
					</div>
					<div class="col-md-5 col-md2">
						<div class=" phone1">
					
							<i class="phone-in1"> </i>
							<div class="num1">
								<span>Free Shipping</span>
								<p>on all orders over $99</p>
							</div>
							<a class="learn-in" href="#">Learn More</a>
							<div class="clearfix"> </div>
						</div>
			
					</div>
					<div class="col-md-4 col-md3">
						<div class=" phone2">
					
							
							<div class="num2">
								<span>Crazy Sale!</span>
								<p>on selected items</p>
							</div>
							<a class="learn-in1" href="#">Learn More</a>
							<div class="clearfix"> </div>
						</div>
			</div>
			<div class="clearfix"> </div>
			</div>
					
				</div>
				
			<!---->
		
		</div>
		<div class="bottom-grid1">
					
					<div class="fit1">
						<h3>HAPPY SHOPPING</h3>
						<p>Online Personalized Crafts  sit amet consectuer adipiscing elit
sed diam nonummy nibh euismod</p>
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