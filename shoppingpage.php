<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link  rel="stylesheet" type="text/css" href="./css/style.css"> 
	<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<title></title>
</head>

<body style="background-color:#FEE; overflow-y: hidden; overflow-x: hidden;">
    <?php include 'navbar.php' ?>
    
<br/> <br/><br/>
<?php
$conn = mysqli_connect("localhost", "root", "", "pizzastores");

$pizzaresult = mysqli_query($conn,"SELECT * from `PIZZA`");
?>
<?php while ($pizzarow = mysqli_fetch_array($pizzaresult)) { ?>
	<div style="margin-left:120px; " class="row no-gutters">
	<a  href="<?php echo $pizzarow[1].".php";?>" style="margin-left:10px; box-shadow: 1px 1px white; border:5px solid brown; float:left; display: inline-grid;" class="col-md-auto">
	<img width="200" height="200" src="<?php echo "pizzas/".$pizzarow[4]; ?>" />
	<h4 align="center">
		<span> &nbsp</span>
		<p> <?php echo $pizzarow[1]?></p>
		<p> <?php echo "$".$pizzarow[2]?></p>
		</h4>
	</a>

<?php } ?>
	
	</div>

</body>

</html>