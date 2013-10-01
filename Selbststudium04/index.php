<?php include 'library/logic.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Submit us your Bug!</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style/style.css" type="text/css" media="all" />
	<script src="script/validate.js"></script>
</head>
<body>
	<?php if( $status ) { ?>
	<div id="stateBox">
		<?php foreach ( $status as $s ) {
			echo $s.'<br/>';
		}; ?>
	</div>
	<?php } ?>
	<div id="listBox">
		<h2>Submitted Bugs</h2>
		<ul>
			<?php include 'library/bugList.php'; ?>
		</ul>
	</div>
	<form class="form" action="index.php" method="post" enctype="multipart/form-data" onsubmit="return validateValues();">
	<input type="hidden" name="submit" value="1"/>
	<div id="loginBox">
		<h2>Login</h3>
		<input type="text" name="username" placeholder="Username" required="required"/>
		<input type="password" name="password" placeholder="Password" required="required"/>		
	</div>
	<div id="mainBox">
		<h2>Report a Bug</h3>
		<p class="name">
			<input type="text" name="name" id="name" placeholder="John Doe"/>
			<label for="name">Name</label>
		</p>
		<p class="email">
			<input type="email" autocomplete="off" name="email" id="email" placeholder="mail@example.com" />
			<label for="email">Email</label>
		</p>
		<p class="web">
			<input type="url" pattern="https?://.+" name="web" id="web" placeholder="http://www.example.com" required="required" />
			<label for="web">Referenced Website</label>
		</p>		
		<p class="text">
			<textarea name="text" placeholder="Fehlerreport" required="required" /></textarea>
		</p>
		<p>
			<input type="range" name="priority" min="1" max="10" required="required" />
			<label for="priority">
				Priority
			</label>
		</p>
		<p>
			<select name="bugtype" placeholder="Bugtype" required="required">
				<option value="Serious Bug">Serious Bug</option>
				<option value="Normal Bug" >Normal Bug</option>
			</select>
			<label for="bugtype">
				Bugtype
			</label>
		</p>
		<p>
			<input type="checkbox" name="callback" value="1" />
			<label for="callback">
				Call me back
			</label>
		</p>
		<p>
				Yes
			<input type="radio" name="reproducable" value="yes" checked="checked" required="required" />
				No
			<input type="radio" name="reproducable" value="no" required="required" />
			<label for="reproducable">
				Reproduceable
			</label>
		</p>	
		<p>
			<input type="date" name="date" required="required" />
			<label for="date">
				Date
			</label>
		</p>
		<p>
			<input type="file" name="file" id="file"><br>
			<label for="file">
				Add Attachment
			</label>
		</p>
		<?php		
		if(!DEBUG) {
          require_once('library/recaptcha.php');
          $publickey = "6LeS7ecSAAAAANBPQAXKplnW4dnn3VEv1VL2b-1J";
          echo recaptcha_get_html($publickey);
        }
        ?>
		<p class="submit">
			<input type="submit" value="Senden" />
		</p>
	</div>
	</form>
</body>
</html>