<?php
// Your database connection code here (e.g., using mysqli or PDO)
session_start();
$_SESSION['otp'] = $otp;
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

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

          

            // Assuming you have a user ID for the current user
            $userId = $_SESSION['user_id']; // You should set this session variable when the user logs in

// Check if both emailkyc and mobilekyc are set to 1
$sql = "SELECT * FROM kyc_info WHERE emailkyc = 1 AND mobilekyc = 1";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    // Both emailkyc and mobilekyc are set to 1 for at least one record

    // Update the done attribute to 1 for those records
    $updateSql = "UPDATE kyc_info SET done = 1 WHERE emailkyc = 1 AND mobilekyc = 1";
    if (mysqli_query($connection, $updateSql)) {
        echo "KYC completed and 'done' attribute updated successfully.";
        header("Location: dashboard.php");
    } else {
        echo "Failed to update 'done' attribute: " . mysqli_error($connection);
    }
} else {
    echo "No records found with emailkyc and mobilekyc both set to 1.";
}

// Close the database connection
mysqli_close($connection);
?>
