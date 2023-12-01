<?php
// Establish a database connection (replace with your database credentials)
session_start();
$conn = new mysqli("localhost", "root", "", "auxtion");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}   

// Process form data when the form is submitted
// ... Previous code ...

if (isset($_SESSION['user_id']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST["product_name"];
    $description = $_POST["description"];
    $categories= $_POST["categories"];
    $price = $_POST["price"];
    $user_id = $_SESSION['user_id'];
    $enddate = $_POST["enddate"];
    // File upload handling
    $target_directory = "uploads/";
    $target_file = $target_directory . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // File uploaded successfully, insert data into the database
        $sql = "INSERT INTO products (product_name, seller, description, category, currentbid,currentbidder, image_url, enddate) VALUES (?, ?, ?, ?, ?, ?, ?,? )";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters with the correct types and order
        $stmt->bind_param("ssssdsss", $product_name, $user_id, $description, $categories, $price, $user_id, $target_file, $enddate);
        
        if ($stmt->execute()) {
            echo "<p>Product added successfully.</p>";
            $newlyInsertedID = $conn->insert_id;

    // Redirect the user to the product page with the ID as a parameter
    header("Location: product.php?id=$newlyInsertedID");
    exit; // Make sure to exit after the redirect
            // Make sure to exit after redirect
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading the image.";
    }
}
else{
    header("Location: login.php");
    exit();
}

// Close the database connection
$conn->close();
?>
