<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product Listing</title>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">

    <script>
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
        $adminloggedIn = false;

    } elseif (isset($_SESSION['seller_id'])) {
        // User is logged in
        $sellerloggedIn = true;
        $userloggedIn = false;
        $agentloggedIn = false;
        $adminloggedIn = false;
    } elseif (isset($_SESSION['agent_id'])) {
        // User is logged in
        $agentloggedIn = true;
        $userloggedIn = false;
        $sellerloggedIn = false;
        $adminloggedIn = false;
    } elseif (isset($_SESSION['admin_id'])) {
        // User is logged in
        $adminloggedIn = true;
        $agentloggedIn = false;
        $userloggedIn = false;
        $sellerloggedIn = false;
    } else {
        // User is not logged in
        $userloggedIn = false;
        $sellerloggedIn = false;
        $agentloggedIn = false;
        $adminloggedIn = false;
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
            padding: 1vh;
            text-align: left;
            align-items: center;
            margin-top: .5vh;
            min-width: 9vw;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
            z-index: none;
            border-radius: 5vh;
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
            font-size: 5vh;
            color: #8000ff;
            text-align: center;

            margin: auto;
            margin-bottom: 3vh;
            width: 25vw;
        }

        /*top bar ends here*/

        /*filter*/

        .editbutton {
            padding: 2vh;
            margin: 5vh;

            font-size: 3vh;
            width: 10vw;
            text-align: center;
            background-color: rgb(0, 173, 90);
            color: rgb(255, 255, 255);
            border-radius: 20vh;
            transition: 500ms;
            text-decoration: none;
            box-shadow: 1vh 1vh 2vh #000000;
        }

        .editbutton:hover {
            background-color: rgb(0, 102, 78);
            color: white;
            cursor: pointer;
            font-size: 3vh;
            padding-left: 3vw;
            padding-right: 3vw;
            transition: 500ms;

        }

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(255, 255, 255);
            padding: 5vh;
            font-size: 3vh;
            box-shadow: 2vh 2vh 2vh #000000;
            z-index: 1000;
            transition: 500ms;
            border-radius: 10vh;
        }

        .popup-content {
            text-align: left;
            transition: 500ms;
        }

        .close {
            color: #ff0000;
            float: right;
            font-size: 6vh;
            font-weight: bold;
            margin-top: -6vh;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.41);
            z-index: 999;
        }

        .field {
            height: 5vh;
            border-radius: 2vh;
            border-color: #8000ff;
        }

        /*property details*/

        .available,
        .total {
            margin-left: 6vw;

        }

        .product {
            display: block;
            place-items: center;
            float: left;
            width: 30vw;
            height: 68vh;
            /* Adjust as needed */
            margin-left: 2vw;
            margin-bottom: 8vh;

            border-radius: 10vh;
            box-shadow: 2vh 2vh 2vh #5000a1a9;
            overflow: hidden;
            transition: 500ms;

        }



        img {
            display: block;
            height: 40vh;
            width: 30vw;
            align-items: center;
            margin: auto;
            object-fit: cover;
            transition: 500ms;
            margin-bottom: 0%;

        }


        .product h2 {
            display: inline-block;
            margin: 1vh;
            padding-left: 2vh;
            color: black;
            transition: 500ms;
        }



        .details {
            padding-top: 0%;
            padding-bottom: 20vh;
            font-size: 2.2vh;
            margin-left: 2vh;
        }

        .price {
            font-size: 5vh;
        }

        img:hover {
            height: 60vh;
            object-fit: cover;
            transition: 500ms;
            margin-bottom: 0%;
        }

        .product:hover {
            background-color: #0dff000c;
            font-size: 0vh;
            transition: 500ms;
            box-shadow: 2vh 2vh 2vh #09ff0093;
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

        /*end*/

        .end {
            margin-left: 2vw;
            margin-bottom: 5vh;
            font-size: 3vh;
        }

        .endbutton {
            background-color: #8000ff;
            color: white;
            padding: 2vh;
            border-radius: 10vh;
            box-shadow: 1vh 1vh 1vh black;
            text-decoration: none;
            transition: 1000ms;
        }

        .endbutton:hover {
            background-color: #6200c3;
            box-shadow: 2vh 2vh 2vh black;
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
            <a href="about.php">About Us</a>
            <a href="#footer">Contact</a>
            <?php if ($userloggedIn): ?>
                <a class="logged" style="margin-left: 30vw; margin-right: 0%;">Welcome User : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo ucwords($_SESSION['username']); ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="wishlist.php">Wishlist</a>
                    </div>
                </div>
            <?php elseif ($sellerloggedIn): ?>
                <a class="logged" style="margin-left: 30vw; margin-right: 0%;">Welcome Seller : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo ucwords($_SESSION['username']); ?>
                    </button>
                    <div class="dropdown-content" style="height: 11vh; min-width: 11vw;">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="seller listing.php">Postings</a><br>
                        <a class="logout" href="property form form.php">Add Property</a>
                    </div>
                </div>
            <?php elseif ($agentloggedIn): ?>

                <a class="logged" style="margin-left: 30vw; margin-right: 0%;">Welcome Agent : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo ucwords($_SESSION['username']); ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="agent profile.php?agent_id=<?php echo $_SESSION['agent_id']; ?>">Profile</a>
                    </div>
                </div>
            <?php elseif ($adminloggedIn): ?>

                <a class="logged" style="margin-left: 30vw; margin-right: 0%;">Welcome Admin : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo ucwords($_SESSION['username']); ?>
                    </button>
                    <div class="dropdown-content" style="height: 18vh;">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="users list.php">Users</a>
                        <a class="logout" href="seller list.php">Sellers</a>
                        <a class="logout" href="agent listing.php">Agents</a>
                        <a class="logout" href="listing.php">Properties</a>
                    </div>
                </div>
            <?php else: ?>
                <a class="login" href="user login.html">Login</a>
            <?php endif; ?>

            <script>

                document.addEventListener('DOMContentLoaded', function ()
                {
                    const button = document.querySelector('.username');
                    const dropdownContent = document.querySelector('.dropdown-content');

                    button.addEventListener('click', function ()
                    {
                        if (dropdownContent.style.display === 'block')
                        {
                            dropdownContent.style.display = 'none';
                        } else
                        {
                            dropdownContent.style.display = 'block';
                        }
                    });
                });

            </script>
        </nav>
    </section>

    <h1 class="welcome">Astra Real Estate</h1>
    <h1 class="welcomeagent">Property listing</h1>

    <a class="editbutton" id="openPopup">Filter Properties</a>
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="close" id="closePopup">&times;</span>
            <h5 style="color:red;">*Leave the field(s) empty(as is) which you don't want to filter*</h5>
            <form action="search result.php" method="POST">
                <label for="price">Price:</label>
                <select class="field" name="price_range">
                    <option value="" disabled selected>Select an option</option>
                    <option value="0-100000"> - 1,00,000</option>
                    <option value="100000-200000">1,00,000 - 2,00,000</option>
                    <option value="200000-300000">2,00,000 - 3,00,000</option>
                    <option value="300000-400000">3,00,000 - 4,00,000</option>
                    <option value="400000-500000">4,00,000 - 5,00,000</option>
                    <option value="500000-600000">5,00,000 - 6,00,000</option>
                    <option value="600000-700000">6,00,000 - 7,00,000</option>
                    <option value="700000-800000">7,00,000 - 8,00,000</option>
                    <option value="800000-900000">8,00,000 - 9,00,000</option>
                    <option value="900000-1000000">9,00,000 - 10,00,000</option>
                    <option value="1000000 - "> 10,00,000 - </option>
                </select><br><br>
                <label for="bedrooms">Number of Bedrooms:</label>
                <select class="field" name="bed">
                    <option value="" disabled selected>Select an option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br><br>
                <label for="bathrooms">Number of Bathrooms:</label>
                <select class="field" name="bath">
                    <option value="" disabled selected>Select an option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br><br>
                <label for="no_of_garages">Number of Garages:</label>
                <select class="field" name="garages">
                    <option value="" disabled selected>Select an option</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select><br><br>

                <select class="field" name="state">
                    <option value="" disabled selected>Select an option</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="West Bengal">West Bengal</option>
                </select><br><br>


                <center><input type="submit" value="Submit" class="editbutton" style="border:none;">
                </center>
            </form>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>
    <script>
        const openPopupBtn = document.getElementById('openPopup');
        const closePopupBtn = document.getElementById('closePopup');
        const popup = document.getElementById('popup');

        openPopupBtn.addEventListener('click', function ()
        {
            popup.style.display = 'block';
            overlay.style.display = 'block';
        });

        closePopupBtn.addEventListener('click', function ()
        {
            popup.style.display = 'none';
            overlay.style.display = 'none'
        });
    </script>

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


        $sql = "SELECT COUNT(*) as total FROM property";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $total_entries = $row['total'];

        echo '<h2 class="available">' . $total_entries . ' Properties available to buy in India</h2><br>';

        $sql = "SELECT * FROM property";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<a href="property.php?property_id=' . $row["property_id"] . '">';
                echo '<div class="product">';
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
                echo '<div class="details">';
                echo "<h2 class='price'>Price: <span  id='formattedPrice_" . $row["property_id"] . "'></span></h2><br>";
                echo "<script>document.getElementById('formattedPrice_" . $row["property_id"] . "').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";
                echo "<h2 class='bed'>" . $row["bed"]
                    . " Bed</h2>";
                echo "<h2 class='bath'>" . $row["bath"] . " Bath</h2>";
                echo "<h2 class='size'>" .
                    number_format($row["size"], 0, '.', ',') . " sqft</h2><br>";
                echo "<h2 class='bath'>" . ucwords(strtolower($row["street_name"])) . "<br> " . ucwords(strtolower($row["state"])) . "</h2>";
                echo '</div>';
                echo '</div>';
                echo "</a>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();

        ?>

    </div>
    <br>
    <center>
        <h3 style="margin: 0 10vw;">
            <hr>Thank you for browsing through our list of available Properties. We hope you found the perfect
            property!<br>Feel free to explore other services on our website or contact us for more information.
        </h3>
    </center><br><br>


    <div class="end">
        <br>
        <a class="endbutton" href="home.php"><-Homepage< /a>
    </div>

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