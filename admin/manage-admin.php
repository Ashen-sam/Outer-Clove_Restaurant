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
      height: auto;

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
    }

    table tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    table tr:hover {
      background-color: #ddd;
    }

    table td {
      padding: 1rem;
      font-size: 1.2rem;
    }
  </style>
</head>

<body>



  <div class="admin-page">
    <div style="text-align: center;" class="logo-1">
      <img style="margin-top:1rem;margin-bottom:2rem;width: 1000px; height:180px ;text-align:center;padding:1rem;" src="../images/outer-clove-restaurant-high-resolution-logo-white-transparent (1).png" alt="">
    </div>
    <h1 style="color: #f2f2f2;">Adminsitrators Management</h1>
    <br>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }

    if (isset($_SESSION['delete'])) {
      echo $_SESSION['delete'];
      unset($_SESSION['delete']);
    }
    if (isset($_SESSION['update'])) {
      echo $_SESSION['update'];
      unset($_SESSION['update']);
    }
    if (isset($_SESSION['error'])) {
      echo $_SESSION['error'];
      unset($_SESSION['error']);
    }
    if (isset($_SESSION['not match'])) {
      echo $_SESSION['not match'];
      unset($_SESSION['not match']);
    }
    if (isset($_SESSION['changed'])) {
      echo $_SESSION['changed'];
      unset($_SESSION['changed']);
    }
    ?>
    <br>
    <!-- <a href="add-admin.php"> Add </a> -->

    <table border="1">
      <tr>
        <th>number</th>
        <th>name</th>
        <th>username</th>
        <th>edit</th>
      </tr>
      <?php
      $sql = "SELECT * FROM admin_table";

      $res = mysqli_query($conn, $sql);

      if ($res == TRUE) {
        $count = mysqli_num_rows($res);

        $sn = 1;

        if ($count > 0) {
          while ($rows = mysqli_fetch_assoc($res)) {
            $id = $rows['id'];
            $full_name = $rows['full_name'];
            $username = $rows['username'];

      ?>
            <tr>
              <td><?php echo $sn++; ?></td>
              <td><?php echo $full_name; ?></td>
              <td><?php echo $username; ?></td>
              <td><a style="background-color: yellowgreen; color :whitesmoke" href="<?php echo URL; ?>admin/update-admin.php?id=<?php echo $id; ?>">UPDATE</a>
                <a style="background-color: RED; color :whitesmoke" href="<?php echo URL; ?>admin/delete-admin.php?id=<?php echo $id; ?>"> DELETE </a>
                <a style="background-color: #007FFF;color :whitesmoke" href="<?php echo URL; ?>admin/updatepassword-admin.php?id=<?php echo $id; ?>"> CHANGE PASSWORD </a>
                <!-- <a style="background-color:gold; color:red" id="add" href="<?php echo URL; ?>admin/add-admin.php">Add new Admin</a> -->


              </td>
            </tr>
      <?php
          }
        }
      }
      ?>
    </table>
  <a style="color:black;font-size:1.4rem;background-color:whitesmoke;font-weight:600; padding:0 1rem" href="index.php"> Home</a>
  <a style="background-color:gold; color:red;font-size:1.4rem;" id="add" href="<?php echo URL; ?>admin/add-admin.php">Add new Admin</a>



  </div>

</body>

</html>