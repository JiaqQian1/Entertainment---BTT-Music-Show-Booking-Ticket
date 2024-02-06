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

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO contact_us (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Successfully saved to the database";
} else {
    echo "Failed to save to the database: " . $conn->error;
}

// Close the database connection
$conn->close();


