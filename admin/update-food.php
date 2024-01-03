<?php
include('../db_connection/main_db_con.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql2 = "SELECT * FROM food_table WHERE id=$id";
    $res2 = mysqli_query($conn, $sql2);

    $count = mysqli_num_rows($res2);

    if ($count == 1) {
        $row2 = mysqli_fetch_assoc($res2);

        $title = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $image_name = $row2['image_name'];
        $category = $row2['category'];
        $in_stock = $row2['in_stock'];
        $out_stock = $row2['out_stock'];
    } 
    else {
        $_SESSION['not-found'] = "Error";
        header("location:" . URL . 'admin/manage-food.php');
    }
} 
else {
    header("location:" . URL . 'admin/manage-food.php');
}

?>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width= , initial-scale=1.0" />
    <title>update food</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

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
    </style>
  </head>
  <body>
    <div class="add-page">
      <form action="" method="post" enctype="multipart/form-data">
        <h1 style="color: whitesmoke; text-align:center">update Food Items</h1>

        <div class="title">
          <label for="title"></label>
          <input id="in" type="text" name="title" placeholder="Title" value="<?php echo $title; ?>">
        </div>
        <div class="title">
          <label for="">description</label>
          <textarea name="description" id="" cols="25" rows="10"><?php echo $description; ?></textarea>

        </div>
        <div class="title">
          <label for="title">Price</label>
          <input id="in" type="text" placeholder="price" name="price" value="<?php echo $price; ?>"/>
        </div>
        <div class="title">
          <label for="title">current image</label>
          <?php 
if($image_name == ""){
    echo "not available";
}
else{
?>
    <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" id="item">
<?php
}
?>
<!-- <input id="submit" name="image" type="text" placeholder="display image" />

          <input id="submit" name="image" type="text" placeholder="display image" /> -->
        </div>
        <div class="title">
                <label for="title">New image</label>
                <input id="in" type="file" name="image">
            </div>
        <div class="title">
          <label for="">catergory</label>
          <select name="catergory" id="">
   
          <?php
        $sql = "SELECT * FROM category_table";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $ctitle = $row['title'];
                $cid = $row['id'];
    ?>
                <option <?php if($category==$cid){ echo "selected"; } ?> value="<?php echo $cid; ?>"><?php echo $ctitle; ?></option>
    <?php
            }
        } else {
    ?>
            <option value="0"> not found </option>
    <?php
        }
    ?>
   
</select>

        </div>
        < <div class="title">
                <label for="title">active</label>
                <input type="radio" name="out_stock" value="yes" <?php if ($out_stock == "yes") {
                                                                        echo "checked";
                                                                    } ?>>yes
                <input type="radio" name="out_stock" value="no" <?php if ($out_stock == "no") {
                                                                        echo "checked";
                                                                    } ?>>no
            </div>
           
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="old_image" value="<?php echo $image; ?>">

        <input  id="btn" name="submit" type="submit" value="update" />
      </form>

     
      <?php
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            // $in_stock = $_POST['in_stock'];
            // $out_stock = $_POST['out_stock'];

            $new_image_name = $_FILES['image']['name'];

            if ($new_image_name != "") {
                $extension = pathinfo($new_image_name, PATHINFO_EXTENSION);
                $new_image_name = "f" . rand(000, 999) . '.' . $extension;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/" . $new_image_name;

                // Handle file upload
                $upload = move_uploaded_file($source_path, $destination_path);

                if (!$upload) {
                    $_SESSION['upload'] = "Failed";
                    header('location:' . URL . 'admin/manage-food.php');
                    die();
                }

                if ($image != "") {
                    $path = "../images/food/" . $image;
                    $delete = unlink($path);

                    if (!$delete) {
                        $_SESSION['failed'] = "error";
                        header('location:' . URL . 'admin/manage-food.php');
                        die();
                    }
                }
            } else {
                $new_image_name = $image;
            }

            // Update image path in the database
            $sql_image = "UPDATE food_table SET image_name='$new_image_name' WHERE id='$id'";
            $res_image = mysqli_query($conn, $sql_image);

            if (!$res_image) {
                $_SESSION['update'] = 'Failed to update image path in the database';
                header("location:" . URL . 'admin/manage-category.php');
                exit();
            }

            // Update other fields in the database
            // $sql2 = "UPDATE food_table SET title='$title', 
            // description='$description',
            // price=$price, 
            // image_name='$image_name',
            // category=$category,
            // in_stock='$in_stock', out_stock='$out_stock' WHERE id='$id'";

            $res2 = mysqli_query($conn, $sql2);

            if ($res2 !== false && mysqli_affected_rows($conn) > 0) {
                $_SESSION['update'] = 'Success';
                header("location:" . URL . 'admin/manage-food.php');
            } else {
                $_SESSION['update'] = 'Failed';
                header("location:" . URL . 'admin/manage-food.php');
            }
        }
        ?>
    </div>
  </body>
</html>