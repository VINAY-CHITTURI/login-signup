<?php
    $email = $_POST['email'];
    $password = $_POST['password'];

    //connecting to database
    $conn = new mysqli("localhost", "root","", "test");
    if($conn->connect_error){
        die("Failed to connect: ". $conn->connect_error);
    }else{
        $connected = $conn->prepare("select * from users where email = ?");
        $connected->bind_param("s", $email);
        $connected->execute();
        $connection_result = $connected->get_result();
        if($connection_result->num_rows > 0){
            $data = $connection_result->fetch_assoc();
            if(base64_decode($data['password']) === $password){
                $_SESSION['login'] = true;
                header('Location: ' .'http://localhost/testing_php/showsite.html');
            }else{
                echo "<h2>Invalid Email or Password</h2>";
            }
        }else{
            echo "<h2>Invalid Email or Password</h2>";
        }
    }
?>