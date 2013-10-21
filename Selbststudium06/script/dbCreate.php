<?php
	include 'dbGlobalParameter.php';

	try {
		$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
				
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$sql = "CREATE TABLE todo (
				id tinyint(3) NOT NULL AUTO_INCREMENT,
				task varchar(80) NOT NULL default '',
				status varchar(1) NOT NULL default '' ,
				PRIMARY KEY (id)
			   )";
						   
		$dbh->exec($sql);			
				
	}catch(PDOException $e){
		echo $e->getMessage();
	}					
?>