<?php
include('nav_footer_files/header.php');
?>
<style>
      .carousel-slide{
        display: none;
    }

    #search{

        width: 500px;
        font-size: 1.2rem;
        padding: 0.3rem;

    }
    .btn{

        background-color: red;
        color: white;
        font-size: 1.2rem;
        border-radius: 5px;
    }
    
</style>

    <section class="food-search text-center">
        

        <?php 
        $search = $_POST['search']; 
         ?>
            <!-- <h2> Foods on <a style="color: red;" href="" class="text-white"><?php echo $search; ?></a></h2> -->
            <form action="food-search.html" method="POST">
                <input id="search" type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
    <h2 style="color: red;" class="text-center"></h2>

        <div class="container">

      

            <?php 
            
            $sql = "SELECT * FROM FOOD_TABLE WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);

            if($count > 0) {
                while($row = mysqli_fetch_assoc($res)) {
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                            if($image_name == ""){
                                echo "<div class='msg'>Not available</div>";
                            } else {
                            ?>
                            <img  src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" id="item" style="width: 200px; height: 180px;">
                            <?php 
                            }
                            ?>
                        </div>
                        <div class="food-menu-desc">
                            <h4 style="font-size: 1.4rem;"><?php echo $title; ?></h4>
                            <p class="food-price">Rs.<?php echo $price; ?></p>
                            <p style="color: whitesmoke;" class="food-detail"><?php echo $description; ?></p>
                            <br>
                            <a style="background-color: gold;" href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div style='transition:5s;color:white;background-color:red;padding:1rem;font-size:1.2rem;border-radius:10px;' class='msg'>The Food that you search is not in the list 🍔 </div>";
            }
            ?>


            <div class="clearfix"></div>

            

        </div>

    </section>
    
    <?php
include('nav_footer_files/footer.php');
?>