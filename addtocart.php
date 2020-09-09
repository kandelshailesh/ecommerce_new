<?php

session_start();

$pizzaid=$_POST['pizzaid'];
$sauceid= $_POST['sauceid'];
$quantity= $_POST['quantity'];
$conn = mysqli_connect("localhost", "root", "", "pizzastores");
$pizzainformation=mysqli_query($conn,"SELECT * from `Pizza` where `PizzaID`=$pizzaid");
$pizzarow=mysqli_fetch_array($pizzainformation);
$sauceinformation=mysqli_query($conn,"SELECT * from `Sauce` where `SauceID`=$sauceid");
$saucerow= mysqli_fetch_array($sauceinformation);
if(!isset($_SESSION['set']))
{
$_SESSION['set']="Cart not empty";
$_SESSION['setpizza']=array();
$pizzacart = array("pizzapic" => $pizzarow[4],"pizzaname"=> $pizzarow[1],"pizzaprice"=>$pizzarow[2], "pizzaquantity"=>$quantity);
$_SESSION['setsauce']=array();
$saucecart= array("saucepic" => $saucerow[3],"saucename"=> $saucerow[1],"sauceprice"=>$saucerow[2], "saucequantity"=>$quantity);
array_push($_SESSION['setpizza'],$pizzacart);
array_push($_SESSION['setsauce'],$saucecart);
$_SESSION['inserttoorder']=array();
$initialorder=array("pizzaid"=>$pizzaid,"sauceid"=>$sauceid,"quantity"=>$quantity);
array_push($_SESSION['inserttoorder'],$initialorder);
$_SESSION['count']=$_SESSION['count']+ 2*$quantity;
echo $_SESSION['count'];
}
else
{
$addedpizza=false;
$addedsauce=false;

foreach($_SESSION['setpizza'] as $keys=>$products)
{
    if($pizzarow[1] === $products['pizzaname']) {
    	$_SESSION['setpizza'][$keys]['pizzaquantity'] =$_SESSION['setpizza'][$keys]['pizzaquantity']+ $quantity;
    	$addedpizza=true;	   
    }
   
}
if(!$addedpizza)
   {
    	$pizzacart1= array("pizzapic" => $pizzarow[4],"pizzaname"=> $pizzarow[1],"pizzaprice"=>$pizzarow[2], "pizzaquantity"=>$quantity);
    	array_push($_SESSION['setpizza'],$pizzacart1);
    }
foreach($_SESSION['setsauce'] as $key=>$product)
{
    if($saucerow[1] === $product['saucename']) {
    	$_SESSION['setsauce'][$key]['saucequantity'] =$_SESSION['setsauce'][$key]['saucequantity'] + $quantity;
    	$addedsauce=true;
    }
   
}
 if(!$addedsauce)
    {
    $saucecart1= array("saucepic" => $saucerow[3],"saucename"=> $saucerow[1],"sauceprice"=>$saucerow[2], "saucequantity"=>$quantity);
    	array_push($_SESSION['setsauce'],$saucecart1); 
    }

$initialorder=array("pizzaid"=>$pizzaid,"sauceid"=>$sauceid,"quantity"=>$quantity);
array_push($_SESSION['inserttoorder'],$initialorder);

$_SESSION['count']=$_SESSION['count']+ 2*$quantity;
echo $_SESSION['count'];
}



?>