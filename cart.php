<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include("admin/includes/controller.php"); 

$controller = new Controller();

session_start();

$curr_user = $controller -> getLoggedUser();
if ($curr_user == 0 ) {
	exit();
}

$total = 0;

if(isset($_POST['submit'])){
	$record_id= isset($_POST["delete_record"]) ? $_POST["delete_record"] : 0;
	if ($record_id != 0) {
		$controller -> deleteRecord($record_id);
	}
}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Shopping Cart</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery-3.2.1.min" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
 
  <title>Shopping Cart</title>
 
 </head>
 
 <body>
	<?php include("includes/header.php"); ?>
	
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
		foreach($controller -> getRecordsForUserId($curr_user) as $record) {
			$product = $controller->getProductById($record->getIdProduct());
			$total += $record->getQuantity() * $product->getPrice();
		?>
		
			<tr id=  "<?php echo $record->getIdRecord()?>">
				<td data-th="Product">
					<div class="row">
						<div class="col-md-2"><img src="<?php echo $product->getImage()?>" alt="" class="img-responsive"/></div>
						<div class="col-md-10">
							<h4 class="nomargin"><?php echo $product->getProductName()?></h4>
							<p><?php echo $product->getProductDescription()?></p>
						</div>
					</div>
				</td>
				
				<td data-th="Price"><?php echo $product->getPrice()?></td>
				<td data-th="Quantity"> <?php echo $record->getQuantity()?></td>
				<td data-th="Subtotal" class="text-center"><?php echo $record->getQuantity() * $product->getPrice()?></td>
				
				<td class="actions" data-th="">
					<form id="form" action="cart.php" method="post">
						<input type="hidden" name="delete_record" value="<?php echo $record->getIdRecord()?>"/>
						<input type="submit" name="submit" class="btn btn-danger btn-sm" value="Remove"/>
					</form>
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
