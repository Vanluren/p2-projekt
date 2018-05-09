<?php
/**
 * MYSQL DB INFO:
 */
define('DB_SERVER', '178.62.198.246');
define('DB_USERNAME', 'broomie');
define('DB_PASSWORD', 'broomie');
define('DB_NAME', 'nsb');

/**
 * HER ÅBNES EN CONNECTION TIL DB
 */
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}