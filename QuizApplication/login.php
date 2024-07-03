<?php
session_start();

// Database connection parameters
$host = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "quizapplication"; 

// Establish connection
$con = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];
        if(password_verify($password, $hashed_password)) {
            // Authentication successful
            $_SESSION['user_id'] = $row['user_id']; 
            $_SESSION['username'] = $row['username'];
            $_SESSION['is_admin'] = $row['is_admin']; 
            if($_SESSION['is_admin']==1){
                header("Location: Homepage/add_question_form.php"); 
            }
            else
            {
            header("Location: Homepage/dashboard.php"); 
            exit;
            }
        } else {
            // Authentication failed
            $error_message = "Invalid username or password";
        }
    } else {
        // User not found, redirect to registration page
        header("Location: register.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Login</h2>
    <?php if(isset($error_message)): ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="login" value="Login">
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
