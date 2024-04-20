<?php
$property_id = $_GET['property_id'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "real_estate";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM property_images WHERE property_id=$property_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = mysqli_fetch_assoc($result);
}

for ($i = 1; $i <= 10; $i++) {
    $file_path = $user['image' . $i];
    if (file_exists($file_path)) {
        if (unlink($file_path)) {
            echo 'File deleted successfully.';
        } else {
            echo 'Unable to delete the file.';
        }
    } else {
        echo 'File not found.';
    }
}

$conn->begin_transaction();

$sql = "DELETE FROM property_images WHERE property_id = $property_id";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}





$sql = "DELETE FROM property WHERE property_id = $property_id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    $conn->commit();
    echo '<script>
        // Go back two pages
        window.history.go(-2);
    </script>';
} else {
    echo "Error deleting record: " . $conn->error;
    $conn->rollback();
}

?>