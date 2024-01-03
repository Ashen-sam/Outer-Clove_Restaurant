<?php
include('nav_footer_files/header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        .carousel-slide {
            display: none;
        }

        .image-box {

            height: 300px;
            width: 300px;
            border: 1px solid grey;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 5px 15px;
            border-radius: 10px;

        }
        .image-box img{

            width: 100%;
            height: 100%;
        }

        .gallery-container {
            display: flex;
            justify-content: center;
            gap: 3rem;
            align-items: center;
            height: auto;
            flex-wrap: wrap;
            margin: 3rem;

        }
    </style>
</head>

<body>

    <div class="gallery-container">

        <div class="image-box">
            <img src="images/three-col-1-2048x0.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/anna3-thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/ashok2-thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/valasaravakkam5_thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/singapore-5-300x225.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/palakkad-03.jpeg" alt="">
        </div>
        <div class="image-box">
            <img src="images/omr2_thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/mogappair_2_thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/guindy4_thumb.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/bengaluru_thumb1.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/download (1).jpeg" alt="">
        </div>
        <div class="image-box">
            <img src="images/katpadi4.jpg" alt="">
        </div>
        <div class="image-box">
            <img src="images/madiwala_branch03.jpg" alt="">
        </div>

    </div>


</body>

</html>

<?php
include('nav_footer_files/footer.php');
?>