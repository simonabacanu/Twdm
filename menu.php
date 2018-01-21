<nav class="navbar menuBar">
		<div class="container-fluid">
			<ul class="nav navbar-nav">
				<li><a href="products.php">Products</a></li>
				<?php if($current_user == 0) {?>
					<li><a href="signin.php">Log In</a></li>
				<?php } else {?>
					<li><a href="cart.php">Shopping Cart</a></li>
				<?php }?>
			</ul>
		</div>
</nav>
