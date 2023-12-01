<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Auxtion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
   
    <link rel="stylesheet" href ="mainStyle.css" >
     <style>
        /* Subheading Style */
        
        .subheading {
            color: #007BFF;
        }

    </style>
</head>
<body>
    <!-- Navbar (You can include your navigation bar here) -->
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <h1 style='color: #007BFF;text-align:center;font-size:50px;margin-top: 0px;margin-bottom: 10px;'class="navbar-brand" href="main.php">Auxtion</h1>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item" style="
    padding-left: 970px;
    
">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item" 
   
>
                        <a class="nav-link" href="signup.php">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">About Auxtion</h1>

        <h2 class="subheading">Our Mission</h2>
        <p>
            At Auxtion, our mission is to provide a safe, transparent, and user-friendly online auction platform that connects buyers and sellers from around the world. We strive to create a trustworthy and enjoyable environment where individuals and businesses can discover unique items, list their products, and participate in exciting bidding wars.
        </p>

        <h2 class="subheading">Who We Are</h2>
        <p>
            Auxtion was founded by a team of passionate individuals who share a deep love for auctions and e-commerce. With years of experience in the industry, our founders recognized the need for an online auction platform that prioritizes user satisfaction, security, and convenience.
        </p>

        <h2 class="subheading">What Sets Us Apart</h2>
        <ul  style='background-color: white;text-decoration: none;font-size: 18px;
    margin-top: 10px;
    color: #666;'>
            <li>User-Centric Approach: Our user-centric design ensures that your experience is smooth and intuitive. We continuously gather feedback to improve our platform and adapt to your needs.</li>
            <li>Secure Transactions: We take your security seriously. Our advanced security measures protect your data and financial information, giving you peace of mind while you bid and sell.</li>
            <li>Wide Variety of Items: Whether you're a collector searching for rare treasures, a seller looking to reach a global audience, or an enthusiast seeking unique finds, Auxtion offers a diverse range of items and categories.</li>
            <li>Community and Support: Join our vibrant community of buyers and sellers. We offer reliable customer support to assist you throughout your auction journey.</li>
        </ul>

        <h2 class="subheading">Our Story</h2>
        <p>
            Auxtion started as a vision to revolutionize the online auction industry. Over the years, we've grown into a thriving marketplace with a global reach. We owe our success to our dedicated users who trust us with their auctions and purchases.
        </p>

        <h2 class="subheading" >Join Us Today</h2>
        <p>
            Discover the excitement of online auctions with Auxtion. Whether you're an experienced bidder or new to the world of auctions, we welcome you to explore our platform, find hidden gems, and participate in thrilling bidding wars.
        </p>

        <h2 class="subheading">Contact Us</h2>
        <p>
            Have questions or feedback? We'd love to hear from you. Feel free to <a href="#">contact us</a> anytime. Your input helps us improve and better serve our community.
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
