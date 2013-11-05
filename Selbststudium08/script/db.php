<?php

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	require_once 'script/dbGlobalParameter.php';

	define("DEBUGGING", false);

	$db = null;

	function connect_db() {
        try {
       		$pdo =  new PDO(DB_CONNECTION, DB_USER, DB_PASSWORD);
			
        	if (DEBUGGING == true && $pdo != null) {
            	echo 'successfully connected to db';
        	}
        	return $pdo;
        } catch(PDOException $e) {
        	echo $e->getMessage();
        }
	}

	function get_db() {
        global $db;
        if ($db == null) {
        	$db = connect_db();
        }
        return $db;
	}

	function prepareSql($sql) {
        $pquery = get_db()->prepare($sql);
        return $pquery;
	}

	function executeSql($pquery, $fieldValueMapping) {
        $pquery->execute($fieldValueMapping);
		
        if (DEBUGGING == true) {
        	echo var_dump(get_db()->errorinfo());
        }
        return $pquery;
	}
?>