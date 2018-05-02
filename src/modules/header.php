<?php
include_once CONFIG_PATH.'/config.php';
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])){
    header('location:src/login.php'); // redirect to login page if user details is not set in sessions
}
?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
      <link rel="stylesheet" href="<?php echo STYLES_PATH?>/app.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Nørresundby Boligselskab</title>
</head>

<?php if ($_SESSION['user-type'] == 'beboer'): ?>
<body class='fixed-nav beboer-footer'>
<?php else: ?>
<body class='fixed-nav sticky-footer'>
<?php endif; ?>
  <!-- Header container åben -->
  <nav class="header__container fixed-top">
		  <div class="row">
			  <div class="col-4">
				  <div class="header-left__container">
					  <a href="<?php ROOT_PATH ?>" class='navbar-brand'>
						  <img src="<?php echo ROOT_PATH; ?>/src/assets/images/logo.svg" class="header-left__image">
					  </a>
				  </div>
			  </div>
			  <div class="<?php echo ($_SESSION['user-type'] == 'beboer' ? 'col-4' : 'col-6'); ?>">
				  <div class="header-mid_container">
					  <h2 class="header-mid__text">Velkommen <span class="header-mid__text--bold"><?php echo $_SESSION['username']; ?></span></h2>
				  </div>
			  </div>
			  <?php if ($_SESSION['user-type'] == 'beboer'):?>
			  <div class="col-4">
				  <div class="header-right__container">
                      <?php include 'vice_header.php' ?>
				  </div>
			  </div>
			  <?php endif; ?>
		  </div>
  </nav>
