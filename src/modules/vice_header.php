<?php
include_once CONFIG_PATH.'/config.php';
    /* Attempt to connect to MySQL database */
      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Prepare a select statement
        if ($_SESSION['user-type'] == 'vicevaert') {

            echo $_SESSION['department'];

            }else {
                $department = $_SESSION['department'];
                $sql = "SELECT name, phone, email, photo FROM loginv WHERE department = $department";
                $result = mysqli_query($link, $sql);

                echo "<table border='0'>
                  <tr>
                  <th>Navn</th>
                  <th>Telefon</th>
                  <th>Email</th>
                  <th>Billede</th>
                  </tr>";

                    while($row = mysqli_fetch_array($result))
                      {

                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo '<td><img src="'.ROOT_PATH.'/'.$row['photo'] . '" /></td>';



                        echo "</tr>";
                      }
                      echo "</table>";


                      mysqli_close($link);

}
