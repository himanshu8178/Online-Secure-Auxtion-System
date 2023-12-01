<?php
// Establish a database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "auxtion");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store user input
$username = "";
$password = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "SELECT si.id, si.username, si.password, ki.emailkyc, ki.email FROM signupinfo si LEFT JOIN kyc_info ki ON si.id = ki.user_id WHERE si.username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];
        $_SESSION["user_id"] = $user_id;
        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            if ($row["emailkyc"] == 1) {

                header("Location: sendvotp.php");
                exit();
            } else {
                header("Location: dashboard.php");
                exit();
            }
        } else {
            header("Location: login.php");
        }
    } else {
        echo "Username not found. Please check your username.";
    }
}

// Close the database connection
$conn->close();
?>
