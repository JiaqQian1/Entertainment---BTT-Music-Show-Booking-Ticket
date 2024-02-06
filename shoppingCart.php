<?php include("dbconnection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTT Music Show Booking Ticket</title>
    <link rel="shortcut icon" href="images/fav icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="./CSS/shoppingCart.css">
    <script src="./JS/shoppingCart.js"></script>
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
                <a href="./loginform.html" class="btn btn-hover">
                    <span>Log in</span>
                </a>
            </li>
            <li>
                <a href="./User Profile.html">
                    <img src="./images/profie picture circle.jpg" alt="Profile Picture">
                </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <header>
            <div class="title">UPCOMING MUSIC SHOW TICKET LIST</div>
            <div class="icon-cart">
                <a href="./wishlist.html">
                    <i class="fa fa-heart-o" aria-hidden="true" id="wish-icon"></i>
                </a>
                <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 15a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0h8m-8 0-1-4m9 4a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-9-4h10l2-7H3m2 7L3 4m0 0-.792-3H1"/>
                </svg>
                <span>0</span>
            </div>
        <div class="cartTab">
            <h2 class="cart-title">Your Shopping Cart</h2>
            <div class="cart-content"></div>
            <div class="total">
                <div class="total-title">Total</div>
                <div class="total-price">RM 0</div>
            </div>
            <button type="button" class="btn-buy">Buy Now</button>
            <button type="close" class="close-cart">Close</button>
        </div>
        </header>

        <section class="sCart-container">
        <div class="mshowList">
            <div class="items">
                <img src="./images/blackpinkconcert.jpg" class="cart-img">
                <div class="product-title">BlackPink Concert</div>
                <div class="price">RM 150</div>
                <button onclick="goToSeat('BlackPink Concert', 150)">Buy Now</button>
            </div>
            <!-- Other music show items here -->
        </div>
    </div>
    </section>
    <div id="seatModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('seatModal')">&times;</span>
            <div class="musicShow-container">
                <label>Confirm your Music Show</label>
                <select id="musicShow" style="width:150px; width:200px;font-size:20px;">
                    <option value="150">BlackPink Concert</option>
                    <!-- Other music show options here -->
                </select>
                <br><br>
                <label>Seat Preview</label>
                <div class="container">
                    <!-- Seat preview layout here -->
                </div>
                <label>Select your Zone</label>
                <select id="musicShow" style="width:150px; width:200px;font-size:20px;">
                    <option value="A">A</option>
                    <!-- Other zone options here -->
                </select>
                <label>Select Seat Number</label>
                <select id="seatSelect" style="width:150px; width:200px;font-size:20px;">
                    <option value="100">100</option>
                    <!-- Other seat number options here -->
                </select>
                <br><br>
                <div class="add-cart">
                    <svg class="w-[40px] h-[40px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 21">
                        <!-- Add to cart icon -->
                    </svg>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
// PHP code for processing shopping cart data and storing in the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to the database
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "music_shows";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO cart (music_show, price, quantity, seat_number, zone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssiss", $music_show, $price, $quantity, $seat_number, $zone);

    // Set parameters and execute
    $music_show = $_POST["music_show"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $seat_number = $_POST["seat_number"];
    $zone = $_POST["zone"];
    $stmt->execute();

    echo "New records created successfully";

    $stmt->close();
    $conn->close();
}
?>
