<?php while ($pizzarow= mysqli_fetch_array($pizzaresult)) { ?>
	<br/>
	<img class="jumbotron" style="background-color: #33ccff" width="500" height="400" src="<?php echo "pizzas/".$pizzarow[4]; ?>" />
</div>
<div style="float:left; margin-left: 10px;" class="col-md-6">

	<p  style="height:60px; padding:10px; font-size: 20px; border-bottom:2px solid #EEE;"> <?php echo $pizzarow[1];
	$_SESSION['pizzaname']=$pizzarow[1];  ?> <span id="pizzaid" style="display:none;"><?php echo $pizzarow[0]; ?></span> </p>

	<p style="height:40px; font-size:20px; padding-left:8px; border-bottom:2px solid #EEE; "> Size:

	<?php echo $pizzarow[3]; ?> </p>
<p style="height:40px; font-size: 20px; padding:6px; border-bottom:2px solid #EEE;">Price <?php echo $pizzarow[2]; ?> </p>
<p style="padding-left:8px; height:50px; font-size: 20px; border-bottom:2px solid #EEE;">Quantity
<input  id="quantity" min="0" type="number" style="border-radius:5px; text-align:center; margin-left:20px; height:40px; width:70px;"  name="quantity" placeholder="0"> </p>
<p style="display:none;" id="pizzaname"><?php echo $pizzarow[1]; ?></p>
<?php } ?>