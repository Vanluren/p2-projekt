<?php
require_once CONFIG_PATH . '/config.php';

$ordervalue = 'created_at';
$curr_department = $_SESSION['department'];
$sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0 ORDER BY $ordervalue";
$result = mysqli_query($link, $sql_stmt);

if (isset($_POST['submit'])) {
    if (isset($_POST['radio'])) {
    	$ordervalue = $_POST['radio'];

        switch ($ordervalue) {
            case "created_at":
                $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0 ORDER BY $ordervalue DESC";
                break;
            case "aldste":
                $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0 ORDER BY created_at ASC";
                break;
            case "priority":
                $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0 ORDER BY $ordervalue";
                break;
            default:
                $sql_stmt = "SELECT * FROM ticket WHERE department = $curr_department AND arkiveret = 0 ORDER BY $ordervalue";
        }


        $result = mysqli_query($link, $sql_stmt);
    }
}
?>
<!--BEGIN MAIN WRAPPER-->
<div class="container-fluid">
	<div class="row">
        <?php include 'src/modules/vice_sidebar-menu.php'; ?>
		<main class="col-sm-9 offset-sm-2 col-md-10 offset-md-2">
			<div class='container'>
				<div class='row'>
					<div class='col-10 offset-1'>
						<div class="ticket-sortering">
							<form method="post">
								<label>
									<input type="radio" name="radio" value="created_at" <?php echo($ordervalue == 'created_at' ? 'checked=""' : ''); ?>>
									Nyeste
								</label>
								<label>
									<input type="radio" name="radio" value="aldste" <?php echo($ordervalue == 'aldste' ? 'checked=""' : ''); ?>>
									Ældste
								</label>
								<label>
									<input type="radio" name="radio" value="priority" <?php echo($ordervalue == 'priority' ? 'checked=""' : ''); ?>>
									Prioritet
								</label>
								<input type="submit" name="submit" value="Sorter" class="btn btn-secondary" />
							</form>
						</div>
					</div>
				</div>
				<div class='row'>
                    <?php
                    if (mysqli_num_rows($result) > 0):
                        while ($row = mysqli_fetch_assoc($result)):
                            $date = date_create($row['created_at']);
                            if ($row['priority'] == 'hoej') {
                            	$priority = 'Høj';
                                $bubble_color = 'red';
                            } elseif ($row['priority'] == 'middel') {
                                $priority = 'Middel';
                                $bubble_color = 'yellow';
                            } else {
                                $priority = 'Lav';
                                $bubble_color = 'green';
                            }
                            ?>
							<div class='col-10 offset-1'>
								<a href="src/ticket_view.php?ticket=<?php echo $row['ticket_id']; ?>"
								   class="ticket__link">
									<div class="row">
										<div class="ticket">
											<div class='ticket__wrapper--left'>
												<h2 class='ticket__address'>
													Lejlighed: <?php echo $row['address'] ?></h2>
												<div class='ticket__beskrivelse'>
													<p class="ticket__text">
													<?php echo substr($row['beskrivelse_text'], 0, 200); ?>...</p>
												</div>
											</div>
											<div class='ticket__wrapper--right'>
												<div class='ticket__prioritering'>Prioritering:
													<?php echo $priority ?>
													<div class='ticket__bubble <?php echo $bubble_color ?>'></div>
												</div>
												<div class='ticket__afdeling'>
													Afdeling: <?php echo $row['department']; ?></div>
												<div class='ticket__date'> <?php echo date_format($date, 'd/m/y H:i:s'); ?></div>
											</div>
										</div>
									</div>
								</a>
							</div>
                        <?php
                        endwhile;
                    endif; ?>
				</div>
			</div>
		</main>
	</div>
</div>
<?php
include 'modules/footer.php';
mysqli_close($link);
?>
