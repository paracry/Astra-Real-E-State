<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);


$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "<p style='color: red;'>Error: Passwords do not match. Please <a href='javascript:history.go(-1)'>try again</a>.</p>";
    echo "";
} else {
    $name = $_SESSION['user_name'];
    $email = $_SESSION['user_email'];
    $phone = $_SESSION['user_phone'];


    $sql = "INSERT INTO `user` (`username`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        session_destroy();
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['username'] = $name;
        header ("Location: user login.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}






?>