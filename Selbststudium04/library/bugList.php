<?php
	$folder = 'bugLog/bugContent/';
	$dir = new RecursiveDirectoryIterator($folder); 
  
  	foreach (new RecursiveIteratorIterator($dir) as $file) {
  	$info = pathinfo($file);
  	
  	$filename = $file -> getFilename();
  		if ($file -> IsFile() && substr($filename, 0, 1) != "." ) { 
  			$data = unserialize(file_get_contents($file));
  			echo '<li><h3>Error Report</h3>'.$data['name'];
  			if(!empty($data['submitdate'])) {
  				echo ' date: '.$data['submitdate'].' time: '.$data['submittime'];
			}
			if(!empty($data['username'])) {
  				echo ' user: '.$data['username'].'';
			}
			if(!empty($data['text'])) {
  				echo ' <h4>Description:</h4><p>'. $data['text']. '</p>';
			}
  			if(!empty($data['filepath'])) {
  				echo ' <h4>File:</h4><a href="'.$data['filepath'].'" target="_blank">'.basename($data['filepath']).'</a>';
			}
  			echo '</li>';
  		}
  	}
?>