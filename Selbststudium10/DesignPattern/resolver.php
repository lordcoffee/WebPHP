<?php 
	$type = (isset($_GET['type'])) ? $_GET['type'] : 'html';
	
	switch ($type) {
		case 'json':
			header("Content-type: text/javascript; charset=utf-8");
			break;
		case 'xml':
			header("Content-type: text/xml; charset=utf-8");
			break;
		default:	
			header("Content-type: text/html; charset=utf-8");
			break;
	}

	$gets = http_build_query($_GET);
	
	$showBy = (isset($_GET['id'])) ? 'showById'.'/'.$_GET['id'] : '';
	
	$url = 'http://'.$_SERVER['SERVER_NAME'].dirname( $_SERVER['REQUEST_URI'] ) .'/'.ucfirst($_GET['service']).'/list/'.$showBy.'?'.$gets;
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$body = curl_exec($ch);
?>