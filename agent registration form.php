<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <style>
        body {
            background-image: url(images/home.jpeg);
            object-fit: cover;
            background-size: 320vh;
            background-position: top;

        }

        .welcome {
            display: block;
            font-size: 9vh;
            color: #000000;
            border-radius: 7vh;
            text-align: center;
            margin: auto;
            margin-top: 4vh;
            margin-bottom: 4vh;
            width: 25vw;
        }

        form {

            width: 30%;
            margin: auto;
            padding: 5vh;
            border-radius: 5vh;
            color: white;
            background-color: #000000ce;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="url"],
        textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="radio"] {
            display: inline-block;
            margin-right: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            color: rgb(173, 230, 186);
            font-size: 3vh;
        }

        a:hover {
            color: rgb(194, 207, 255);
        }
    </style>
</head>

<body>
    <?php session_start(); ?>
    <h1 class="welcome">Agent Registration</h1>
    <form action="agent registration.php" method="post" enctype="multipart/form-data">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required />
        <?php if (isset($_SESSION['agent_error_name'])) {
            echo $_SESSION['agent_error_name'];
        } ?>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />
        <?php if (isset($_SESSION['agent_error_email'])) {
            echo $_SESSION['agent_error_email'];
        } ?>

        <label for="about">About yourself:</label>
        <textarea id="about" name="about" rows="4" cols="50">
        </textarea>

        <label for="phone_number">Phone Number:</label>
        <input type="tel" id="phone_number" name="phone_number" required />
        <?php if (isset($_SESSION['agent_error_phone'])) {
            echo $_SESSION['agent_error_phone'];
        } ?>

        <label for="state">State:</label>
        <select id="indian_states" name="state" class="state" required>
            <option value="" disabled selected>Select state</option>
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
        </select><br><br>

        <label for="area">City:</label>
        <input type="text" id="area" name="area" required />
        <?php if (isset($_SESSION['seller_error_area'])) {
            echo $_SESSION['seller_error_area'];
        } ?>

        <label for="pincode">Pincode:</label>
        <input type="text" id="pincode" name="pincode" required>
        <?php if (isset($_SESSION['seller_error_pincode'])) {
            echo $_SESSION['seller_error_pincode'];
        } ?>

        <label for="address_url">Address URL:</label>
        <input type="url" id="address_url" name="address_url" required />

        <label for="website">Website:</label>
        <input type="url" id="website" name="website" />

        <label for="experience">Experience:</label>
        <input type="text" id="experience" name="experience" required />

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <label>Price negotiable?</label>
        <input type="radio" id="yes" name="negotiable" value="yes">
        <label for="yes">Yes</label>
        <input type="radio" id="no" name="negotiable" value="no">
        <label for="no">No</label>

        <label for="photo">Photo:</label>
        <input type="file" id="image" name="image" accept="image/*" required /><br /><br />

        <input type="submit" value="Submit" /><br><br>
        <center><a href="home.php">go back to homepage</a></center>

    </form>
</body>

</html>