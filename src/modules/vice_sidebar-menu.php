<?php
require_once CONFIG_PATH.'/config.php';
$curr_department = $_SESSION['department'];
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!mysqli_connect_errno()) {

    $skader_res = $mysqli->query("SELECT * FROM ticket WHERE department = $curr_department");
    $klager_res = $mysqli->query("SELECT * FROM klage WHERE department = $curr_department");

    $skader_cnt = $klager_cnt = 0;
    if($skader_res->num_rows>0 || $klager_res >0){
        $skader_cnt = $skader_res->num_rows;
        $klager_cnt = $klager_res->num_rows;
    }

    /* close result set */
    $skader_res->close();
    $klager_res->close();
}else{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<aside class='col-md-2 vice-sidebar__wrapper'>
	<nav class='sidebar-sticky'>
		<div class='nav-item vice-sidebar__item active'>
			<a href="./" class="vice-sidebar__link">
					Skader <?php echo ($skader_cnt>0 ? '('.$skader_cnt.')' : ''); ?>
			</a>
		</div>
		<div class='nav-item vice-sidebar__item'>
			<a href="" class="vice-sidebar__link">
				Klager <?php echo ($klager_cnt>0 ? '('.$klager_cnt.')' : '(0)'); ?>
			</a>
		</div>
		<div class='nav-item vice-sidebar__item'>
			<a href="" class="vice-sidebar__link">
				Historik
			</a>
		</div>
		<div class='nav-item vice-sidebar__item'>
			<a href="" class="vice-sidebar__link">
				FAQ
			</a>
		</div>
		<div class='nav-item vice-sidebar__item'>
			<a href="./src/logout.php" class="btn btn-danger">Log ud</a>
		</div>
	</nav>
</aside>