<?php 
$controller = new Controller();
$current_user  = $controller -> getLoggedUser();
$usr = $controller -> getUserForId($current_user);
 ?>

<nav class="navbar navbar-default header">
		<div class="container-fluid ">
			
			<div class="navbar-header">
				<a id="headerLogo" class="navbar-brand" href="products.php">Oil Shop</a>
			</div>
		
			<ul class="nav navbar-nav pull-right">
				
				<?php if($current_user == 0) {?>
					<li><a class ="header_auth_info" id="headerLogin"  href="signin.php">Log In</a></li>
				<?php } else {?>
					<li><a  id ="header_auth_info" href="#">Logged in as <?php echo $usr['firstName'].' '.$usr['lastName']?></a></li>
					<li><a  id="headerLogout" href="signin.php">Log Out</a></li>
				<?php }?>
			</ul>
		</div>
</nav>