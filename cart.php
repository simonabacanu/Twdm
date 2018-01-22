<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include("admin/includes/database.php"); 

session_start();

$curr_user = getLoggedUser();
if ($curr_user == 0 ) {
	exit();
}

$total =0;

?>

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Shopping Cart</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery-3.2.1.min" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
 
  <title>Login</title>
 
	<script type="text/javascript">
  
	function deleteRecord(record_id) {

		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		 else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		var elem = document.getElementById(record_id);
		
		 xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {				
				elem.parentNode.removeChild(elem);
			} 
		 }
		 
		 xmlhttp.open("GET", "deleteRecord.php?id="+record_id, true);
		 xmlhttp.send();
	}
</script> 
 
 </head>
 
 <body>
	<?php include("includes/header.php"); ?>
	<?php include("includes/menu.php"); ?>
	
	<div class="container">
	<table id="cart" class="table table-hover table-condensed">
	
		<!– __________ TABLE HEAD _________–>
	
    		<thead>
			<tr>
				<th style="width:50%">Product</th>
				<th style="width:10%">Price</th>
				<th style="width:8%">Quantity</th>
				<th style="width:22%" class="text-center">Subtotal</th>
				<th style="width:10%"></th>
			</tr>
		</thead>
		
		<!– __________ TABLE BODY _________–>
		
		<tbody id="cart_body">
		<?php
		foreach(getRecordsForUserId($curr_user) as $record) {
			$product = getProductById($record['id_product']) ;
			$total += $record['quantity'] * $product['price'];
		?>
		
			<tr id=  "<?php echo $record['id_record']?>">
				<td data-th="Product">
					<div class="row">
						<div class="col-md-2"><img src="<?php echo $product['image']?>" alt="" class="img-responsive"/></div>
						<div class="col-md-10">
							<h4 class="nomargin"><?php echo $product['productName']?></h4>
							<p><?php echo $product['productDescription']?></p>
						</div>
					</div>
				</td>
				
				<td data-th="Price"><?php echo $product['price']?></td>
				<td data-th="Quantity"> <?php echo $record['quantity']?></td>
				<td data-th="Subtotal" class="text-center"><?php echo $record['quantity'] * $product['price']?></td>
				<td class="actions" data-th="">
					<button class="btn btn-danger btn-sm" onclick="deleteRecord(this.value);" value="<?php echo $record['id_record']?>">Remove</button>	
				</td>
			</tr>
			
		<?php
		}
		?>
		</tbody>
		
		<!– __________ TABLE FOOTER _________–>
		
		<tfoot>
			<tr id="art_tfooter">
				<td><a href="products.php" class="btn btn-warning"> Continue Shopping</a></td>
				<td colspan="2" class="hidden-xs"></td>
				<td class="text-center"><h4>Total  <?php echo $total;?></h4></td>
				<td><a href="#" class="btn btn-success btn-block">Checkout</a></td>
			</tr>
		</tfoot>
	</table>
	</div>
		
	<?php include("includes/footer.php"); ?>
	
 </body>
 
</html> 
