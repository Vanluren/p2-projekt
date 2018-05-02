<?php

  include_once CONFIG_PATH.'/config.php';

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


  $msg_image = "";

  if (!isset($_POST['picture'])) {

    $image = $_FILES['picture']['name'];

    $upload_folder = ROOT_PATH."/image_upload/";

    $image_path_string = $upload_folder .  $image;

      if (move_uploaded_file($_FILES['picture']['tmp_name'], $upload_folder)) {
    		$msg = "Billedet er tilføjet";
    	}else{
    		$msg = "Billedet blev ikke tilføjet";
    	}
}

 ?>


<div class="row">
  <div class="col-sm-12">
    <div class="image-upload__wrapper">
      <input type="file" name="picture" >
    </div>
  </div>
</div>
