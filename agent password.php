<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);
$full_name = $_SESSION['full_name'];
$email = $_SESSION['email'];
$phone_number = $_SESSION['phone_number'];
$password = $_POST['password'];
$address = $_SESSION['address'];
$website = $_SESSION['website'];
$experience = $_SESSION['experience'];
$image = $_SESSION['image'];
$image = $conn->real_escape_string($image);





$sql = "INSERT INTO `agent` (`username`, `phone`, `email`, `password`, `website`, `address`, `experience`) VALUES ('$full_name', '$phone_number', '$email', '$password', '$website', '$address', '$experience')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form2";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;


}


$conn->close();
?>