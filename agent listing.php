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
        $userloggedIn = true;
        $sellerloggedIn = false;
        $agentloggedIn = false;

    } elseif (isset($_SESSION['seller_id'])) {
        // User is logged in
        $sellerloggedIn = true;
        $userloggedIn = false;
        $agentloggedIn = false;
    } elseif (isset($_SESSION['agent_id'])) {
        // User is logged in
        $agentloggedIn = true;
        $userloggedIn = false;
        $sellerloggedIn = false;
    } else {
        // User is not logged in
        $userloggedIn = false;
        $sellerloggedIn = false;
        $agentloggedIn = false;
    }
    ?>

    <style>
        body {
            margin: 0;
            padding: 0;


            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .header {
            font-family: Arial, sans-serif;
            box-shadow: 0vh 2vh 4vh black;
            margin-bottom: 2vh;
            padding: 1vh 2vw;
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
            margin-left: 48vw;
            margin-right: 2vw;

        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #000000;
            padding: 1%;
            text-align: left;
            align-items: center;
            margin-top: 1vh;
            min-width: 11vw;
            <?php if ($sellerloggedIn): ?>
                height: 11vh;
            <?php else: ?>
                height: 8vh;
            <?php endif; ?>

            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: none;
            border-radius: 20vh;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }


        .logout {
            color: #ff0000;
        }

        .logout:hover {
            color: white;
            background-color: #00000000;
            text-decoration: underline;

        }


        .logged:hover {
            background-color: #00000000;
            color: black;
        }

        .welcome {
            display: inline-block;

            padding: 5vh;
            font-size: 9vh;
            border-radius: 20vh;
            background-color: #8000ff;
            color: rgb(235, 199, 255);
            text-align: center;

            margin: auto;
            margin-top: 3vh;
            margin-bottom: 3vh;
            width: 25vw;

        }

        .available,
        .total {
            margin-left: 6vw;

        }

        .product {
            display: block;
            place-items: center;
            float: left;
            width: 25vw;
            /* Adjust as needed */
            margin-left: 6vw;
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
            <a href="agent listing.php">Agents</a>
            <a href="#">About Us</a>
            <a href="#">Contact</a>
            <?php if ($userloggedIn): ?>
                <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome User : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="products.php">Wishlist</a>
                    </div>
                </div>
            <?php elseif ($sellerloggedIn): ?>
                <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Seller : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="seller listing.php">Postings</a><br>
                        <a class="logout" href="property form.html">Add Property</a>
                    </div>
                </div>
            <?php elseif ($agentloggedIn): ?>

                <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Agent : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="products.php">Profile</a>
                    </div>
                </div>
            <?php else: ?>
                <a class="login" href="user login.html">Login</a>
            <?php endif; ?>
        </nav>
    </section>

    <h1 class="welcome">Astra Real Estate</h1>
    <h2 class="available">Agents available to hire in India</h2>

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


        $sql = "SELECT COUNT(*) as total FROM agent";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_entries = $row['total'];

        echo '<h3 class="total">Agents available : ' . $total_entries . '</h3>';


        $sql = "SELECT * FROM agent";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="agent profile.php?agent_id=' . $row["agent_id"] . '">';
                echo '<div class="product">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
                echo "<h2 class='price'>Name : " . $row['username'] . "</h2><br>";
                echo "<h2 class='bed'>Experience : " . $row["experience"] . " years</h2>";
                echo "<h2 class='bath'>Address: ".$row["area"] ." ". $row["state"] . "</h2>";
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