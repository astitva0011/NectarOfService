<?php

// Include the dbconnect.php file
require_once 'dbconnect.php';

// Initialize error message
$errorMsg = '';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST request
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Invalid email format. Please enter a valid email address.";
        header("Location: login.php?error=" . urlencode($errorMsg));
        exit;
    } else {
        // Prepare SQL statement to fetch user data from 'users' table based on email
        $sql = "SELECT password FROM users WHERE email = ?";
        $statement = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $statement->bind_param("s", $email);
        $statement->execute();

        // Get result
        $result = $statement->get_result();

        if ($result->num_rows == 1) {
            // User exists, verify password
            $row = $result->fetch_assoc();
            $hashedPassword = $row['password'];

            // Verify the password using password_verify function
            if (password_verify($password, $hashedPassword)) {
                // Password is correct, user authenticated
                // Start session and store user data if needed
                session_start();
                // No need to fetch userID since we are only verifying credentials
                // Redirect to dashboard or another page
                header("Location: index.php");
                exit;
            } else {
                // Password is incorrect
                $errorMsg = "Incorrect password. Please try again.";
                header("Location: login.php?error=" . urlencode($errorMsg));
                exit;
            }
        } else {
            // User does not exist
            $errorMsg = "Invalid credentials. Please check the email and password.";
            header("Location: login.php?error=" . urlencode($errorMsg));
            exit;
        }

        // Close statement and database connection
        $statement->close();
        $conn->close();
    }
} else {
    // Handle invalid request method
    $errorMsg = "Invalid request method.";
    header("Location: login.php?error=" . urlencode($errorMsg));
    exit;
}

?>
