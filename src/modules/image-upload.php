<?php
require_once '../../config/config.php';
// File name
$filename = $_FILES['fileToUpload']['name'];
// Location
$location = UPLOADS_IMAGES_PATH.$filename;

// file extension
$file_extension = pathinfo($location, PATHINFO_EXTENSION);
$file_extension = strtolower($file_extension);

// Valid image extensions
$image_ext = array("jpg","png","jpeg","gif");

$response = 0;
if(in_array($file_extension,$image_ext)){
    if (!file_exists(UPLOADS_IMAGES_PATH)) {
        mkdir(UPLOADS_IMAGES_PATH, 0777, true);
    }
    // Upload file
    if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $location)){
        $response = $filename;
    }else{
        $response = 0;
    }
}


echo $response;