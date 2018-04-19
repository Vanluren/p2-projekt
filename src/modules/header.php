<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <link rel='stylesheet' href='public\styles\header.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	<title>Nørresundby boligselskab</title>
</head>

<body>
  <div class="container-fluid header__container ">

    <div class="header-left__container">
        <a href="index.php">
        <img src="../src/assets/images/nsb_logo.png">
        </a>
    </div>

    <div class="header-mid__container">
      <h2>Velkommen <b><?php echo $_SESSION['username']; ?></h2>
    </div>

    <div class="header-right__container">
      <?php include 'src/modules/right_head.php' ?>
    </div>

  </div>
