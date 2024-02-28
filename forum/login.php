<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
body {
    font-family: 'Poppins', sans-serif;
    height: 100vh;
    width: 100vw;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #84acc4 25%, #ffb443 25%,#ffb443 50%, #f9eaa9 50%,  #f9eaa9 75%,#7b4397 75%);
     display: flex;
    justify-content: center;
    align-items: center;
}

        .form-area {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 30px 35px 2px #52206b;
            padding: 20px;
            text-align: center;
        }

        h2 {
            color: #7b4397;
            font-weight: 900;
            font-size: 1.5em;
            margin-top: 20px;
        }

        label {
            font-weight: 600;
            margin: 5px 0;
        }

        input[type="text"],
        input[type="password"] {
            outline: none;
            border: 2px solid #000;
            box-shadow: 3px 4px 0px 1px #000;
            width: 290px;
            padding: 12px 10px;
            border-radius: 4px;
            font-size: 15px;
            margin-bottom: 10px;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button[type="submit"] {
            padding: 15px;
            width: 310px;
            font-size: 15px;
            background: #7b4397;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 5px 5px 0px 0px #000;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #52206b;
        }

        a {
            font-weight: 800;
            color: #7b4397;
            text-decoration: none;
        }

        a:hover {
            color: #52206b;
        }
    </style>
</head>
<body>
    <div class="form-area">
        <h2>Sign In</h2>
        <?php
        // Check if error message is present in URL parameters
        if (isset($_GET['error']) && !empty($_GET['error'])) {
            $errorMsg = $_GET['error'];
            // Display error message
            echo '<p style="color: red;">' . htmlspecialchars($errorMsg) . '</p>';
        }
        ?>
        <form action="login_process.php" method="post">
            <label for="email">Username or Email:</label><br>
            <input type="text" name="email" placeholder="Email" id="email" required><br>
            <label for="password">Password:</label><br>
            <input type="password" name="password" placeholder="Password" id="password" required><br>
            <input type="checkbox" id="showPassword">
            <label for="showPassword">Show password</label><br>
            <button type="submit">Sign In</button><br>
        </form>

        <!-- Sign up link -->
        <p>Don't have an account? <a href="signup_index.php">Sign up</a></p>
    </div>

    <script>
        // JavaScript code to toggle password visibility
        var passwordField = document.getElementById("password");
        var showPasswordCheckbox = document.getElementById("showPassword");

        showPasswordCheckbox.addEventListener("change", function() {
            if (this.checked) {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        });
    </script>
</body>
</html>
