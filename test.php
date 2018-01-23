<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
echo "Inainte de include";
include ("admin/includes/controller.php");	
echo "Dupa include";

$controller=new Controller();
echo "Controller initializat";

$controller->getProducts();
echo "Produsele sunt:";
?>