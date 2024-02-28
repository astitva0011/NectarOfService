<?php
include 'handle_comment_submission.php'; // Include the file for handling comment submission
include 'retrieve_question_details.php'; // Include the file for retrieving question details and comments
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/NectarOfService/forum/styles.css">
    <title>Question Page</title>
    <!-- Link to your CSS stylesheet -->
    <style>
        
    </style>
</head>
<body>
    <h1>Question</h1>
    <?php if(isset($question_row)): ?>

        <div class="question">
            <p><strong>Question:</strong> <?php echo $question_row["question_text"]; ?></p>
            <p><strong>Asked by:</strong> <?php echo $question_row["user_id"]; ?></p>
            <p><strong>Date:</strong> <?php echo $question_row["date"]; ?></p>
        </div>
    <?php else: ?>
        <p>No question found.</p>
    <?php endif; ?>

    <h2>Comments</h2>
    <?php if(isset($comments_result) && $comments_result->num_rows > 0): ?>

        <div class="comments">
            <?php while($comment_row = $comments_result->fetch_assoc()): ?>
                <div class="comment">
                    <p><?php echo $comment_row["comment_text"]; ?></p>
                    <p><strong>Commented by:</strong> <?php echo $comment_row["user_id"]; ?></p>
                    <br>
                    <p><strong>Date:</strong> <?php echo $comment_row["date"]; ?></p>
                    <br>
                </div>
            <?php endwhile; ?>
        </div>
    <?php else: ?>
        <p>No comments found.</p>
    <?php endif; ?>

    <!-- Fixed comment bar -->
    <div class="comment_form">
        <?php include 'comment_form.php'; // Include the file for the comment form ?>
    </div>
</body>
</html>
