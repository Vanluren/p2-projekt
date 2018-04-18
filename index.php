<?php

	// Initialize the session
	session_start();

	// If session variable is not set it will redirect to login page
	if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
	    header("Location: src/login.php");
	    exit;
	}

include 'src/modules/header.php'
?>
<head>
	  <link rel='stylesheet' href='src/assets/styles/scss/views/_login.scss'>
</head>

	<div class="page-header">

	</div>


	<div class="dashwrapper">

		<div class="row">
			<div class="column" style="background-color:#b3caef;">
				<h2>IMAGE UPLOAD</h2>
				<a href='src/image_upload.php'>KLIK HER FOR AT AFPRØVE UPLOAD FUNKTION!</a>
			</div>
			<div class="column" style="background-color:#bbb;">
				<h2>Indmeldt</h2>
				<p>Some text..</p>
			</div>
			<div class="column" style="background-color:#ccc;">
				<h2>Detajler</h2>
				<p>Some text..</p>
			</div>
		</div>

	</div>


	<div id="logout-button">
		<p><a href="src/logout.php" class="btn btn-danger">Log ud</a></p>
	</div>

<?php
include 'src/modules/footer.php'
?>
