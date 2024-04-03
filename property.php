<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script>
        function changeImage(newImage)
        {
            document.getElementById('mainImage').src = newImage;
        }
    </script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        #mainImage {
            width: 100%;
        }

        .smallImage {
            width: 30%;
            margin: 5px;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <?php
    // Establish connection to MySQL database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "real_estate";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $property_id = $_GET['property_id'];
    // Retrieve images from the database
    $sql = "SELECT * FROM property_images where $property_id";
    $result = $conn->query($sql);

    // Display the image gallery layout
    echo '<div style="display: flex;">';
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div style="flex: 1;">';
        echo '<img src="' . $row['image1'] . '" id="mainImage" style="width: 100%;">';
        echo '</div>';
        echo '<div style="flex: 1; display: flex; flex-wrap: wrap;">';
        for ($i = 2; $i <= 10; $i++) {
            echo '<img src="' . $row['image' . $i] . '" class="smallImage" style="width: 30%; margin: 5px; cursor: pointer;" onclick="changeImage(\'' . $row['image' . $i] . '\')">';
        }
        echo '</div>';
    }

    echo '</div>';

    $conn->close();
    ?>



</body>

</html>