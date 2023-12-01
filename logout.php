<?php
// Start the session (if not already started)
session_start();
// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // Log out the user by destroying the session
    session_destroy();

    // Redirect the user to a login page or another appropriate page
    header("Location: main.php");
    exit;
} else {
    // If the user is not logged in, redirect to the login page
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
