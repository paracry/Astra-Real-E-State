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
    $full_name = $_SESSION['full_name'];
    $email = $_SESSION['email'];
    $phone_number = $_SESSION['phone_number'];
    $password = $_POST['password'];
    $address = $_SESSION['address'];
    $website = $_SESSION['website'];
    $experience = $_SESSION['experience'];
    $image = $_SESSION['image'];
    $image = $conn->real_escape_string($image);





    $sql = "INSERT INTO `agent` (`username`, `phone`, `email`, `password`, `website`, `address`, `experience`, `image`) VALUES ('$full_name', '$phone_number', '$email', '$password', '$website', '$address', '$experience', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        header("Location:  agent login.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}



?>