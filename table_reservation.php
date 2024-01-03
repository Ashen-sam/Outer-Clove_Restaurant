<?php
include('nav_footer_files/header.php');


if (isset($_POST['submit'])) {
    $customer = $_POST['full-name'];
    $phone_no = $_POST['contact'];
    $person = $_POST['person'];
    $date = $_POST['reservation-date'];
    $time = $_POST['reservation-time'];
    $message = $_POST['message'];

    $sql2 = "INSERT INTO reservation_table 
             SET customer_name = '$customer',
                 phone_number = '$phone_no',
                 person = '$person',
                 reservation_date = '$date',
                 reservation_time = '$time',
                 message = '$message'";

    $res2 = mysqli_query($conn, $sql2); // Execute the query
    
    if ($res2 == true) {
        // $_SESSION['reservation'] = '<div class="success">Order Added</div>'; 
        echo '<div  style="text-align:center;background-color:gold;color:black;padding:1rem;border-radius:20px;position:absolute;top:270px;left:950px">Order Added Successfully</div>';

        // header('location:' . URL);
        
    } else {
        $_SESSION['reservation'] = '<div class="error">Failed</div>';
        header('location:' . URL);
    }
}
?>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap");

* {
  margin: 0 ;
  padding: 0 ;
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
.carousel-slide {
  display: none;
}
.icons li a {
  background-color: transparent;
  border: none;
}

.reservation{
  background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)),
      url(images/three-col-1-2048x0.jpg);
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
}
h1 {
  color: orange;
  padding: 1rem;
  border: 3px SOLID orange;
  width: 200px;
  text-align: center;
  border-radius: 30px;
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
  border: 1px solid red;
  align-items: center;
  /* background-color: rgb(255, 244, 225); */
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
  border: none;
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
  background-image: url(../images/Lovepik_com-401727686-summer-refreshing-drink.png);
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  padding: 7% 0;
}
/* 
.food-search input[type="search"] {
  padding: 1rem;
  font-size: 1rem;
  border: none;
  border-radius: 5px;
} */

#search{

    padding: 0.7rem;
    width: 400px;
    border-radius: 5px;
    height: 40px;
}

#search-btn{

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
.food-menu {
  background-color: #ececec;
  padding: 4% 0;
}

.food-menu-box {
  width: 450px;
  margin: 1%;
  padding: 2%;
  float: left;
  border: 2px solid orange;
  border-radius: 15px;
}

.food-menu-img {
  width: 20%;
  float: left;
}

.food-menu-desc {
  width: 70%;
  float: left;
  margin-left: 8%;
}

.food-price {
  font-size: 1.2rem;
  margin: 2% 0;
}

.food-detail {
  font-size: 1rem;
  color: #747d8c;
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
  width: 500px;
  margin: 0 auto;
  background-color:#FF033E;
  margin-top: 3rem;
  padding: 1rem;
  border-radius: 30px;
  margin-bottom: 4rem;
  box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
  color: whitesmoke;
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
  color: whitesmoke;
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
<section class="reservation">
    <div class="container">
        <!-- <h2 class="text-center text-white">Fill this form to make a reservation.</h2> -->

        <form action="" method="post" class="order">
            <fieldset>

                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="full name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Number" class="input-responsive" required>

                <div class="order-label">Number of Persons</div>
                <input type="number" name="person" class="input-responsive" value="1" required>

                <div class="order-label">Date</div>
                <input type="date" name="reservation-date" class="input-responsive" required>

                <div class="order-label">Time</div>
                <input type="time" name="reservation-time" class="input-responsive" required>

                <div class="order-label">Additional Message</div>
                <textarea name="message" rows="5" placeholder="Additional message.." class="input-responsive"></textarea>

                <input style="color: white; background-color:GOLD ;border-radius:10px ;width :100%" type="submit" name="submit" value="Confirm " class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<?php
include('nav_footer_files/footer.php');
?>
