<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<?php include 'require.php' ?>
</head>
<body style="overflow-x: hidden;">
<?php include 'navbar.php'; ?>


<?php if($_SESSION['count']==0)
{?>
  <div  style=" width:50%; margin-top:50px; padding:5px; height:40px; margin-left: 300px;" class="jumbotron text-center">
  <p>No any items in the cart</p>
<?php } else{?>
    <div style=" margin-left:120px; max-height: 450px; max-width: 100%;" class="row">
      <div style="overflow-x:hidden; overflow-y: auto;" class="col-md-9">
<table class="table table-hover">
    <thead style="background-color:gold;">
      <tr>
        <th  style="text-align:center;" class="col-md-auto">Items</th>
        <th class="col-md-auto">Quantity</th>
        <th class="col-md-auto">Unit price</th>
        <th class="col-md-auto">Subtotal</th>
        
      </tr>
    </thead>
     <tbody>

<?php $sum=0; foreach ($_SESSION['setpizza'] as $eacharray) 
{
    
    ?>
     <tr>
      <td align="center" class="col-md-auto"><img src="<?php echo "pizzas/".$eacharray['pizzapic'];?>" width="140" height="100"><?php echo "<h4>".$eacharray['pizzaname']."</h4>"; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo $eacharray['pizzaquantity']; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo "$".$eacharray['pizzaprice']; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo "$".$eacharray['pizzaquantity']*$eacharray['pizzaprice']; ?></td>
     <?php $sum=$sum+$eacharray['pizzaquantity']*$eacharray['pizzaprice'];?>   
     </tr>
<?php }?>
<?php foreach ($_SESSION['setsauce'] as $eacharray)
{?>
     <tr>
      <td align="center" class="col-md-auto"><img src="<?php echo "pizzas/".$eacharray['saucepic'];?>" width="140" height="100"><?php echo "<h4>".$eacharray['saucename']."</h4>"; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo $eacharray['saucequantity']; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo "$".$eacharray['sauceprice']; ?></td>
        <td class="col-md-auto"><br/><br/><?php echo "$".$eacharray['saucequantity']*$eacharray['sauceprice']; ?></td>
         <?php $sum=$sum+$eacharray['saucequantity']*$eacharray['sauceprice'];?>   
     </tr>
     </tr>
     
      <?php }}?>
    
   </tbody>
  </table>
  
</div>

</div>

<br><br>
<div class="row">
<label style="margin-left:100px; font-size:30px; text-align:right;" class="col-sm-5" >Total <span id="sum"> <?php echo "$".$sum; ?></span></label>
<div class="col-sm-3"></div>
<button style="margin-left: -230px;" class="col-md-auto btn btn-primary" onclick="window.location.href='shoppingpage.php'">Buy Another Pizza</button>
<button  onclick="window.location.href='checkout.php'"  style="margin-left: 20px;"class="btn btn-success col-md-auto "> Checkout</button>
</div>


</body>
</html>