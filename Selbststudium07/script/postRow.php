<?php

	require_once "script/db.php";

	Class PostRow {
  		
  		private $id;
  		private $created;
  		private $title;
  		private $content;

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
  		}

  		public function insert() {
    		$sql = "INSERT INTO tbl_person (created, title, content) 
            		VALUE (:created, :title, :content)";
    
    		$fieldValueMapping = 
      			array(':created' => $this->getCreated(), 
            	 	  ':title'   => $this->getTitle(), 
            	 	  ':content' => $this->getContent());
        
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
    		$this->setId(get_db()->lastInsertId());
  		}

  		public function update() {
    		$sql = "UPDATE tbl_person 
            		SET created = :created, title = :title, content = :content 
            		WHERE id = :id";
    
    		$fieldValueMapping = 
      			array(':created' => $this->getCreated(),
            		  ':title'   => $this->getTitle(), 
                      ':content' => $this->getContent(), 
                      ':id'      => $this->getId());
                
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
  		}

  		public function delete() {
    		$sql = "DELETE FROM tbl_person  WHERE id=:id";
    		$fieldValueMapping = array(':id'=>$this->getId());
                 
    		$stmt = prepareSql($sql);
    		$stmt = executeSql($stmt, $fieldValueMapping);
  		}

		public function setId($id)         {
    		$this->id = $id;
  		}
        
  		public function getId() {
    		return $this->id;
  		}
        
  		public function setCreated($created)         {
    		$this->created = $created;
  		}
        
  		public function getCreated() {
    		return $this->created;
  		}
        
  		public function setTitle($title)         {
    		$this->title = $title;
  		}
        
 		public function getTitle() {
    		return $this->title;
  		}
        
  		public function setContent($content)         {
    		$this->content = $content;
  		}
        
  		public function getContent() {
    		return $this->content;
  		}
	}
?>