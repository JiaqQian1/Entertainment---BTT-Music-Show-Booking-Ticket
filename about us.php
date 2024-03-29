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

  section {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

h2 {
    color: black;
}

p {
    line-height: 1.6;
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
 
<header>
		<h1>About Us</h1>
	</header>

    <section class="mission">
        <h2>Our Mission</h2>
        <p>At BTT Music Show Booking Ticket Website, our mission is to make live music accessible to everyone. We strive to create a community where fans can discover new artists, share their love for music, and secure tickets to the most anticipated shows effortlessly.</p>
       
        <h2>The Experience</h2>
        <p>We understand that attending a live music event is more than just a night out; its a journey filled with emotions, energy, and connection.BTT Music Show Booking Ticket Websiteis designed to enhance this experience, ensuring that every step of your ticket booking process is smooth, transparent, and enjoyable.</p>
   
        <h2>Our Commitment to You</h2>
        <p>We are committed to providing you with:</p>
        <ul>
            <li>User-Friendly Interface: Easily navigate, explore, and secure tickets to your favorite shows.</li>
            <li>Transparency: All information, from ticket prices to venue details, presented in a straightforward manner.</li>
            <li>Secure Transactions: Your security is our priority, ensuring that every transaction is protected.</li>
        </ul>

        <h2>Our Team</h2>
		<ul>
			<li>Teo Pei Xuan - Co-Founder and CEO </li>
			<li>Tan Jia Qian - Head of Operations</li>
			<li>Bock Wen Xin - Creative Director</li>
	</section>
	<?php @include 'footer.php'; ?>
</body>
</html>