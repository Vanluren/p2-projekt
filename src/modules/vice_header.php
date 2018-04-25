<?php


  $department = 0;
  $username = $_SESSION['username'];
  $sql_stmt = "SELECT department_b FROM loginb WHERE username = ?";

  define('DB_SERVER', '178.62.198.246');
  define('DB_USERNAME', 'broomie');
  define('DB_PASSWORD', 'broomie');
  define('DB_NAME', 'nsb');

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if($stmt = mysqli_prepare($link, $sql_stmt)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "s", $param_username);

    // Set parameters
    $param_username = $username;

    if(mysqli_stmt_execute($stmt)){

      mysqli_stmt_store_result($stmt);

      if(mysqli_stmt_num_rows($stmt) == 1){

        mysqli_stmt_bind_result($stmt, $department);



        if(mysqli_stmt_fetch($stmt)){

          session_start();

          $_SESSION['department'] = $department;

        }
      }
    }

  }

 ?>

<h2><?php echo $_SESSION?></h2>
