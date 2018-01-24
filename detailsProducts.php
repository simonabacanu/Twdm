<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
include("admin/includes/controller.php");
$controller = new Controller();

session_start();

if(isset($_GET['id'])){
	$product = $controller -> getProductById($_GET['id']);
} else {
	exit();
}	

$curr_user = $controller -> getLoggedUser();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Product Details</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery-3.2.1.min" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	
	<script type="text/javascript">
  
	function addRecord() {

		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp = new XMLHttpRequest();
		}
		 else {
			// code for IE6, IE5
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		 xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				alert(xmlhttp.responseText);
			}
		 }
		 
		 var stock = document.getElementById ( "stock" ).innerText
		 var quantity = document.getElementById('quantity').value;
		 var curr_user = document.getElementById('current_user').value;
		 var productId = document.getElementById('current_product').value;
		 
		 if(stock < quantity) {
			 alert("Not in stock");
			 return;
		 }
		 
		 xmlhttp.open("GET", "addRecord.php?q="+quantity+"&u="+curr_user+"&p="+productId, true);
		 xmlhttp.send();
	}
</script> 
 </head>
 
 <body>
	<?php include("includes/header.php"); ?>
	
	
	<div class="container">
      <div class="row">

        <div class=" col-md-10 col-md-offset-1" >

		
		<div class="row">
		
			<div class="panel panel-info">
			
				<div class="panel-heading">
					<h4 id = "product_name"><?php echo $product->getProductName()?></h4>
				</div>
				<div class="panel-body">
					<div class="row">
					
						<div class="col-md-3"> 
							<img alt="User Pic" class="img-responsive" src="<?php echo $product->getImage()?>" />
						</div>
						
						
						<div class="col-md-offset-1 col-md-7"> 
							<table class="table detailsTable">
								<tbody>
							<tr>
								<td class="detailsTableHeading">Name:</td> <td><?php echo $product->getProductName() ?></td>
							</tr>
							<tr>
								<td class="detailsTableHeading">Price :</td> <td><?php echo $product->getPrice()?></td>
							</tr>
							<tr>
								<td class="detailsTableHeading">Weight</td><td><?php echo $product->getWeight()?></td>
							</tr> 
							<tr>
								<td class="detailsTableHeading">Ingredients</td><td><?php echo $product->getIngredients()?></td>
							</tr>
							<tr>
								<td class="detailsTableHeading">Conditions</td> <td><?php echo $product->getConditions()?></td>
							</tr>
							<tr>
								<td class="detailsTableHeading">Stock</td> <td id ="stock"><?php echo $product->getStocK()?></td> 
							</tr> 

							<tr>
								<td class="detailsTableHeading">Description</td> <td><?php echo $product->getProductDescription()?></td> 
							</tr> 
 
							</tbody>
							</table>
						</div>
				</div>
            </div>
			
			<div class = "row">
			 <div  class = "pull-right">
				<fieldset>
		
				<div class="row">
						<div class="col-md-5">
							<input type="text" name="quantity" id="quantity" class="form-control input-lg" value = "0">
							<input type="hidden" id="current_user" value="<?php echo $curr_user?>">
							<input type="hidden" id="current_product" value="<?php echo $product->getIdProduct()?>">
						</div>
						<div class="col-md-5">
							<input type="button" name="submit" class="btn btn-lg btn-success btn-block" value="Add To Cart" onclick="addRecord();">
						</div>
				</div>
				<br/>
					
				</fieldset>
			</div>
			</div>
			
			</div>
            
          </div>
        </div>
      </div>
	  
    </div>
	
	
	<?php include("includes/footer.php"); ?>
		
 </body>
 
</html> 