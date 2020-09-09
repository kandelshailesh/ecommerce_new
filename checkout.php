<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
<?php include 'require.php' ?>
</head>
<body style="overflow-x: hidden;">
<?php include 'navbar.php'?>


<?php if(

$_SESSION['count']==0)
{?>
  <div  style=" width:50%; margin-top:50px; padding:5px; height:40px; margin-left: 300px;" class="jumbotron text-center">
  <p>No any items in the cart</p></div>
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

<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" style="float:left; margin-left:35%;" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Confirm Order</button>
  <h3 style="float: left; margin-left: 100px; margin-top: 8px;">Total <?php echo "$".$sum; ?></h3>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div  style="background-color:red;" class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Credentials</h4>
        </div>
        <div style="background-color: lightyellow;" class="modal-body">
         <form onsubmit="return validate()" action="" method="post">
    <input style="padding:5px; border:1px solid lightblue; border-radius:2px; width:300px; margin-left: 50px; text-align:left;" class=" form-control" type="text" id="gname" placeholder="Enter Givenname" name="gname" required>
<br/>
      <input style="padding:5px; border:1px solid lightblue; border-radius:2px; width:300px; margin-left: 50px; text-align:left;" class=" form-control"  type="text" id="lname" placeholder="Enter Lastname" name="lname" required>
      <br/>
<input style="padding:5px; border:1px solid lightblue; border-radius:2px; width:300px; margin-left: 50px; text-align:left;" class=" form-control" type="text" id="email" placeholder="Enter Email" name="email" required>
<br/>

  <input class="form-control" style="float:left; width:70px; height: 36px; margin-left: 50px; padding:5px; text-align:center; " type="tel" placeholder="00" disabled >
  <input style="float:left;padding:5px; height: 36px; border:1px solid lightblue; border-radius:2px; width:252px; margin-left: -25px; text-align:left;" type="tel" pattern="[0-9]{9}" id="pn" placeholder="Enter Phone no." name="pn" required>
<input type="number" name="sum" value="<?php echo $sum; ?>" style="display: none;">
<br></br>
<span style="display: none; margin-left: 15px; color:red;" id="error">Invalid Givenname or Lastname or E-mail</span>
<span style="display:none; margin-left:15px; color:red;" id="emailerror">Invalid Email Format </span> 
<br></br>

        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>

          <button style="margin-left:10px;" class="btn btn-success " name="submit" type="submit">Confirm</button>
</form>

        </div>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<?php
if(isset($_POST["submit"]))
{
$conn = mysqli_connect("localhost", "root", "", "pizzastores");
$gname=$_POST['gname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$sum=$_POST['sum'];
$querycustomer=mysqli_query($conn,"select * from `CUSTOMER` where `Email`='$email' and `GivenName`='$gname' and `LastName`='$lname'");
$rowcount=mysqli_num_rows($querycustomer);
$queryresult=mysqli_fetch_array($querycustomer);
if($rowcount == 1)
  { 
   $orderid=$_SESSION['orders'];
   $_SESSION['time']=date('H:i:s');
   $_SESSION['date']=date('Y-m-d');
   $time=$_SESSION['time'];
   $date=$_SESSION['date'];
    $insertorder=mysqli_query($conn,"INSERT INTO `ORDER` (`OrderID`, `CustID`, `OrderDate`, `OrderTime`, `OrderStatus`) VALUES
($orderid,$queryresult[0],'$date','$time','Pending')");

       foreach ($_SESSION['inserttoorder'] as $key => $value) {
        $pizzaid= $value['pizzaid'];
        $sauceid= $value['sauceid'];
        $quantity=$value['quantity'];
        $insertorder1=mysqli_query($conn,"INSERT INTO `ORDER_DETAILS` (`OrderID`, `PizzaID`, `SauceID`, `Quantity`) VALUES
($orderid,$pizzaid,$sauceid,$quantity)");
      
      }
      $_SESSION['fname']=$gname;
      $_SESSION['lname']=$lname;
      $_SESSION['sum']=$sum;
      ?>
      <script>
        window.location="confirmation.php";
      </script>
  <?php }
  else
  {?> 
    <script>
      $('#myModal').modal('show');
      $('#emailerror').hide();
      $('#error').show();

    </script>
  <?php }
}?>

<script>
  function emailvalidation(email) {
  var res = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return res.test(email);
}
function validate()
{
  var email=$('#email').val();
if(emailvalidation(email))
{
  return true;
  }
     else
     {
      $('#emailerror').show();
    return false;
     }
    }
  

</script>
</body>
</html>