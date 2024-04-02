<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user input
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check user existence
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "User exists in the database. Login successful!";
    session_start();
    $user = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['user_id'];
    //$_SESSION['username'] = $result->fetch_assoc()['username'];
    //$_SESSION['user_id'] = $result->fetch_assoc()['user_id'];
    echo $_SESSION['user_id'] . $_SESSION['username'];
    header("Location : propert form.html");
} else {
    echo "User not found. Please check your credentials.";
}

$conn->close();
?>