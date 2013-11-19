<?php 
	interface Request{
		public function getController();
		public function getView();
		public function getAction();
		public function getParam();
		public function getGetParam($req_param);
	}
?>