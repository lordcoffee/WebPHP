<?php  
  
	require_once 'script/db.php';

	class PostTable {  
        
  		public function findByID($id) {
    		$sql = "SELECT * FROM tbl_person WHERE id = :id";
    		
    		$fieldValueMapping = 
    			array(':id'=>$id);
            
    		$stmt = prepareSql($sql);
    		$stmt->setFetchMode(PDO::FETCH_CLASS, 'PostRow');
    		$stmt = executeSql($stmt, $fieldValueMapping);
    
    		return $stmt->fetch();
  		}
    
  		public function findByAttribute($attribute, $value) {
    		$sql = "SELECT * FROM tbl_person WHERE $attribute = :$attribute";
    		
    		$fieldValueMapping = 
    			array(":$attribute"=>$value);
            
    		$stmt = prepareSql($sql);
    		$stmt->setFetchMode(PDO::FETCH_CLASS, 'PostRow');
    		$stmt = executeSql($stmt, $fieldValueMapping);
             
    		return $stmt->fetchAll();
  		}
    
  		public function findAll() {
    		$sql = "SELECT * FROM tbl_person";
    
    		$stmt = prepareSql($sql);
    		$stmt->setFetchMode(PDO::FETCH_CLASS, 'PostRow');
    		$stmt = executeSql($stmt, array());
    
    		return $stmt->fetchAll();
  		}
    
  		public function insert($entry) {
    		$sql = "INSERT INTO tbl_person (created, title, content) 
            		VALUES (:created, :title, :content)";
    
    		$fieldValueMapping = 
    			array(':created' => $entry->getCreated(),
      				  ':title'   => $entry->getTitle(), 
      				  ':content' => $entry->getContent());
    
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
    		$entry->setId(get_db()->lastInsertId());
    		return $entry;
  		}
    
  		public function update($entry) {
    		$sql = "UPDATE tbl_person 
      		        SET created = :created, title = :title, content = :content 
                    WHERE id = :id";
					
    		$fieldValueMapping = 
    			array(':created' => $entry->getCreated(),
      				  ':title'   => $entry->getTitle(), 
     				  ':content' => $entry->getContent(), 
    				  ':id'      => $entry->getId());

   			$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
    		return $entry;
  		}
    
  		public function delete($entry) {
    		$sql = "DELETE FROM tbl_person  WHERE id=:id";
    		$fieldValueMapping = 
    			array(':id'=>$entry->getId());
            
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
  		}
	}
?>