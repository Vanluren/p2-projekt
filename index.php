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
<div class="container-fluid"><!-- <div> Index container-fluid åben -->
  <div class="row"><!-- <div> Index row åben -->
<!-- Sidebar menu -->
<div class="col-sm-1 vice-sidebar__wrapper">
	<?php include 'src/modules/vice_sidebar-menu.php'; ?>
</div>
<div class="col-sm-11" style="flex-grow:1;">
</div> <!-- <div> Index row luk -->
</div><!-- Index container-fluid luk -->
<?php
include 'src/modules/footer.php'
?>
