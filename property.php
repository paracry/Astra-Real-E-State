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
        /* CSS code to style the image gallery layout */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        .container {
            margin-left: 1vw;
            border: solid 1vh black;
            padding-right: 0%;
            width: 95vw;
            border-radius: 7vh;
            overflow: hidden;
        }

        .side {
            margin-left: vw;
            margin-right: 0%;
            padding-right: 0%;
        }

        #mainImage {
            margin: 1vh;
            height: 92vh;
            width: 50.5vw;
            object-fit: cover;
            border-radius: 5vh;
        }

        .smallImage {
            height: 29vh;
            width: 29vh;
            object-fit: cover;
            margin: 1vh;
            border-radius: 5vh;
        }

        .smallImage:hover {
            filter: brightness(50%);
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
    echo $property_id;
    // Retrieve images from the database
    $sql = "SELECT * FROM property_images where property_id=$property_id";
    $result = $conn->query($sql);

    // Display the image gallery layout
    echo '<div class="container" style="display: flex;">';
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="main" style="flex: 1;">';
        echo '<img src="' . $row['image1'] . '" id="mainImage" style=";">';
        echo '</div>';
        echo '<div class="side" style="flex: 1; display: flex; flex-wrap: wrap;">';
        for ($i = 2; $i <= 10; $i++) {
            echo '<img src="' . $row['image' . $i] . '" class="smallImage" style="cursor: pointer;" onclick="changeImage(\'' . $row['image' . $i] . '\')">';
        }
        echo '</div>';
    }

    echo '</div>';

    $conn->close();
    ?>



</body>

</html>