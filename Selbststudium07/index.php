<?php
	// initial creation of database table if not already set up 
	require_once 'script/dbCreate.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post Row Table</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
</head>
<body>
	<?php 
    	require 'script/postRow.php';
    	require 'script/postTable.php';
                
    	// create new entries with table data gateway
    	$tdg = new PostTable;

    	// initially clear all rows as this gets execute quite a lot
       	foreach ($tdg->findAll() as $post) {
        	$tdg->delete($post);
    	}
                
    	echo '<h1>RowDataGateway</h1>';

		// create first test record
   		$record1 = new PostRow;
		$record1->setCreated("2013-12-24");
		$record1->setTitle("entry 1 (chuck)");
		$record1->setContent("Some random test blabla text");

		$record1->insert();

		// create second test record
		$record2 = new PostRow;
		$record2->setCreated("2013-12-24");
		$record2->setTitle("entry 2 (norris)");
		$record2->setContent("Some random test blabla text");
		
		$record2->insert();

		// get all rows
		echo '<p style="color: green;">get all current records in database: </p>';
		echo '<table class="table table-hover">';
		echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
		foreach ($tdg->findAll() as $post) {
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
      		echo '<td>'.$post->getContent().'</td>';
			echo '</tr>';
		}
            
		echo '</table>';

        // get a specific row back in this case our second test entry
        echo '<p style="color: green;">get the second record in database:</p>';
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        $post = new PostRow;
        $post->findById($record2->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';

        // try to update the second row
        echo '<p style="color: green;">update the second record and select it again</p>';
        $post->setContent("I'm the new updated content.");
        $post->update();

        // check if update has worked
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        $post = new PostRow;
        $post->findById($record2->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';          
        echo '<h1>TableDataGateway</h1>';
         
                
        $record1 = new PostRow;
        $record1->setCreated("2013-12-30");
        $record1->setTitle("another record 1");
        $record1->setContent("This is the first rowPost");
        
        $tdg->insert($record1); 
		       
        $record2 = new PostRow;
        $record2->setCreated("2013-12-31");
        $record2->setTitle("another record 2");
        $record2->setContent("This is the second rowPost");
                
        $tdg->insert($record2);
                
      	// get all rows
        echo '<p style="color: green;">get all current records in database: </p>';
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        foreach ($tdg->findAll() as $post) {
        	echo '<tr>';
        	echo '<td>'.$post->getCreated().'</td>';
        	echo '<td>'.$post->getTitle().'</td>';
        	echo '<td>'.$post->getContent().'</td>';
        	echo '</tr>';
        }
        echo '</table>';
		
        // get a specific row back in this case the entry from 30.12.2013
        echo '<p style="color: green;">get the row which was created on the 30.12.2013: </p>';
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        foreach ($tdg->findByAttribute('created', '2013-12-30') as $post) {
        	echo '<tr>';
        	echo '<td>'.$post->getCreated().'</td>';
        	echo '<td>'.$post->getTitle().'</td>';
        	echo '<td>'.$post->getContent().'</td>';
        	echo '</tr>';
        }
        echo '</table>';

        // get a specific row back in this case our second test entry
        echo '<p style="color: green;">get the second record in database:</p>';
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        $post = $tdg->findById($record2->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';

        // update the specific row 
        echo '<p style="color: green;">update the second record and select it again</p>';
        $post->setContent("I'm the new updated content.");
        $tdg->update($post);

        // and show it again to make sure update has worked out
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th></tr>';
        $post = $tdg->findById($post->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '</tr>';
        echo '</table>';
                
        // and again delete all existing rows 
        foreach ($tdg->findAll() as $post) {
        	$post->delete();
    	}         
	?>	
</body>
</html>