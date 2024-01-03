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

    .container{

        width: 100%;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2rem;
        align-items: center;
        height:auto;
    }
</style>

    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo URL?>food_item_search.php" method="POST">
                <input id="search" type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
    <h2 class="text-center">Food Menu</h2>

        <div class="container">


            <?php
        $sql2 = "SELECT * FROM food_table";
        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if($count2>0){
            while ($row = mysqli_fetch_assoc($res2)) {
                $id = $row['id'];
                $title = $row['title'];
                $description = $row['description'];
                $price = $row['price'];
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
                    <h4 style="font-size: 1.2rem; ><?php echo $title; ?></h4>
                    <p class="food-price">$<?php echo $price; ?></p>
                    <p style="color: whitesmoke;" class="food-detail"><?php echo $description; ?></p>
                    <br>

                    <a style="background-color: gold; color:BLACK  ; padding:1rem; border-radius:10px" id="book" href="<?php echo URL; ?>customer_food_order.php?id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>

                    
                </div>
         
            
            </div>

            <?php
                
            }
        }
            else{
                echo "<div class='msg'> not available </div>";
            }
    ?>
            <!-- <div class="clearfix"></div> -->

            

        </div>

    </section>
    
    <?php
include('nav_footer_files/footer.php');
?>