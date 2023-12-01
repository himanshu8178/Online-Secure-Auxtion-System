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
    <style>
    .category-card {
        margin-bottom: 20px;
    }

    .category-card .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        transition: box-shadow 0.3s;
    }

    .category-card .card:hover {
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.3);
    }

    .category-card .card-title {
        font-size: 18px;
        margin-bottom: 0;
        color: #007BFF;
        text-align: center;
    }
    .card-title a:visited {
    color: inherit; /* or specify the color you want for visited links */
}
</style>

</head>
<body>
    
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
    <div class="container">
    <div class="auction-item">
        <h2>Auction an Item</h2>
        <p>Ready to sell something valuable?</p>
        <a href="addProduct.php" button class="add-product-button">Add Product</button></a>
    </div>
     <div class="container">
        <h1>Categories</h1>
        <div class="category-list">
            <ul>
                <?php
                // Establish a database connection
                $conn = new mysqli("localhost", "root", "", "auxtion");

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                        $counter = 0;


                // Query to fetch unique categories from the products table
                $sql = "SELECT DISTINCT category FROM products ORDER BY category ASC";
                $result = mysqli_query($conn, $sql);

               echo '<div class="container category-card">';
echo '<div class="row row-cols-1 row-cols-md-4 g-4">';

// Display categories as cards in rows with four columns each
while ($row = mysqli_fetch_assoc($result)) {
    if ($counter % 4 === 0) {
        echo '<div class="w-100"></div>'; // Start a new row after every 4 categories
    }

    $category = $row['category'];
    echo '<div class="col">';
    echo '<div class="card">';
    echo '<div class="card-body">';
    echo "<h5 class='card-title'><a href='category_items.php?category=$category'>$category</a></h5>";
    echo '</div>';
    echo '</div>';
    echo '</div>';

    $counter++;
}

                mysqli_close($conn);
                ?>
            </ul>
        </div>
    </div>
</div>