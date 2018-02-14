<?php
global $_POST;

$input_array = array(
  'username' => $_POST['username'],
  'password' => $_POST['password']
);

$usernamelocal = 'admin';
if ($usernamelocal == $input_array['username']) {
  echo "Du har adgang";
}
else {
  echo "ingen adgang";
}

 ?>
