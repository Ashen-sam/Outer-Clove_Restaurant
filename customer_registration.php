<?php

include('db_connection/main_db_con.php');

if (isset($_SESSION['registration_success'])) {
    echo $_SESSION['registration_success'];
    unset($_SESSION['registration_success']);
}

if (isset($_SESSION['registration_error'])) {
    echo $_SESSION['registration_error'];
    unset($_SESSION['registration_error']);
}

if (isset($_POST['register'])) {
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['registration_error'] = '<div style="background-color:red; padding:1rem;color:whitesmoke;  1rem;position:absolute;top:180px;border-radius:10px; class="error">All fields are required. Please fill in all the fields.</div>';
        header('location: customer_registration.php');
        exit();
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration_error'] = '<div style="background-color:red; padding:1rem;color:whitesmoke;  1rem;position:absolute;top:180px;border-radius:10px; class="error">Invalid email address. Please enter a valid email.</div>';
        header('location: customer_registration.php');
        exit();
    }

    $min_password_length = 6;
    if (strlen($_POST['password']) < $min_password_length) {
        $_SESSION['registration_error'] = '<div style="background-color:red; padding:1rem;color:whitesmoke;  1rem;position:absolute;top:180px;border-radius:10px; class="error">Password should be at least ' . $min_password_length . ' characters long.</div>';
        header('location: customer_registration.php');
        exit();
    }

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $username_exists = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $email_exists = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($username_exists) > 0) {
        $_SESSION['registration_error'] = '<div style="background-color:red; padding:1rem;color:whitesmoke;  1rem;position:absolute;top:180px;border-radius:10px; class="error">Username already exists. Please choose a different username.</div>';
        header('location: customer_registration.php');
        exit();
    }

    if (mysqli_num_rows($email_exists) > 0) {
        $_SESSION['registration_error'] = '<div style="background-color:red; padding:1rem;color:whitesmoke;  1rem;position:absolute;top:180px;border-radius:10px; class="error">Email already exists.</div>';
        header('location: customer_registration.php');
        exit();
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {

        echo "<div style='background-color:green; position:absolute;top:200px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;'  class='msg'> Successfull</div>";
    } else {

        header('location: customer_registration.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@400;500;600;700;800&display=swap');

        * {
            margin: 0 0;
            padding: 0 0;
            font-family: 'Rethink Sans', sans-serif;
            text-decoration: none;
            list-style: none;
        }

        body {

            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login {
            margin-bottom: 1rem;

        }

        .container {

            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            /* border: 1px solid grey; */

            width: 400px;

        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            height: 300px;
            justify-content: center;
            gap: 0.4rem;
            padding: 1rem;
        }

        input {
            padding: 0.8rem;
            border-radius: 5px;
            outline: none;
            margin: 0.4rem;
            font-size: 1.4rem;

            border: 1px solid grey;
        }

        button {
            padding: 0.5rem;
            background-color: #FFD700;
            color: whitesmoke;
            font-size: 1.5rem;
            border-radius: 10px;
            border: none;
            margin-top: 1rem;

        }

        button:hover {

            background-color: #DAA520;
        }
    </style>
</head>

<body>

    <section class="registration">
        <h2 style="color:Grey;text-align:center;font-size:3rem;">Register 🥪</h2>


        <div class="container">

            <form action="" method="post">
                <input type="text" name="username" placeholder="username" required>

                <input type="email" name="email" placeholder="Email" required>

                <div style="position: relative;">
                    <input style="width: 280px;" type="password" name="password" id="password" placeholder="Password" required>
                    <span style="cursor:pointer;position: absolute; bottom:25px;left:247px" class="toggle-password" onclick="togglePasswordVisibility('password')"><img src="images/eye.png" alt=""></span>
                </div>

                <button type="submit" name="register">Register</button>
                <p style="text-align: center;">Already have an account? <a style="color: red;" href="customer_login.php">Login here</a></p>

            </form>

        </div>
    </section>
    <script>
        function togglePasswordVisibility(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
        }
    </script>
</body>

</html>