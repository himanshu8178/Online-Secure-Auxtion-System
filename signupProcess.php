<?php
// Establish a database connection (replace with your database credentials)
$conn = new mysqli("localhost", "root", "", "auxtion");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $signupSuccess = true;
// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $mobilenumber = $_POST["mobilenumber"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $documentType = $_POST["document"];
    $documentnumber = $_POST["documentnumber"];
    $email = $_POST["email"];

    // Check if the username is already taken
    $check_username_query = "SELECT id FROM signupinfo WHERE username = '$username'";
    $result = $conn->query($check_username_query);

    if ($result->num_rows > 0) {
        echo "Username is already taken. Please choose another.";
    } else {
        // Insert user data into the database
        $sql = "INSERT INTO signupinfo (firstname, lastname, phonenumber, username, email, password,documenttype, documentnumber) VALUES ('$firstname', '$lastname', '$mobilenumber', '$username', '$email', '$password','$documentType','$documentnumber' )";
        if ($conn->query($sql) === TRUE) {
        // Get the newly generated user_id
        $user_id = $conn->insert_id;
        
        // Insert user_id into the kyc_info table
        $sql_kyc = "INSERT INTO kyc_info (user_id, done) VALUES ($user_id, 0)"; // Assuming 'done' defaults to 0
        
        if ($conn->query($sql_kyc) === TRUE) {
            echo "Signup successful!";
            $signupSuccess = true;
        } else {
            echo "Error inserting into kyc_info: " . $conn->error;
        }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
    
// Close the database connection
$conn->close();
if ($signupSuccess) {
    header("Location: login.php");
    
    exit;
}
?>
