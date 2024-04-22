<?php

session_start();

// Regular expressions for validation
$pattern_name = "/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/";
$pattern_email = "/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/";
$pattern_phone = "/^\d{10}$/";
$pattern_address = "/^[a-zA-Z0-9\s,.'-]{3,}$/";

// Match input data with regular expressions
if (preg_match($pattern_name, $_POST['name'])) {
    $_SESSION['seller_name'] = $_POST['name'];
    unset($_SESSION['seller_error_name']);
} else {
    $_SESSION['seller_error_name'] = "<p style='color:red;'>Invalid name format. Please enter a valid name.</p>";
}

if (preg_match($pattern_email, $_POST['email'])) {
    $_SESSION['seller_email'] = $_POST['email'];
    unset($_SESSION['seller_error_email']);
} else {
    $_SESSION['seller_error_email'] = "<p style='color:red;'>Invalid email format. Please enter a valid email.</p>";
}

if (preg_match($pattern_phone, $_POST['phone'])) {
    $_SESSION['seller_phone'] = $_POST['phone'];
    unset($_SESSION['seller_error_phone']);
} else {
    $_SESSION['seller_error_phone'] = "<p style='color:red;'>Invalid phone number format. Please enter a 10-digit phone number.</p>";
}

if (preg_match($pattern_address, $_POST['address'])) {
    $_SESSION['seller_address'] = $_POST['address'];
    unset($_SESSION['seller_error_address']);
} else {
    $_SESSION['seller_error_address'] = "<p style='color:red;'>Invalid address format. Please enter a valid address.</p>";
}

if (isset($_SESSION['seller_error_name']) || isset($_SESSION['seller_error_email']) || isset($_SESSION['seller_error_phone']) || isset($_SESSION['seller_error_address'])) {
    header("Location: seller registration form.php");
} else {
    header("Location: seller password form.php");
}

?>

?>