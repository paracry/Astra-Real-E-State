<?php
$agent_id = $_GET['agent_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "DELETE FROM agent WHERE agent_id = $agent_id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header("Location: logout.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
