<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

$agent_id=$_SESSION['agent_id'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "<p style='color: red;'>Error: Passwords do not match. Please <a href='javascript:history.go(-1)'>try again</a>.</p>";
    echo "";
} else {
    $full_name = $_SESSION[$agent_id . 'full_name'];
    $email = $_SESSION[$agent_id . 'email'];
    $phone_number = $_SESSION[$agent_id . 'phone_number'];
    $password = $_POST[$agent_id . 'password'];
    $state = $_SESSION[$agent_id . 'state'];
    $area = $_SESSION[$agent_id . 'area'];
    $website = $_SESSION[$agent_id . 'website'];
    $experience = $_SESSION[$agent_id . 'experience'];
    $image = $_SESSION[$agent_id . 'image'];
    $image = $conn->real_escape_string($image);





    $sql = "INSERT INTO `agent` (`username`, `phone`, `email`, `password`, `website`, `state`, `area`, `experience`, `image`) VALUES ('$full_name', '$phone_number', '$email', '$password', '$website', '$state', '$area', '$experience', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully form2";
        header("Location:  agent login.html");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;


    }


    $conn->close();

}



?>