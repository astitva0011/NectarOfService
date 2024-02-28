<?php
include 'dbconnect.php'; // Include the database connection script

// Handle comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_text']) && isset($_POST['question_id'])) {
    $comment_text = $_POST['comment_text'];
    $question_id = $_POST['question_id'];

    // Insert the new comment into the database
    $insert_comment_sql = "INSERT INTO comments (question_id, comment_text) VALUES (?, ?)";
    $stmt = $conn->prepare($insert_comment_sql);
    $stmt->bind_param("is", $question_id, $comment_text);
    $stmt->execute();
    $stmt->close();

    // Redirect to the question page after posting a comment
header("Location: question_page.php?question_id=$question_id");
exit;

}

// Fetch comments for the corresponding question from the database
if (isset($_GET['id'])) {
    $question_id = $_GET['id'];
    $get_comments_sql = "SELECT * FROM comments WHERE question_id = ?";
    $stmt = $conn->prepare($get_comments_sql);
    $stmt->bind_param("i", $question_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display comments
    while ($row = $result->fetch_assoc()) {
        // Output each comment
        echo "<p>{$row['comment_text']}</p>";
    }
    $stmt->close();
}
?>
