<?php
	require_once 'script/dbGlobalParameter.php';

	try {
		$pdo =  new PDO(DB_CONNECTION, DB_USER, DB_PASSWORD);
				
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
		$sql = "CREATE TABLE tbl_person (
				id tinyint(3) NOT NULL AUTO_INCREMENT,
				created varchar(10) NOT NULL default '',
				title varchar(100) NOT NULL default '' ,
				content varchar(200) NOT NULL default '' ,
				version tinyint(4) NOT NULL default 0,
				PRIMARY KEY (id)
			   )";
						   
		$pdo->exec($sql);			
				
	}catch(PDOException $e){
		echo $e->getMessage();
	}					
?>