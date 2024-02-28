<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NectarOfService - Signup</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .container {
            text-align: center;
        }

        .form_area {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 30px 35px 2px #52206b;
            padding: 20px;
        }

        .title {
            color: #7b4397;
            font-weight: 900;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        .form_group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
        }

        .form_style {
            outline: none;
            border: 2px solid #000;
            box-shadow: 3px 4px 0px 1px #000;
            width: 100%;
            padding: 12px 10px;
            border-radius: 4px;
            font-size: 15px;
            margin-top: 5px;
        }

        .btn {
            padding: 15px;
            width: 100%;
            font-size: 15px;
            background: #7b4397;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 5px 5px 0px 0px #000;
            cursor: pointer;
        }

        p {
            margin-top: 20px;
            font-weight: 600;
        }

        .link {
            font-weight: 800;
            color: #7b4397;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form_area">
            <h2 class="title">Sign up</h2>
            <form action="signup.php" method="post">
                <!-- Display error message if exists -->
                <?php if (!empty($errorMsg)) : ?>
                    <div><?php echo $errorMsg; ?></div>
                <?php endif; ?>
                <!-- Signup form fields -->
                <div class="form_group">
                    <label for="username">Name*</label><br>
                    <input type="text" name="username" placeholder="Your name" id="username" class="form_style" required><br>
                </div>
                <div class="form_group">
                    <label for="email">Email*</label><br>
                    <input type="email" name="email" placeholder="Your email" id="email" class="form_style" required><br>
                </div>
                <div class="form_group">
                    <label for="password">Password*</label><br>
                    <input type="password" name="password" placeholder="Your password" id="password" class="form_style" required><br>
                    <input type="checkbox" id="showPassword">
                    <label for="showPassword">Show password</label>
                </div>
                <div class="form_group">
                    <button type="submit" class="btn">Signup</button>
                </div>
            </form>
            <!-- Sign in link -->
            <p>Already have an account? <a href="login.php" class="link">Sign in</a></p>
        </div>
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
