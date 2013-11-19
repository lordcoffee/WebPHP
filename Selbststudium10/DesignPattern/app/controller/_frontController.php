<?php 

	class _frontController{
	
		private $settings;
	
		public function __construct($request){
			$this->settings = Settings::getInstance();
		
			$controllerFile = $this->settings->getRoot() . '/app/controller/'.$request->getController().'Controller.php';
		
			if( !is_file($controllerFile) ){
				die('Controller not available');
			}
			include($controllerFile);
		
			$controllerName = $request->getController().'Controller';
			$controller = new $controllerName($request);		
		}
	}
?>