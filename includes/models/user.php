<?php
class User {

	private $id_user;
	private $firstName;
	private $lastName;
	private $email;
	private $pass;
	private $address;
	private $phone;


	public function __construct($id_user, $firstName, $lastName, $email, $pass, $address, $phone)  { 
		$this->id_user = $id_user;
		$this->firstName = $firstName;
		$this->lastName = $lastName;
		$this->email = $email;
		$this->pass = $pass;
		$this->address = $address;
		$this->phone = $phone;
	} 

	// Id
	public function setIdUser($id) {
  		$this->id_user = $id_user;
	}

	public function getIdUser() {
  		return $this->id_user;
	}	
	
	// First Name
	public function setFirstName($name) {
  		$this->firstName = $name;
	}
	
	public function getFirstName() {
  		return $this->firstName;
	}

	// Last Name
	public function setLastName($name) {
  		$this->lastName = $name;
	}

	public function getLastName() {
  		return $this->lastName;
	}

	// Email
	public function setEmail($email) {
  		$this->email = $email;
	}

	public function getEmail() {
  		return $this->email;
	}

	// Password
	public function setPass($pass) {
  		$this->pass = $pass;
	}

	public function getPass() {
  		return $this->pass;
	}

	// Address
	public function setAddress($address) {
  		$this->address = $address;
	}

	public function getAddress() {
  		return $this->address;
	}
	
	// Phone
	public function setPhone($phone) {
  		$this->phone = $phone;
	}

	public function getPhone() {
  		return $this->phone;
	}
		
}

?>
