<div class="col-md-3 product-price">
	<div class=" rsidebar span_1_of_left">
		<div class="sellers">
			<div class="of-left-in">
				<h3 class="tag">CATEGORIES</h3>
			</div>
			<div class="tags">
				<ul>
					<?php 
						require_once('./dbConnection.php');
						$sql="SELECT id,typeName FROM type LIMIT 12";
						$res=db_select($sql);
						for($i=0;$i<count($res);$i++){
							echo '<li class="subitem1"><a href="index.php?type='.$res[$i][0].'">'.$res[$i][1].'</a></li>';
						}
					?>							
					<div class="clearfix"> </div>
				</ul>
			</div>				
		</div>
	</div>
	<!--initiate accordion-->
	<script type="text/javascript">
		$(function() {
			var menu_ul = $('.menu > li > ul'),
				   menu_a  = $('.menu > li > a');
			menu_ul.hide();
			menu_a.click(function(e) {
				e.preventDefault();
				if(!$(this).hasClass('active')) {
					menu_a.removeClass('active');
					menu_ul.filter(':visible').slideUp('normal');
					$(this).addClass('active').next().stop(true,true).slideDown('normal');
				} else {
					$(this).removeClass('active');
					$(this).next().stop(true,true).slideUp('normal');
				}
			});
		
		});
	</script>

	
	<div class="product-middle">
		
		<div class="fit-top">
			<h6 class="shop-top">LOREM IPSUM</h6>
			<a href="addOrder.php" class="shop-now">SHOP NOW</a>
			<div class="clearfix"> </div>
		</div>
	</div>
	
	<div class="sellers">
		<div class="of-left-in">
			<h3 class="tag">MATERIALS</h3>
		</div>
		<div class="tags">
		
			<ul>
				<?php 
					$sql="SELECT id,materialName FROM material LIMIT 12";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++){
						echo '<li><a href="index.php?material='.$res[$i][0].'">'.$res[$i][1].'</a></li>';
					}
				 ?>										
				<div class="clearfix"> </div>
			</ul>
			
		</div>
								
	</div>
	
		<div class="sellers">
		<div class="of-left-in">
			<h3 class="tag">COLORS</h3>
		</div>
		<div class="tags">
		
			<ul>
				<?php 
					$sql="SELECT id,colorName FROM color LIMIT 12";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++){
						echo '<li><a href="index.php?color='.$res[$i][0].'">'.$res[$i][1].'</a></li>';
					}
				 ?>										
				<div class="clearfix"> </div>
			</ul>
			
		</div>
								
	</div>

	
	<div class=" per1">
		<a href="addOrder.php" ><img class="img-responsive" src="images/pro.jpg" alt="">
			<div class="six1">
				<h4>DISCOUNT</h4>
				<p>Up to</p>
				<span>60%</span>
			</div>
		</a>
	</div>
</div>