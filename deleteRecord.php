
<?php
	include("admin/includes/controller.php"); 
	$controller = new Controller();

	if(isset($_GET["id"])){
		$record_id = $_GET["id"];
		if($controller -> deleteRecord($record_id)){
			echo $record_id;
		} else {
			echo "Failed";
		}
		
	}
?> 