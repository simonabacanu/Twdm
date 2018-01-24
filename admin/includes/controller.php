<?php

include("includes/models/product.php");
include("includes/models/record.php");
include("includes/models/user.php");


 
 class Controller {

	public function addUser($firstName, $lastName, $email, $pass, $address, $phone){
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
		
		echo "User added";
		return $this -> getUserId($email, $pass);
	}
	  
	public function getUserId($email, $pass){
		
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM USERS where email = '".$email."' AND pass ='".$pass."'"; 
		$result = mysqli_query($con, $sql);
		$id =0;
		while($row = mysqli_fetch_array($result)) {
			$id = $row['id_user'];
		}
		
		mysqli_close($con);
		
		return $id;		
	} 
	
	public function getUserForId($id){
		
		$con = mysqli_connect("localhost","root","parola");
		if (!$con) {
			die('Could not connect: ' . mysqli_error($con));
		}
			
		$db_select = mysqli_select_db($con, "master");
		if (!$db_select) {
			die("Database selection failed: " . mysqli_error($con));
		}
			
		$sql = "SELECT * FROM USERS where id_user = ".$id; 
		
		$user = new User(0,'', '', '' , '' , '', '', '');
	
		$result = mysqli_query($con, $sql);
		
		
		while($row = mysqli_fetch_array($result)) {
			$user = new User($row['id_user'],
						     $row['firstName'], 
						     $row['lastName'],
						     $row['email'],
						     $row['pass'],
						     $row['address'],
						     $row['phone']);
		}
		
		mysqli_close($con);
		
		return $user;		
	} 
	
	
	public function logUserIn($id){
		
		session_start();		
		$_SESSION['auth'] = 1;
		setcookie("id_user", $id, time()+(60*60*8)); //set cookie to expire in 8h
		header('Location: products.php');
		die();
	}
	
	public function getLoggedUser(){
		
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
		
		$_SESSION['auth'] = 0;
		setcookie("id_user", 0, time()-(60*60)); //clear cookie 
	}
	
	// PRODUCTS
	
	public function getProducts() {	
		
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
			$product = new Product ($row['id_product'],
						   $row['productName'], 
						   $row['productDescription'],
						   $row['price'],
						   $row['stock'],
						   $row['ingredients'],
						   $row['weight'],
						   $row['conditions'],
						   $row['image']);
			
			
			$products[] = $product;
			
		}
		
		mysqli_close($con);
		
		//echo $products;
		return $products;	
	}
	
	public function getProductById($id) {	
		
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
				$product = new Product($row['id_product'],
						               $row['productName'], 
						               $row['productDescription'],
						               $row['price'],
						               $row['stock'],
						               $row['ingredients'],
						               $row['weight'],
						               $row['conditions'],
						               $row['image']);
			
		}
		
		mysqli_close($con);
		
		return $product;	
	}
	
	// RECORDS
	
	public function addRecord($quantity, $id_user,$id_product) {
		
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
		return  $result;
	}
	
	public function deleteRecord($id_record) {
	
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

			$record = new Record($row['id_record'],
					             $row['quantity'], 
					             $row['id_user'],
					             $row['id_product']);
			
			$records[] = $record;
		}
		
		mysqli_close($con);
		
		return $records;	
	}

}
	
?>
