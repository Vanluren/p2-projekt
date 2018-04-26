<?php
  $department = 0;
  $username = $_SESSION['username'];


  define('DB_SERVER', '178.62.198.246');
  define('DB_USERNAME', 'broomie');
  define('DB_PASSWORD', 'broomie');
  define('DB_NAME', 'nsb');

  /* Attempt to connect to MySQL database */
  $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

  if($_SESSION['user-type'] == 'beboer'){
    $sql_stmt = "SELECT department FROM loginb WHERE username = ?";
  }else {
    $sql_stmt = "SELECT department FROM loginv WHERE username = ?";
  }
  
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

        // Prepare a select statement
        if ($radio_val == 'vicevaert') {

            echo $_SESSION['department'];

            }else {

                $sql = "SELECT name, phone, email FROM loginv WHERE department_v = $department";
                $result = mysqli_query($link, $sql);


                echo "<table border='0'>
                  <tr>
                  <th>Navn</th>
                  <th>Telefon</th>
                  <th>Email</th>
                  </tr>";

                    while($row = mysqli_fetch_array($result))
                      {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "</tr>";
                      }
                      echo "</table>";


                      mysqli_close($link);

}

 ?>
