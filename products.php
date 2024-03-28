<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM property";
$result = $conn->query($query);

// Display products
while ($row = $result->fetch_assoc()) {
    echo '<div class="product">';
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
    echo '</div>';
}
?>