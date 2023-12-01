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


        
        $email = $_SESSION['previousBidderEmail'];
        
$productIDbid=$_SESSION["productIDbid"];
$newbidAmount=$_SESSION["newbidAmount"];
$mail = new PHPMailer();

// Generate a random 6-digit OTP

// Set the mailer to use SMTP
$mail->isSMTP();

// SMTP host configuration (e.g., for Gmail)
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = 'himanshu.21scse1010370@galgotiasuniversity.edu.in'; // Your email address
$mail->Password = 'GU@54321'; // Your email password

// Set the sender's email address
$mail->setFrom('himanshu.21scse1010370@galgotiasuniversity.edu.in', 'Himanshu'); // Replace with your information

// Add a recipient
$mail->addAddress($email);

// Set email subject and message
$mail->Subject = 'New Bid Notification';
$mail->Body = "Hello,\n\nA new bid of $" . $newbidAmount . " has been placed on the product you bid on.\n\nRegards,\nAuxtion";

// Try to send the email
if ($mail->send()) {
    echo "OTP has been sent to your email.";
    header("Location: product.php?id=$productIDbid");
} else {
    echo "Failed to send OTP. Please try again later. Error: " . $mail->ErrorInfo;
}
?>
