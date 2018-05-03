<?php
// Include config file
require_once '../config/database.php';

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = 'Udfyld venligst brugernavnet.';
    } else{
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if(empty(trim($_POST['password']))){
        $password_err = 'Udfyld venligst kodeordet.';
    } else{
        $password = trim($_POST['password']);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
      $radio_val = $_POST['radio'];

            // Prepare a select statement
        if ($radio_val == 'vicevaert') {
            $sql = "SELECT username, password, department FROM loginv WHERE username = ?";
        }else {
          $sql = "SELECT username, password, department, id, address FROM loginb WHERE username = ?";

        }


        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
	                if ($radio_val == 'beboer'){
                        mysqli_stmt_bind_result($stmt,$username, $hashed_password, $department, $user_id, $address);
	                }else{
                        mysqli_stmt_bind_result($stmt, $username, $hashed_password, $department);
	                }


                    if(mysqli_stmt_fetch($stmt)){

                        if(password_verify($password, $hashed_password)){
                            /* Password is correct, so start a new session and
                            save the username to the session */

                            session_start();

                            $_SESSION['username'] = $username;
                            $_SESSION['user-type'] = $radio_val;
                            $_SESSION['department'] = $department;
                            $_SESSION['user-id'] = $user_id;
                            $_SESSION['user-address'] = $address;

                            header("Location: ../");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = 'Forkert kodeord.';
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = 'Denne bruger eksisterer ikke.';
                }
            } else{
                echo "Ups... Noget gik galt! Prøv igen senere.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
}

//include 'modules/header.php'
?>

<head>
  <link rel="stylesheet" href="../public/styles/app.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-sm-4 offset-sm-4">
          <div class="login__wrapper">
            <img src="assets/images/nsb_logo.png" class="centerImage" alt="Broomie Logo" width="80%">
              <h2>Login</h2>
              <p>Udfyld dine oplysninger for at logge ind.</p>
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                  <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                      <label>Brugernavn</label>
                      <input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                      <span class="help-block"><?php echo $username_err; ?></span>
                  </div>
                  <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                      <label>Kodeord</label>
                      <input type="password" name="password" class="form-control">
                      <input type="radio" name="radio" value="vicevaert" checked=""> Vicevært<br>
                      <input type="radio" name="radio" value="beboer"> Beboer<br>
                      <span class="help-block"><?php echo $password_err; ?></span>
                  </div>
                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Log ind">
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
include 'modules/footer.php'
?>
