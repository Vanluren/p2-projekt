<?php
// Include config file
require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

    $beskrivelse_string = $_POST['beskrivelse'];
    $lokalisering_string = $_POST['lokalisering'];
    $prioritering_int = $_POST['prioritering'];
    $navn_string = $_POST['navn'];
    $tlf_int = $_POST['telefon'];
    $email_string = $_POST['email'];
    $department_int = $_SESSION['department'];
    $beboer_id_int = $_SESSION['user-id'];
    $addresse_string = $_SESSION['user-address'];
    $image_path_string = '';


    $target_file = UPLOADS_IMAGES_PATH . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!file_exists(UPLOADS_IMAGES_PATH)) {
        mkdir(UPLOADS_IMAGES_PATH, 0777, true);
    }

    $image_path_string = '/uploads/images/' . basename($_FILES["fileToUpload"]["name"]);
    move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

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
    header("Location: ../");
    exit();
}
include 'modules/header.php';
?>

<div class="container">
	<div class="row">
		<div class="col-10 offset-1">
			<div class='col-12 text-center' style='border-top: 1px solid black;'><h2 class='skade__header'>Anmeld
					skade</h2></div>
			<div class='w-100'></div>
			<div class='col-12'>
				<form id="skadeForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
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
						<a href="<?php echo ROOT_PATH ?>" class='btn btn-secondary'>Tilbage</a>
						<button type='button' class='btn btn-success' id='skadeSubmitBtn' data-toggle="modal"
						        data-target="#skadeModal">Send anmeldelse
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade ticket-modal" id="skadeModal" tabindex="-1" role="dialog" aria-labelledby="skadeModalLabel"
     aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Vil du sende skadesanmeldelsen?</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class='container'>
					<div class='col-12'>
						<div class="alert alert-warning modal-alert" role="alert">
							Hvis din henvendelse er akut, bedes du kontakte din vicevært direkte pr. telefon
							på: <?php echo $GLOBALS['vice-tlf']; ?>
						</div>
					</div>
					<div class='w-100'></div>
					<div class='col-12'>
						<h3>Lokalisering:</h3>
						<p id="lokaliseritngOutput"></p>
					</div>
					<div class='col-12'>
						<h3>Beskrivelse:</h3>
						<p id="beskrivelseOuput"></p>
					</div>
					<div class='col-12'>
						<h3>Prioritering:</h3>
						<p id="prioriteringOutput"></p>
					</div>
					<div class='col-12'>
						<h3>Kontaktoplysninger:</h3>
						<div class="kontakt__wrapper">
							<label>
								<span>Fulde navn:</span>
								<p id="navnOutput"></p>
							</label>
							<label>
								<span>Telefonnr.:</span>
								<p id="tlfOuput"></p>
							</label>
							<label>
								<span>Email:</span>
								<p id="emailOutput"></p>
							</label>

						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer ticket-modal__footer">
				<form class='ticket-modal__form' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'
				      method='post'>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Annuller</button>
					<button id='submitSkade' class='btn btn-success' type='button'>Send skadesanmeldelse</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php include 'modules/footer.php'; ?>
