<?php
    // Include config file
	require_once '../config/config.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
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
        $beboer_id_int= $_SESSION['user-id'];
        $addresse_string = $_SESSION['user-address'];
        $image_path_string = '/uploads/images/'.basename($_FILES["fileToUpload"]["name"]);

        $image_path_string = '/uploads/images/'.basename($_FILES["fileToUpload"]["name"]);
        $target_file = UPLOADS_IMAGES_PATH.basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(!file_exists(UPLOADS_IMAGES_PATH)){
            mkdir(UPLOADS_IMAGES_PATH, 0777, true);
        }
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
            } else {
                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            }
        }

        mysqli_stmt_bind_param( $stmt,
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
		      <a href="<?php echo ROOT_PATH ?>" class='btn btn-secondary'>Tilbage</a>
		      <button type="submit" class='btn btn-success' name="submit">Send anmeldelse</button>
	      </div>
      </form>
    </div>
  </div>
</div>

 <?php include 'modules/footer.php'; ?>
