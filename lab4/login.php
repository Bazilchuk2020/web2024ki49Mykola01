<?php
ini_set('display_errors', 1); error_reporting(E_ALL);

session_start();


    if(isset($_POST["login"])) {
    
    require_once "database.php";

   
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    
    if ($user && $password === $user["password"]) {
        
        $_SESSION["user"] = $user;

        
        header("Location: acount.php");
        exit;
    } else {
        
        echo "Invalid email or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        body {
           background-color: #000; 
            color: #fff; 
            background-color: #62cbb8;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: green;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 100px auto;
            max-width: 400px;
            padding: 30px;
            border: 2px solid yellow; 
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #000;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .register-link a {
            margin-top: 10px;
            text-align:center;
            color: black; 
        }
        .register-link p {
            margin-bottom: 0; 
        }
    </style>
     <script src="https://accounts.google.com/gsi/client" async></script>
</head>
<body>
    <div class="container">
        
        <form action="login.php" method="post">
            <div class="form-group">
                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
            </div>
        </form>
        <div class="register-link">
            <p> <a href="registration.php">Register Here</a></p>
        </div>
        <div id="g_id_onload"
    data-client_id="957468054911-eu2kgqd5tull01c8hc23u918bgv85qm0.apps.googleusercontent.com"
    data-context="signin"
    data-ux_mode="popup"
    data-callback="handleCredentialResponse"
    data-auto_prompt="false">
</div>

<div class="g_id_signin"
    data-type="standard"
    data-shape="rectangular"
    data-theme="outline"
    data-text="signin_with"
    data-size="large"
    data-logo_alignment="left">
</div>
    </div>
</body>

<script>

async function handleCredentialResponse(response){
      const response123= JSON.parse(atob(response.credential.split('.')[1]))           
    console.log(response123)
    var formData = new FormData();
    formData.append("email",response123.email)
            var xhr = new XMLHttpRequest();
            xhr.open('Post', 'autor.php', true);
 xhr.onload = function() {
              window.location.href="acount.php"
            };
            xhr.send(formData);

}
</script>

</html>
