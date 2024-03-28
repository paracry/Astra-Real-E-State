

<?php
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

$sql = "SELECT name, image FROM lol WHERE id = 1 AND name = 'barapani'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>Name: " . $row["name"] . "</h2>";
        echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
    }
} else {
    echo "0 results";
}

$conn->close();

?>
