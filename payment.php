<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "musicshow";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $nick_name = $_POST["nick_name"];
    $email = $_POST["email"];
    $dob_day = $_POST["dob_day"];
    $dob_month = $_POST["dob_month"];
    $dob_year = $_POST["dob_year"];
    $gender = $_POST["gender"];
    $payment_method = $_POST["pay"]; /
    $card_number = $_POST["card_number"];
    $card_cvc = $_POST["card_cvc"];
    $expiry_month = $_POST["expiry_month"];
    $expiry_year = $_POST["expiry_year"];

    
    $dob = $dob_year . '-' . $dob_month . '-' . $dob_day;

    $sql = "INSERT INTO payments (full_name, nick_name, email, dob, gender, payment_method, card_number, card_cvc, expiry_month, expiry_year)
            VALUES ('$full_name', '$nick_name', '$email', '$dob', '$gender', '$payment_method', '$card_number', '$card_cvc', '$expiry_month', '$expiry_year')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Payment Successfully!!!");';
        echo 'window.location.href = "no Log in.html";</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


$conn->close();
?>
