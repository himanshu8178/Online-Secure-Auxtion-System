<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KYC Form</title>
    
    <style>
        ul.navbar-nav {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        /* Style each <li> item in the navigation */
        .nav-item {
            margin-right: 20px; /* Add margin between items */
        }

        /* Style the links inside <a> elements */
        .nav-link {
            text-decoration: none;
            color: #333; /* Text color */
            font-weight: bold; /* Font weight (optional) */
            font-size: 16px; /* Font size (optional) */
            transition: color 0.3s ease; /* Smooth color transition on hover */

            /* Optional: Add padding and background color on hover */
            padding: 5px 10px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }

        /* Change link color on hover */
        .nav-link:hover {
            color: #007BFF; /* Change to the desired hover color */
        }

        nav {
            background-color: white;
        }

        ul .navbarNav {
            color: #007BFF;
            font-size: 50px;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 10px;
        }

        .navbarNav .nav-link {
            color: #333;
        }

        /* Additional styles for navigation links */
        .nav-item {
            margin-left: 0px;
        }

        h1 {
            text-align: center;
            color: #007BFF;
        }

        form {
            margin-left: 510px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-left: 80px;
            font-size: 16px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .otp-input {
            display: none;
        }
    </style>
</head>
<body>
    
<nav class="navbar">
    <div class="container">

        <a href="home.php">
            <h1 style='color: #007BFF;text-align:center;font-size:50px;margin-top: 0px;margin-bottom: 10px;'class="navbar-brand" href="main.php">Auxtion</h1>
            </a>
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
                    <a class="nav-link" href="contact">Contact</a>
                </li>
<li class="nav-item" style="padding-left: o;margin-left: 850px;">
                    
                    <?php
// Establish a database connection
                    session_start();
                    

// Check if the user is logged in (user_id is set in the session)
if (isset($_SESSION["user_id"])) {
    // Get the user_id from the session
    $user_id = $_SESSION["user_id"];

    // Now you can use $user_id as needed on this page
    
} else {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "auxtion");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database
$sql = "SELECT username FROM signupinfo where id=$user_id";
$result = mysqli_query($conn, $sql);

// Fetch and display data
if($row = mysqli_fetch_assoc($result)) {
    echo "<p style='color: #007BFF;text-align: right; margin-top: 0px;padding-top: 0px;margin-bottom: 0px;'>{$row['username']}</p>";
}


mysqli_close($conn);
?>
</li>
 <li class="nav-item" >
                        <a class="nav-link" href="logout.php"><span style="color: red;">Logout</span></a>
                    </li>

            </ul>
        </div>
    </div>
</nav>


<h1>Email Verification</h1>

<form method="post" action="verifyvotp.php">
    <!-- Phone Number -->
    <div>
        <label for="votp">Enter 2-step Verification OTP:</label>
        <input type="text" id="votp" name="votp" required>

        <button type="submit" >Submit</button>
    </div>

</form>

</body>
</html>
