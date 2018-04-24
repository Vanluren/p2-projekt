<?php
include 'modules/header.php';
?>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <form action="" class="skade__form-wrapper">
      <?php
      include 'modules/lokalisering-input.php';

      include 'modules/beskrivelse-input.php';

      include 'modules/billede-upload.php';

      include 'modules/prioritering-input.php';

      include 'modules/kontakt-oplysninger-input.php'
      ?>
      <input type="submit" value="Send andmeldelse">
      </form>
    </div>
  </div>
</div>

 <?php include 'modules/footer.php'; ?>
