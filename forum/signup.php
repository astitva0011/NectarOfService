<?php

// Include the dbconnect.php file
require_once 'dbconnect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data from POST request
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // User with the same username or email already exists
       
        echo "<a href='login.php'>login</a> instead.";
         } 
    else {
        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement to insert user data into 'users' table
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $statement = $conn->prepare($sql);

        // Bind parameters and execute the statement
        $statement->bind_param("sss", $username, $email, $hashedPassword);
        if ($statement->execute()) {
            // Signup successful
            // Redirect to the forum page
            header("Location: index.php");
            exit; // Ensure that no other output is sent
        } else {
            // Handle signup failure
            echo "Error: " . $conn->error;
        }

        // Close statement
        $statement->close();
    }

    // Close result set
    $result->close();
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}

?>
