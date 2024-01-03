<?php
include('nav_footer_files/header.php');
?>
<?php
// Start session if not already started
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// Include necessary files and configurations


// Check for feedback submission success or error messages
if (isset($_SESSION['feedback_success'])) {
    echo $_SESSION['feedback_success'];
    unset($_SESSION['feedback_success']);
}

if (isset($_SESSION['feedback_error'])) {
    echo $_SESSION['feedback_error'];
    unset($_SESSION['feedback_error']);
}

// Process feedback form
if (isset($_POST['submit_feedback'])) {
    // Check for empty fields
    if (empty($_POST['customer_name']) || empty($_POST['customer_email']) || empty($_POST['comments']) ) {
        $_SESSION['feedback_error'] = '<div class="error">All fields are required. Please fill in all the fields.</div>';
        header('location: feedbac_details.php');
        exit();
    }

    // Validate email
    $customer_email = mysqli_real_escape_string($conn, $_POST['customer_email']);
    if (!filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['feedback_error'] = '<div class="error">Invalid email address. Please enter a valid email.</div>';
        header('location: feedback_details.php');
        exit();
    }

    // Process feedback data
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    // $feedback_type = mysqli_real_escape_string($conn, $_POST['feedback_type']);
    $feedback_text = mysqli_real_escape_string($conn, $_POST['comments']);
    // $rating = intval($_POST['rating']); // Convert to integer

    // Insert feedback into the database
    $sql = "INSERT INTO customer_feedback (customer_name, customer_email, feedback_text) VALUES ('$customer_name', '$customer_email', '$feedback_text')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<div style='background-color:RED;text-align:center; position:absolute;top:350px;left:1030px;color:whitesmoke;padding:1rem;font-size:1.3rem;border-radius:10px;'  class='msg'> Successfully sumbitted feedback</div>";
        // $_SESSION['feedback_success'] = '<div style="background-color:red; padding:1rem;color:whitesmoke; 1rem;position:absolute;bottom:180px;border-radius:10px;left:4000px  class="success">Thank you for your feedback!</div>';
        // Redirect or display success message as needed
        // header('location: thank_you.php');
        // exit();
    } else {
        $_SESSION['feedback_error'] = '<div class="error">Feedback submission failed. Please try again.</div>';
        header('location: feedback.php');
        // exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <style>
    .carousel-slide{
        display: none;
    }

    form{
        display: flex;
        flex-direction: column;
        padding: 1rem;
        position: relative;
    }

    input{
        padding: 0.5rem;
    }
    BUTTON{
        padding: 1rem;
        background-color: gold;
        color: WHITE; 
        font-size: 1.3rem;  
        border: none;
        border-radius: 10px;
    }
    label{
        font-size: 1.3rem;
    }
   </style>
</head>

<body>

    <section class="feedback">

        <div style="border: 1px solid red;  display:flex;flex-direction:column" class="container">
        <h2 style="color:red;text-align:center;">Restaurant Feedback</h2>

            <form action="" method="post">
                <label for="customer_name">Your Name:</label>
                <input type="text" name="customer_name" required>

                <label for="customer_email">Your Email:</label>
                <input type="email" name="customer_email" required>

                <!-- <label for="feedback_type">Feedback Type:</label>
                <select style="padding: 0.5rem;" name="feedback_type" required>
                    <option value="compliment">Compliment</option>
                    <option value="complaint">Complaint</option>
                    <option value="suggestion">Suggestion</option>
                </select> -->

                <label for="comments">Comments:</label>
                <textarea name="comments" rows="4" required></textarea>

                <!-- <div class="rating">
                    <input type="radio" id="star5" name="rating" value="5" required>
                    <label for="star5">5 stars</label>
                    <input type="radio" id="star4" name="rating" value="4" required>
                    <label for="star4">4 stars</label>
                    <input type="radio" id="star3" name="rating" value="3" required>
                    <label for="star3">3 stars</label>
                    <input type="radio" id="star2" name="rating" value="2" required>
                    <label for="star2">2 stars</label>
                    <input type="radio" id="star1" name="rating" value="1" required>
                    <label for="star1">1 star</label>
                </div> -->

                <button type="submit" name="submit_feedback">Submit Feedback</button>
                <div class="success"></div>
            </form>

        </div>
    </section>

</body>

</html>
<?php
include('nav_footer_files/footer.php');
?>