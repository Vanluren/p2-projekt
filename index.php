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

<div class="col-sm-11">

	<?php

		// Initialize the session
		session_start();

		// If session variable is not set it will redirect to login page
		if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
		    header("Location: ../login.php");
		    exit;
		}

	include 'header.php'
	?>

	<?php
	$host    = "178.62.198.246";
	$user    = "broomie";
	$pass    = "broomie";
	$db_name = "test";

	//create connection
	$connection = mysqli_connect($host, $user, $pass, $db_name);

	//test if connection failed
	if(mysqli_connect_errno()){
	    die("connection failed: "
	        . mysqli_connect_error()
	        . " (" . mysqli_connect_errno()
	        . ")");
	}

	//get results from database
	$result = mysqli_query($connection,"SELECT * FROM vice");
	$all_property = array();  //declare an array for saving property

	//showing property
	echo '<table class="data-table">
	        <tr class="data-heading">';  //initialize table tag
	while ($property = mysqli_fetch_field($result)) {
	    echo '<td>' . $property->name . '</td>';  //get field name for header
	    array_push($all_property, $property->name);  //save those to array
	}
	echo '</tr>'; //end tr tag

	//showing all data
	while ($row = mysqli_fetch_array($result)) {
	    echo "<tr>";
	    foreach ($all_property as $item) {
	        echo '<td>' . $row[$item] . '</td>'; //get items using property value
	    }
	    echo '</tr>';
	}
	echo "</table>";
	?>
	
</div>
</div> <!-- <div> Index row luk -->
</div><!-- Index container-fluid luk -->
<?php
include 'src/modules/footer.php'
?>
