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
    $name = $_SESSION['seller_name'];
    $email = $_SESSION['seller_email'];
    $phone = $_SESSION['seller_phone'];
    $address = $_SESSION['seller_address'];


    $sql = "INSERT INTO `seller` (`username`, `email`, `password`, `phone_no`, `address`) VALUES ('$name', '$email', '$password', '$phone', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        header("Location:  seller login.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}






?>