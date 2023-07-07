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
                <li><a href="index.php"><img src="./images/logo.png" alt="logo"></a></li>
                <li><a href="buying.php">Buying</a></li>
                <li><a href="/account">Your account</a></li>
                <li><a href="/categories">Categories</a></li>
                <li><a href="/sell">Sell</a></li>
                <li><a href="/cart">Cart</a></li>
                <form action="/search" method="GET">
                    <input style="width: 250px;" type="text" name="q" placeholder="Search on YOUR MARKET">
                </form>
                <li><a href="register.php" id="register-button">REGISTER</a></li>
                <li><a  href="connexion.php" id="login-button">LOG IN</a></li>
            </ul>
            
        </nav>
    </div>












        <hr style="width:100%">
        <form action="" method="POST">
            <label for="email">Email Address:</label><br>
            <input type="email" id="email" name="email" placeholder="Enter your email"><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" placeholder="Enter your name"><br>
            <label for="fname">First Name:</label><br>
            <input type="text" id="fname" name="fname" placeholder="First Name"><br>
            <label for="dob">Date of Birth:</label><br>
            <input type="date" id="dob" name="dob" value="2003-04-01"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Password"><br>
            <label for="address1">Address 1:</label><br>
            <input type="text" id="address1" name="address1" placeholder="1234 Old Street"><br>
            <label for="address2">Address 2:</label><br>
            <input type="text" id="address2" name="address2" placeholder="Flat,Floor,..."><br>
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city"><br>
            <label for="zipcode">Zip Code:</label><br>
            <input type="text" id="zipcode" name="zipcode"><br>
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