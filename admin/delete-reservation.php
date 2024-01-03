<?php
include('../db_connection/main_db_con.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM reservation_table WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res) {
       

        $_SESSION['delete'] = "<div class='success'>Reservation deleted successfully.</div>";
        header('location:' . URL . 'admin/manage-food.php');
    } else {
        $_SESSION['delete'] = "<div class='error'>Failed to delete reservation. Please try again.</div>";
        header('location:' . URL . 'admin/manage-reservation.php');
    }
} else {
    $_SESSION['delete'] = "<div class='error'>Invalid request. Please try again.</div>";
    header('location:' . URL . 'admin/manage-reservation.php');
}
?>
