<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
    

        .add-product-container {
            text-align: center;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
            max-width: 500px;
        }

        h2 {
            font-size: 24px;
            margin: 0;
            color: #333;
        }

        form {
            text-align: left;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
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
    <?php
 $conn = new mysqli("localhost", "root", "", "auxtion");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
   
  if (isset($_SESSION["user_id"])) {
        $user_id = $_SESSION["user_id"];
         $kycresult = 0;
// Prepare and execute the SELECT statement
$sql = "SELECT emailkyc FROM kyc_info WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id); // Bind the user_id as an integer
$stmt->execute();
$stmt->bind_result($kycresult); // Bind the result to the $kycresult variable

// Fetch the result
$stmt->fetch();

// Close the statement
$stmt->close();

if ($kycresult == 1) {
    // Update the bid amount in the database (assuming a "products" table)

} else {
    header("Location: kyc.php");
    exit();
}
}else {
        // Redirect to login if user_id is not set in the session
        header("Location: login.php");
        exit();
    }

    $conn->close();
?>
      <div class="add-product-container">
        <h2>Add Product</h2>
        <form action="addProductProcess.php" method="POST" enctype="multipart/form-data">
            
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" required><br><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea><br><br>
            <label for="categories">Category:</label>
            <input type="text" id="categories" name="categories" required><br><br>

            <label for="price">Starting Bid:</label>
            <input type="number" id="price" name="price" step="0.01" required><br><br>
            <label for="enddate">End Date:</label>
            <input type="date" id="enddate" name="enddate"required><br><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br><br>


            <button type="submit" class="add-product-button">Add Product</button>
        </form>
    </div>
    
    
</body>
</html>
