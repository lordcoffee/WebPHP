<?php
	$url ="http://localhost/DesignPattern/Cantons/showAll&methode=single&id=ag";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$body = curl_exec($ch);
	curl_close($ch);
	$json = json_decode($body);
	print_r($json);
?>