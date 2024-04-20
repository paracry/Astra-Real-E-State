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
            object-fit: cover;
        }

        .product {
            text-align: left;
            margin-top: 12vh;
        }


        .price {
            font-size: 6vh;
            margin-left: 27vw;
            text-align: left;
            margin-top: 7vh;
        }

        .topdetails {
            font-size: 2vh;
            margin-top: -8vh;
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

        /*contact details*/

        .contact {
            margin-left: 6vw;
            margin-top: -13vh;
            margin-bottom: 6vh;
        
            transition: 500ms;
        }

        #openGmail {
            padding: 2vh;
            margin-bottom: 2vh;
            border-radius: 10vh;
            background-color: #8000ff;
            color: white;
            font-size: 2vh;
            border: none;
            width: 11vw;
            transition: 500ms
        }

        #openGmail:hover {
            background-color: #5100a1;
            width: 12vw;
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
            background-color: rgb(83, 83, 83);
            color: rgb(255, 255, 255);
            border-radius: 20vh;
            transition: 500ms;
            text-decoration: none;
            box-shadow: 1vh 1vh 2vh #000000;
        }

        .removewish:hover {
            background-color: rgb(0, 0, 0);
            color: white;
            font-size: 4vh;
            padding-left: 3vw;
            padding-right: 3vw;
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
                    <a class="logout" href="wishlist.php">Wishlist</a>
                </div>
            </div>
            <?php elseif ($sellerloggedIn): ?>
            <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Seller : </a>
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

            <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Agent : </a>
            <div class="dropdown">

                <button class="username">
                    <?php echo ucwords($_SESSION['username']); ?>
                </button>
                <div class="dropdown-content">
                    <a class="logout" href="logout.php">Logout</a>
                    <a class="logout" href="agent profile.php?agent_id=<?php echo $_SESSION['agent_id'];?>">Profile</a>
                </div>
            </div>
            <?php elseif ($adminloggedIn): ?>

            <a class="logged" style="margin-left: 32vw; margin-right: 0%;">Welcome Admin : </a>
            <div class="dropdown">

                <button class="username">
                    <?php echo ucwords($_SESSION['username']); ?>
                </button>
                <div class="dropdown-content" style="height: 4vh;">
                    <a class="logout" href="logout.php">Logout</a>
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
            echo "<h2 class='price'>".ucwords($row['username'])."</h2><br>";
            echo "<div class='topdetails'>";
            echo '<h2 class="astra_id">Astra id : '.$row["agent_id"].'</h2>';

            echo "<h3 class='experience'>Experience : " . $row["experience"] . " years</h3>";
            echo "<h3 class='area'>Works in : " . ucwords(strtolower($row["area"])) .", ". ucwords(strtolower($row["state"])). ".</h3>";
            echo "</div>";
            echo '</div>';
            echo '<div class="lowerdetails">';
                echo "<hr>";
                echo "<h2>About ".ucwords(strtolower($row['username']))."</h2>";
                echo "<p>".$row['about']."</p>";
                echo "<hr>";
                echo "<h3 class='website'> Website :  <a href='" . $row["website"] . "'>click here</a> </h3>";
                echo "<hr>";

                echo "<h3>Price: <span id='formattedPrice'></span></h3>";
                echo "<script>document.getElementById('formattedPrice').innerText = formatIndianCurrency(" . $row['price'] . ");</script>";

                echo "<h3>Negotiable : ".$row['negotiable'].".</h3>";
                echo "<hr>";
                echo "<h3 class='area'>Serves in : ".$row['pincode'].", " . ucwords(strtolower($row["area"])) .", ". ucwords(strtolower($row["state"])). ".</h3>";
                echo "<h3>Location on <a href='".$row['address_url']."'>map.</a></h3>";
                echo "<hr>";
            echo '</div>';
            $agentname=ucwords($row['username']);
            $area=ucwords(strtolower($row["area"])) .", ". ucwords(strtolower($row["state"]));
            $agent_id=$row['agent_id'];
            $agentphone=$row['phone'];
            $agentemail=$row['email'];
        }
    } else {
        echo "0 results";
    }
    ?>

    <div class="contact">
        <?php if (isset($_SESSION['user_id'])): ?>
        <h2>Phone number :
            <?php echo $agentphone; ?>
            <br>Email address :
            <?php echo $agentemail; ?>
        </h2>
        <button id="openGmail">Compose Email</button>

        <script>
            document.getElementById('openGmail').onclick = function ()
            {
                var email = '<?php echo $agentemail; ?>'; // Specify the email address here
                var subject = 'Inquiry Regarding Real Estate Services.'; // Specify the email subject here
                var body = "Dear <?php echo $agentname;?>,%0D%0AI hope this email finds you well. My name is <?php echo ucwords($_SESSION['username']);?>, and I am currently in the market for a new home in <?php echo $area;?> , where I understand you have a wealth of experience and expertise.%0D%0A%0D%0AI believe that with your expertise and professionalism, we can find the perfect home that aligns with my needs and preferences. Your attention to detail and commitment to client satisfaction are qualities that I greatly admire and seek in a real estate partner.%0D%0A%0D%0AI look forward to the opportunity to work together and benefit from your knowledge and experience.Please let me know your availability so we can coordinate a meeting.%0D%0A%0D%0AThank you for considering my inquiry, and I am excited about the prospect of collaborating with you on this exciting journey of finding my dream home.%0D%0AWarm regards,%0D%0A<?php echo ucwords($_SESSION['username']);?>"; // Specify the email body here
                var mailtoLink = 'mailto:' + email + '?subject=' + subject + '&body=' + body;

                window.open(mailtoLink);
            };


        </script>
        <?php elseif (isset($_SESSION['agent_id'])): ?>
        <?php if ($agent_id == $_SESSION['agent_id']) {
                echo '<br><a class="removewish" href="deleteagent.php?agent_id=' . $agent_id . '">Delete profile</a>';
            } else {
                echo "<h3 style='color: #d50000;'>Hello Agent!<br>If you want the contact details of this agent then you'll have to <a href='user login.html'>Login</a> as User!.</h3>";
            }
            ?>
        <?php elseif (isset($_SESSION["admin_id"])): ?>
        <?php echo '<br><a class="removewish" href="deleteagentadmin.php?agent_id=' . $agent_id . '">Remove listing</a>'; ?>
        <?php elseif (isset($_SESSION["seller_id"])): ?>
        <?php echo "<h3 style='color: #d50000;'>Hello Agent!<br>If you want the contact details of this agent then you'll have to <a href='user login.html'>Login</a> as User!.</h3>";?>

        <?php else: ?>
        <h3 style="color: #d50000;"><a href="user login.html">Login</a> first to
            contact this agent.</h3>
        <?php endif;
        $conn->close(); ?>
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