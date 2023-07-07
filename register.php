<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link href="./Vue/css/buying.css" rel="stylesheet" />
    <link href="./Vue/css/CSS.css" rel="stylesheet" />
</head>
<body>
    <div id="main-content">
        <nav>
            <ul>
            <li><a href="index.php"><img src="./Vue/images/logo.png" alt="logo"></a></li>
            <li><a href="buying.php">Buying</a></li>
            <li><a href="youraccount.php">Your account</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li><a href="cart.php">Cart</a></li>
            <form action="/search" method="GET">
                <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
            </form>
            <li><a href="register.php" id="register-button">REGISTER</a></li>
            <li><a  href="connexion.php" id="login-button">LOG IN</a></li>
            </ul>
        </nav>
    </div>



    <br>



    <form class="register-form">
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email" placeholder="Enter your email"><br>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" placeholder="Enter your name"><br>
        <label for="firstname">First Name:</label><br>
        <input type="text" id="firstname" name="firstname" placeholder="Enter your First name"><br>
        <label for="fate_naissance">Date of Birth:</label><br>
        <input type="date" id="fate_naissance" name="fate_naissance" value="2003-04-01"><br>
        <label for="mdp">Password:</label><br>
        <input type="password" id="mdp" name="mdp" placeholder="Password"><br>
        <label for="whoAmI">Who am I:</label><br>
        <input type="text" id="whoAmI" name="whoAmI" placeholder="Tell us about yourself"><br>
        <label for="adresse">Address:</label><br>
        <input type="text" id="adresse" name="adresse" placeholder="Enter your address"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city"><br>
        <label for="postacl_code">Postal Code:</label><br>
        <input type="text" id="postacl_code" name="postacl_code"><br>
        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country"><br>
        <label for="phone">Phone Number:</label><br>
        <input type="tel" id="phone" name="phone"><br>
        <input type="submit" value="Submit">
    </form>

    <footer>
        <p class="footerp">Author: Andre Khella and Ahmed Qejiou<br>
        Copyright <br> © 2023 - YOURMARKET</p>
    </footer>

</body>
</html>
