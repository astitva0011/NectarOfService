<!-- Fixed comment bar -->
<form method="POST" action="question_page.php" class="fixed-comment-bar">
    <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
    <textarea name="comment_text" placeholder="Enter your comment"></textarea>
    <button type="submit">Post to forum</button>
     <!-- Cancel button to redirect back to the index page -->
     <a href="index.php"><button type="button">Cancel</button></a>
</form>
