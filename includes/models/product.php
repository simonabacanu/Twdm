<?php 

class Product{
	private $id_product;
	private $productName; 
	private $productDescription;
	private $price;
	private $stock;
	private $ingredients;
	private $weight;
	private $conditions;
	private $image;
	
	//Constructor 
	public function __construct($id_product, $productName, $productDescription, $price, $stock, $ingredients, $weight, $conditions, $image) {
		
		 $this->id_product = $id_product;
		 $this->productName = $productName; 
		 $this->productDescription = $productDescription;
		 $this->price = $price;
		 $this->stock = $stock;
		 $this->ingredients = $ingredients;
		 $this->weight = $weight;
		 $this->conditions = $conditions;
		 $this->image = $image;
	}
	
	//ProductId
	public function setIdProduct($id){
		$this->id_product = $id;
	}
	
	public function getIdProduct(){
		return $this->id_product;
	}
	
	//Product name
	public function setProductName($productName){
		$this->productName = $productName;
	}
	
	public function getProductName(){
		return $this->productName;
	}
	
	//Product Description 
	public function setProductDescription($productDescription){
		$this->productDescription = $productDescription;
	}
	
	public function getProductDescription(){
		return $this->productDescription;
	}
	
	//Price
	public function setPrice($price){
		$this->price = $price;
	}
	
	public function getPrice(){
		return $this->price;
	}
	
	//Stock
	public function setStock($stock){
		$this->stock = $stock;
	}
	
	public function getStock(){
		return $this->stock;
	}
	
	//Ingredients
	public function setIngredients($ingredients){
		$this->ingredients = $ingredients;
	}
	
	public function getIngredients(){
		return $this->ingredients;
	}
	
	//Weight
	public function setWeight($weight){
		$this->weight = $weight;
	}
	
	public function getWeight(){
		return $this->weight;
	}
	
	//Conditions
	public function setConditions($conditions){
		$this->conditions = $conditions;
	}
	
	public function getConditions(){
		return $this->conditions;
	}
	
	//Image
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImage(){
		return $this->image;
	}
	
}

?>