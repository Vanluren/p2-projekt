<?php
      define('DB_SERVER', '178.62.198.246');
      define('DB_USERNAME', 'broomie');
      define('DB_PASSWORD', 'broomie');
      define('DB_NAME', 'nsb');

      /* Attempt to connect to MySQL database */
      $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);


        // Prepare a select statement
        if ($_SESSION['user-type'] == 'vicevaert') {

            echo $_SESSION['department'];

            }else {
                $department = $_SESSION['department'];
                $sql = "SELECT name, phone, email, photo FROM loginv WHERE department = $department";
                $result = mysqli_query($link, $sql);

                    while($row = mysqli_fetch_array($result)): ?>
                        <div class='row'>
                            <div class='col-7 offset-1'>
                                <div class='vice-header__wrapper'>
                                    <div class='vice-header__info'><span>Navn:</span><?php echo $row['name']?></div>
                                    <div class='vice-header__info'><span>TLF.:</span><?php echo $row['phone']?></div>
                                    <div class='vice-header__info'><span>Email:</span><?php echo $row['email']?></div>
                                </div>
                            </div>
                            <div class='col-4'>
                                <div class='vice-header__photo'>
                                    <img src="<?php echo ROOT_PATH.'/'.$row['photo']?>" />
                                </div>
                            </div>
                        </div>
<?php
            endwhile;
                      mysqli_close($link);
    }
?>