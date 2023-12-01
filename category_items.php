<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auxtion</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css">
    <!-- Custom CSS for the navigation bar and product cards -->
    
    <link rel="stylesheet" href ="mainStyle.css" >
</head>
<body>
    
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <h1 style='color: #007BFF;text-align:center;font-size:50px;margin-top: 0px;margin-bottom: 10px;'class="navbar-brand" href="main.php">Auxtion</h1>
            
          
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="main.php">Home</a>
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
$sql = "SELECT username FROM signupinfo where id = $user_id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo "<p style='color: #007BFF;text-align: right; margin-top: 0px;padding-top: 0px;margin-bottom: 0px;'>{$row['username']}</p>";



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
     <div class="container mt-5">
            <h1>Items in Category: <?php echo $_GET['category']; ?></h1>
        <div class="row">
            <!-- Product Card 1 -->
            <div class="col-md-4">
 
            <?php
        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "auxtion");

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve the category from the URL parameter
        $category = $_GET['category'];
$currentTimestamp = time();
        // Query to fetch items based on the selected category
        $sql = "SELECT * FROM products WHERE category = '$category' and enddate > FROM_UNIXTIME($currentTimestamp) ORDER BY product_views DESC";
        $result = mysqli_query($conn, $sql);

        // Display items in the selected category
        while ($row = mysqli_fetch_assoc($result)) {
            // Calculate time left
            $endDateTime = strtotime($row['enddate']);
            $currentDateTime = time();
            $timeLeftSeconds = $endDateTime - $currentDateTime;

            // Calculate days left
            $daysLeft = floor($timeLeftSeconds / (60 * 60 * 24));
            $timeLeftFormatted = gmdate("H:i:s", $timeLeftSeconds);

            // Display each item information as required
            ?>
    <div class="auction-item-card">
    <div class="square-image-container">
        <img src="<?php echo $row['image_url']; ?>" style="width: 250px;height: 250px;" alt="<?php echo $row['product_name']; ?>">
    </div>
    <div class="auction-item-info">
        <a href="product.php?id=<?php echo $row['product_id']; ?>">
        <h2 class="item-title"><?php echo $row['product_name']; ?></h2>
        <p class="item-description"><?php echo $row['description']; ?></p>
        <p class="current-bid">Current Bid: $<?php echo $row['currentbid']; ?></p>
        <p class="seller">Seller: $<?php echo $row['seller']; ?></p>
        <p style="color: black" class="category">Category: <?php echo $row['category']; ?></p>
        <p class="time-left">Time Left: <?php echo $daysLeft; ?> days <?php echo $timeLeftFormatted; ?></p>
</a>
    </div>
    <form action="login.php">
    <button type="submit" class="btn btn-primary">Bid Now</button>
</form>
</div>
<?php
}
// ... Rest of the code remains the same ...
?>
        </div>
    </div>
   
            <?php
        
        mysqli_close($conn);
        ?>
    </div>
</div>
