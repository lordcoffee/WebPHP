<?php 
	
	require($this->settings->getRoot() . '/app/model/CantonModel.php');

	class CantonsController{
		
		private $request;
		private $viewFile;
		private $settings;
		
		private $sort_mapping = array(
			'name'       => array ('attr' => 'Kanton',
						 		   'flag' => SORT_STRING),
			'capital'    => array ('attr' => 'Hauptort',
								   'flag' => SORT_STRING),
			'population' => array ('attr' => 'Einwohner 1',
								   'flag' => SORT_NUMERIC),
			'admission'  => array ('attr' => 'Beitritt',
								   'flag' => SORT_NUMERIC)
		);
		
		private $byMapping = array('Id' => 'Kürzel');	
		
		public function CantonsController($request) {
		
			$this->settings = Settings::getInstance();
		
			$this->request = $request;
			
			
			$view = $this->request->getView();
			$this->viewFile = $this->settings->getRoot() . '/app/view/'.$view.'.php';
			
			if( ! is_file ( $this->viewFile ) ){
				die('view not available! '.$this->request->getView());
			}
			
			$actionName = $this->request->getAction().'Action';
				
			$startString = 'showBy';
			$showByRequired = (substr($actionName,0,strlen($startString)) === $startString);
			if($showByRequired){
				$actionName = $startString;	
			}	
			
			if(!method_exists($this, $actionName)){
				$actionName = 'showAllAction';
			}
			
			$this->{$actionName}();			
		}
		
		public function showBy(){
			$actionName = $this->request->getAction();
			$startString = 'showBy';
			$attr = (substr($actionName,strlen($startString)));
			if( isset($this->byMapping[$attr])) $attr = $this->byMapping[$attr];
			
			$result = CantonsModelFactory::getKantonBy($attr,$this->request->getParam());
			
			$this->renderView($result);
		}
		
		public function showAllAction(){
		
			$result = CantonsModelFactory::getAllCantons();
			
			$sort = $this->request->getGetParam('sort');	
			
			if(!empty($sort)){
				$sortFlag = SORT_REGULAR;
				if(isset($this->sortMapping[$sort])){
					 $sortOrig = $sort;
					 $sort = $this->sortMapping[$sortOrig]['attr'];
					 $sortFlag = $this->sortMapping[$sortOrig]['flag'];
				}
				$this->aasort($result,$sort,$sortFlag);
			}
			if($this->request->getGetParam('sortType') === 'desc'){
				$result = array_reverse($result);
			}
			
			$this->renderView($result);	
		}
		
		private function aasort (&$array,$key,$type = SORT_REGULAR){
		    $sortArrayMemory = array();
		    $sortedArray     = array();
		    reset($array);
		    foreach ($array as $i => $value) {
		        $sortArrayMemory[$i]=$value[$key];
		    }
			
			// perform sort
		    asort($sortArrayMemory,$type);
			
		    foreach ($sortArrayMemory as $i => $value) {
		        $sortedArray[$i]=$array[$i];
		    }
		    
		    // return sorted array
		    $array=$sortedArray;
		}
		
		public function renderView($data){
			
			$format = $this->request->getGetParam('type');
			if($format === 'json'){
				header("Content-type: text/javascript; charset=utf-8");
				echo json_encode($data);
			}else if($format === 'xml'){
				header("Content-type: text/xml; charset=utf-8");
				$xmlCantons = new SimpleXMLElement("<?xml version=\"1.0\"?><cantons></cantons>");
				$this->arrayToXml($data,$xmlCantons,'canton_record');
				print $xmlCantons->asXml();
			
			}else{
				header("Content-type: text/html; charset=utf-8");
				include($this->viewFile);
			}
		}
			
		// building up the xml structure
		private function arrayToXml($info,&$xmlInfo,$nodeName) {
		 
			 // using composite design pattern
		    foreach($info as $key => $value) {
		    	$key = str_replace(array(' '),array(''),$key);
		        if(is_array($value)) {
		            if(!is_numeric($key)){
		                $subNode = $xmlInfo->addChild("$key");
		                $this->arrayToXml($value,$subNode,$nodeName);
		            }
		            else{
		                $subNode = $xmlInfo->addChild($nodeName);
		                $this->arrayToXml($value,$subNode,$nodeName);
		            }
		        }
		        else{
		            $xmlInfo->addChild("$key","$value");
		        }
		    }
		}
	}
?>