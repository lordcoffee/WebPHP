<?php 

	class Settings{

		private static $instance = NULL;	
		
		private $root;
		
		private function __construct() {
			$this->root =  dirname( $_SERVER['SCRIPT_FILENAME'] ) ;
		}
		
		public static function getInstance()
		{
		  	if (!self::$instance){
		      
		      	self::$instance = new settings();
			}
		 	return self::$instance;
		}
		
		public function getRoot(){
			return $this->root;
		}
	}

	date_default_timezone_set('Europe/Zurich');	
?>