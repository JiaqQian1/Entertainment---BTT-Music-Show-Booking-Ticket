<?php include("dbconnection.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Show Booking Ticket</title>
    <link rel="stylesheet" href="./CSS/contact us.css"/>
    <link rel="shortcut icon" href="images/fav icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

    <h1>Contact Us</h1>
    <p><strong>Email:</strong> info@bttmusicbooking.com</p>
    <p><strong>Phone:</strong> +60 123-456788</p>

    <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7429269377553!2d102.27467687503521!3d2.2497761580224647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2sMultimedia%20University!5e0!3m2!1sen!2smy!4v1703397591969!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>

    <form action="" method="post">
        <p>We'd love to hear from you! If you have any questions, feedback, or need assistance, please reach out to us using the form below or through the contact details provided.</p>
        <p><label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required></p>

        <p><label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required></p>

        <p><label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea></p>

        <button type="submit">Send Message</button>
    </form>
     
    <?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Process the data (you can add your own logic here, e.g., send an email)
    // For now, let's just display the collected data
    echo "<h2>Thank you for your message, $name!</h2>";
    echo "<p>We will get back to you at $email as soon as possible.</p>";
}
?> 
</body> 
</html>
