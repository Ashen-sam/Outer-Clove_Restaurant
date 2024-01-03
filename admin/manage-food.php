<?php
include('../db_connection/main_db_con.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/add.css">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a {
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none;
    }

    * {

      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {

      display: flex;
      justify-content: center;
      height: 100vh;
    }

    .admin-page {

      height: auto;
      margin-top: 3rem;
      text-align: center;

    }

    button {

      padding: 1rem;
      background-color: red;
      color: whitesmoke;
    }

    #add {
      padding: 1rem;
      background-color: red;
      color: whitesmoke;
    }

    h1 {

      margin-bottom: 2rem;
    }

    table {

      margin-top: 2rem;
    }

    table td {
      padding: 2rem;
      font-size: 2rem;
    }

    #item {

      width: 100px;
      height: 100px;
    }
  </style>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a {
      margin: 1rem;
      padding: 0.2rem;
      border-radius: 5px;
      text-decoration: none;
      font-size: 1rem;
    }

    * {

      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {

      background-color: #FF033E;
      height: 200vh;

    }

    .admin-page {

      text-align: center;
      display: flex;
      flex-direction: column;
      width: 100%;
      justify-content: center;
      align-items: center;

    }

    button {

      padding: 1rem;
      background-color: red;
      color: whitesmoke;
    }

    #add {
      padding: 1rem;
      background-color: red;
      color: whitesmoke;
    }

    h1 {

      margin-bottom: 2rem;
    }

    table {

      background-color: #ddd;
      border-radius: 5px;
      border: 1px solid grey;
    }

    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tr:hover {
      background-color: #ddd;
    }

    table td {
      padding: 1rem;
      font-size: 1rem;
    }
    tr
    {
      border: 1px solid grey;

    }

  </style>
</head>

<body>
  <div class="admin-page">
    <div style="text-align: center;" class="logo-1">
      <img style="margin-top:1rem;margin-bottom:2rem;width: 1000px; height:180px ;text-align:center;padding:1rem;" src="../images/outer-clove-restaurant-high-resolution-logo-white-transparent (1).png" alt="">
    </div>
    <h1 style="color: whitesmoke;">Food Management</h1>

    <!-- <a href="add-admin.php"> Add </a> -->

    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if (isset($_SESSION['remove'])) {
      echo $_SESSION['remove'];
      unset($_SESSION['remove']);
    }
    if (isset($_SESSION['unathorize'])) {
      echo $_SESSION['unathorize'];
      unset($_SESSION['unathorize']);
    }
    if (isset($_SESSION['upload'])) {
      echo $_SESSION['upload'];
      unset($_SESSION['upload']);
    }
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    ?>

    <table>
      <tr>
        <th>Food Number</th>
        <th>Food Name</th>

        <th>Food Price</th>
        <th>Food Image</th>
        <th>Food Manage</th>
        <!-- <th>instock</th>
                <th>outstock</th> -->
        <th></th>
      </tr>
      <?php
      $sql = "SELECT * FROM food_table";

      $res = mysqli_query($conn, $sql);

      // if ($res == TRUE) {
      $count = mysqli_num_rows($res);

      $sn = 1;

      if ($count > 0) {
        while ($rows = mysqli_fetch_assoc($res)) {
          $id = $rows['id'];
          $title = $rows['title'];
          $price = $rows['price'];
          $image_name = $rows['image_name'];
          $in_stock = $rows['in_stock'];
          $out_stock = $rows['out_stock'];

      ?>

          <tr>
            <td>Food&nbsp; Item<?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>
            <td><?php echo $price; ?></td>
            <td><?php

                if ($image_name != "") {
                ?>
                <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" id="item">

              <?php
                } else {
                  echo "error";
                }
              ?>
            </td>

            <td><a style="background-color: yellowgreen; color :whitesmoke" href="<?php echo URL; ?>admin/update-food.php?id=<?php echo $id; ?>">update </a>
              <a style="background-color: RED; color :whitesmoke" href="<?php echo URL; ?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>">delete</a>
              <a style="background-color:gold; color:red" id="add" href="<?php echo URL; ?>admin/add-food.php">Add</a>


            </td>
          </tr>
      <?php

        }
      } else {
        echo "error";
      }
      ?>

    </table>
    <a style="color:black;font-size:1.4rem;background-color:whitesmoke;font-weight:600; padding:0 1rem" href="index.php"> Home</a>
    <a style="background-color:gold; color:red" id="add" href="<?php echo URL; ?>admin/add-food.php">Add</a>


  </div>
</body>

</html>