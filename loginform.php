<?php
    session_start(); // Start the session to store user information

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $conn = new mysqli('localhost', 'root', '', 'musicshow');
        if ($conn->connect_error) {
            die('Connection Failed: ' . $conn->connect_error);
        } else {
            $stmt = $conn->prepare("SELECT * FROM login WHERE email = ? AND password = ?");
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Login successful, store user information in the session
                $_SESSION['emial'] = $email;

                // Redirect to a dashboard or home page after successful login
                header('Location: dashboard.php');
                exit();
            } else {
                // Invalid login, show error message
                echo '<script>alert("Invalid username or password.");';
                echo 'window.location.href = "loginform.html";</script>';
            }

            $stmt->close();
            $conn->close();
        }
    }
?>