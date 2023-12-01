<?php
// Include the PHPMailer classes
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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

    // Check if the form has been submitted (data sent via POST)
    
// Load Composer's autoloader
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Create a new PHPMailer instance
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from the POST request
        
        $email = $_POST["email"];
        $_SESSION['email']=$email;
      }  

$mail = new PHPMailer();

// Generate a random 6-digit OTP
$otp = mt_rand(100000, 999999);
$_SESSION['otp'] = $otp;


// Set the mailer to use SMTP
$mail->isSMTP();

// SMTP host configuration (e.g., for Gmail)
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'Your email'; // Your email address
$mail->Password = 'Your password'; // Your email password

// Set the sender's email address
$mail->setFrom('Your email', 'Your name'); // Replace with your information

// Add a recipient
$mail->addAddress($email);

// Set email subject and message
$mail->Subject = 'Email Verification OTP';
$mail->Body = 'Your OTP for email verification is: ' . $otp;

// Try to send the email
if ($mail->send()) {
    echo "OTP has been sent to your email.";
    header("Location: email_kyc.php");
} else {
    echo "Failed to send OTP. Please try again later. Error: " . $mail->ErrorInfo;
}
?>
