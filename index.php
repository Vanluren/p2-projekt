<?php
    // Initialize the session
    session_start();

    // If session variable is not set it will redirect to login page
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("Location: src/login.php");
        exit;
    }

include 'src/modules/header.php';

	if ($_SESSION['user-type'] == 'vicevaert') {
	    include 'src/vice_index.php';
	} else {
	    include 'src/beboer_index.php';
	}

include 'src/modules/footer.php';
