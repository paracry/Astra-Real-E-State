<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);


$password = $conn->real_escape_string($_POST['password']);
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    $_SESSION['seller_password_error']= "<p style='color: red;'>Error: Passwords do not match. Please try again.</p>";
    header("Location: seller password form.php");
} else {
    unset($_SESSION['seller_password_error']);
    $name = $conn->real_escape_string($_SESSION['seller_name']);
    $email = $conn->real_escape_string($_SESSION['seller_email']);
    $phone = $conn->real_escape_string($_SESSION['seller_phone']);
    $address = $conn->real_escape_string($_SESSION['seller_address']);


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