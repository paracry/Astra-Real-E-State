<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Astra Real Estate</title>

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
            font-family: Arial, sans-serif;
            background-image: url(images/home.jpeg);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .header {

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
            margin-top: 1vh;
            min-width: 1vw;
            height: 8vh;
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

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        footer {
            color: white;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 2vh;
            width: 30vw;
            border: none;
            border-radius: 50vh;
            margin-right: 10px;
            background-color: #f4e4ffeb;
            font-size: 2.5vh;
        }

        input:hover {
            outline: solid 0.4vh #8000ff;
        }

        input:focus {
            outline: solid 0.4vh #8000ff;
            background-color: white;


        }

        .search {
            margin-top: 2vh;
            padding: 1.5vh;
            font-size: 2.5vh;
            width: 9vw;
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
            padding: 5vh;
            font-size: 9vh;
            border-radius: 20vh;
            background-color: #27004f70;
            color: rgb(235, 199, 255);
            text-align: center;
            margin-top: 0%;

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
                <a class="logged" style="margin-left: 35vw; margin-right: 0%;">Welcome User : </a>
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
                <a href="property form.html">Add Property</a>
                <a class="logged" style="margin-left: 25vw; margin-right: 0%;">Welcome Seller : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="products.php">Postings</a>
                    </div>
                </div>
            <?php elseif ($agentloggedIn): ?>

                <a class="logged" style="margin-left: 30vw; margin-right: 0%;">Welcome Agent : </a>
                <div class="dropdown">

                    <button class="username">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <div class="dropdown-content">
                        <a class="logout" href="logout.php">Logout</a>
                        <a class="logout" href="products.php">Postings</a>
                    </div>
                </div>
            <?php else: ?>
                <a class="login" href="user login.html">Login</a>
            <?php endif; ?>
        </nav>
    </section>
    <main>
        <h1 class="welcome">Welcome to<br>Astra Real Estate</h1>
        <form action="search result.php" method="post">
            <input type="text" placeholder="Search properties by states..." name="place" />
            <button class="search" value="search">🔍Search🔍</button>
        </form>
    </main>
    <footer>
        <p>
            Email: info@astra.com | Address: 123 Main St, City | Phone:
            123-456-7890
        </p>
    </footer>
</body>

</html>