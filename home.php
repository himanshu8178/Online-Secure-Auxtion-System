<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    // If logged in, redirect to the dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // If not logged in, redirect to the main page
    header("Location: index.php");
    exit();
}
?>

