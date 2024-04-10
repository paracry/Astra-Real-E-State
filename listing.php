<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Listing</title>
    <style>
        .product {
            display: block;
            place-items: center;
            float: left;
            width: 25vw;
            /* Adjust as needed */
            margin-left: 5.5vw;
            margin-bottom: 8vh;

            border-radius: 10vh;
            box-shadow: 2vh 2vh 2vh rgba(0, 0, 0, 0.662);
            overflow: hidden;

        }

        img {
            display: block;
            height: 40vh;
            width: 25vw;
            align-items: center;
            margin: auto;
            object-fit: cover;

        }

        .product h2 {
            display: inline-block;
            margin: 2vh;
            padding-bottom: 1vh;
            padding-left: 2vh;
            color: black;
        }

        .price {
            font-size: 5vh;

        }
    </style>
</head>

<body>
    <div class="row">
        <p>images</p>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "real_estate";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM property";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<a href=products.php>";
                echo '<div class="product">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
                echo "<h2 class='price'>Price: ₹" . $row['price'] . "/-</h2><br>";
                echo "<h2 class='bed'>" . $row["bed"] . " Bed</h2>";
                echo "<h2 class='bath'>" . $row["bath"] . " Bath</h2>";
                echo "<h2 class='size'>" . $row["size"] . " sqft</h2>";
                echo '</div>';
                echo "</a>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();

        ?>

    </div>
</body>

</html>