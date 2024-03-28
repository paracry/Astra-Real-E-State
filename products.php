<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
$query = "SELECT * FROM lol";
$result = $conn->query($query);

// Display products
while ($row = $result->fetch_assoc()) {
    echo '<div class="product">';
    echo "<h2>Name: " . $row["name"] . "</h2>";
    echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
    echo '</div>';
}
?>