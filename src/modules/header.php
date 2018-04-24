<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
      <link rel="stylesheet" href="./public/styles/app.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<title>Nørresundby boligselskab</title>
</head>

<body>
  <!-- Header container åben -->
  <div class="container-fluid header__container">
      <div class="col-sm-4">
        <div class="header-left__container">
            <a href="index.php">
              <img src="src/assets/images/nsb_logo.png" class="header-left__image">
            </a>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="header-mid_container">
          <h2 class="header-mid__text">Velkommen <span class="header-mid__text--bold"><?php echo $_SESSION['username']; ?></span></h2>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="header-right__container">
          <?php include 'src/modules/vice_header.php' ?>
        </div>
      </div>
  </div>
<!-- Header container luk -->
