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

        .available,
        .total {
            margin-left: 6vw;
        }

        /*about*/

        .headings {
            text-align: center;
            color: #8000ff;
        }

        .about {
            font-size: 3vh;
            margin: 2vh 5vw;
            text-align: center;
        }
        .alist{
            margin-left: 12vw;
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
                        <a class="logout" href="property form.html">Add Property</a>
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
    <h1 class="welcomeagent">About</h1>
    <h1 class="headings">Introduction</h1>
    <p class="about">Welcome to Astra Real Estate, where your dream home awaits! At Astra Real Estate, we pride ourselves on
        connecting you with the perfect property that not only meets but exceeds your expectations. Our mission is to
        make your real estate journey seamless, enjoyable, and rewarding.

        Imagine a place where every click brings you closer to the home you've always envisioned. Astra Real Estate is
        not just a website; it's a gateway to a world of possibilities. Whether you are looking for a cozy apartment in
        the heart of the city, a luxurious villa by the beach, or a charming countryside retreat, we have something for
        everyone.

        Our user-friendly interface and advanced search options make finding your ideal property a breeze. With detailed
        listings, high-quality images, and virtual tours, you can explore each property as if you were there in person.
        Our team of experienced real estate professionals is dedicated to assisting you every step of the way, ensuring
        that your experience with Astra Real Estate is nothing short of exceptional.

        From first-time buyers to seasoned investors, Astra Real Estate caters to all your real estate needs. Whether
        you are buying, selling, or renting, we are here to make your real estate journey a success. Trust Astra Real
        Estate to turn your property dreams into reality.</p>

    <h1 class="headings"> Our Story</h1>
    <p class="about">The journey of Astra Real Estate began with a vision to redefine the online real estate experience. The founders,
        a team of visionary developers and designers, embarked on a quest to create a platform that would seamlessly
        blend cutting-edge technology with timeless aesthetics. Their goal was simple yet profound - to craft a virtual
        space where users could explore properties with the same awe and wonder as walking through a luxurious mansion.
    </p>

    <h1 class="headings">Our Mission</h1>
    <p class="about">At Astra Real Estate, our mission is to redefine the real estate experience by providing innovative solutions,
        fostering trust, and empowering individuals to find their dream homes. We are committed to excellence,
        integrity, and transparency in every interaction, ensuring that our clients receive unparalleled service and
        support throughout their real estate journey. Our dedication to continuous improvement and customer satisfaction
        drives us to exceed expectations and set new standards in the industry. Astra Real Estate: Where dreams meet
        homes.</p>

    <h1 class="headings">Why Choose Astra Real Estate?</h1>
    <ul class="alist">
        <li>
            <h3>Expertise: Our team of experienced agents brings in-depth knowledge of the local market to help you make
                informed decisions.</h3>
        <li>
            <h3>Personalized Service: We understand that every client is unique, which is why we tailor our approach to
                meet
                your specific needs.</h3>
        <li>
            <h3>Innovation: We leverage cutting-edge technology to streamline the buying and selling process, making it
                efficient and transparent.</h3>
        <li>
            <h3>Community Engagement: Astra Real Estate is not just about transactions; we are committed to giving back
                to
                the communities we serve.</h3>
    </ul>

    <h1 class="headings">Contact Us</h1>
    <p class="about">Ready to embark on your real estate journey with Astra Real Estate? Reach out to us today to start the
        conversation.</p>


    <div class="end">
        <br>
        <a class="endbutton" href="home.php"><-Homepage </a>
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