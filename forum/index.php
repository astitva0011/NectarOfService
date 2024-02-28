<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NectarOfService</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            width: 100vw;
            background: #7b4397;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #fff;
            margin-top: 50px;
        }

        main {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1;
        }

        .form-popup {
            display: none;
            position: fixed;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            z-index: 2;
        }

        .form-popup .close {
            position: absolute;
            top: 5px;
            right: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #333;
        }

        .form-popup h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-popup textarea {
            width: 80%;
            padding: 15px;
            font-size: 15px;
            background: #7b4397;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 5px 5px 0px 0px #000;
            cursor: pointer;
            margin-bottom: 20px;
            border: none;
            color: #fff;
        }

        .form-popup button {
            width: 80%;
            padding: 15px;
            font-size: 15px;
            background: #7b4397;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 5px 5px 0px 0px #000;
            cursor: pointer;
            border: none;
            color: #fff;
        }

        .form-popup button:hover {
            background-color: #6a3781;
        }

        .sidebar {
            margin-top: 20px;
            width: 250px;
        }

        .sidebar input[type="text"] {
            width: calc(100% - 80px);
            padding: 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
        }

        .sidebar button {
            width: calc(100% - 80px);
            padding: 15px;
            font-size: 15px;
            background: #7b4397;
            border-radius: 30px;
            font-weight: 800;
            box-shadow: 5px 5px 0px 0px #000;
            cursor: pointer;
            border: none;
            color: #fff;
        }

        .sidebar button:hover {
            background-color: #6a3781;
        }

        .question-list {
            width: 80%;
            margin-top: 20px;
        }

        .question {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .question h2 {
            color: #7b4397;
            margin-bottom: 10px;
        }

        .author {
            color: #333;
        }
    </style>
</head>
<body>
    <h1>💠Forum💠</h1>

    <main>

        <!-- Button to open the popup form -->
        <button class="askq" onclick="openForm()">Ask Question</button>

        <!-- Semi-transparent overlay -->
        <div class="overlay" id="overlay" onclick="closeForm()"></div>

        <!-- Popup form -->
        <div class="form-popup" id="myForm">
            <button type="button" class="close" onclick="closeForm()">X</button>
            <form action="asked_question.php" method="POST" class="form-container">
                <h2>Popup Form</h2>
                <label for="question">Your Question:</label><br>
                <textarea id="question" name="question" rows="4" cols="50" placeholder="Ask meaningful questions, you can start them with 'what' or 'how' and end with '?' mark." required></textarea><br>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
        <div class="sidebar">
            <form action="search.php" method="GET">
                <input type="text" name="query" placeholder="Search for questions">
                <button type="submit">Search</button>
            </form>
        </div>

        <section class="question-list">
            <div class="question">
                <h2>Top Questions</h2>
                <p class="author">
                    <?php include 'show_questions.php'; ?>
                </p>
            </div>
        </section>
    </main>

    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
            document.getElementById("overlay").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
            document.getElementById("overlay").style.display = "none";
        }
    </script>

</body>
</html>
