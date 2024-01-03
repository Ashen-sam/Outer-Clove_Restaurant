<?php
include('nav_footer_files/header.php');
?>

<section style="margin-top: 2rem;background-color:#FAF9F6" class="information">

    <div style="display: flex;width :100%;justify-content:center;gap:3rem;flex-wrap:wrap" class="information-sub">

        <div style="margin-left: 3rem; padding :2rem" class="infromation-para">

            <h4 style="color: grey;">Two simple reasons. One simple Answer.</h2>

                <h4 style="   color: #FF033E;font-size:4rem ">Why Outer Clove ?</h2>
                    <p style="width: 900px; line-height:27px"> Designed to be the Culinary epicenter, We try to uphold the traditions of the Local Household while bringing out the avours of Sri Lanka with a bounty of fresh seasonal ingredients. We take extra care to deliver fresh farm produce to a local classy table cuisine with an emphasis on seasonal & locally sourced ingredients and with the freshest Seafood.</p>
                    <button style="background-color: #FF033E; color : whitesmoke;padding:1rem;border:none;border-radius:10px;margin-top:2rem;font-size:1.3rem">Learn More</button>

        </div>

        <div style="margin-top: 2rem;" class="information-image">

            <img style="width: 600px;height :500px" src="images/pngwing.com (2).png" alt="">
        </div>
    </div>

</section>
<section style="margin-top: 1rem;background-color: #FF033E;padding :2rem " class="information">

    <div style="display: flex;width :100%;justify-content:center;gap:3rem;flex-direction:row-reverse;flex-wrap:wrap" class="information-sub">

        <div style="margin-left: 3rem; padding :2rem" class="infromation-para">

            <h4 style="color: #FAF9F6">We Offer delicious</h2>

                <h4 style="   color: #FAF9F6;font-size:4rem ">Wonderful
                    Flavours</h2>
                    <p style="width: 900px;line-height:27px;color: #FAF9F6;">We want you to sit down and enjoy your meal just like the way you enjoy your homemade dishes! We have embarked on this journey and e are glad that you have taken the time off of your schedule to know our story to experience our experience.</p>
                    <button class="btn-home" style="background-color:  #FAF9F6; color :#FF033E ;padding:1rem;border:none;border-radius:10px;margin-top:2rem;font-size:1.3rem">Tase Flavours</button>

        </div>

        <div class="information-image">

            <img style="width: 530px;height :500px" src="images/california-roll-sushi-pizza-sushi-pizza-makizushi-sushi-a697d90ab17f4ebe0742ef86f0f12f3b.png" alt="">
        </div>
    </div>

</section>
<section class="categories">
    <!-- <h2  class="text-center" style="color: orange   ">- Daily food details -</h2> -->

    <div class="container">

        <?php
        // Display from DB
        $sql = "SELECT * FROM category_table";
        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];

        ?>
                <a href="<?php echo URL; ?>food.php?id=<?php echo $id; ?>">
                    <div class="box-3 float-container">
                        <?php
                        if ($image_name == "") {
                            echo "<div class='msg'> not available </div>";
                        } else {
                        ?>
                            <img src="<?php echo URL; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                        <h3 class="float-text text-white"><?php echo $title; ?></h3>
                    </div>
                </a>
        <?php
            }
        } else {
            echo "<div class='msg'> Failed </div>";
        }
        ?>

        <div class="clearfix"></div>
    </div>
</section>


<?php
if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);

    if (isset($_SESSION['reservation'])) {
        echo $_SESSION['reservation'];
        unset($_SESSION['reservation']);
    }
}
?>




<section class="food-menu">
    <h2 style="font-size:3rem" class="text-center">Outer Clove Specials</h2>

    <div class="container-1">

        <?php
        // Display from DB
        $sql2 = "SELECT * FROM food_table";
        $res2 = mysqli_query($conn, $sql2);

        $count2 = mysqli_num_rows($res2);

        if ($count2 > 0) {
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
                            <img src="<?php echo URL; ?>images/food/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                    </div>

                    <div class="food-menu-desc">
                        <h4 style="font-size: 1.2rem;"><?php echo $title; ?></h4>
                        <p style="color: whitesmoke;" class="food-detail"><?php echo $description; ?></p>
                        <p class="food-price">Rs.<?php echo $price; ?></p>

                        <br>

                        <a style="background-color: gold; color:BLACK       ; padding:1rem; border-radius:10px" id="book" href="<?php echo URL; ?>shop-cart.php?action=add&id=<?php echo $id; ?>&title=<?php echo $title; ?>&price=<?php echo $price; ?>" class="btn btn-primary">Food Basket</a>
                    </div>
                </div>
        <?php

            }
        } else {
            echo "<div class='msg'> not available </div>";
        }
        ?>



        <!-- <div class="clearfix"></div> -->



    </div>

    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
<!-- <section  style="margin-top: 2rem;background-color: #FF033E;margin-bottom:2rem;padding:2rem;" class="information">

    <div style="display: flex;width :100%;justify-content:center;gap:3rem;flex-wrap:wrap" class="information-sub">

        <div style="margin-left: 3rem; padding :2rem" class="infromation-para">

            <h4 style="color: grey;">Two simple reasons. One simple Answer.</h2>

                <h4 style="   color : whitesmoke;font-size:4rem ">Popular Cities</h2>
                    <p style="width: 900px; line-height:27px"> Designed to be the Culinary epicenter, We try to uphold the traditions of the Local Household while bringing out the avours of Sri Lanka with a bounty of fresh seasonal ingredients. We take extra care to deliver fresh farm produce to a local classy table cuisine with an emphasis on seasonal & locally sourced ingredients and with the freshest Seafood.</p>
                    <button style="background-color: #FF033E; color : whitesmoke;padding:1rem;border:none;border-radius:10px;margin-top:2rem;font-size:1.3rem">Learn More</button>

        </div>

      
        <div class="location-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.8321743448223!2d79.84593407468942!3d6.910660993088803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTQnMzguNCJOIDc5wrA1MCc1NC42IkU!5e0!3m2!1sen!2slk!4v1690349688938!5m2!1sen!2slk" width="600" height="450" style="border-radius:10px;border:none" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    </div>

</section> -->

<!-- <div style="display: flex;justify-content:center;gap:2rem;margin-bottom:2rem;" class="promo-section">

    <div style="width: 400px;" class="carousel-slide ">

    </div>
    <div style="width: 400px;" class="carousel-slide ">

</div>
<div style="width: 400px;" class="carousel-slide ">

</div>
  </div> -->

<style>
    #image-first {

        height: 400px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)), url(images/colombo-sri-lanka-12fb929f68f145379077137d65531e81.jpg);
        width: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;
    }

    #image-second {
        height: 400px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)), url(images/aerial-view-of-Galle1.jpg);
        width: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;

    }

    #image-third {

        height: 400px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)), url(images/1bacba85-city-46478-169110981a8.jpg);
        width: 300px;
        background-position: center;
        border-radius: 10px;

        background-repeat: no-repeat;
        background-size: cover;
    }

    #image-fourth {
        height: 400px;
        background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.4)), url(images/street-tour-mob.jpg);
        width: 300px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        border-radius: 10px;

    }
</style>

<section style="width: 100%;display:felx;flex-direction:column;justify-content:center;align-items:center;text-align:center;" class="image-container-main">

    <h2 style="margin: 0;margin-top:2rem">Popular Cities</h2>
    <h4 style="font-weight: 500;">Explore Restaurants in Sri Lanka by locality</h4>



    <div style="display: flex;width:100%;justify-content:center;align-items:center;gap:2rem;margin:2rem 0;flex-wrap:wrap" class="image-sub-box-container">


        <div style="display: flex;justify-content:center;align-items:center" id="image-first" class="image-sub">

            <h2 style="color: whitesmoke;">Colombo</h2>

            <img src="" alt="">
        </div>
        <div style="display: flex;justify-content:center;align-items:center" id="image-second" class="image-sub">

            <h2 style="color: whitesmoke;">Galle</h2>

            <img src="" alt="">
        </div>
        <div style="display: flex;justify-content:center;align-items:center" id="image-third" class="image-sub">

            <h2 style="color: whitesmoke;">Negambo</h2>

            <img src="" alt="">
        </div>
        <div style="display: flex;justify-content:center;align-items:center" id="image-fourth" class="image-sub">

            <h2 style="color: whitesmoke;">Kandy</h2>

            <img src="" alt="">
        </div>
        <!-- <div style="display: flex;justify-content:center;align-items:center" id="image-first" class="image-sub">

   <h2 style="color: whitesmoke;">Colombo</h2>

   <img src="" alt="">
   </div> -->




    </div>
    <p style="text-align: center;display:flex;justify-content:center;padding:0 18rem;margin-bottom:1.5rem">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet quasi non reprehenderit ratione et nostrum earum commodi. Nisi beatae autem exercitationem tempora dolor, nesciunt repellat quibusdam asperiores nostrum ex Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium, suscipit quidem culpa saepe exercitationem nesciunt, quasi dicta cupiditate, pariatur quos error id quis vitae consequuntur iusto necessitatibus facere rem magni Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nostrum modi autem eveniet maxime nesciunt ratione quo quae repellendus ea blanditiis itaque veniam tempore, obcaecati optio incidunt voluptas sequi beatae. Quisquam.</p>
</section>

<?php
include('nav_footer_files/footer.php');
?>