<?php include("dbconnection.php"); ?>
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

       <h1>MY PROFILE</h1>

       <button onclick="goToPreferences()">Preferences</button>
       <button onclick="goToNotification()">Notifications Settings</button>
       
      <div id="preferencesModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('preferencesModal')">&times;</span>
            <h1>Preferences Settings</h1>
            <label for="theme">Select Theme:</label>
        <select id="theme">
            <option value="light">Light Theme</option>
            <option value="dark">Dark Theme</option>
            <option value="auto">Auto Theme</option>
        </select>
        <br>
        <label for="language">Select Language:</label>
        <select id="language">
            <option value="english">English</option>
            <option value="chinese">Chinese</option>
            <option value="malay">Malay</option>
            <option value="korean">Korean</option>
            <option value="spanish">Spanish</option>
        </select>
        </div>
      </div>
    
    <div id="notificationModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('notificationModal')">&times;</span>
            
            <h1>Notification Settings</h1>
            <label>
              <input type="checkbox" id="emailNotifications"> Receive Email Notifications
          </label>
          <br>
          <label>
              <input type="checkbox" id="smsNotifications"> Receive SMS Notifications
          </label>
          
      </div>
        </div>
    </div>
        
    
    <br>
    <br>
    <br>
    <br>

    <section>
      <h2>My Account</h2>
      <div id="account">
      <?php
        // Include the database connection
        include("dbconnection.php");

        // Assume user ID is 1 for now, replace it with the actual user ID logic
        $userId = 1;

        // Fetch user data from the database
        $query = "SELECT * FROM profiles WHERE id = $userId";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            echo '<img src="./images/profile picture.jpeg" alt="User Profile Picture">';
            echo '<div class="account-details">';
            echo '<h3 class="name">' . $row['name'] . '</h3>';
            echo '<p class="email"><b>Email: </b>' . $row['email'] . '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">';
            echo '<p class="contact"><b>Contact Number:</b>'.$row[contact_number] '<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
          </svg></p>';
            echo '<p class="address"><b>Address:</b>'$row[address]'<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
          </svg></p>';
          echo '<p class="gender"><b>Gender:</b>'$row[gender]'<svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.3 4.8 2.9 2.9M7 7H4a1 1 0 0 0-1 1v10c0 .6.4 1 1 1h11c.6 0 1-.4 1-1v-4.5m2.4-10a2 2 0 0 1 0 3l-6.8 6.8L8 14l.7-3.6 6.9-6.8a2 2 0 0 1 2.8 0Z"/>
        </svg></p>';
            echo '</div>';
        }
        ?>

      </div>
   </section>

   <section>
      <h2>Purchase History</h2>
      <div id="history">
        <table>
          <thead>
          <tr>
          <th>No.</th>
          <th>Music Shows</th>
          <th>Type</th>
          <th>Date</th>
          <th>Time</th>
          <th>Location</th>
          </tr>
          </thead>

          <tbody>
            <tr>
                <td>New Year Music Show</td>
                <td>Music Show</td>
                <td>15-02-2024</td>
                <td>6:30 pm</td>
                <td>The Sail Melaka</td>
            </tr>
            <tr>
                <td>Bach & Charpentier</td>
                <td>Choir</td>
                <td>08-03-2024</td>
                <td>7:30 pm</td>
                <td>Christ Church Melaka</td>
            </tr>
            <tr>
              <td>BlackPink Concert</td>
              <td>Concert</td>
              <td>15-06-2024</td>
              <td>6:30 pm</td>
              <td>The Sail Melaka</td>
          </tr>
        </tbody>
    </table>
</div>
</section>

 <script src="./JS/UserProfile.js"></script>

</body>
</html>
