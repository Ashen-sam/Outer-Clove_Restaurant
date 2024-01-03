<?php
include('db_connection/main_db_con.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Outer Clove Restaurant</title>
  <link rel="stylesheet" href="css/ashen.css">
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap");

    .navbar-new {

      background-color: #FF033E;
      padding: 0.4rem;
    }

    .navbar-options {
      width: 100%;
      background-color: #ffd700;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 1rem;
    }


    * {
      margin: 0 0;
      padding: 0 0;
      font-family: "Poppins", sans-serif;
      text-decoration: none;
      list-style: none;
    }

    body {
      overflow-x: hidden;
      width: 100%;
      background-color: whitesmoke;
    }

    .icons {
      background-color: whitesmoke;
      padding: 1.2rem;
    }

    .icons li a {
      background-color: transparent;
      border: none;
    }

    h1 {
      color: orange;
      padding: 1rem;
      border: 3px SOLID orange;
      width: 200px;
      text-align: center;
      border-radius: 30px;
    }

    ul li a {
      color: red;
      font-size: 1rem;
      padding: 1rem;
      border-radius: 20px;
      font-weight: 600;
    }

    footer {

      width: 100%;
      background-color: #FF033E;
      height: 250px;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;

    }

    .footer-details {
      display: flex;
      align-items: center;
      justify-content: space-around;
      padding: 2rem;

    }

    .logo-footer img {

      height: 90px;
      width: 400px;

    }

    .links-footer li a {

      color: whitesmoke;
    }

    .hours-footer {

      color: whitesmoke;
    }

    #titles {
      color: rgb(213, 160, 0);

    }

    li a:hover {
      color: #ff4757;
    }

    #active {
      color: #ff4757;
      font-weight: 800;
    }

    .container-res {
      margin-top: 3rem;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: orange;
    }

    .container-2 {
      width: 100%;
      display: flex;
      align-items: center;
    }

    .container {
      width: 100%;
      margin: 0 auto;
      padding: 1%;
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 2rem;
    }

    .img-responsive {
      width: 100%;
    }

    .img-curve {
      border-radius: 15px;
    }

    .text-center {
      text-align: center;
    }

    .text-left {
      text-align: left;
    }

    .text-white {
      color: white;
    }

    .clearfix {
      clear: both;
      float: none;
    }

    a {
      color: #ff6b81;
      text-decoration: none;
    }

    a:hover {
      color: #ff4757;
    }

    .btn {
      padding: 1%;
      border: none;
      font-size: 1rem;
      border-radius: 5px;
    }

    .btn-primary {
      background-color: yellow;
      color: red;
      cursor: pointer;
      padding: 0.7rem;
      border-radius: 40px;
    }

    .btn-primary:hover {
      color: white;
      background-color: #ff4757;
    }

    h2 {
      color: #2f3542;
      font-size: 2rem;
      margin-bottom: 2%;
    }

    h3 {
      font-size: 1.5rem;
    }

    .float-text {
      bottom: 10px;
      right: 100px;
      font-size: 1rem;
      color: #2f3542;
      padding: 0.4rem;
    }

    fieldset {
      margin: 5%;
      padding: 3%;
      border-radius: 5px;
    }

    /* CSSS for navbar section */

    .logo-1 {
      margin-left: 3rem;
    }

    .links {
      display: flex;
      padding-right: 6rem;
    }

    /* CSS for Food SEarch Section */

    .food-search {
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      padding: 7% 0;
    }


    .carousel-slide {
      width: 100%;
      height: 400px;
      position: relative;
      background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
        url(images/buy-one-get-one-stop.jpg);
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 10px;
      background-size: cover;
      animation: slide 15s infinite;
    }

    @keyframes slide {
      25% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
          url(images/three-col-1-2048x0.jpg);
      }

      50% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
          url(images/Google-Ads-09.jpg);
      }

      75% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
          url(images/lo.jpg);
      }

      100% {
        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
          url(images/c1c6c4bfd75da7da6ac7d4cc1eee17c2.jpg);
      }
    }

    #search {

      padding: 0.7rem;
      width: 400px;
      border-radius: 5px;
      height: 40px;
    }

    #search-btn {

      background-color: #ff4757;
      color: whitesmoke;
      border-radius: 5px;
      font-size: 0.7rem;
    }

    /* CSS for Categories */
    .categories {
      padding: 4% 0;
    }

    .container-1 {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
      width: 100%;
      height: auto;
    }

    .box-3 {
      border-radius: 40px;
      text-align: center;
      position: relative;
    }

    .box-3 img {
      height: 200px;
      width: 200px;
    }

    /* CSS for Food Menu */


    .food-menu-box {
      background-color: #FF033E;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
      border: none;
      width: 200px;
      height: 380px;
      text-align: center;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .food-menu-box:hover {

      background-color: #ff4757;
      cursor: pointer;

    }

    .food-menu-img {
      width: 200px;
      height: 200px;
    }

    .food-menu-img img {

      width: 100%;
      height: 170px;
    }


    .food-menu-desc {
      color: whitesmoke;
      width: 200px;
    }

    /* CSS for Social */
    .social ul {
      list-style-type: none;
    }

    .social ul li {
      display: inline;
      padding: 1%;
    }

    /* for Order Section */
    .order {
      width: 50%;
      margin: 0 auto;
      background-color: rgb(59, 56, 36);
      padding: 1rem;
      border-radius: 20px;
    }

    .input-responsive {
      width: 96%;
      padding: 1%;
      margin-bottom: 3%;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
    }

    .order-label {
      margin-bottom: 1%;
      font-weight: bold;
    }

    .container-3 {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    /* CSS for Mobile Size or Smaller Screen */

    @media only screen and (max-width: 768px) {
      .logo {
        width: 80%;
        float: none;
        margin: 1% auto;
      }

      .menu ul {
        text-align: center;
      }

      .food-search input[type="search"] {
        width: 90%;
        padding: 2%;
        margin-bottom: 3%;
      }

      .btn {
        width: 91%;
        padding: 2%;
      }

      .food-search {
        padding: 10% 0;
      }

      .categories {
        padding: 20% 0;
      }

      h2 {
        margin-bottom: 10%;
      }

      .box-3 {
        width: 100%;
        margin: 4% auto;
      }

      .food-menu {
        padding: 20% 0;
      }

      .food-menu-box {
        width: 90%;
        padding: 5%;
        margin-bottom: 5%;
      }

      .social {
        padding: 5% 0;
      }

      .order {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar Section Starts Here -->
  <section class="navbar">
    <div class="navbar-new">
      <div style="text-align: center; display:flex;justify-content:center;align-items:center;flex-direction:column;padding:2rem" class="logo-1">
        <h4 style="color: whitesmoke;font-size:1rem;font-weight:400;letter-spacing:1px;display:flex;align-items:center">- Authentic Sri Lankan Cuisine -&nbsp; <img style="width:50px;height:50px" src="images/restaurant (1).png" alt=""></h4>
        <h4 style="color: whitesmoke;font-size:3.5rem">Outer Clove Restaurant</h4>

      </div>


    </div>
  </section>
  <div class="navbar-options">
    <div class="menu ">
      <ul class="links">
        <li>
          <a href="<?php echo URL; ?>">Home</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>food-menu.php">Menu</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>Restaurant_gallery.php">Gallery</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>food_category.php">Categories</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>foods.php">Foods</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>table_reservation.php">Reservation</a>
        </li>
        <li>
          <a href="<?php echo URL; ?>Restuarnt_contact.php">Contact</a>
        </li>

        <?php

        if (isset($_SESSION['user_id'])) {

        ?>
          <li>
            <a href="<?php echo URL; ?>customer_logout.php">Logout</a>
          </li>
          <li>
            <a href="<?php echo URL; ?>customer_logout.php">Hi Ashen 🍿</a>
          </li>
        <?php
        } else {

        ?>
          <li>
            <a id="active" href="customer_login.php">Login</a>
          </li>
        <?php
        }
        ?>

      </ul>
    </div>
  </div>