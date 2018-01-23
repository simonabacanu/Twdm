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
	  <?php  include("includes/header.php"); ?>
	  <?php include("includes/menu.php"); ?>
	

<div class="container">
		<div class="row">

			<?php
			foreach($controller -> getProducts() as $product) {	
				//echo $product['productName'];
			?>
			<a href="detailsProducts.php?id=<?php echo $product['id_product']?>">
			 <div class=" col-md-3 productGridItem">
				<div class="col-md-12">
					<img alt="product" src="<?php echo $product['image'] ?>" class="img-responsive"/>
				</div>
				
				<hr/>
				
				<div class="col-md-12 productGridInfo ">
					<h3><?php echo $product['productName'] ?></h3>
					<p>Pret : <?php echo $product['price'] ?></p>

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