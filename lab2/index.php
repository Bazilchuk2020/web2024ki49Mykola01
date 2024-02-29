<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1, nav ul li a {
            color: #00cccc;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #00cccc;
            text-decoration: none;
        }

        #content {
            padding: 20px;
        }

        form {
            text-align: center;
            margin-top: 20px;
            display: inline-block;
            margin-left: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        input[type="submit"] {
            color: #000;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
        <nav>
            <ul>
                <li><a href="#" onclick="loadPage('home.php')">Home</a></li>
                <li><a href="#" onclick="loadPage('about.php')">About Me</a></li>
                <li><a href="#" onclick="loadPage('project.php')">My Project</a></li>
            </ul>
        </nav>
    </header>
    
    <div id="content">
        <?php
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            include("$page.php");
        } else {
            include("home.php");
        }
        ?>
    </div>

    <form id="registrationForm" action="registration.php">
        <input type="submit" value="Go to Registration">
    </form>

    <div class="form-btn ajax">
        <input id="checkUsersBtn" type="submit" class="btn btn-primary" value="Check Users">
    </div>

    <div class="information"></div>

    <script>
        function loadPage(page) {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('content').innerHTML = xhr.responseText;
                } else {
                    console.error('AJAX Error:', xhr.statusText);
                }
            };
            xhr.open('GET', page, true);
            xhr.send();
        }

        function handleAjaxResponse(data) {
            document.querySelector('.information').innerHTML = data;
        }

        document.getElementById('checkUsersBtn').addEventListener('click', function(event) {
            event.preventDefault();
            sendAjaxRequest();
        });

        function sendAjaxRequest() { //
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    handleAjaxResponse(xhr.responseText);
                } else {
                    console.error('AJAX Error:', xhr.statusText);
                }
            };
            xhr.open('GET', 'users.php', true);
            xhr.send();
        }
    </script>
</body>
</html>
