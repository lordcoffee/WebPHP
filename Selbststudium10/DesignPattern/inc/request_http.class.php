<?php

	include( $settings->getRoot() . '/inc/request.interface.php' );

	class Request_http implements request{

		private function getAllParameters(){
			return explode('/' , $_GET['vars'] );
		}

		public function getController(){
			$s = self::getAllParameters();
			return $s[0];
		}
	
		public function getView(){
			$s = self::getAllParameters();
			return $s[1];
		}
	
		public function getAction(){
			$s = self::getAllParameters();
			return $s[2];
		}
	
		public function getParam(){
			$s = self::getAllParameters();
			return $s[3];
		}
	
		public function getGetParam( $req_param ){
			$q_s = isset( $_GET[$req_param] ) ? $_GET[$req_param] : false;
			return $q_s;
		}	
	} 
?>