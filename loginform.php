<?php
     $email = $_POST['email'];
     $password = $_POST['password'];

     $con = new mysqli("localhost", "root", "", "musicshow");

     if($con->connect_error)
     {
        die("Failed to connect: ".$con->connect_error);
     }
     else
     {
        $stmt = $con->prepare("select * from login where email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if($stmt_result->num_rows > 0)
        {
            $data = $stmt_result->fetch_assoc();    
            if($data['password'] === $password)
            {
                session_start();
                $_SESSION['username'] = $data['username'];

                echo '<script>alert("Login Successfully!!!");';
                echo 'window.location.href = "no Log in.html";</script>';
            }
            else
            {
                echo '<script>alert("Invalid username and password...");';
                echo 'window.location.href = "loginform.html";</script>';
            }
        }
        else{
            echo '<script>alert("Invalid username and password...");';
                echo 'window.location.href = "loginform.html";</script>';
        }
     }
?>