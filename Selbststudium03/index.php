<?php include 'phpScript/mailer.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Description" /> 
        <meta name="viewport" content="width=device-width" />
        <meta name="author" content="LordCoffee aka ChristianKoller" />
        <title>Selbststudium 03 - Mail App</title>
		<link href="style/style.css" rel="stylesheet" media="screen" type="text/css">
	</head>
	<body>
		<div id="mainBox">	
			<form action="index.php" method="post">
    			<p><input type="text" name="emailFrom" placeholder="Sender Email" value="Sender Email" size="94"/></p>
    			<p><input type="text" name="emailTo" placeholder="Receiver Email" value="Receiver Email" size="94"/></p>
    			<p><input type="text" name="emailSubject" placeholder="Subject" value="Subject" size="94"/></p>
    			<p><textarea name="emailText" placeholder="Email Text" rows="10" cols="68"></textarea></p>
    			<input type="hidden" name="send" value="1" />
    			<input type="submit" value="Send Email"/>
    		</form>
		</div>
	</body>
</html>