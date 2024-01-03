<?php

include('../db_connection/main_db_con.php');

session_destroy();

header("location:" . URL . 'admin/login.php');

?>

