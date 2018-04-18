<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='../src/assets/styles/scss/views/_header.scss'>
	<title>Nørresundby boligselskab</title>

  <div class="container">

    <div style="align-items: left;">
        <a href="index.php">
        <img src="../src/assets/images/nsb_logo.png">
        </a>
    </div>

    <div style="align-items: center;">
      <h2>Velkommen <b><?php echo $_SESSION['username']; ?></h2>
    </div>

    <div style="align-items: right;">
      <?php include 'src/modules/right_head.php' ?>
    </div>

  </div>
