<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">


    <script>
        function changeImage(newImage)
        {
            document.getElementById('mainImage').src = newImage;
        }

        function formatIndianCurrency(price)
        {
            return '₹' + new Intl.NumberFormat('en-IN').format(price) + '/-';
        }
    </script>


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
            font-family: 'Amaranth', sans-serif;

            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .header {
            font-family: Arial, sans-serif;
            box-shadow: 0vh 2vh 3vh rgb(90, 0, 169);
            margin-bottom: 4vh;
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
            <?php if ($sellerloggedIn): ?> height: 11vh;
            <?php else: ?> height: 8vh;
            <?php endif;
            ?>box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
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
            font-size: 9vh;
            color: #8000ff;
            text-align: center;

            margin: auto;
            margin-top: 4vh;
            margin-bottom: 4vh;
            width: 25vw;
        }

        .welcomeagent {
            display: inline-block;
            font-size: 6vh;
            color: #8000ff;
            text-align: center;

            margin: auto;
            margin-bottom: 3vh;
            width: 25vw;
        }

        .number {
            font-weight: 100;
            margin-left: 2vw;
        }

        /*agent*/

        .circle {
            box-shadow: 0vh 0vh 5vh #8000ff;
            height: 60vh;
            width: 60vh;
            border-radius: 100vh;
            overflow: hidden;
            display: block;
            margin: auto;

        }

        .profile {
            height: 80vh;
            object-fit: cover;
        }

        .product {
            display: block;
            margin: auto;
            align-content: center;
            text-align: center;
        }

        .agentid {
            margin-bottom: 7vh;
        }

        .price {
            font-size: 8vh;
            text-align: center;
            margin: auto;
            margin-top: 6vh;
        }

        .bath,
        .bed,
        .size {
            font-size: 4vh;
            margin-top: 0%;
        }


        .logo {
            height: 5vh;
            width: auto;
        }

        /*footer*/

        footer {
            background-color: #000000;
            color: #ffffff;
            padding: 20px 0;
            font-size: 2.5vh;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            color: #ffffff;
            background-color: #000000;
        }

        .footer-section {
            flex: 1;
            text-align: center;
        }

        .footer-section h3 {
            color: #c387ff;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin-bottom: 3vh;
        }

        .footer-section a {
            color: #ffffff;
            text-decoration: none;
            transition: 500ms;
            margin-bottom: 2vh;
        }

        .footer-section a:hover {
            color: #b554ff;
            font-size: 4vh;
            transition: 500ms;
        }
    </style>



</head>

<body>

    <section class="header">
        <nav>
            <a href="home.php">Home</a>
            <a href="listing.php">Properties</a>
            <a href="agent listing.php">Agents</a>
            <a href="about.html">About Us</a>
            <a href="#footer">Contact</a>
            <?php if ($userloggedIn): ?>
            <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome User : </a>
            <div class="dropdown">

                <button class="username">
                    <?php echo ucwords($_SESSION['username']); ?>
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
                    <?php echo ucwords($_SESSION['username']); ?>
                </button>
                <div class="dropdown-content">
                    <a class="logout" href="logout.php">Logout</a>
                    <a class="logout" href="products.php">Postings</a><br>
                    <a class="logout" href="property form.html">Add Property</a>
                </div>
            </div>
            <?php elseif ($agentloggedIn): ?>

            <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Agent : </a>
            <div class="dropdown">

                <button class="username">
                    <?php echo ucwords($_SESSION['username']); ?>
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
    <h1 class="welcomeagent">Agent profile</h1>
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

    $agent_id = $_GET['agent_id'];
    $sql = "SELECT * FROM agent where agent_id= $agent_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            echo '<div class="product">';
            echo '<h2 class="agentid">Agent id : '.$row["agent_id"].'</h2>';
            echo '<div class="circle">';
            echo '<img class="profile" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
            echo '</div>';
            echo "<h2 class='price'>".ucwords($row['username'])."</h2><br>";

            echo "<h3 class='bath'>Experience : " . $row["experience"] . " years</h3>";
            echo "<h3 class='bath'>Works in : " . ucwords($row["area"]) .", ". ucwords($row["state"]). "</h3>";
            echo "<h3 class='bath'> website :  <a href='" . $row["website"] . "'>click here</a> </h3><br>";
            echo '</div>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

    <footer id="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Our mission is to provide top-notch real<br> estate services tailored to your needs.</p>
                <p>Learn more about Astra Real Estate <a href="about.html" style="color: #c387ff;">here.</a></p>
            </div>
            <div class="footer-section">
                <h3>Contact Us</h3>
                <p>793001, Jowai road, Astra Building<br>Email: info@astrarealestate.com<br>Phone: 940-256-0551</p>
                <p>Feel free to reach out to us<br>for any inquiries or assistance.</p><br><br>
                <p>&copy; 2024 Astra Real Estate. All rights reserved.</p>
            </div>
            <div class="footer-section">
                <h3>Explore</h3>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="listing.php">Properties</a></li>
                    <li><a href="agent listing.php">Agents</a></li>
                </ul>
            </div>
        </div>
        
    </footer>


</body>

</html>