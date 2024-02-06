<?php include("dbconnection.php"); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="footer.css">
	<title>BTT Music Show Booking Ticket</title>
	<style>

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  .menu img {
    max-width: 100%;
    height: auto;
  }
  
  ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
  }
  
  ul li {
    margin-right: 20px;
  }
  
  ul li a {
    text-decoration: none;
    color: black;
  }
  
  h1 {
    text-align: center;
    color:black;
  }
  
  form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f1f1f1;
    border-radius: 10px;
  }
  
  form p {
    margin: 15px 0;
    color: #333;
    text-align: left;
  }
  
  label {
    display: block;
    font-weight: bold;
  }
  
  input[type="text"],
  input[type="email"],
  input[type="number"],
  textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    box-sizing: border-box;
  }
  
  button {
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #555;
  }

  p{
    color: black;
    text-align: center;
  }
  </style>
</head>
<body>

<?php
    include('header.php');
?>

    <h1>Contact Us</h1>
    <p><strong>Email:</strong> info@bttmusicbooking.com</p>
    <p><strong>Phone:</strong> +60 123-456788</p>

    <form id="contactForm" method="post">
        <p>We'd love to hear from you! If you have any questions, feedback, or need assistance, please reach out to us using the form below or through the contact details provided.</p>
        <p><label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required></p>

        <p><label for="email">Your Email:</label>
        <input type="email" id="email" name="email" required></p>

        <p><label for="message">Your Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea></p>

        <button type="submit">Send Message</button>
</form>

<script>
    document.getElementById("contactForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = new FormData(document.getElementById("contactForm"));

        // Use Fetch API to send an asynchronous POST request
        fetch("save_message.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Handle the response (display a message or take other actions)
            alert(data); // Display an alert with the server response
        })
        .catch(error => {
            console.error("Error:", error);
        });
    });
</script>
</body>
</html>


<p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.7429269377553!2d102.27467687503521!3d2.2497761580224647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d1e56b9710cf4b%3A0x66b6b12b75469278!2sMultimedia%20University!5e0!3m2!1sen!2smy!4v1703397591969!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>

    <?php @include 'footer.php'; ?>
</body> 
</html>
