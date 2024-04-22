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
    $_SESSION['password_error'] = "<p style='color: red;'>Error: Passwords do not match. Please try again.</p>";
    header("Location: user password form.php");
} else {
    unset($_SESSION['password_error']);
    $name = $conn->real_escape_string($_SESSION['user_name']);
    $email = $conn->real_escape_string($_SESSION['user_email']);
    $phone = $conn->real_escape_string($_SESSION['user_phone']);


    $sql = "INSERT INTO `user` (`username`, `email`, `phone`, `password`) VALUES ('$name', '$email', '$phone', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        session_destroy();
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['username'] = $name;
        header("Location: user login.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}






?>