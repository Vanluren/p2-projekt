<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("Location: src/login.php");
  exit;
}
?>

<?php
  // Create database connection
  $db = mysqli_connect("178.62.198.246", "broomie", "broomie", "test");

  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST['upload'])) {
  	// Get image name
  	$image = $_FILES['image']['name'];
  	// Get text
  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

  	// image file directory
  	$target = "../uploads/images/".basename($image);

  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
  		$msg = "Billedet er tilføjet";
  	}else{
  		$msg = "Billedet blev ikke tilføjet";
  	}
  }
  $result = mysqli_query($db, "SELECT * FROM images");

  include 'modules/header.php';
?>
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='../uploads/images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>

  <form method="POST" action="image_upload.php" enctype="multipart/form-data">
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image">
  	</div>
  	<div>
      <textarea
      	id="text"
      	cols="40"
      	rows="4"
      	name="image_text"
      	placeholder="Noget forklarende tekst om billedet"></textarea>
  	</div>
  	<div>
  		<button type="submit" name="upload">Tilføj billede</button>
  	</div>
  </form>
</div>

<?php include 'modules/footer.php';?>