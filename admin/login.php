<?php
include('../db_connection/main_db_con.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

        * {
            margin: 0 0;
            padding: 0 0;
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            list-style: none;
        }

        h1 {
            color: whitesmoke;
        }

        body {

            display: flex;
            flex-direction: column;
            background-color: #FF033E;

            height: 100vh;
        }

        .login {
            margin-bottom: 1rem;

        }

        .container {
            background-color: #FF033E;

            /* background-color: whitesmoke; */
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            height: 300px;
            width: 350px;
            border: 1px solid whitesmoke;
                margin-top: 3rem;

        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            height: 300px;
            justify-content: center;
            gap: 0.4rem;
            padding: 1rem;
            position: relative;
        }

        input {
            padding: 0.5rem;
            margin: 0.5rem;
        }

        form-btn {
            padding: 0.5rem;
            background-color: gold;
            color: red;
            font-size: 1rem;
            border: none;

        }

      

        .success {
            text-align: center;
            /* margin-top: 1.3rem; */
            background-color: red;
            top: 900Px;
            color: whitesmoke;
            border-radius: 10px;
            position: absolute;
            width: 200px;
            padding: 1rem;
            font-size: 1rem;

        }
    </style>
</head>

<body>
<!-- <div style="text-align: center;" class="logo-1">
        <img style="margin-top:4rem;width: 1000px; height:180px ;text-align:center;padding:1rem;" src="../images/outer-clove-restaurant-high-resolution-logo-white-transparent (1).png" alt="">
      </div> -->
      <div style="text-align: center; display:flex;justify-content:center;align-items:center;flex-direction:column;padding:2rem;margin-top:6rem" class="logo-1">
        <!-- <img style="width: 1000px; height:160px ;text-align:center;padding:1rem;" src="images/outer-clove-restaurant-high-resolution-logo-white-transparent (1).png" alt=""> -->
        <h4 style="color: whitesmoke;font-size:1rem;font-weight:400;letter-spacing:1px;display:flex;align-items:center">- Authentic Sri Lankan Cuisine -&nbsp; <img style="width:50px;height:50px" src="../images/restaurant (1).png " alt=""></h4>
        <h4 style="color: whitesmoke;font-size:3.5rem">Outer Clove Restaurant</h4>
        <!-- <h4 style="color: whitesmoke;font-size:0.8rem;font-weight:400;letter-spacing:2px">Bringing the authentic Sri Lankan culinary experience to the Heart of Colombo.</h4> -->
        <!-- <img style="width: 100px; height :100px" src="images/cutlery.png" alt=""> -->
      </div>
    
    <div class="container">

        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if (isset($_SESSION['no-login'])) {
            echo $_SESSION['no-login'];
            unset($_SESSION['no-login']);
        }

        ?>
        <form action="login.php" method="post">
            <h1 style="text-align: center;">Admin Login</h1>
            <div class="form-group">
                <input type="text" placeholder="Username:" name="username" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input style="background-color: gold;
            color   :white;BORDER:NONE;width    :100%" type="submit" value="Login" name="submit" class="btn btn-success">
            </div>
            <!-- <div class="failed"></div> -->
        </form>
    </div>
    <!-- <div><p>Not registered yet <a href="registration.php">Register</a></p></div> -->

</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM admin_table WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $_SESSION['login'] =  "<div style='background-color:red; position:absolute;bottom:150px; padding   :1rem;width :200px;font-size:1rem;text-align:center;color:white;' class='failed'>Success</div>";
        $_SESSION['user'] = $username;
        header("location:" . URL . 'admin/');
    } else {
        $_SESSION['login'] = "<div style='background-color:yellow; position:absolute;bottom:150px; padding   :1rem;width :200px;font-size:1rem;text-align:center;color:black;border:1px solid red' class='faEiled'>Login Failed</div>";
        // header("location:" . URL . 'admin/login.php');
    }
}
?>