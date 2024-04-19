<?php
$user_id = $_GET['user_id'];
$property_id = $_GET['property_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "DELETE FROM `wishlist` WHERE user_id=$user_id AND property_id=$property_id";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully form2";
    echo "
    <script>
        window.history.go(-1);
    </script>";

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>