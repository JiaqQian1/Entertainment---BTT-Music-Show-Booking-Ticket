<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Show Booking Ticket</title>
    <link rel="stylesheet" type="text/css" href="./CSS/profile.css">
    <link rel="shortcut icon" href="images/fav icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>

<body>
  <div class="menu">
    <div class="logo">
        <a href="#">
            <img src="images/logo.png" alt="Logo">
        </a>
    </div>
    <ul>
        <li class="active"><a href="./index.html"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="#"><i class="fa fa-music"></i>Music Shows</a>
            <div class="submenu">
                <ul>
                    <li><a href="./concert.html">Concert</a></li>
                    <li><a href="./liveband.html">Live Band</a></li>
                    <li><a href="./choir.html">Choir</a></li>
                </ul>
            </div>
        </li>
        <li><a href="./shoppingCart.html"><i class="fa fa-hand-o-up"></i>Booking Now</a></li>
        <li><a href="./about us.html"><i class="fa fa-user"></i>About Us</a></li>
        <li><a href="./contact us.html"><i class="fa fa-phone"></i>Contact Us</a></li>
        <li>
            <a href="./User Profile.html">
                <img src="./images/profie picture circle.jpg" alt="Profile Picture">
            </a>
        </li>
    </ul>
</div>

<h1>MY PROFILE</h1>

<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page or handle authentication as needed
    header("Location: ./loginform.html");
    exit();
}

// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = "";     
$database = "musicshow";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user profile data from the database
$sql = "SELECT profiles.* FROM profiles
        JOIN login ON profiles.login_id = login.id
        WHERE login.username = '{$_SESSION['username']}'";

$result = $conn->query($sql);

// Check if there are rows in the result
if ($result->num_rows > 0) {
    // Output data of the logged-in user
    while ($row = $result->fetch_assoc()) {
        echo "<section>";
        echo "<h2>My Account</h2>";
        echo "<div id='account'>";
        echo "<img src='./images/profile picture.jpeg' alt='User Profile Picture'>";
        echo "<div class='account-details'>";
        echo "<h3 class='name'>" . $row["name"] . "</h3>";
        echo "<p class='email'><b>Email: </b>" . $row["email"] . "</p>";
        echo "<p class='contact'><b>Contact Number:</b> " . $row["contact_number"] . "</p>";
        echo "<p class='address'><b>Address:</b> " . $row["address"] . "</p>";
        echo "<p class='gender'><b>Gender:</b>" . $row["gender"] . "</p>";
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }
} else {
    echo "Unavailable User";
}

// Close connection
$conn->close();



$sqlHistory = "SELECT * FROM purchase_history WHERE login_id = (SELECT id FROM login WHERE username = '{$_SESSION['username']}')";
$resultHistory = $conn->query($sqlHistory);

// Check if there are rows in the result
if ($resultHistory->num_rows > 0) {
    echo "<section>";
    echo "<h2>Purchase History</h2>";
    echo "<div id='history'>";
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>No.</th>";
    echo "<th>Music Shows</th>";
    echo "<th>Type</th>";
    echo "<th>Date</th>";
    echo "<th>Time</th>";
    echo "<th>Location</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    // Output data of the purchase history
    while ($rowHistory = $resultHistory->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $rowHistory["id"] . "</td>";
        echo "<td>" . $rowHistory["music_show"] . "</td>";
        echo "<td>" . $rowHistory["show_type"] . "</td>";
        echo "<td>" . $rowHistory["show_date"] . "</td>";
        echo "<td>" . $rowHistory["show_time"] . "</td>";
        echo "<td>" . $rowHistory["show_location"] . "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    echo "</div>";
    echo "</section>";
} else {
    echo "<p>No purchase history available.</p>";
}

?>

<?php @include 'footer.php'; ?>
 <script src="./JS/UserProfile.js"></script>

</body>
</html>
