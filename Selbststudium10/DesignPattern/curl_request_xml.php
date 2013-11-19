<?php
	$url ="http://localhost/DesignPattern/Cantons/showAll/json&methode=single&id=ag";
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	$body = curl_exec($ch);
	curl_close($ch);
	$xml = new SimpleXMLElement($body);
?>