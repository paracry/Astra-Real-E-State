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

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}






?>