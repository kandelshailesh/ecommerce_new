<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'require.php' ?>
</head>
<body style="overflow-x: hidden; overflow-y: hidden;">
<?php include 'navbar.php' ?>
<div style="margin-left:0px;" class="row">
	<div style=" float:left;" class="col-md-auto">
	<?php	$conn = mysqli_connect("localhost", "root", "", "pizzastores");

$pizzaresult = mysqli_query($conn,"SELECT * from `PIZZA` where PizzaName='Hawaii'");
?>
 <?php include 'pizza.php'; ?>
 <p class="display-1" style="font-weight:bold; padding-left:8px;text-align:center; height:60px; font-size: 42px;"> Sauces</p>
<?php include 'sauce.php';?>	
	

	</div>
</div>

<script src="addtocart.js">
	</script>


</body>


</html>