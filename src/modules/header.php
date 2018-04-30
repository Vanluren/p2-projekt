<?php
//Vi finder request url'en
$REQ_URI = $_SERVER['REQUEST_URI'];
//deler hvert led ind i et array
$REQ_URI_EXPL = explode('/', $REQ_URI);

//Hvis src findes i array'et, så ved vi at pathen er til en subdir
if(in_array('src',$REQ_URI_EXPL)){
    //Så finder vi hvor fra vi skal fjerne alle subir paths
    $src_index = array_search('src', $REQ_URI_EXPL);
    //så slicer du fra 0 til første subdir path
    $ROOT = array_slice($REQ_URI_EXPL,0, $src_index);
    //vi bygger stien igen
    $ROOT_DIR_PATH = implode('/',$ROOT);

    //og sætter globale variabler
    define('ROOT_PATH',$ROOT_DIR_PATH);
    define('CSS_PATH',$ROOT_DIR_PATH.'/public/styles/app.css');
}else{
    //hvis ikke src findes i arrayet, ved vi at vi er i root-folderen
    //så vi sætter globale variabler til den nuværende sti.
    define('ROOT_PATH',$REQ_URI);
    define('CSS_PATH',$REQ_URI.'/public/styles/app.css');
}
?>
<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
      <link rel="stylesheet" href="<?php echo CSS_PATH; ?>">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Nørresundby boligselskab</title>
</head>

<body>
  <!-- Header container åben -->
  <div class="container-fluid header__container">
    <div class="row">
      <div class="col-sm-4">
        <div class="header-left__container">
            <a href="index.php">
              <img src="<?php echo ROOT_PATH ?>/src/assets/images/nsb_logo.png" class="header-left__image">
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
          <?php include 'vice_header.php' ?>
        </div>
      </div>
    </div>
  </div>
<!-- Header container luk -->
