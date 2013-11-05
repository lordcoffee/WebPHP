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
	
		/*
		 * 	Aufgabe 5
		 * 	Beschreiben Sie die User Interaktinoen beim optimistischen locking. Als welche Fälle können auftreten 
		 * 	und wie soll die Software darauf reagieren. Legen Sie die Antworten entweder beschreibend als Textfile 
		 * 	ab oder implementieren Sie dieses.
		 * 
		 * 		- In optimistic locking, wird nicht die ganze DataRow beim ersten Zugriff gelockt sondern nur die Versionsnummer.
		 * 		  Wenn nun UserA einen Eintrag (Version1) erstellt und UserB diesen mutiert (Version2) und UserA wiederrum versucht 
		 * 		  diesen zu mutieren (Immer noch Zurgriff auf Version1) erhält UserA eine Meldung das der Update nicht gemacht 
		 * 		  werden konnte, da der Record bereits durch einen anderen Benutzer/Prozess mutiert wurde.
		 * 
		 * 	Aufgabe 6
		 * 	Beschreiben Sie einen Deadlock
		 * 
		 * 		- Bei einem Deadlock handelt es sich um zwei oder mehrere sich gegenseitig konkurrierende Aktionen, welche 
		 * 		  warten bis der andere beendet wird und somit blockieren sie sich gegenseitig und schon hat man einen Deadlock.
 		 * 		  Zum Bespiel UserA liesst eine Row (share lock), UserB möchte genau diese löschen (exclusive lock) muss nun aber 
		 * 		  warten bis UserA diese freigibt um sie löschen zu können. UserA entscheided sich nun ebenfalls diese Row zu 
		 * 		  löschen (exclusive lock) und wartet nun bis UserB diese freigibt, dieser wiederrum wartet ja aber noch auf 
		 * 		  UserA und schon hat man einen Deadlock.
		 * 
		 * 	Aufgabe 7
		 * 	Welche probleme durch mangelnde Transaktionsisolation können durch ein optimistisches locking behoben werden?
		 * 
		 * 		- Non repeatable read
		 * 		- Lost Update
		 * 
		 */		 
	 
    	require 'script/postRow.php';
    	require 'script/postTable.php';
                
    	// create new entries with table data gateway
    	$tdg = new PostTable;

    	// initially clear all rows as this gets execute quite a lot
       	foreach ($tdg->findAll() as $post) {
        	$tdg->delete($post);
    	}
                
    	echo '<h1>RowDataGateway - Optimistic Locking</h1>';

		// create first test record
   		$record1 = new PostRow;
		$record1->setCreated("2013-12-24");
		$record1->setTitle("entry 1 (chuck)");
		$record1->setContent("Some random test blabla text");
		$record1->setVersion(1);
		$record1->insert();

		// create second test record
		$record2 = new PostRow;
		$record2->setCreated("2013-12-24");
		$record2->setTitle("entry 2 (norris)");
		$record2->setContent("Some random test blabla text");
		$record2->setVersion(1);
		$record2->insert();

		// get all rows
		echo '<p style="color: green;">get all current records in database: </p>';
		echo '<table class="table table-hover">';
		echo '<tr><th>Created</th><th>Title</th><th>Content</th><th>Version</th></tr>';
		foreach ($tdg->findAll() as $post) {
            echo '<tr>';
            echo '<td>'.$post->getCreated().'</td>';
            echo '<td>'.$post->getTitle().'</td>';
      		echo '<td>'.$post->getContent().'</td>';
			echo '<td>'.$post->getVersion().'</td>';
			echo '</tr>';
		}
            
		echo '</table>';

        // get a specific row back in this case our second test entry
        echo '<p style="color: green;">get the second record in database:</p>';
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th><th>Version</th></tr>';
        $post = new PostRow;
        $post->findById($record2->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
		echo '<td>'.$post->getVersion().'</td>';
        echo '</tr>';
        echo '</table>';

        // try to update the second row
        echo '<p style="color: green;">update the second record and select it again</p>';
        $post->setContent("I'm the new updated content.");
        $post->update();

        // check if update has worked
        echo '<table class="table table-hover">';
        echo '<tr><th>Created</th><th>Title</th><th>Content</th><th>Version</th></tr>';
        $post = new PostRow;
        $post->findById($record2->getId());
        echo '<tr>';
        echo '<td>'.$post->getCreated().'</td>';
        echo '<td>'.$post->getTitle().'</td>';
        echo '<td>'.$post->getContent().'</td>';
        echo '<td>'.$post->getVersion().'</td>';
        echo '</tr>';
        echo '</table>';                
	?>	
</body>
</html>