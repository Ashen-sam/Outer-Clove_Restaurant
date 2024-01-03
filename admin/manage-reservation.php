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
    

*{

margin: 0;
padding: 0;
box-sizing: border-box;
}
body{

display: flex;
justify-content: center;
height: 100vh;
}
.admin-page{

height: auto;
margin-top: 3rem;
text-align: center;

}

button{

padding: 1rem;
background-color: rgb(255, 88, 88);
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}

table td{
padding: 3rem;
}

#item{
  width: 100px;
  height: 100px;
}
  </style>
</head>
<body>
    <div class="admin-page">
        <h1>food</h1>
       
        <!-- <a href="add-admin.php"> Add </a> -->

        <?php
        
  if (isset($_SESSION['update'])){
    echo $_SESSION['update'];
    unset($_SESSION['update']);
}
    ?>

        <table border="1">
            <tr>
           
                <th>id</th>
                <th>customer</th>
                <th>phone</th>
                <th>person</th>
                <th>date</th>
                <th>time</th>
                <th>message</th>
                
            </tr>
            <?php
              $sql = "SELECT * FROM reservation_table ORDER BY id DESC"; 

              $res = mysqli_query($conn, $sql);

              // if ($res == TRUE) {
                $count = mysqli_num_rows($res);
              
                $sn = 1;

                if ($count > 0) {
                  while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $customer= $rows['customer_name'];
                    $phone_no= $rows['phone_number'];
                    $person = $rows['person'];
                    $date= $rows['reservation_date'];
                    $time= $rows['reservation_time'];
                    $message = $rows['message'];



                    ?>
                   
                    <tr>
                      

<td><?php echo $sn++; ?></td>
<td><?php echo $customer; ?></td>
<td><?php echo $phone_no; ?></td>
<td><?php echo $person; ?></td>
<td><?php echo $date; ?></td>
<td><?php echo $time; ?></td>
<td><?php echo $message; ?></td>
<td>
  
    <a href="<?php echo URL; ?>admin/delete-reservation.php?id=<?php echo $id; ?>">Delete</a>

</td>

                    </tr>
                   <?php
                    
                  }
                }
                else{
                  echo "<tr><td colspan='12' classs='error'>no orders</td></tr>";
                }
              ?>
            
        </table>
    </div>
</body>
</html>
