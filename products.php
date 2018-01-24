<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include("admin/includes/controller.php");

$controller = new Controller();
$curr_user = $controller -> getLoggedUser();

session_start();

?>


<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
 	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Products</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery-3.2.1.min" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
 </head>
 
 <body>
	  <?php include("includes/header.php"); ?>
	

<div class="container">
		<div class="row">

			<?php
			foreach($controller->getProducts() as $product) {	
			?>
			<a href="detailsProducts.php?id=<?php echo $product->getIdProduct()?>">
				
			 <div class=" col-md-4">
				<div class="col-md-12">
					<img alt="product" src="<?php echo $product->getImage()?>" class="img-responsive"/>
				</div>
				
				<hr/>
				
				<div class="col-md-12">
					<h4><?php echo $product->getProductName()?></h4>
					<p>Pret : <?php echo $product->getPrice() ?></p>

				 </div>
				
				<hr/>
			</div>
			</a>
			
			<?php } ?>
			
		 </div>
	</div>
	
	<?php include("includes/footer.php"); ?>
	
 </body>
 
</html> 