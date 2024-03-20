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
        /* Apply styles from styles.css */
        /* Add any additional styles specific to this page */
        body {
            background-color: #4799ae;
            padding: 2px;
            height: 10vh;
            width: auto;
        }

        h1 {
            height: 12
            vh;
            text-align: center;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .question {
            background-color: #4CAF50;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 30px;
            box-shadow: 5px 5px 0px 0px #000;
            color: #000000;
        }

        .question p {
            margin: 0;
        }

        .question p strong {
            font-weight: bold;
        }

        .comments {
            margin-top: 20px;
        }

        .comment {
            background-color: #000000;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment p {
            margin: 0;
            color: #fff;
        }

        .comment p strong {
            font-weight: bold;
        }

        .comment_form {
            background-color: #000000;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .comment_form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            transition: border-color 0.3s ease;
            color: #000;
        }

        .comment_form textarea:focus {
            outline: none;
            border-color: #007bff;
        }

        .comment_form button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .comment_form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
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

    <!-- Fixed comment bar -->
    <div class="comment_form">
        <?php include 'comment_form.php'; // Include the file for the comment form ?>
    </div>
</body>
</html>
