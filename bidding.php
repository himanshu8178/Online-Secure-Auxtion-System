<?php
session_start();
if (isset($_SESSION["user_id"])) {
    // Get the user_id from the session
    $user_id = $_SESSION["user_id"];

    // Now you can use $user_id as needed on this page
    echo "User ID: " . $user_id;
} else {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: login.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_bid"])) {
    // Retrieve data from the form
    $bidAmount = $_POST["bidAmount"];
    $currentAmount = $_POST["currentamount"];
    $productID = $_POST["product_id"];

    if($bidAmount<=$currentAmount){
         header("Location: product.php?id=$productID");
         exit();
     }
    // Perform database update (replace with your database code)
    $conn = new mysqli("localhost", "root", "", "auxtion");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
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
    $sql = "UPDATE products SET currentbid = ? WHERE product_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("di", $bidAmount, $productID);

    if ($stmt->execute()) {
        echo "Bid placed successfully!";
       
    } else {
        echo "Error placing bid: " . $stmt->error;
    }

    $stmt->close();
} else {
    header("Location: kyc.php");
}
// Code before your database connection and bid update

// Retrieve the previous bidder's user ID from the product table
$sqlPrevBidderID = "SELECT currentbidder FROM products WHERE product_id = ?";
$stmtPrevBidderID = $conn->prepare($sqlPrevBidderID);
$stmtPrevBidderID->bind_param("i", $productID);
$stmtPrevBidderID->execute();
$stmtPrevBidderID->bind_result($previousBidderID);
$stmtPrevBidderID->fetch();
$stmtPrevBidderID->close();

// Retrieve the previous bidder's email from the KYC table using the user ID
if (!empty($previousBidderID)) {
    $sqlPrevBidderEmail = "SELECT email FROM kyc_info WHERE user_id = ?";
    $stmtPrevBidderEmail = $conn->prepare($sqlPrevBidderEmail);
    $stmtPrevBidderEmail->bind_param("i", $previousBidderID);
    $stmtPrevBidderEmail->execute();
    $stmtPrevBidderEmail->bind_result($previousBidderEmail);
    $stmtPrevBidderEmail->fetch();
    $stmtPrevBidderEmail->close();

    // Check if the previous bidder's email is available
    if (!empty($previousBidderEmail)) {
        // Construct email content
        $_SESSION["previousBidderEmail"] =$previousBidderEmail;
        $_SESSION["newbidAmount"] =$bidAmount;
        $_SESSION["productIDbid"]=$productID;

        header("Location: bidemail.php");
        
    } else {
        echo "No previous bidder email found or email is not available.";
    }
} else {
    echo "No previous bidder ID found.";
}

    $conn->close();
}


?>
