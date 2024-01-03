<?php
include('../db_connection/main_db_con.php');

$id = $_GET['id'];

$sql = "SELECT * FROM admin_table WHERE id=$id";
$res = mysqli_query($conn, $sql);

if ($res == false) {
    
    header("location:". URL .'admin/manage-admin.php');
    exit();
}

$count = mysqli_num_rows($res);

if ($count == 1) {
    $row = mysqli_fetch_assoc($res);

    $full_name = $row['full_name'];
    $username = $row['username'];
} else {
   
    header("location:". URL .'admin/manage-admin.php');
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
body{

display: flex;
justify-content: center;
align-items: center;
height: 100vh;
}


form{

display: flex;
flex-direction: column;
margin-top: 10rem;


}

input{

padding: 0.7rem;
margin-bottom: 1rem;
}
h1{

margin-bottom: 1rem;
}

.btn{

background-color: RED;
color: whitesmoke;
border: none;
padding: 1rem;
font-size: 1.3rem;
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
            align-items: center;
            height: 100vh;
            background-color: #FF033E;

        }
        label{
            color: whitesmoke;
            font-size: 1.3rem;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 600px;
            border: 1px solid whitesmoke;
            padding: 1rem;
            margin-top: 4rem;
            border-radius: 30px;
            margin-left: 4rem;
        }

        .title {
            font-size: 2rem;
            display: flex;
            justify-content: space-between;
            margin-bottom: 1rem;
        }

        h1 {
            margin-bottom: 2rem;
            color: red;
        }

        #btn {
            background-color: gold;
            padding: 0.8rem;
            font-size: 1.4rem;
            color: black;
            border: none;
            border-radius: 10px;
        }

        #in {
            padding: 1rem;
            font-size: 1rem;
        }

        #item {
            height: 100px;
            width: 100px;
        }
        input{
            font-size: 1.3rem;

        }
    

    </style>
</head>
<body>
    <div class="add-admins">
        <form action="" method="post">
            <h1 style="color: whitesmoke;text-align:center">Update Admin Account</h1>
            <label for="full_name">Admin Fullname</label>
            <input type="text" name="full_name" placeholder="fullname" value="<?php echo $full_name; ?>">
            <label for="username">Admin Username</label>
            <input type="text" name="username" placeholder="username" value="<?php echo $username; ?>">
            
            <input id="btn" type="submit" name="submit" value="Update" class="btn">
        </form>
    </div>

    <?php

    if(isset($_POST['submit'])){
      
      $full_name = $_POST['full_name'];
      $username = $_POST['username'];
     

      $sql = "UPDATE admin_table SET full_name='$full_name', username='$username' WHERE id='$id' ";

      $res = mysqli_query($conn,$sql);

      if($res==true){
        $_SESSION['update'] = 'Success';
        header("location:". URL .'admin/manage-admin.php');
        exit();
      }
      else{
        $_SESSION['update'] = 'Failed';
        header("location:". URL .'admin/manage-admin.php');
        exit();
      }
    }
    ?>
</body>
</html>
