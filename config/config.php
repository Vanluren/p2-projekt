<?php
require_once 'paths.php';
require_once 'database.php';
/**
 * MULIGHED FOR BEDRE FEJLBESKEDE
 */
/*ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);*/

session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])){
    header('Location: '.ROOT_PATH.'/src/login.php'); // redirect to login page if user details is not set in sessions
}

