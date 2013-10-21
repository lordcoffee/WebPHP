<?php
	include 'dbGlobalParameter.php';

	if (isset($_POST['name'])) {
		$name = strip_tags($_POST['name']);
		$status = "1";

		try {
			$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
				
			$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
			$sql = "INSERT INTO todo (task, status) VALUES (:name, :status);";
			
			$query = $dbh->prepare($sql);				
						
			$result = $query->execute(array(
				":name"   => $name,
				":status" => $status
			));	
			
			$dbh = null;		
				
		}catch(PDOException $e){
			echo $e->getMessage();
		}		
	}	
?>