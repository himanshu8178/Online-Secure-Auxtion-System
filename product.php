<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auxtion</title>
    <!-- Add your CSS or Bootstrap link here if needed -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">

    <style type="text/css">
        /* Your existing styles */
        ul.navbar-nav {
    list-style: none;
    display: flex;
    margin: 0;
    padding: 0;
}
.desc{
background-color: #f8f9fa; /* Background color */
    padding: 10px; /* Padding around the description */
    border-radius: 5px; /* Rounded corners */
    margin-top: 20px; /* Spacing from the product details */
    margin-left: 70px;
    color: #333; /* Text color */
    font-size: 16px; /* Font size */
    
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

        /* Additional styles for product details */
        .product-details-container {
            display: flex;
            margin-top: 20px;
            justify-content: space-between;
        }

        .product-details {
            flex: 1;
            padding: 20px;

        }

        .product-details h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        .product-details p {
            font-size: 16px;
            color: #666;
            margin-top: 10px;
        }
        .btn {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            
            
            cursor: pointer;
            transition: background-color 0.3s ease;
            

        }

        .btn :hover {
            background-color: #0056b3;
        }
a{
    text-decoration:none
}
        .product-image {
            flex: 1;
            text-align: center;
        }

        .product-image img {
            width: 250px;
            height: 250px;
            
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        .auction-item {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
            max-width: 500px;
            margin: 0 auto;
            margin-top: 20px;
        }
        .add-product-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-product-button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <!-- Your existing navbar code -->
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- ... Navbar content ... -->
         <div class="container">
<a href="home.php">
            <h1 style='color: #007BFF;text-align:center;font-size:50px;margin-top: 0px;margin-bottom: 10px;'class="navbar-brand" href="main.php">Auxtion</h1>
            </a>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php">Home</a>
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
    // Start the session
  

    // Check if the user is logged in (user_id is set in the session)
    if (isset($_SESSION["user_id"])) {
        // Get the user_id from the session
        $user_id = $_SESSION["user_id"];

        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "auxtion");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Query the database to fetch the username based on user_id
        $sql = "SELECT username FROM signupinfo WHERE id = $user_id";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Display the username and logout link
        echo "<p style='color: #007BFF;text-align: right; margin-top: 0px;margin-bottom: 5px; padding-top: 0px;margin-bottom: 10px;'>{$row['username']}</p>";
        echo '<a style="margin-top: 5px;"class="nav-link" href="logout.php"><span style="color: red;margin-left: 70px;">Logout</span></a>';

        // Close the database connection
        mysqli_close($conn);
    } else {
        // Display login and signup links
        echo '<a class="nav-link" href="login.php">Login</a>';
        echo '<a class="nav-link" href="signup.php">Signup</a>';
    }
    ?>
</li>

                </ul>
            </div>
        </div>
    </nav>

    <?php
    // Check if 'id' parameter is present in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Retrieve the 'id' value from the URL
        $product_id = $_GET['id'];

        // Connect to the database (replace with your database credentials)
        $conn = new mysqli("localhost", "root", "", "auxtion");

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       $updateSql = "UPDATE products SET product_views = product_views + 1 WHERE product_id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
        // Query the database to fetch product details based on 'product_id'
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $desc="";
        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Fetch and display product details
                $row = $result->fetch_assoc();
                $endDateTime = strtotime($row['enddate']); // Replace 'end_date' with your database date field
                $currentDateTime = time();
                $timeLeftSeconds = $endDateTime - $currentDateTime;

                // Calculate days left
                $daysLeft = floor($timeLeftSeconds / (60 * 60 * 24));
                $timeLeftFormatted = gmdate("H:i:s", $timeLeftSeconds);
                $desc=$row['description'];
                ?>
                <div class="product-details-container" style="margin-top: 60px;">
                     <div class="product-image">
                        <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['product_name']; ?>">
                    </div>  
                    <div class="product-details">
                        <h2><?php echo $row['product_name']; ?></h2>
                        <p>Current Bid: $<?php echo $row['currentbid']; ?></p>
                        <p>Seller ID: <?php echo $row['seller']; ?></p>
                        <p>Category: <?php echo $row['category']; ?></p>
                        <p class="time-left">Time Left: <?php echo $daysLeft; ?> days <?php echo $timeLeftFormatted; ?></p>
                        
                        
                        <div id="bidInputArea" >
        <form method="post" action="bidding.php">
             <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
             <input type="hidden" name="currentamount" value="<?php echo $row['currentbid']; ?>">
            <input type="text" name="bidAmount" placeholder="Enter your bid amount">
            <button type="submit" class="btn btn-primary" name="submit_bid">Place Bid</button>
        </form>
    </div>
                        
                    </div>
                   
                </div>

                <div class="desc">
                    <p style='font-size: 20px;'><b>Description</b></p>
                <?php echo $desc; ?>
            </div>
            <div class="auction-item">
        <h2>Auction an Item</h2>
        <p>Ready to sell something valuable?</p>
        <a href="addProduct.php" button class="add-product-button">Add Product</button></a>
    </div>
                <?php
            } else {
                echo "Product not found.";
            }
        } else {
            echo "Error executing SQL query.";
        }

        // Close the database connection
        $stmt->close();
        $conn->close();
    } else {
        // Handle the case where 'id' parameter is missing or not valid
        echo "Invalid product ID.";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
