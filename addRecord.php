
<?php
	include("admin/includes/controller.php"); 
	$controller = new Controller();

	if(isset($_GET["q"]) && isset($_GET["u"]) && isset($_GET["p"])){
		$quantity = $_GET["q"];
		$userId = $_GET["u"];
		$productId = $_GET["p"];
		
		if($quantity==0 || $userId==0 || $productId==0) {
			echo "Failed to add product to cart";
		} else {
			$controller -> addRecord($quantity, $userId, $productId);
			echo "Product added to cart";
		}
	
		
	}
?> 