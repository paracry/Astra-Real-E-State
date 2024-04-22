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
    $_SESSION['agent_error_password']= "<p style='color: red;'>Error: Passwords do not match. Please try again.</p>";
    header("Location: agent password form.php");
} else {
    unset($_SESSION['agent_error_password']);
    $full_name = $conn->real_escape_string($_SESSION['full_name']);
    $email = $conn->real_escape_string($_SESSION['email']);
    $phone_number = $conn->real_escape_string($_SESSION['phone_number']);
    $password = $conn->real_escape_string($_POST['password']);
    $state = $conn->real_escape_string($_SESSION['state']);
    $area = $conn->real_escape_string($_SESSION['area']);
    $website = $conn->real_escape_string($_SESSION['website']);
    $experience = $conn->real_escape_string($_SESSION['experience']);
    $image = $conn->real_escape_string($_SESSION['image']);
    $image = $conn->real_escape_string($image);
    $about = $conn->real_escape_string($_SESSION['about']);
    $address_url = $conn->real_escape_string($_SESSION['address_url']);
    $price = $conn->real_escape_string($_SESSION['price']);
    $negotiable = $conn->real_escape_string($_SESSION['negotiable']);
    $pincode = $conn->real_escape_string($_SESSION['pincode']);





    $sql = "INSERT INTO `agent` (`username`, `about`, `phone`, `email`, `password`, `website`, `state`, `area`, `pincode`, `address_url`, `experience`, `price`, `negotiable`, `image`) VALUES ('$full_name', '$about', '$phone_number', '$email', '$password', '$website', '$state', '$area', '$pincode', '$address_url', '$experience', '$price', '$negotiable','$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        $agent_id = mysqli_insert_id($conn);
        $_SESSION["agent_id"] = $agent_id;
        $_SESSION['username'] = $full_name;
        header("Location:  agent profile.php?agent_id=$agent_id");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}



?>