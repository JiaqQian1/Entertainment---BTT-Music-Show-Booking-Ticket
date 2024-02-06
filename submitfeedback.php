<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicshow";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST["username"];
$email = $_POST["email"];
$rating = $_POST["rating"];
$comments = $_POST["comments"];

$sql = "INSERT INTO rating (username, email, rating, comments) VALUES ('$username', '$email', '$rating', '$comments')";

if ($conn->query($sql) === TRUE) {
    echo "Successfully saved to the database";
} else {
    echo "Failed to save to the database: " . $conn->error;
}

// Close the database connection
$conn->close();


