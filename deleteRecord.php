
<?php
	include("admin/includes/database.php"); 
	if(isset($_GET["id"])){
		$record_id = $_GET["id"];
		if(deleteRecord($record_id)){
			echo $record_id;
		} else {
			echo "Failed";
		}
		
	}
?> 