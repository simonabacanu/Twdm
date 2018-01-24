<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
include("admin/includes/controller.php"); 
$controller = new Controller();

if(isset($_POST['submit'])){
	$firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : "";
	$lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : "";
	$address = isset($_POST["address"]) ? $_POST["address"] : "";
	$phone = isset($_POST["phone"]) ? $_POST["phone"] : "";
	$email = isset($_POST["email"]) ? $_POST["email"] : "";
	$pass = isset($_POST["password"]) ? $_POST["password"] : "";
	
	$id = $controller -> addUser($firstName, $lastName,$email ,$pass,$address,$phone);
	echo "ID ADDED : ".$id;
	if($id !=0){
		echo "User Added";
		$controller -> logUserIn($id);
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Register</title>
	<link href="css/bootstrap.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<script src="js/jquery-3.2.1.min" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
 
	<script type="text/javascript">
	function validateForm() {
		var fName = document.forms["form"]["firstName"].value;
		var lName = document.forms["form"]["lastName"].value;
		var address = document.forms["form"]["address"].value;
		var phone = document.forms["form"]["phone"].value;
		var email = document.forms["form"]["email"].value;
		var pass = document.forms["form"]["password"].value;
		
		var valid = true;
		
		if (fName == "") {
			valid = false;
		}
		if (lName == "") {
			valid = false;
		}
		if (email == "") {
			valid = false;
		}
		if (pass == "") {
			//document.forms["form"]["password"].value = "*";
			valid = false;
		}
		
		if(!valid) {
			alert("Please fill in the required fields.");
		}
		
		return valid;
	}
 </script>
 
 </head>
	<body>
	
	<?php include("includes/header.php"); ?>
	
		<div class="row registerForm contentPadding">
			<div class="col-md-4 col-md-offset-4">
				<form id="form" action="register.php" method = "post" onsubmit = "return validateForm()">
					<h2>Register</h2>
					<hr/>
					
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="firstName" class="control-label">First Name</label>
								<input type="text" name="firstName" id="firstName" class="form-control" tabindex="1"/>
							</div>
						</div>
						
						<div class="col-md-6">
							<div class="form-group">
								<label for="lastName" class="control-label">Last Name</label>
								<input type="text" name="lastName" id="lastName" class="form-control" tabindex="2"/>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label for="address" class="control-label">Address</label>
						<input type="text" name="address" id="address" class="form-control" tabindex="3"/>
					</div>
					
					<div class="form-group">
						<label for="phone" class="control-label">Phone</label>
						<input type="text" name="phone" id="phone" class="form-control" tabindex="4"/>
					</div>
					 
					<div class="form-group">
						<label for="email" class="control-label">Email</label>
						<input type="text" name="email" id="email" class="form-control" tabindex="5"/>
					</div>
					
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" name="password" id="password" class="form-control"tabindex="6"/>
					</div>
					
					<hr/>
					<div class="row">
						<div class="col-md-offset-6 col-md-6">
							<input type="submit" name="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7"/>
						</div>
					</div>
				</form>
			</div>
		</div>
		
	<?php include("includes/footer.php"); ?>
	</body>
 
</html> 