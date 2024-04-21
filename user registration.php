<?php
session_start();

$namepattern = "/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/";



$name = $_POST['name'];

if (preg_match("/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/", $name)) {
    $_SESSION['user_name'] = $_POST['name'];
    unset($_SESSION['name_error']);
} else {
    $_SESSION['name_error'] = "Invalid name format. Only letters and spaces are allowed.(Example:Binod Rai)";
}

$email = $_POST['email'];
if (preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $_SESSION['user_email'] = $email;
    unset( $_SESSION['email_error']);
} else {
    $_SESSION['email_error'] = "Invalid email format. Please enter a valid email address.";

    // Handle invalid email input
}

$phone = $_POST['phone'];
if (preg_match('/^\d{10}$/', $phone)) {
    $_SESSION['user_phone'] = $phone;
    unset( $_SESSION['phone_error']);
} else {
    $_SESSION['phone_error'] = "Invalid phone number format. Please enter a valid phone number.";
    // Handle invalid phone number input
}


if (isset($_SESSION['name_error']) || isset($_SESSION['email_error']) || isset($_SESSION['phone_error'])) {
    header("Location: user registration form.php");
    exit();
} else {
    header("Location: user password.html");
    exit();
}

?>