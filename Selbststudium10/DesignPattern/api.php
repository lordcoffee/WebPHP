<?php 
	error_reporting(E_ALL);
	ini_set("display_errors", 1);
	
	require( 'config.php' );
	
	$settings = Settings::getInstance();
	
	require( $settings->getRoot() . '/app/controller/_frontController.php' );
	require( $settings->getRoot() . '/inc/request_http.class.php' );
	
	
	$request = new Request_http( );
	
	$frontController = new _frontController( $request );

?>