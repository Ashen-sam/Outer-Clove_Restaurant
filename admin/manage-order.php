<?php
include('../db_connection/main_db_con.php');

// Process the form submission for updating order status
if (isset($_POST['update_status'])) {
    $order_id = $_POST['order_id'];
    $new_status = $_POST['new_status'];

    // Perform the update query based on your database structure
    $update_sql = "UPDATE order_table SET status = '$new_status' WHERE id = $order_id";
    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        $_SESSION['update'] = '<div class="success">Order status updated successfully.</div>';
    } else {
        $_SESSION['update'] = '<div class="error">Failed to update order status.</div>';
    }

    // Redirect to avoid form resubmission on page refresh
    header('location: ' . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<style> 
    
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

    a{
      margin: 1rem;
      color: red;
      padding: 1rem;
      border-radius: 40px;
      text-decoration: none ;
    }
*{

margin: 0;
padding: 0;
box-sizing: border-box;
font-family: 'Poppins', sans-serif;
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
background-color: red;
color: whitesmoke;
}

#add{
  padding: 1rem;
background-color: red;
color: whitesmoke;
}
h1{

margin-bottom: 2rem;
}
table{

  margin-top: 2rem;
}

table td{
padding: 1rem;
font-size: 1.2rem;
}
#item{
 
  width: 100px;
  height: 100px;
}
  </style>
    <!-- Your head content goes here -->
</head>

<body>
    <div class="admin-page">
        <h1>Orders</h1>

        <?php
        if (isset($_SESSION['update'])) {
            echo $_SESSION['update'];
            unset($_SESSION['update']);
        }
        ?>

        <table border="1">
            <tr>
                <!-- Add a new column for order status -->
                <th>id</th>
                <th>food</th>
                <th>price</th>
                <th>qty</th>
                <th>total</th>
                <th>customer</th>
                <th>phone</th>
                <th>address</th>
                <th>date</th>
                <th>status</th>
            </tr>
            <?php
            $sql = "SELECT * FROM order_table ORDER BY id DESC";
            $res = mysqli_query($conn, $sql);

            // Initialize $count
            $count = 0;

            if ($res) {
                $count = mysqli_num_rows($res);
            }

            $sn = 1;

            if ($count > 0) {
                while ($rows = mysqli_fetch_assoc($res)) {
                    $id = $rows['id'];
                    $title = $rows['food'];
                    $price = $rows['price'];
                    $qty = $rows['qty'];
                    $total = $rows['total'];
                    $customer = $rows['customer'];
                    $phone_no = $rows['phone_no'];
                    $address = $rows['address'];
                    $date = $rows['date'];
                    $status = $rows['status']; // Assuming 'status' is the name of your status column

            ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total; ?></td>
                        <td><?php echo $customer; ?></td>
                        <td><?php echo $phone_no; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php echo $date; ?></td>
                        <!-- Display the order status and provide options to update -->
                        <td>
                            <?php echo $status; ?>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <input type="hidden" name="order_id" value="<?php echo $id; ?>">
                                <select name="new_status">
                                    <option value="Processing" <?php echo ($status == 'Processing') ? 'selected' : ''; ?>>Processing</option>
                                    <option value="Dispatched" <?php echo ($status == 'Dispatched') ? 'selected' : ''; ?>>Dispatched</option>
                                    <option value="Delivered" <?php echo ($status == 'Delivered') ? 'selected' : ''; ?>>Delivered</option>
                                </select>
                                <button type="submit" name="update_status">Update Status</button>
                            </form>
                        </td>

                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='12' class='error'>No orders</td></tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>