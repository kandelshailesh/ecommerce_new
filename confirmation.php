<?php
session_start();
$_SESSION['count']=0;

?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'require.php' ?>
	<title></title>
</head>
<body>
<?php include 'navbar.php' ?>
<div class="jumbotron text-center">
<h1>Order Confirmed!</h1>
<p>Thankyou <?php echo $_SESSION['fname']." ".$_SESSION['lname'];?></p>

<p>Total:<?php echo "$".$_SESSION['sum']; ?></p>
<?php session_destroy();
session_start();
$_SESSION['count']=0;?>
</div>

</body>
</html>