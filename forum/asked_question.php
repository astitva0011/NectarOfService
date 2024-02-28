<?php
// Include the database connection script
include 'dbconnect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $question = $_POST['question'];    // Optionally, you can extract user_id if you have a way to identify the user
    // $user_id = $_SESSION['user_id']; // for future use when the user will be logged in

    // Check if the question already exists
    $check_query = "SELECT question_id FROM questions WHERE question_text = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $question);
    $stmt->execute();
    $stmt->store_result();

    // If the question already exists, redirect the user to the existing question page
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($question_id);
        $stmt->fetch();
        header("Location: question_page.php?id=$question_id");
        exit();
    }

    // Prepare and execute the SQL query to insert the question into the database
    $stmt = $conn->prepare("INSERT INTO questions (question_text) VALUES (?)");
    // Assuming user_id is captured from the form or session
    $stmt->bind_param("s", $question); // 's' indicates a string, 'i' indicates an integer
    $user_id = 1; // For example, replace '1' with the actual user ID if available
    $stmt->execute();

    // Check if the insertion was successful
    if ($stmt->affected_rows > 0) {
        echo "Question submitted successfully.";
    } else {
        echo "Error submitting question.";
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

header("Location: index.php");
exit(); // Ensure that no further code is executed after the redirection
?>
