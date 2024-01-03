<?php
include('nav_footer_files/header.php');
?>

<div class="container">
    <form action="<?php echo URL; ?>search.php" method="POST">
        <input id="search" type="search" name="search" placeholder="Search for Food.." required>
        <input id="search-btn" type="submit" name="submit" value="Search" class="btn btn-primary">
    </form>
</div>

<section class="categories">
    <h2 class="text-center">Explore Outer Clove Signatures</h2>
    <div class="container">
        <?php
        $sql = "SELECT * FROM category_table";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count > 0) {

            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];

        ?>

                <a href="<?php echo URL; ?>food.php?id=<?php echo $id; ?>">

                    <div class="box-3 ">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                        ?>
                            <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }

                        ?>
                        <h3 class="float-text "><?php echo $title; ?></h3>


                    </div>

                </a>
        <?php
            }
        } else {
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>



<?php
include('nav_footer_files/footer.php');
?>