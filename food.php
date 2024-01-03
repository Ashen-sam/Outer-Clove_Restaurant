<?php
include('nav_footer_files/header.php');


if(isset($_GET['id'])){
    $category = $_GET['id']; // Change $id to $category
    $sql = "SELECT title FROM category_table WHERE id=$category";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    if($row) {
        $category_title = $row['title'];
    } else {
        $category_title = "Category Not Found";
    }
} else {
    header('location:'.URL);
    exit();
}
?>

<section class="food-search text-center">
    <div class="container">
        <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>
    </div>
</section>

<section class="food-menu">
<h2 class="text-center">Food Menu</h2>

    <div class="container">

        <?php 
        // $sql2 = "SELECT * FROM food_table WHERE category=$category";
        $sql2 = "SELECT * FROM food_table WHERE category=$category"; // Change category to category_id

        $res2 = mysqli_query($conn, $sql2);
        $count2 = mysqli_num_rows($res2);

        if($count2 > 0){
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];

                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name = $row['image_name'];
            ?>
                <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php 
                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                        ?>
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>"
                                alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4><?php echo $title; ?></h4>
                        <p class="food-price">$<?php echo $price; ?></p>
                        <p class="food-detail"><?php echo $description; ?></p>
                        <br>
                    <a href="<?php echo URL; ?>customer_food_order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                    </div>
                </div>
            <?php
            }
        } else {
            echo "<div class='msg'> not available </div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>

<?php
include('nav_footer_files/footer.php');
?>
