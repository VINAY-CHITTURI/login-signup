<?php
    $name     = $_POST['Name'];
    $email    = $_POST['email'];
    $pass     = $_POST['password'];
    $password = base64_encode($pass);
    //database connection
    $conn = new mysqli("localhost", "root","", "test");
    if($conn->connect_error){
        die("Failed to connect: ". $conn->connect_error);
    }else{
        $sql = "INSERT INTO users (id, name, email, password) VALUES (NULL, '$name', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
             echo "Error: " . $sql . "<br>" . $conn->error;
            }      
            $conn->close();
    }
?>