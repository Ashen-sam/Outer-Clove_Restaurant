<?php
include('../db_connection/main_db_con.php');

if (isset($_POST['submit'])) {
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  // $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO admin_table SET
       full_name = '$full_name',
       username = '$username',
       password = '$password'
       ";

  $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

  if ($res == TRUE) {
    $_SESSION['add'] = "<div style='text-align:center;background-color:gold;color:black;padding:1rem;border-radius:20px' class='failed'>Added successfully</div>";

  } else {
    $_SESSION['add'] = "Failed";
  }
  header("location:" . URL . 'admin/add-admin.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="add.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    * {
      margin: 0;
      padding: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {

      display: flex;
      justify-content: center;
      height: 100vh;
      background-color: #FF033E;

    }


    form {

      display: flex;
      flex-direction: column;
      margin-top: 10rem;
      border: 1px solid whitesmoke;
      padding: 1rem;
      border-radius: 10px;


    }

    input {

      padding: 0.7rem;
      margin-bottom: 1rem;
    }

    h1 {

      margin-bottom: 1rem;
    }

    .btn {

      background-color: gold;
      color: whitesmoke;
      border: none;
      padding: 1rem;
      font-size: 1.3rem;
    }

    label { 
      color: whitesmoke;
    }
  </style>
</head>

<body>
  <div class="add-admins">
  <div style="text-align: center;" class="logo-1">
      <img style="margin-top:1rem;margin-bottom:2rem;width: 1000px; height:180px ;text-align:center;padding:1rem;" src="../images/outer-clove-restaurant-high-resolution-logo-white-transparent (1).png" alt="">
    </div>
    <?php
    if (isset($_SESSION['add'])) {
      echo $_SESSION['add'];
      unset($_SESSION['add']);
    }
    ?>
    <form action="" method="post">

      <h1 style="color: whitesmoke;text-align:center">Addministrator adding</h1>
      <label for="full_name">Fullname</label>
      <input type="text" name="full_name" placeholder="fullname">
      <label for="username">username</label>
      <input type="text" name="username" placeholder="username"> <!-- Corrected type attribute -->
      <label for="password">Password</label>
      <input type="password" name="password" placeholder="password">
      <input style="color: black;" type="submit" name="submit" value="ADD ADMIN" class="btn">
    </form>
  </div>
</body>

</html>