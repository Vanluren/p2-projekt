<?php
    include 'src/modules/header.php';

	if ($_SESSION['user-type'] == 'vicevaert') {
	    include 'src/vice_index.php';
	} else {
	    include 'src/beboer_index.php';
	}

include 'src/modules/footer.php';
