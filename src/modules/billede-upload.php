<?php

  include_once CONFIG_PATH.'/config.php';

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


  // Initialize message variable
    $msg = "";

    // If upload button is clicked ...
    if (isset($_POST['upload'])) {
    	// Get image name
    	$image_path_string = $_FILES['image']['name'];

    	// image file directory
    	$target = ASSETS_IMAGES_PATH . "/uploads/".basename($image_path_string);


    	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    		$msg = "Image uploaded successfully";
    	}else{
    		$msg = "Failed to upload image";
    	}
    }

 ?>


<div class="row">
  <div class="col-sm-12">
    <div class="image-upload__wrapper">
      <input type="file" name="image">
    </div>
  </div>
</div>
