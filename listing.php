<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Listing</title>
    <?php
    session_start();
    if (isset($_SESSION['user_id'])) {
        // User is logged in
        $loggedIn = true;
    } else {
        // User is not logged in
        $loggedIn = false;
    }
    ?>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;

            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .header {
            background-image: url(images/home.jpeg);
            background-size: cover;
            margin-bottom: 2vh;
            padding: 0vh 2vw;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav {
            display: flex;
            font-size: 3vh;
        }

        nav a {
            margin: 0 1vh;
            text-decoration: none;
            color: #000000;
            padding: 2vh;
            border-radius: 50vh;
        }

        nav a:hover {
            color: white;
            background-color: #8000ff;
        }

        nav button:hover {
            color: white;
            background-color: #8000ff;
        }



        .dropdown {
            position: relative;
            display: inline-block;
            padding: 0%;
        }

        .username {
            color: rgb(0, 0, 0);
            outline: none;
            font-size: 3vh;

            margin-right: 1vw;
            background-color: #ffffff00;
            border: none;
            padding: 2vh;
            border-radius: 50vh;
        }

        .login {
            margin-left: 55svw;
            margin-right: 2vw;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #000000;
            padding: 1vh;
            text-align: center;
            align-items: center;
            margin-top: 1vh;
            min-width: 1vw;
            height: 4vh;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: none;
            border-radius: 20vh;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }


        .logout {
            color: #ff0099;
        }

        .logout:hover {
            background-color: #00000000;
            text-decoration: underline;

        }


        .logged:hover {
            background-color: #00000000;
            color: black;
        }

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
    <section class="header">
        <nav>
            <a href="#">Home</a>
            <a href="listing.php">Properties</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
            <?php if ($loggedIn): ?>
            <a class="logged" style="margin-left: 45vw; margin-right: 0%;">logged in: </a>
            <div class="dropdown">

                <button class="username">
                    <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-content">
                    <a class="logout" href="logout.php">Logout</a>
                </div>
                <?php else: ?>
                <a class="login" href="user login.html">Login</a>
                <?php endif; ?>
        </nav>
    </section>
    <div class="row">
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
                echo '<a href="property.php?property_id=' . $row["property_id"] . '">';
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