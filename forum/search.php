<?php
// Include the database connection script
include 'dbconnect.php';

// Check if the search query is set and not empty
if (isset($_GET['query']) && !empty($_GET['query'])) {
    // Sanitize the search query to prevent SQL injection
    $search_query = $_GET['query'];

    // Prepare the SQL query to search for matching questions
    $sql = "SELECT * FROM questions WHERE question_text LIKE ?";
    $stmt = $conn->prepare($sql);

    // Bind the search query parameter
    $search_param = "%$search_query%";
    $stmt->bind_param("s", $search_param);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any matching questions were found
    if ($result->num_rows > 0) {
        // Display the matching questions
        while ($row = $result->fetch_assoc()) {
            echo "<p><a href='question_page.php?question_id=" . $row['question_id'] . "'>" . $row['question_text'] . "</a></p>";
        }
    } else {
        // If no matching questions were found, generate JavaScript code to display a pop-up message
        echo "<script>";
        echo "alert('No matching questions found.');";
        echo "window.location.href = 'index.php';";
        echo "</script>";
    }

    // Close the statement
    $stmt->close();
} else {
    // If the search query is empty, display an error message
    echo "<script>";
    echo "alert('Please enter a search query.');";
    echo "window.location.href = 'index.php';"; // Redirect to index.php
    echo "</script>";
}

// Close the database connection
$conn->close();
?>
