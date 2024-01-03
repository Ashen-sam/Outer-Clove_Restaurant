<?php
include('../db_connection/main_db_con.php');

if(isset($_GET['id']) AND isset($_GET['image_name'])){
  $id = $_GET['id'];
  $image_name = $_GET['image_name'];

  if($image_name!=""){
    $path ="../images/food/" .$image_name;
    $delete = unlink($path);

    if($delete==false){
      $_SESSION['delete'] = "Failed";
    header("location:" . URL . 'admin/manage-food.php');

      die();
    }
  }

$sql = "DELETE FROM food_table WHERE id=$id";

$res = mysqli_query($conn,$sql);

if($res==true){
  $_SESSION['remove'] = "Successfull";
  header("location:".URL.'admin/manage-food.php');
}
    else{
      $_SESSION['remove'] = "Failed";
      header("location:".URL.'admin/manage-food.php');
    }
  }

else{
  $_SESSION['unathorize'] = "unathorize";
  header('location:'.URL.'admin/manage-category.php');
}
?>