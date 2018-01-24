<?php

class Record {
	private $id_record;
	private $quantity;
	private $id_user;
	private $id_product;

	//Constructor;
	public function __construct($id_record, $quantity, $id_user, $id_product){
		$this->id_record =  $id_record;
		$this->quantity = $quantity;
		$this->id_user = $id_user;
		$this->id_product = $id_product;
	}
	
	//IdRecord
	public function setIdRecord($id_r){
		$this->id_record = $id_r;
	}
	
	public function getIdRecord(){
		return $this->id_record;
	}
	
	//Quantity
	public function setQuantity($quantity){
		$this->quantity = $quantity;
	}
	
	public function getQuantity(){
		return $this->quantity;
	}
	
	//IdUser
	public function setIdUser($id_u){
		$this->id_user = $id_u;
	}
	
	public function getIdUser(){
		return $this->id_user;
	}
	
	//IdProduct
	public function setIdProduct($id_p){
		$this->id_product = $id_p;
	}
	
	public function getIdProduct(){
		return $this->id_product;
	}
}

?>

	