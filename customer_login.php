<?php


include('db_connection/main_db_con.php');

if (isset($_SESSION['login_error'])) {
    echo $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}

if (isset($_POST['login'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Please enter both email and password.</div>';
        header('location: customer_login.php');
        exit();
    }

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Invalid email format. Please enter a valid email.</div>';
        header('location: customer_login.php');
        exit();
    }

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($_POST['password'], $row['password'])) {
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            header('location: index.php');
            exit();
        } else {
            $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Incorrect email or password.</div>';



            header('location: customer_login.php');
            exit();
        }
    } else {
        $_SESSION['login_error'] = '<div class="error" style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;top:180px;border-radius:10px; ">Database error. Please try again later.</div>';
        header('location: customer_login.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Outer Clove Login</title>
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

    <section class="login">
        <h2 style="color:Grey;text-align:center;font-size:3rem;">Welcome 🍕 </h2>

        <div class="container">

            <form action="" method="post">
                <input style="width: 280px;" type="email" name="email" placeholder="Email" required>

                <div style="position: relative;">
                    <input style="width: 280px;" type="password" name="password" id="password" placeholder="Password" required>
                    <span style="cursor:pointer;position: absolute; bottom:25px;left:247px" class="toggle-password" onclick="togglePasswordVisibility('password')"><img src="images/eye.png" alt=""></span>
                </div>

                <button type="submit" name="login">Login</button>
                <p>Don't have an account? <a style="color: red;" href="customer_registration.php">Register here</a></p>

            </form>

        </div>
    </section>

</body>
<script>
    function togglePasswordVisibility(passwordFieldId) {
        const passwordField = document.getElementById(passwordFieldId);
        passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
    }
</script>

</html>