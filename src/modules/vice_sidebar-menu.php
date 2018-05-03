<?php
require_once CONFIG_PATH.'/config.php';
$curr_department = $_SESSION['department'];
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!mysqli_connect_errno()) {

    $skader_res = $mysqli->query("SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0");
    $klager_res = $mysqli->query("SELECT * FROM klage WHERE department = $curr_department");
    $historik_res = $mysqli->query("SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 1");

    $skader_cnt = $klager_cnt = $historik_cnt = 0;
    if($skader_res->num_rows>0 || $klager_res->num_rows >0 || $historik_res->num_rows>0){
        $skader_cnt = $skader_res->num_rows;
        $klager_cnt = $klager_res->num_rows;
        $historik_cnt = $historik_res->num_rows;
    }

    /* close result set */
    $skader_res->close();
    $klager_res->close();
    $historik_res->close();
}else{
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

?>
<aside class='col-sm-2 col-md-2 vice-sidebar__wrapper'>
	<nav class='nav nav-pills flex-column'>
		<div class='nav-item vice-sidebar__item active'>
			<a href="<?php echo ROOT_PATH?>" class="vice-sidebar__link">
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
				Historik <?php echo ($historik_cnt>0 ? '('.$historik_cnt.')' : '(0)'); ?>
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