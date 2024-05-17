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

        function openEmailClient()
        {
            window.location.href = "mailto:recipient@example.com";
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
            height: 39vh;
            width: 40vh;
            border-radius: 100vh;
            overflow: hidden;
            float: left;
            margin-left: 5vw;
            align-items: center;
            align-content: center;

        }

        .profile {
            width: 40vh;
            height: 40vh;
            object-fit: cover;
        }

        .product {
            text-align: left;
            margin-top: 12vh;
        }


        .price {
            font-size: 8vh;
            margin-left: 27vw;
            text-align: left;
            margin-top: 5vh;
        }

        .topdetails {
            font-size: 2.5vh;
            margin-top: -11vh;
            margin-left: 27vw;
            margin-bottom: 15vh;
        }

        .lowerdetails {
            margin: 6vw;
            margin-right: 10vw;
            margin-top: -2vh;
            font-size: 3vh;
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


        /*overlay*/

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

        /*contact details*/

        .contact {
            margin-left: 6vw;
            margin-top: -13vh;
            margin-bottom: 6vh;

            transition: 500ms;
        }

        #openGmail {
            padding: 2vh;
            margin: auto;
            border-radius: 10vh;
            background-color: #007bff;
            color: rgb(255, 255, 255);
            font-size: 3vh;
            font-family: 'Amaranth', sans-serif;
            border: none;
            width: 17vw;
            transition: 500ms;
            box-shadow: 1vh 1vh 2vh black;
        }

        #openGmail:hover {
            background-color: #00ac22;
            width: 20vw;
            transition: 500ms;
        }

        /*wishlist*/



        .addwish {
            padding: 2vh;
            margin: 1vh;
            font-size: 3vh;
            background-color: rgb(255, 0, 0);
            color: rgb(255, 255, 255);
            border-radius: 20vh;
            transition: 500ms;
            text-decoration: none;
            box-shadow: 1vh 1vh 2vh #000000;
        }

        .addwish:hover {
            background-color: rgb(144, 0, 24);
            color: white;
            font-size: 4vh;
            padding-left: 3vw;
            padding-right: 3vw;
            transition: 500ms;

        }

        .removewish {
            padding: 2vh;
            font-size: 3vh;
            background-color: rgb(233, 0, 0);
            color: rgb(255, 255, 255);
            border-radius: 20vh;
            transition: 500ms;
            text-decoration: none;
            box-shadow: 1vh 1vh 2vh #000000;
        }

        .removewish:hover {
            background-color: rgb(133, 0, 0);
            color: white;
            padding-left: 3vw;
            padding-right: 3vw;
            transition: 500ms;

        }


        /*form*/
        input {
            height: 4vh;
        }

        .editbutton {
            padding: 2vh;
            margin: 2vh;
            font-size: 3vh;
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
            font-size: 3vh;
            padding-left: 3vw;
            padding-right: 3vw;
            transition: 500ms;

        }

        /*end*/

        .end {
            margin-left: 4vw;

            margin-top: -2vh;
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
            background-color: #47008f;
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

            echo '<div class="circle">';
            echo '<img class="profile" src="data:image/jpeg;base64,' . base64_encode($row["image"]) . '"/><br>';
            echo '</div>';
            echo "<h2 class='price'>" . ucwords($row['username']) . "</h2><br>";
            echo "<div class='topdetails'>";
            echo '<h2 class="astra_id">Astra id : ' . $row["agent_id"] . '</h2>';

            echo "<h3 class='experience'>Experience : " . $row["experience"] . " years</h3>";
            echo "<h3 class='area'>Works in : " . ucwords(strtolower($row["area"])) . ", " . ucwords(strtolower($row["state"])) . ".</h3>";
            echo "</div>";
            echo '</div>';
            echo '<div class="lowerdetails">';
            echo "<hr>";
            echo "<h2>About " . ucwords(strtolower($row['username'])) . "</h2>";
            echo "<p>" . $row['about'] . "</p>";
            echo "<hr>";
            if ($row['website'] == NULL) {
                echo "<h3 class='website'> Website : Not available </h3>";
            } else {
                echo "<h3 class='website'> Website :  <a href='" . $row["website"] . "'> Visit " . ucwords($row['username']) . "'s website</a> </h3>";
            }

            echo "<hr>";

            echo "<h3>Price: <span id='formattedPrice'></span></h3>";
            echo "<script>document.getElementById('formattedPrice').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";

            echo "<h3>Negotiable : " . $row['negotiable'] . ".</h3>";
            echo "<hr>";
            echo "<h3 class='area'>Serves in : " . $row['pincode'] . ", " . ucwords(strtolower($row["area"])) . ", " . ucwords(strtolower($row["state"])) . ".</h3>";
            echo "<h3>Location on <a href='" . $row['address_url'] . "'>map.</a></h3>";
            echo "<hr>";
            echo '</div>';
            $agentname = ucwords($row['username']);
            $area = ucwords(strtolower($row["area"])) . ", " . ucwords(strtolower($row["state"]));
            $agent_id = $row['agent_id'];
            $agentphone = $row['phone'];
            $agentemail = $row['email'];
            $agentabout = $row['about'];
            $agentwebsite = $row['website'];
            $agentexperience = $row['experience'];
            $agentprice = $row['price'];

        }
    } else {
        echo "0 results";
    }
    ?>

    <div class="contact">
        <?php if (isset($_SESSION['user_id'])|| isset($_SESSION['seller_id'])): ?>
            <h2>Phone number :
                <?php echo $agentphone; ?>
                <br>Email address :
                <?php echo $agentemail; ?>
            </h2>
            <button id="openGmail">Email
                <?php echo $agentname; ?>
            </button>

            <script>
                document.getElementById('openGmail').onclick = function ()
                {
                    var email = '<?php echo $agentemail; ?>'; // Specify the email address here
                    var subject = 'Inquiry Regarding Real Estate Services.'; // Specify the email subject here
                    var body = "Dear <?php echo $agentname; ?>,%0D%0AI hope this email finds you well. My name is <?php echo ucwords($_SESSION['username']); ?>, and I am currently in the market for a new home in <?php echo $area; ?> , where I understand you have a wealth of experience and expertise.%0D%0A%0D%0AI believe that with your expertise and professionalism, we can find the perfect home that aligns with my needs and preferences. Your attention to detail and commitment to client satisfaction are qualities that I greatly admire and seek in a real estate partner.%0D%0A%0D%0AI look forward to the opportunity to work together and benefit from your knowledge and experience.Please let me know your availability so we can coordinate a meeting.%0D%0A%0D%0AThank you for considering my inquiry, and I am excited about the prospect of collaborating with you on this exciting journey of finding my dream home.%0D%0AWarm regards,%0D%0A<?php echo ucwords($_SESSION['username']); ?>"; // Specify the email body here
                    var mailtoLink = 'mailto:' + email + '?subject=' + subject + '&body=' + body;

                    window.open(mailtoLink);
                };


            </script>
        <?php elseif (isset($_SESSION['agent_id'])): ?>
            <?php if ($agent_id == $_SESSION['agent_id']) {
                echo '<br><a class="removewish" id="confirmationLink" href="deleteagent.php?agent_id=' . $agent_id . '">Delete profile</a>';
                echo "<script> document.getElementById('confirmationLink').addEventListener('click', function (event)
                    {
                        event.preventDefault(); // Prevent the default link behavior
                        if (confirm('Are you sure you want to delete your profile and account?'))
                        {
                            window.location.href = event.target.href; // Redirect to the link URL
                        }
                    });
                </script>";
                echo '<a class="editbutton" id="openPopup">Edit Profile</a>';
                echo '<div id="popup" class="popup">
                        <div class="popup-content">
                            <span class="close" id="closePopup">&times;</span>
                            <h5 style="color:red;">*Leave the field(s) empty(as is) which you don\'t want to change*</h5>
                            <form action="agent edit.php" method="POST">
                                    <label for="full_name">Full Name:</label>
                                    <input type="text" id="full_name" name="name" placeholder="'.$agentname.'"/><br><br>

                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" placeholder="'.$agentemail.'"/><br><br>


                                    <label for="phone_number">Phone Number:</label>
                                    <input type="tel" id="phone_number" name="phone" placeholder="'.$agentphone.'"/><br><br>


                                    <label for="website">Website:</label>
                                    <input type="url" id="website" name="website" placeholder="'.$agentwebsite.'"/><br><br>

                                    <label for="experience">Experience:</label>
                                    <input type="text" id="experience" name="experience" placeholder="'.$agentexperience.'"/><br><br>

                                    <label for="price">Price:</label>
                                    <input type="text" id="price" name="price" placeholder="'.$agentprice.'"><br><br>
                                    
                                    <input type="hidden" name="agent_id" value='.$agent_id.'>

                                    <center><input type="submit" value="Submit" class="editbutton" style="border:none; height:7vh;">
                                    </center>
                            </form> 
                        </div>
                    </div>
                    <div id="overlay" class="overlay"></div>';
                echo "<script>                    
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
                </script>";
            } else {
                echo "<h3 style='color: #d50000;'>Hello Agent!<br>If you want the contact details of this agent then you'll have to <a href='user login.html'>Login</a> as User!.</h3>";
            }
            ?>
        <?php elseif (isset($_SESSION["admin_id"])): ?>
            <h2>Phone number :
                <?php echo $agentphone; ?>
                <br>Email address :
                <?php echo $agentemail; ?>
            </h2>
            <button id="openGmail">Email
                <?php echo $agentname; ?>
            </button>

            <script>
                document.getElementById('openGmail').onclick = function ()
                {
                    var email = '<?php echo $agentemail; ?>'; // Specify the email address here
                    var subject = 'Inquiry Regarding Real Estate Services.'; // Specify the email subject here
                    var body = "Dear <?php echo $agentname; ?>,%0D%0AI hope this email finds you well. My name is <?php echo ucwords($_SESSION['username']); ?>, and I am currently in the market for a new home in <?php echo $area; ?> , where I understand you have a wealth of experience and expertise.%0D%0A%0D%0AI believe that with your expertise and professionalism, we can find the perfect home that aligns with my needs and preferences. Your attention to detail and commitment to client satisfaction are qualities that I greatly admire and seek in a real estate partner.%0D%0A%0D%0AI look forward to the opportunity to work together and benefit from your knowledge and experience.Please let me know your availability so we can coordinate a meeting.%0D%0A%0D%0AThank you for considering my inquiry, and I am excited about the prospect of collaborating with you on this exciting journey of finding my dream home.%0D%0AWarm regards,%0D%0A<?php echo ucwords($_SESSION['username']); ?>"; // Specify the email body here
                    var mailtoLink = 'mailto:' + email + '?subject=' + subject + '&body=' + body;

                    window.open(mailtoLink);
                };


            </script>
            <br><br>
            <?php echo '<br><a class="removewish" id="confirmationLink" href="deleteagentadmin.php?agent_id=' . $agent_id . '">Remove listing</a>';
            echo "<script> document.getElementById('confirmationLink').addEventListener('click', function (event)
                {
                    event.preventDefault(); // Prevent the default link behavior
                    if (confirm('Are you sure you want to remove this agent profile?'))
                    {
                        window.location.href = event.target.href; // Redirect to the link URL
                    }
                });
            </script>"; ?>
            
        <?php else: ?>
            <h3 style="color: #d50000;"><a href="user login.html">Login</a> first to
                contact this agent.</h3>
        <?php endif;
        $conn->close(); ?>

    </div>
    <h6>
        <hr>
    </h6>
    <div class="end">
        <br>
        <a class="endbutton" href="agent listing.php"><-Listings </a>
                <a class="endbutton" href="home.php" style="margin-left: 73vw;">Homepage-></a>

    </div>


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