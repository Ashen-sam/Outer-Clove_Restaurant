<?php
include('../db_connection/main_db_con.php');
?>
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;500;600;700;800;900&display=swap');

  * {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;


  }

  body {

    display: flex;
    align-items: center;
    background-color: #FF033E;


    height: 100vh;
    justify-content: center;
  }


  .dash {

    display: flex;
    flex-direction: column;
    padding: 1rem;
    height: 100vh;
    width: 100%;
    justify-content: center;


  }

  .dash a {

    text-decoration: none;
    
    font-size: 2rem;
    color: whitesmoke;
    font-weight: 600;
    padding: 1rem;
    border-radius: 30px;
  }

  .dash a:hover{

    color: gold;
  }

  h1 {

    font-size: 4rem;
    background-color: red;
    padding: 1rem;
    margin-bottom: 2rem;
    color: whitesmoke;
    border-radius: 50px;
  }
</style>
<div class="dash">

      <div style="text-align: center; display:flex;justify-content:center;align-items:center;flex-direction:column;padding:2rem;margin-top:6rem" class="logo-1">
        <h4 style="color: whitesmoke;font-size:1rem;font-weight:400;letter-spacing:1px;display:flex;align-items:center">- Authentic Sri Lankan Cuisine -&nbsp; <img style="width:50px;height:50px" src="../images/restaurant (1).png " alt=""></h4>
        <h4 style="color: whitesmoke;font-size:3.5rem">Outer Clove Restaurant</h4>
       
      </div>
      
  <a href="index.php"> Dashboard</a>
  <a href="manage-admin.php">Manage Administrators</a>
  <a href="manage-food.php"> Manage Foods</a>
  <a href="manage-category.php"> Manage Catergories</a>
  <a href="manage-order.php"> Manage Orders</a>
  <a href="manage-reservation.php"> Manage Reservation</a>
  <a href="logout.php"> logout</a>

</div>
<?php
if (isset($_SESSION['login'])) {
  echo $_SESSION['login'];
  unset($_SESSION['login']);
}
?>