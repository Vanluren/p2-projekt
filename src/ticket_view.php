<?php
require_once '../config/config.php';
if(isset($_POST['arkiver'])){
    $ticket_id = $_POST['arkiver'];
    $arkiver_stmt = "UPDATE ticket SET arkiveret=1 WHERE ticket_id=$ticket_id";
    $arkiver_res = mysqli_query($link, $arkiver_stmt);
    if($arkiver_res){
        header("Location: ../");
        exit();
    }
}else{
    $ticket_id = $_GET['ticket'];

    $sql_stmt = "SELECT * from ticket WHERE ticket_id = $ticket_id";

    $result = mysqli_query($link, $sql_stmt);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($link);
}

include 'modules/header.php';
?>
<div class="container-fluid"><!-- <div> Index container-fluid åben -->
	<div class="row"><!-- <div> Index row åben -->
		<!-- Sidebar menu -->
        <?php include 'modules/vice_sidebar-menu.php'; ?>
		<!-- Sidebar luk -->
		<div class="col-sm-9 offset-3">
			<div class="ticket-view">
				<div class='container'>
					<div class='row'>
						<div class='col-12'>
							<h2 class='ticket-view__header'>Oplysninger</h2>
						</div>
						<div class='w-100'></div>
						<div class='col-5'>
							<div class='ticket-view__info'>
								<span class="ticket__date"><?php echo $row['created_at'] ?></span>
								<span class="ticket__header">Navn: <?php echo $row['name'] ?></span>
								<span class="ticket__header">Telefon: <?php echo $row['contact_phone'] ?></span>
								<span class="ticket__header">Email: <?php echo $row['contact_email'] ?></span>
							</div>
						</div>
						<div class='col-4 offset-1'>
							<div class='ticket-view__info'>
								<span class="ticket__header">Afdeling: <?php echo $row['department'] ?></span>
								<span class="ticket__header">Lejlighed: <?php echo $row['address'] ?></span>
								<span class="ticket__header">Prioritering: <?php echo $row['priority'] ?></span>
								<span class="ticket__header">Lokalisering: <?php echo $row['location'] ?></span>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-12'>
							<h2 class='ticket-view__header'>Beskrivelse</h2>
						</div>
						<div class='w-100'></div>
						<div class='col-10'>
							<div class='ticket-view__info'>
								<p class="ticket__text"><?php echo $row['beskrivelse_text']; ?></p>
							</div>
						</div>
					</div>
					<div class='row'>
						<div class='col-12'>
							<h2 class='ticket-view__header'>Billeder</h2>
						</div>
						<div class='w-100'></div>
							<div class='col-3'>
								<div class='ticket-view__image'>
									<img src="http://via.placeholder.com/350x150">
								</div>
							</div>
							<div class='col-3'>
								<div class='ticket-view__image'>
									<img src="http://via.placeholder.com/350x150">
								</div>
							</div>
							<div class='col-3'>
								<div class='ticket-view__image'>
									<img src="http://via.placeholder.com/350x150">
								</div>
							</div>
					</div>
					<div class='row'>
						<div class='col-4 offset-6'>
							<div class='ticket-view__btn-wrapper'>
								<a href="<?php echo ROOT_PATH ?>" class='btn btn-secondary btn-lg'>Tilbage</a>
								<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#exampleModal">Afslut Opgave</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'modules/footer.php'; ?>
<!-- Modal -->
<div class="modal fade ticket-modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Afslut opgave</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<h3>Er du sikker på, at du vil afslutte opgaven?</h3>
				<p>Hvis du afslutter opgaven, vil opgaven blive flyttet til historik.</p>
			</div>
			<div class="modal-footer ticket-modal__footer">
				<form class='ticket-modal__form' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>' method='post'>
					<button type='submit' class='btn btn-primary' name='arkiver' value='<?php echo $ticket_id?>'>Ja</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Nej</button>
				</form>
			</div>
		</div>
	</div>
</div>

