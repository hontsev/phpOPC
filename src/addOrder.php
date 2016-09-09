<!DOCTYPE html>
<html>
<head>
<title>Order Chair</title>
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
	require_once("./dbConnection.php");
	//user must log in before ordering a chair.
	if(!isset($_SESSION['username'])){
		echo "<script>location.href='account.php';</script>";
		exit();
	}
	//if view the page with 'id', auto fill blanks with the exist order.
	if(isset($_GET['id'])){
		$orderId=$_GET['id'];
		$sql="SELECT typeId,materialId,colorId,specificDemand FROM `order` WHERE id='{$orderId}'";
		$res=db_select($sql);
		if(count($res)>0)
			$orderRes=$res[0];
	}
?>
<!--/menubar-->
<!--container-->
<div class="container">
	<hr style="margin:0;height:1px;border:none;border-top:1px solid #555555;" />
	<h6 class="dress">
		<a href="index.php">Home</a>
		<i></i> 
		Order Chair
	</h6>
</div>

<div class="container" style="min-height:300px">
	<div style="margin-left:16%" ><form method="post" action="addOrderController.php" enctype="multipart/form-data" id="order_form">

	<h3>ORDER INFORMATION</h3>
	<br/><br/>
	<div class=" login-right" >
	<h3>PERSONAL</h3>
		<div>
			  <span><label style="width:150px">Contacts *</label><input type="text" name='contacts' style='width:500px'></span>
		</div>
		<div>
			  <span><label style="width:150px">Address *</label><input type="text" name='address' style='width:500px'></span>
		</div>
		<div>
			  <span><label style="width:150px">Phone *</label><input type="text" name='phone' style='width:500px'></span>
		</div>
	</div>	
		
	<div class=" login-right" >
	<br/><br/>
	<h3>CHAIR</h3>
		<div>
			<input type='hidden' name='type' />
			 <span><label style="width:150px">Type *</label><select id='type' style='width:500px'>
				<?php
					require_once("./dbConnection.php");
					$sql="SELECT id,typeName FROM type";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++)
					{
						echo "<option value='{$res[$i][0]}'>{$res[$i][1]}</option>";
					}
				?>
			 </select></span>
		</div>
		<div>
			<input type='hidden' name='color' />
			<span><label style="width:150px">Color *</label><select type="text" id='color' style='width:500px'>
				<?php
					
					$sql="SELECT id,colorName FROM color";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++)
					{
						echo "<option value='{$res[$i][0]}'>{$res[$i][1]}</option>";
					}
				?>
			</select></span>
		</div>
		<div>
			<input type='hidden' name='material' />
			<span><label style="width:150px">Material *</label><select type="text" id='material' style='width:500px'>
				<?php
					$sql="SELECT id,materialName FROM material";
					$res=db_select($sql);
					for($i=0;$i<count($res);$i++)
					{
						echo "<option value='{$res[$i][0]}'>{$res[$i][1]}</option>";
					}
				?>
			</select></span>
		</div>
		<div>
			<span><label style="width:150px">Quantity *</label><input type="text" name='quantity' style='width:500px' value='1'></span>
		</div>
	</div>	
		
	<div class=" login-right" >
	<br/><br/>
	<h3>EXTRA</h3>
		<div>
			<input type='hidden' name='specificDemand' />
			  <span><label style="width:150px">Specific Demand</label><textarea id='specificDemand' style='width:500px;height:120px'></textarea></span>
		</div>
		<br/><br/>
		<div>
			  <span><label style="width:150px">Design Draft</label><input type="file" multiple="true" name='designDraft[]' style='width:500px'></span>
		</div>
		<br/>
		<br/>
		<br/>
		<input type="button" onclick="checkForm();" style="margin-left:30%" value="Submit Order">
		<br/>
		<br/>
	</div>	
   </form></div>
</div>
<script>
	<?php
		if(isset($orderRes)){//tmcs
			echo '$("#type").val("'.$orderRes[0].'");';
			echo '$("#material").val("'.$orderRes[1].'");';
			echo '$("#color").val("'.$orderRes[2].'");';
			echo '$("#specificDemand").val("'.$orderRes[3].'");';
		}
	?>
	function checkForm()
	{
		canSubmit=true;
		if($("input[name='contacts']").val().length<=0)canSubmit=false;
		if($("input[name='address']").val().length<=0)canSubmit=false;
		if($("input[name='phone']").val().length<=0)canSubmit=false;
		type=$("#type").find("option:selected").val();
		if(type==null||type.length<=0)canSubmit=false;
		else $("input[name='type']").val(type);
		color=$("#color").find("option:selected").val();
		if(color==null||color.length<=0)canSubmit=false;
		else $("input[name='color']").val(color);
		material=$("#type").find("option:selected").val();
		if(material==null||material.length<=0)canSubmit=false;
		else $("input[name='material']").val(material);
		if($("input[name='quantity']").val().length<=0)canSubmit=false;
		else $("input[name='specificDemand']").val($('#specificDemand').val());
		
		console.log($('#specificDemand').val());
		if(canSubmit){
			if(confirm("Are you sure you want to submit the order?")){
				$("#order_form").submit();
			}
		}else{
			alert("Your order is not complete.")
		}
	}
</script>
<!--/container-->
<!--footer-->
	<?php
		require_once('./footer.php');
	?>
<!--/footer-->
</body>
</html>