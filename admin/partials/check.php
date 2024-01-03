<?php
if(!isset($_SESSION['user'])){
  $_SESSION['no_login'] ; 'Log in';
  header("location:" . URL . 'admin/login.php');
}
?>