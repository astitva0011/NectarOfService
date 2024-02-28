<?php
include 'dbconnect.php';
// Start the session to access session variables
session_start();
?>

<div class="login-status">
    <?php
    // Check if the user is logged in
    if (isset($_SESSION['user_id'])) {
        // User is logged in, display logout button
        echo '<a href="logout.php">Logout</a>';
    } else {
        // User is not logged in, display login button
        echo '<a href="login.php">Login</a>';
    }
    ?>
</div>
