<?php
$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){

	<div class="product-item">
		<form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
		<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
		<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>

	}
}

session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      } 
}
}

case "add":
	if(!empty($_POST["quantity"])) {
		$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
		$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
		
		if(!empty($_SESSION["cart_item"])) {
			if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($productByCode[0]["code"] == $k) {
							if(empty($_SESSION["cart_item"][$k]["quantity"])) {
								$_SESSION["cart_item"][$k]["quantity"] = 0;
							}
							$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
						}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}
	}
	break;
	case "remove":
	if(!empty($_SESSION["cart_item"])) {
		foreach($_SESSION["cart_item"] as $k => $v) {
			if($_GET["code"] == $k)
				unset($_SESSION["cart_item"][$k]);				
			if(empty($_SESSION["cart_item"]))
				unset($_SESSION["cart_item"]);
		}
	}
	break;
case "empty":
	unset($_SESSION["cart_item"]);
		break;
		
		$result = mysqli_query($con,"SELECT * FROM `products`");
		while($row = mysqli_fetch_assoc($result)){
			echo "<div class='product_wrapper'>
			<form method='post' action=''>
			<input type='hidden' name='code' value=".$row['code']." />
			<div class='image'><img src='".$row['image']."' /></div>
			<div class='name'>".$row['name']."</div>
			<div class='price'>$".$row['price']."</div>
			<button type='submit' class='buy'>Buy Now</button>
			</form>
			</div>";
				}
		mysqli_close($con);
		?>
		 
		<div style="clear:both;"></div>
		 
		<div class="message_box" style="margin:10px 0px;">
		<?php echo $status; ?>
		</div>

		

?>