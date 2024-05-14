<?php
$user_id = $_GET['user_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM wishlist WHERE user_id=$user_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $sql = "DELETE FROM wishlist WHERE user_id=$user_id";
    if ($conn->query($sql) === TRUE) {
        echo "wishlist deleted";
    }
}
$sql = "DELETE FROM user WHERE user_id=$user_id";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form2";
    header('Location: users list.php');

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>