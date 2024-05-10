<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
    <title>Astra Real Estate</title>

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
            background-image: url(images/home.jpeg);
            object-fit: cover;
            background-size: 320vh;
            background-position: top;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .header {
            font-family: Arial, sans-serif;
            padding: 3vh 2vw;
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

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        /*form*/

        .states {
            padding: 2vh;
            width: 30vw;
            border: none;
            border-radius: 50vh;
            background-color: #f4e4ffeb;
            font-size: 3vh;
            color: #000000a9;
            

        }

        .states option {
            font-size: 2vh;
            color: #000000;
        }

        .states:hover {
            outline: solid 0.4vh #8000ff;
            color: #000000;
        }

        .states:focus {
            outline: solid 0.4vh #8000ff;
            background-color: white;
            color: #000000;


        }

        .search {
            padding: 1.5vh;
            font-size: 3vh;
            margin-left: 1vw;
            background-color: #8000ff;
            color: #fff;
            border: none;
            border-radius: 20vh;
            cursor: pointer;


        }

        .search:hover {
            background-color: #ff0099;
        }



        .welcome {
            padding: 7vh 6vw;
            font-size: 10vh;
            border-radius: 20vh;
            background-color: #27004f70;
            color: rgb(235, 199, 255);
            text-align: center;
            margin-top: 10vh;
            margin-bottom: 3vh;

        }

        .welcome2{
            font-size: 3vh;
            background-color: #004765b4;
            color: rgb(255, 255, 255);
            margin-top: 6vh;
            margin-bottom: 2vh;
            text-align: center;
            padding: 1.5vh 2vw;
            border-radius: 20vh;
            
        }

        /*footer*/

        footer {
            margin-top: 13.3vh;
            background-color: #000000c1;
            color: #ffffff;
            padding: 20px 0;
            font-size: 2.5vh;
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            color: #ffffff;

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
    <main>
        <h1 class="welcome">Welcome to<br>Astra Real Estate</h1>
        
        <form action="search result.php" method="post">

            <select class="states" name="state" class="state">
                <option value="" disabled selected>Select state to search</option>
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
                <option value="" disabled>-----------Union Territories--------------</option>
                <option value="DNHDD">Dadra and Nagar Haveli and Daman & Diu</option>
                <option value="JK">Jammu & Kashmir</option>
                <option value="Ladakh">Ladakh</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Delhi">Delhi</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="AN">Andaman and Nicobar Islands</option>
            </select>
            <button class="search" value="search">🔍Search🔍</button>
        </form>
        <h3 class="welcome2">Your one-stop destination for finding your dream house</h3>
    </main>
    <footer id="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Our mission is to provide top-notch real<br> estate services tailored to your needs.</p>
                <p>Learn more about Astra Real Estate <a href="about.php" style="color: #c387ff;">here.</a></p>
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
                    <li><a href="about.php">About</a></li>
                    <li><a href="listing.php">Properties</a></li>
                    <li><a href="agent listing.php">Agents</a></li>
                </ul>
            </div>
        </div>

    </footer>
</body>

</html>