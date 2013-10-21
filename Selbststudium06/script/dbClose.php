<?php
	include 'dbGlobalParameter.php';

	if (isset($_GET["id"])){
		
		$id = $_GET["id"];
		
		try {
			$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
				
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$sql = "DELETE FROM todo WHERE id = :id;";
			
			$query = $dbh->prepare($sql);				
						
			$result = $query->execute(array(
				":id" => $id
			));		
			
			$dbh = null;	
				
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}	
?>