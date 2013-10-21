<?php
	include 'dbGlobalParameter.php';

	if (isset($_POST['name'])) {
		$name = strip_tags($_POST['name']);
		$status = strip_tags($_POST['selValue']);
		$id = strip_tags($_POST['primaryKey']);

		try {
			$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
				
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$sql = "UPDATE todo SET task, status VALUES (:name, :status) WHERE id = :id;";
			
			$query = $dbh->prepare($sql);				
						
			$result = $query->execute(array(
				":name"   => $name,
				":status" => $status,
				":id"     => $id
			));			
				
			$dbh = null;	
				
		}catch(PDOException $e){
			echo $e->getMessage();
		}		
	}	
?>