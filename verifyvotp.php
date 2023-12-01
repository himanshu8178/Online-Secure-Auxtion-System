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
if (isset($_POST['votp']) && !empty($_POST['votp'])) {
    $userInputOTP = $_POST['votp']; // User-input OTP
    $storedOTP = $otp; // The OTP generated and stored earlier
    
    if ($userInputOTP == $storedOTP) {
        // OTP is correct, email is verified
       

          header("Location: dashboard.php");
                exit();
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
