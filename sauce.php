
<?php
$conn = mysqli_connect("localhost", "root", "", "pizzastores");

$sauceresult = mysqli_query($conn,"SELECT * from `SAUCE`");
?>
<?php while ($saucerow = mysqli_fetch_array($sauceresult)) { ?>
<a  style="margin-top:-30px; border:2px solid #EEF; float:left; " class="col-md-4">
	<img width="160" height="160" src="<?php echo "pizzas/".$saucerow[3]; ?>" />
	<h4 align="center">
		<span> &nbsp</span>
		<span > <?php echo $saucerow[1]; ?></span>
		<br>
		<span> <?php echo $saucerow[2]; ?></span>
		<br/>
		<button class="btn btn-success" id="<?php echo $saucerow[0]; ?>" onclick="updatecart(this.id)">Add this to Pizza</button>
		</h4>
	</a>
<?php } ?>
