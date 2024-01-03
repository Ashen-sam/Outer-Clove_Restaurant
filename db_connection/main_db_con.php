<?php

if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
  
define('URL','http://localhost/ashensam-restaurant-outerclove/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','Outer_clove_Database');

$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn));

?>
