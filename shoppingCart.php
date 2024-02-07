<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page
    header("Location: ./loginform.php");
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if form fields are set and not empty
    if (isset($_POST["music_show"]) && isset($_POST["price"]) && isset($_POST["quantity"]) && isset($_POST["seat_number"]) && isset($_POST["zone"])) {
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
    } else {
        echo "All form fields are required";
    }
}
$conn->close();
?>

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
            <li><a href="./shoppingCart.php"><i class="fa fa-hand-o-up"></i>Booking Now</a></li>
            <li><a href="./about us.html"><i class="fa fa-user"></i>About Us</a></li>
            <li><a href="./contact us.html"><i class="fa fa-phone"></i>Contact Us</a></li>
            <li>
                <a href="./logoutform.html" class="btn btn-hover">
                    <span>Log Out</span>
                </a>
            </li>
            <li>
                <a href="./profile.php">
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
                <label>Select your Zone</label>
                <select class="zoneSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('BlackPink Concert', 150)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
                
            </div>

            <div class="items">
                <img src="./images/maneskinliveband.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">Maneskin Live Band</div>
                <div class="price">RM 80</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('Maneskin Live Band', 80)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/viennaboyschoir.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">Vienna Boys Choir</div>
                <div class="price">RM 65</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('Vienna Boys Choir', 65)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/angelazhangconcert.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">Angela Zhang Concert</div>
                <div class="price">RM 165</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('Angela Zhang Concert', 165)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/coldplay.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">ColdPlay Live Band</div>
                <div class="price">RM 55</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('ColdPlay Live Band', 55)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/MARRON5.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">Marron 5 Live Band</div>
                <div class="price">RM 65</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('Marron 5 Live Band', 65)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/thesixteen.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">The Sixteen Choir</div>
                <div class="price">RM 75</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>
                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('The Sixteen Choir', 75)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>

            <div class="items">
                <img src="./images/xuezhiqianconcert.jpg" class="cart-img" style="height: 240px; width: 320px;">
                <div class="product-title">Xue ZhiQian Concert</div>
                <div class="price">RM 200</div>
                <label>Select your Zone</label>
                <select class="musicShow" style="width:150px; width:100px;font-size:20px;">
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
                <br>

                <label>Select Seat Number</label>
                <select class="seatSelect" style="width:150px; width:100px;font-size:20px;">
                    <option value="100">100</option>
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>
                    <option value="104">104</option>
                    <option value="105">105</option>
                    <option value="106">106</option>
                    <option value="107">107</option>
                    <option value="108">108</option>
                    <option value="109">109</option>
                    <option value="110">110</option>
                    <option value="111">111</option>
                    <option value="112">112</option>
                </select>
                <br>
                <button onclick="goToSeat('Xue ZhiQian Concert', 200)">Seat Preview</button>
                <button class="addcart" onclick="addCartClicked(cart-img, product-title, price, zoneSelect, seatSelect)">Add to Cart</button>;
            </div>
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
                    <option value="80">Maneskin Live Band</option>
                    <option value="65">Vienna Boys Choir</option>
                    <option value="165">Angela Zhang Concert</option>
                    <option value="55">ColdPlay Live Band</option>
                    <option value="65">Marron 5 Live Band</option>
                    <option value="75">The Sixteen Choir</option>
                    <option value="200">Xue ZhiQian Concert</option>
                </select>
                <br><br>

                <label>Seat Preview</label>
            <div class="container">
                <div class="stage">STAGE</div>
                <div class="row">
                    <div class="seat">A100</div>
                    <div class="seat">A101</div>
                    <div class="seat">A102</div>
                    <div class="seat">A103</div>
                    <div class="seat">A104</div>
                    <div class="seat">A105</div>
                    <div class="seat">A106</div>
                    <div class="seat">A107</div>
                    <div class="seat">A108</div>
                    <div class="seat">A109</div>
                    <div class="seat">A110</div>
                    <div class="seat">A111</div>
                    <div class="seat">A112</div>
                </div>

                <div class="row">
                    <div class="seat">B100</div>
                    <div class="seat">B101</div>
                    <div class="seat">B102</div>
                    <div class="seat">B103</div>
                    <div class="seat">B104</div>
                    <div class="seat">B105</div>
                    <div class="seat">B106</div>
                    <div class="seat">B107</div>
                    <div class="seat">B108</div>
                    <div class="seat">B109</div>
                    <div class="seat">B110</div>
                    <div class="seat">B111</div>
                    <div class="seat">B112</div>
                </div>

                <div class="row">
                    <div class="seat">C100</div>
                    <div class="seat">C101</div>
                    <div class="seat">C102</div>
                    <div class="seat">C103</div>
                    <div class="seat">C104</div>
                    <div class="seat">C105</div>
                    <div class="seat">C106</div>
                    <div class="seat">C107</div>
                    <div class="seat">C108</div>
                    <div class="seat">C109</div>
                    <div class="seat">C110</div>
                    <div class="seat">C111</div>
                    <div class="seat">C112</div>
                </div>

                <div class="row">
                    <div class="seat">D100</div>
                    <div class="seat">D101</div>
                    <div class="seat">D102</div>
                    <div class="seat">D103</div>
                    <div class="seat">D104</div>
                    <div class="seat">D105</div>
                    <div class="seat">D106</div>
                    <div class="seat">D107</div>
                    <div class="seat">D108</div>
                    <div class="seat">D109</div>
                    <div class="seat">D110</div>
                    <div class="seat">D111</div>
                    <div class="seat">D112</div>
                </div>

                <div class="row">
                    <div class="seat">E100</div>
                    <div class="seat">E101</div>
                    <div class="seat">E102</div>
                    <div class="seat">E103</div>
                    <div class="seat">E104</div>
                    <div class="seat">E105</div>
                    <div class="seat">E106</div>
                    <div class="seat">E107</div>
                    <div class="seat">E108</div>
                    <div class="seat">E109</div>
                    <div class="seat">E110</div>
                    <div class="seat">E111</div>
                    <div class="seat">E112</div>
                </div>
                </div> 

                </div>
            </div>
        </div>
    </div>


</body>
</html>
