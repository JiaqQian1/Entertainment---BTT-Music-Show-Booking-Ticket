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
    color: #fff;
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

<form action="/submit-feedback" method="post">
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
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if form is submitted
    if (isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["rating"]) && isset($_POST["comments"])) {
        // Sanitize and store form data
        $username = htmlspecialchars($_POST["username"]);
        $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $rating = intval($_POST["rating"]);
        $comments = htmlspecialchars($_POST["comments"]);

        // Perform any additional validation if needed

        // Process the data or save it to a database
        // For now, let's just display the submitted data
        echo "<h2>Thank you for your feedback, $username!</h2>";
        echo "<p>Email: $email</p>";
        echo "<p>Rating: $rating/5</p>";
        echo "<p>Comments: $comments</p>";
    } else {
        echo "<p>Form submission is incomplete. Please fill in all required fields.</p>";
    }
}
?>

<?php @include 'footer.php'; ?>
</body>
</html>
