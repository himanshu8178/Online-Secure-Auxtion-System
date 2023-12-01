<?php
// Verify OTP
session_start();

if (isset($_SESSION["user_id"])) {
    // Get the user_id from the session
    $user_id = $_SESSION["user_id"];
   
    // Now you can use $user_id as needed on this page
    
} else {
    // Redirect to the login page or perform other actions if the user is not logged in
    header("Location: login.php");
    exit();
}
if (isset($_SESSION['otp'])) {
    $otp = $_SESSION['otp'];
if (isset($_POST['eotp']) && !empty($_POST['eotp'])) {
    $userInputOTP = $_POST['eotp']; // User-input OTP
    $storedOTP = $otp; // The OTP generated and stored earlier
    
    if ($userInputOTP == $storedOTP) {
        // OTP is correct, email is verified
        echo "Email verified successfully!";

            // Check and update the emailkyc attribute in the database
            $conn = new mysqli("localhost", "root", "", "auxtion");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $emailkyc = 1; // Update emailkyc to 1

            // Assuming you have a user ID for the current user
            $userId = $_SESSION['user_id']; // You should set this session variable when the user logs in
            $email=$_SESSION['email'];
            // Prepare and execute the SQL update query
          $sql = "UPDATE kyc_info SET emailkyc = 1, email = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $email, $userId);

            if ($stmt->execute()) {
                echo "Email KYC updated successfully!";
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Failed to update Email KYC: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
        
    } else {
        // Invalid OTP
        
        echo "Invalid OTP. User Input: $userInputOTP, Stored OTP: $storedOTP";
        
    }
} else {
    echo "Please enter the OTP.";
}}else {
    echo "OTP session not found. Please request a new OTP.";
}
?>
