<?php

	require_once "script/db.php";

	Class PostRow {
  		
  		private $id;
  		private $created;
  		private $title;
  		private $content;
		private $version;

		public function findByID($id) {
    		$sql = "SELECT * FROM tbl_person WHERE id = :id";
    
    		$fieldValueMapping = array(':id'=>$id);
                 
    		$stmt = prepareSql($sql);
    		$stmt->setFetchMode(PDO::FETCH_CLASS, 'PostRow');
    		$stmt = executeSql($stmt, $fieldValueMapping);
                 
    		$post = $stmt->fetch();
    		$this->setId($post->getId());
    		$this->setCreated($post->getCreated());
    		$this->setTitle($post->getTitle());
    		$this->setContent($post->getContent());
			$this->setVersion($post->getVersion());
  		}

  		public function insert() {
    		$sql = "INSERT INTO tbl_person (created, title, content) 
            		VALUE (:created, :title, :content, :version)";
    
    		$fieldValueMapping = 
      			array(':created' => $this->getCreated(), 
            	 	  ':title'   => $this->getTitle(), 
            	 	  ':content' => $this->getContent(),
					  ':version' => $this->getVersion());
        
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
    		$this->setId(get_db()->la1stInsertId());
  		}

  		public function update() {
    		$sql = "UPDATE tbl_person 
            		SET created = :created, title = :title, content = :content, version = :newVersion 
            		WHERE id = :id AND version = :oldVersion";
    
    		$fieldValueMapping = 
      			array(':created'    => $this->getCreated(),
            		  ':title'      => $this->getTitle(), 
                      ':content'    => $this->getContent(), 
                      ':id'         => $this->getId(),
					  ':newVersion' => (($this->getVersion())+1),
					  ':oldVersion' => $this->getVersion());
                
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
			
			if($stmt->rowCount() == 0) {
				throw new Exception("Row has been updated by another process/user, your update was not executed!");
			}
		}

  		public function delete() {
    		$sql = "DELETE FROM tbl_person  WHERE id=:id";
    		$fieldValueMapping = array(':id'=>$this->getId());
                 
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
  		}

		public function setId($id) {
    		$this->id = $id;
  		}
        
  		public function getId() {
    		return $this->id;
  		}
        
  		public function setCreated($created) {
    		$this->created = $created;
  		}
        
  		public function getCreated() {
    		return $this->created;
  		}
        
  		public function setTitle($title) {
    		$this->title = $title;
  		}
        
 		public function getTitle() {
    		return $this->title;
  		}
        
  		public function setContent($content) {
    		$this->content = $content;
  		}
        
  		public function getContent() {
    		return $this->content;
  		}
		
		public function setVersion($version) {
			$this->version = $version;
		}
		
		public function getVersion() {
			return $this->version;
		}	
	}
?>