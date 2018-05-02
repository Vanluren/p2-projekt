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
        $image_path_string = $_POST['picture'];
        $department_int = 00;
        $beboer_id_int=1;
        $addresse_string = "";
        // $user_type = $_SESSION['user-type'];

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

	var_dump($_POST);
	var_dump($_FILES);
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="skade__form-wrapper" enctype="multipart/form-data">
        <?php
          include 'modules/lokalisering-input.php';

          include 'modules/beskrivelse-input.php';

          include 'modules/billede-upload.php';

          include 'modules/prioritering-input.php';

          include 'modules/kontakt-oplysninger-input.php'
        ?>
				<button type="submit" name="upload">Tilføj billede</button>      </form>
    </div>
  </div>
</div>

 <?php include 'modules/footer.php'; ?>
