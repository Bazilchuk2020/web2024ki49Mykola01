<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
            color: #00cccc; /* Зміна коліру тексту на берюзовий */
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
            color: #00cccc; /* Зміна коліру тексту на берюзовий */
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <h1>Welcome to My Website</h1>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="about.php">About Me</a></li>
                <li><a href="project.php">My Project</a></li>
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

    <form action="registration.php">
        <input type="submit" value="Go to Registration">
    </form>

    <script>
        // AJAX for loading pages without refreshing the whole page
        $(document).ready(function(){
            $('nav ul li a').click(function(e){
                e.preventDefault();
                var page = $(this).attr('href');
                $('#content').load(page);
            });
        });
    </script>
</body>
<div class="form-btn ajax ">
                <input type="submit" class="btn btn-primary" value="Check Users" >
</div>
<script>
$(document).ready(function () {
    function handleAjaxResponse(data) {
    
    $('.information').html(data);
  }
    $('.ajax').click(function (event) {
        event.preventDefault();
        sendAjaxRequest();
    });

    function sendAjaxRequest() {
       
        $.ajax({
            url: 'users.php',
            method: 'GET',
            success: function (data) {
               
                handleAjaxResponse(data);
            },
            error: function (error) {
                
                console.error('AJAX Error:', error);
            }
        });
    }
});
</script>
<div class="information"></div>
</html>
