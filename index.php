<?php
session_start();
// session_destroy();
if(!isset($_SESSION['orders']))
{
$_SESSION['count']=0;
$_SESSION['orders']= rand(0000,9999);
}
?>
<!DOCTYPE html>
<html>

<head>
	
	<?php include 'require.php' ?>

	
</head>
<body style="overflow-x: hidden; overflow-y: hidden;">
<a href="shoppingpage.php" >
<img src="css/pizza.jpg" style="width:100%; height: 100%;">
<p style="color:white; padding:20px 20px; text-align: center;" >Welcome to the Western Sydney Pizza Store</p>
<div class="row" style=" z-index:1; margin-top: -30%; ">
  <div class="col-12 text-center">
    <a href="shoppingpage.php" style=" font-size:24px; border-radius:50%; width:150px; height:150px;" class=" text-center btn btn-success btn-lg border border-3 "><p style=" margin-top:40px; ">CLICK HERE</p></a>
  </div>
</div>
</a> 

</body>

</html>