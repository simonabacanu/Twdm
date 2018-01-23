<?php
 
 class Controller {

	public function addUser($firstName, $lastName, $email, $pass, $address, $phone){
		
		echo "Metoda addUser";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			
			die("Database selection failed: " . mysqli_error());
		}

		$sql = "INSERT INTO USERS (firstName,lastName,email,pass,address,phone) VALUES('"
		.$firstName."','".$lastName."','".$email."','".$pass."','".$address."','".$phone."')"; 	
		echo $sql;
		
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
		mysqli_close($con);
		
		return getUserId($email, $pass);
	}
	  
	public function getUserId($email, $pass){
		
		echo "Metoda getUserId";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM USERS where email = '".$email."' AND pass ='".$pass."'"; 
		echo $sql;
		$result = mysqli_query($con, $sql);
		$id =0;
		while($row = mysqli_fetch_array($result)) {
			$id = $row['id_user'];
		}
		
		mysqli_close($con);
		
		return $id;		
	} 
	
	public function getUserForId($id){
		
		echo "Metoda getUserForId";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM USERS where id_user = ".$id; 
		
		//echo $sql;
		
		$user = array("id_user"=>0,
						   "firstName"=>'', 
						   "lastName"=>'',
						   "email"=>'',
						   "pass"=>'',
					 	   "address"=>'',
					       "phone"=>'');
		$result = mysqli_query($con, $sql);
		
		
		while($row = mysqli_fetch_array($result)) {
			$user = array("id_user"=>$row['id_user'],
						   "firstName"=>$row['firstName'], 
						   "lastName"=>$row['lastName'],
						   "email"=>$row['email'],
						   "pass"=>$row['pass'],
						   "address"=>$row['address'],
						  "phone"=>$row['phone']);

		}
		
		mysqli_close($con);
		
		return $user;		
	} 
	
	
	public function logUserIn($id){
		
		echo "Metoda logUserIn";
		session_start();		
		$_SESSION['auth'] = 1;
		setcookie("id_user", $id, time()+(60*60*8)); //set cookie to expire in 8h
		header('Location: products.php');
		die();
	}
	
	public function getLoggedUser(){
		
		echo "Metoda getLoggedUser";
		if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1) {
		   return 0;
		} 
		
		if(isset($_COOKIE['id_user'])) {
			return $_COOKIE['id_user'];
		} else {
			return 0;
		}
	}
	
	public function logUserOut() {
		
		echo "Metoda logUserOut";
		$_SESSION['auth'] = 0;
		setcookie("id_user", 0, time()-(60*60)); //clear cookie 
	}
	
	// PRODUCTS
	
	public function getProducts() {	
		
		echo "Metoda getProducts";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM PRODUCTS"; 
		//echo $sql;
		
		$products = array();
		$result = mysqli_query($con, $sql);
		
		while($row = mysqli_fetch_array($result)) {
			//echo "while";
			$product = array("id_product"=>$row['id_product'],
						   "productName"=>$row['productName'], 
						   "productDescription"=>$row['productDescription'],
						   "price"=>$row['price'],
						   "stock"=>$row['stock'],
						   "ingredients"=>$row['ingredients'],
						   "weight"=>$row['weight'],
						   "conditions"=>$row['conditions'],
						   "image"=>$row['image']);
			
			
			$products[] = $product;
			
		}
		
		mysqli_close($con);
		
		//echo $products;
		return $products;	
	}
	
	public function getProductById($id) {	
		
		echo "Metoda getProductById";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM PRODUCTS where id_product =".$id; 
		
		$result = mysqli_query($con, $sql);
		
		$product;
		
		while($row = mysqli_fetch_array($result)) {
				$product = array("id_product"=>$row['id_product'],
						   "productName"=>$row['productName'], 
						   "productDescription"=>$row['productDescription'],
						   "price"=>$row['price'],
						   "stock"=>$row['stock'],
						   "ingredients"=>$row['ingredients'],
						   "weight"=>$row['weight'],
						   "conditions"=>$row['conditions'],
						   "image"=>$row['image']);
			
		}
		
		mysqli_close($con);
		
		return $product;	
	}
	
	// RECORDS
	
	public function addRecord($quantity, $id_user,$id_product) {
		
		echo "Metoda addRecord";	
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			
			die("Database selection failed: " . mysqli_error());
		}

		$sql = "INSERT INTO RECORDS (quantity,id_user, id_product) VALUES(".$quantity.",".$id_user.",".$id_product.")"; 		
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
		mysqli_close($con);
		return $result;
	}
	
	public function deleteRecord($id_record) {
	
		echo "Metoda deleteRecord";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysql_error());
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			
			die("Database selection failed: " . mysqli_error());
		}

		$sql = "DELETE FROM RECORDS WHERE id_record = ".$id_record; 		
		$result = mysqli_query($con,$sql) or die (mysqli_error($con));
		mysqli_close($con);
		return $result;
	}
	
	public function getRecordsForUserId($id) {	
		
		echo "Metoda getRecordsForUSerId";
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			

		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM RECORDS where id_user =".$id; 
		
		$records = array();
		$result = mysqli_query($con, $sql);
		
		while($row = mysqli_fetch_array($result)) {
			$record = array("id_record"=>$row['id_record'],
					"quantity"=>$row['quantity'], 
					"id_user"=>$row['id_user'],
					"id_product"=>$row['id_product']);
			
			$records[] = $record;
		}
		
		mysqli_close($con);
		
		return $records;	
	}

}
	
?>
