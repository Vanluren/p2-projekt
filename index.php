<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("Location: login/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Broomie - Dashboard</title>
    <link rel="stylesheet" type="text/css" href="login/css/css.css">

</head>
<body>
    <div class="page-header">

        <h1>Hej, <b><?php echo $_SESSION['username']; ?></b>. Velkommen til Broomie!</h1>
    </div>


  <div class="dashwrapper">

    <div class="row">
      <div class="column" style="background-color:#b3caef;">
        <h2>Navigation</h2>
        <p>Some text..</p>
      </div>
      <div class="column" style="background-color:#bbb;">
        <h2>Indmeldt</h2>
        <p>Some text..</p>
      </div>
      <div class="column" style="background-color:#ccc;">
        <h2>Detajler</h2>
        <p>Some text..</p>
      </div>
    </div>

  </div>


    <div id="logout-button">
        <p><a href="login/logout.php" class="btn btn-danger">Log ud</a></p>
    </div>


</body>
</html>
