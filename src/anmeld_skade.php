<?php
// Include config file
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $beskrivelse_string = $_POST['beskrivelse'];
    $lokalisering_string = $_POST['lokalisering'];
    $prioritering_int = $_POST['prioritering'];
    $navn_string = $_POST['navn'];
    $tlf_int = $_POST['telefon'];
    $email_string = $_POST['email'];
    $image_path_string = "";
    $department_int = 00;
    $beboer_id_int = 1;
    $addresse_string = "";

    if (isset($_POST['success']) && $_POST['success'] == 'true') {
        $mysqli = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        /* check connection */
        if (!$mysqli) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        $sql_stmt = 'INSERT INTO ticket( beskrivelse_text,
                                         name,
                                         priority,
                                         location,
                                         contact_email,
                                         contact_phone,
                                         picture,
                                         department,
                                         creater_id,
                                         address) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

        $stmt = mysqli_prepare($link, $sql_stmt);

        mysqli_stmt_bind_param($stmt,
            "sssssisiis",
            $beskrivelse_string,
            $navn_string,
            $prioritering_int,
            $lokalisering_string,
            $email_string,
            $tlf_int,
            $image_path_string,
            $department_int,
            $beboer_id_int,
            $addresse_string);


        mysqli_stmt_execute($stmt);
        /* close connection */
        mysqli_close($link);
    }
}
include 'modules/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-10 offset-1">

      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
             method="post"
             enctype="multipart/form-data"
             class="skade__form-wrapper"
      >
        <?php
          include 'modules/lokalisering-input.php';

          include 'modules/beskrivelse-input.php';

          include 'modules/billede-upload.php';

          include 'modules/prioritering-input.php';

          include 'modules/kontakt-oplysninger-input.php'
        ?>
	      <div class='row skade__input-group'>
		      <button type="submit" class='btn btn-success' name="submit">Send anmeldelse</button>
	      </div>
      </form>
    </div>
  </div>
</div>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST'):

	?>
	<!-- Modal -->
	<div class="modal fade ticket-modal in"
	     id="anmeldelseModal"
	     tabindex="-1"
	     role="dialog"
	     aria-labelledby="anmeldelseModal"
	     aria-hidden="false"
	     data-show='true'>
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Send skadesanmeldelse</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class='container-fluid'>
						<div class='row'>
							<div class='col-12'>
								<div class='row'>
									<span class='anmeldelse-modal__header'>Lokalisering: <?php echo $lokalisering_string ?> </span>
								</div>
								<div class='row'><span class='anmeldelse-modal__header'>Beskrivelse</span></div>
								<div class='row'><span class='anmeldelse-modal__header'>Prioritering</span></div>
								<div class='row'><span class='anmeldelse-modal__header'>Kontaktoplysninger</span></div>
								<div class='row'><span class='anmeldelse-modal__header'>Billeder</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer ticket-modal__footer">
					<form class='anmeldelse-modal__form'
					      action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'
					      method='post'>
						<button type='submit' class='btn btn-primary' name='success' value='true'>Ja</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Nej</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php
endif;
include 'modules/footer.php'; ?>
