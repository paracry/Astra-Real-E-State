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
    $state = $_SESSION['state'];
    $area = $_SESSION['area'];
    $website = $_SESSION['website'];
    $experience = $_SESSION['experience'];
    $image = $_SESSION['image'];
    $image = $conn->real_escape_string($image);
    $about = $conn->real_escape_string($_SESSION['about']);
    $address_url = $_SESSION['address_url'];
    $price = $_SESSION['price'];
    $negotiable = $_SESSION['negotiable'];
    $pincode = $_SESSION['pincode'];





    $sql = "INSERT INTO `agent` (`username`, `about`, `phone`, `email`, `password`, `website`, `state`, `area`, `pincode`, `address_url`, `experience`, `price`, `negotiable`, `image`) VALUES ('$full_name', '$about', '$phone_number', '$email', '$password', '$website', '$state', '$area', '$pincode', '$address_url', '$experience', '$price', '$negotiable','$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        $agent_id = mysqli_insert_id($conn);
        $_SESSION["agent_id"] = $agent_id;
        $_SESSION['username']= $full_name;
        header("Location:  agent profile.php?agent_id=$agent_id");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}



?>