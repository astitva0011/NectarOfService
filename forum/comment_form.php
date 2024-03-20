<!-- Fixed comment bar -->
<style>
    .fixed-comment-bar {
    position: relative;
}

.comment-wrapper {
    position: relative;
}

#comment_text {
    width: 760px;
    padding: 40px;
    margin-right: 10px;
    border: none;
    border-radius: 16px;
    font-size: 20px;
    
}

.sr {
    position: center;
    top: 50%;
    right: 90;
    transform: translateY(-50%);
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: flex-start;
    height: 100%;
    font-size: 20px;
}

.sr button {
    padding: 30px;
    font-size: 15px;
    background: #6a3781;
    border-radius: 30px;
    font-weight: 800;
    box-shadow: 5px 5px 0px 0px #000;
    cursor: pointer;
    border: none;
    color: #fff;
    margin-bottom: 10px;
    margin-left: 10px;
}

.sr button:hover {
    background-color: #6a3781;
}


    </style>
<form method="POST" action="question_page.php" class="fixed-comment-bar" onsubmit="return validateComment()">
    <input type="hidden" name="question_id" value="<?php echo $question_id; ?>">
    <textarea name="comment_text" id="comment_text" placeholder="Enter your comment"></textarea>
    <div class="sr">
        <button type="submit" id="submitBtn">Post to forum</button>
        <!-- Cancel button to redirect back to the index page -->
        <a href="index.php"><button type="button">Cancel</button></a>
    </div>

    <!-- Script for validation -->
    <script>
        function validateComment() {
            var commentText = document.getElementById('comment_text').value.trim();
            if (commentText === '') {
                alert('Please enter your comment.');
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</form>
