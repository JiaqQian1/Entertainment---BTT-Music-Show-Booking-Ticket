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

  
footer {
  text-align: center;
  padding: 10px;
}

footer p {
  margin: 0; 
}


  </style>
</head>
<body>

<?php
    include('header.php');
?>

<h1>Comment and Rating </h1>

<form id="ratingForm" method="post">
    <p><label for="username">Your Name:</label>
    <input type="text" id="username" name="username" required></p>

    <p><label for="email">Your Email:</label>
    <input type="email" id="email" name="email" required></p>

    <p><label for="rating">Rate Your Experience (1-5):</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required></p>

    <p><label for="comments">Comments:</label>
    <textarea id="comments" name="comments" rows="4" required></textarea></p>

    <p><button type="submit">Submit Feedback</button></p>
</form>
<script>
    document.getElementById("ratingForm").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission

        // Get form data
        var formData = new FormData(document.getElementById("ratingForm"));

        // Use Fetch API to send an asynchronous POST request
        fetch("submitfeedback.php", {
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

<?php @include 'footer.php'; ?>
</body>
</html>