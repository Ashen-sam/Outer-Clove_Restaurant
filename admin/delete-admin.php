<?php

include('../db_connection/main_db_con.php');;  

   $id = $_GET ['id'];

   $sql = "DELETE FROM admin_table WHERE id=$id";

   $res = mysqli_query($conn,$sql);

   if($res==true){
    $_SESSION['delete'] = "Success";
    header("location:". URL .'admin/manage-admin.php');
   }
   else{
    $_SESSION['delete'] = "Failed";
    header("location:". URL .'admin/manage-admin.php');
   }
   
?>