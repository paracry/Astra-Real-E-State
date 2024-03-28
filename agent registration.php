<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$companyname = $_POST['companyname'];
$address = $_POST['address'];
$website = $_POST['website'];
$experience = $_POST['experience'];
$photo = $_POST['photo'];

$sql = "INSERT INTO agent (fullname, email, phonenumber, companyname, address, website, experience, photo) 
        VALUES ('$fullname', '$email', '$phonenumber', '$companyname', '$address', '$website', '$experience', '$photo')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>