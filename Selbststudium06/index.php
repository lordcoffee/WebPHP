<?php
	include 'script/dbGlobalParameter.php';
	include 'script/dbClose.php';	
?>
<!DOCTYPE html>
<html>
<head>
	<title>ToDo</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
	<link rel="stylesheet" href="style/bootstrap/css/bootstrap.min.css" type="text/css" media="all" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
	<script src="style/bootstrap/js/bootstrap.min.js"></script>
	<script src="script/sideFunctions.js"></script>
</head>
<body>
	<div id="mainBox">
		<header>
		</header>
		<div id="workBox">
			<nav>
				<div class="navbar navbar-inverse">
  					<div class="navbar-inner">
    					<div class="container">
      						<a class="brand" href="#">Navigation</a>
 							<ul class="nav">
  						  		<li class="dropdown">
    								<a class="dropdown-toggle" data-toggle="dropdown" href="#">List <span class="caret"></span></a>
    								<ul class="dropdown-menu">
										<li><a href="index.php?list=1">Show all</a></li>
  										<li><a href="index.php?list=2">Show open</a></li>
  										<li><a href="index.php?list=3">Show complete</a></li>
    								</ul>
  								</li>			
  								<li><a data-toggle="modal" href="#open">Open Task</a></li>
  								<?php
  									$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
  								
									$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								
  									try {
        								$result = $dbh->query("SELECT 1 FROM todo LIMIT 1");
    								}catch(Exception $e){
        								echo '<li><a data-toggle="modal" href="#create">Create MySQL</a></li>';
    								}
								?>		
							</ul>
    					</div>
  					</div>
				</div>
			</nav>	
			<div id="open" class="modal hide fade in" style="display: none;">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Open Task</h3>
				</div>
				<div class="modal-body">					
				<form class="open" name="open">
					<label class="label" for="name">Task Name</label><br>
					<input type="text" name="name" class="input-xlarge" size="80"><br>
				</form>													
				</div>
				<div class="modal-footer">
					<input class="btn btn-success" type="submit" value="Open Task" id="openEntry">
				</div>
			</div>					
			<div id="create" class="modal hide fade in" style="display: none;">
				<div class="modal-header">
					<a class="close" data-dismiss="modal">×</a>
					<h3>Create MySQL artefacts</h3>
				</div>
				<div class="modal-body">
					<div class="alert alert-info">
  						<strong>Info! </strong>DB has not yet been set up... click on create to continue (Create Button will disappear once all artefacts are in place... refresh will be done automatically)
					</div>
				</div>
				<div class="modal-footer">
					<input class="btn btn-success" type="submit" value="Create" id="createDB">
				</div>
			</div>
			<div id="contentBox">
				<?php
					
					//wenn keine records vorhanden ist soll github mändchen kommen *this is not the list you are looking for*
				
					try {
						
						$dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
				
						$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				
						if (isset($_GET["list"])){
							$list = $_GET["list"];
						
							if($list == 1){
								$query = "SELECT * FROM todo";
							}elseif($list == 2){
								$query = "SELECT * FROM todo WHERE status = '1'";					
							}elseif($list == 3){
								$query = "SELECT * FROM todo WHERE status = '2'";			
							}							
						}else{
							$query = "SELECT * FROM todo";
						}
					
						$result = $dbh->query($query);
					
						if($result->rowCount() > 0){
							
							echo'<table class="table table-hover">';
							echo'<thead><tr><th>ID</th><th>Task</th><th>Status</th><th></th><th></th></tr></thead>';
							echo'<tbody>';
							
							foreach($result as $item){
								
								echo '<tr>';
								echo '<td>'.$item['id'].'</td>';
								echo '<td>'.$item['task'].'</td>';
								
								if($item['status'] == 1){ 
									echo '<td>Open</td>';
								}else{ 
									echo '<td>Complete</td>';
								}
								
								echo '<div id="modify'.$item['id'].'" class="modal hide fade in" style="display: none;">
										<div class="modal-header">
											<a class="close" data-dismiss="modal">×</a>
											<h3>Modify Task</h3>
										</div>
										<div class="modal-body">					
										<form class="modify" name="modify">
											<label class="label" for="name">Task Name</label><br>
											<input type="text" name="name" class="input-xlarge" size="80" value="'.$item['task'].'"><br>
											<label class="label" for="name">Status</label><br>
        									<select name="selValue" class="form-control" value="'.$item['status'].'">
  												<option value="1">Open</option>
  												<option value="2">Complete</option>
											</select>
											<input type="hidden" name="primaryKey" value="'.$item['id'].'"/>
										</form>													
										</div>
										<div class="modal-footer">
											<input class="btn btn-success" type="submit" value="Modify Task" id="modifyEntry" name="update">
										</div>
									  </div> ';
								
								echo '<td><a data-toggle="modal" href="#modify'.$item['id'].'"><i class="icon-pencil"></i></a></td>';
								echo '<td><a href="index.php?id='.$item['id'].'"><i class="icon-trash"></i></a></td>';
								echo '</tr>';
								
							}
							
							echo '</tbody></table>';
								
						}else{
							
							echo '<img src="images/noRecordsfound.jpg" />';
						}

						$dbh = null;
				
					}catch(PDOException $e){
						
						echo '<img src="images/noDBfound.jpg" />';
					}
   				?>
			</div>
		</div>
		<footer>
			by LordCoffee - looks great on chrome
		</footer>
	</div>
</body>
</html>