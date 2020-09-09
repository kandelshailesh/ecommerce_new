function updatecart(sauceid)
	{
		var quantity= $('#quantity').val();
		var pizzaid= $('#pizzaid').text();
        var pizzaname=$('#pizzaname').text();
        alert(pizzaname);
        alert(quantity);
		console.log(pizzaid);
        if(quantity>0) 
            {
		 $.ajax({
        url:'addtocart.php',
        type:'post',
        dataType:'text',
        data:{'pizzaid':pizzaid, 'quantity':quantity,'sauceid':sauceid },
        success:function(data){
            alert(data);
            window.location="cartviewer.php";
        }

    });
          }
	}
