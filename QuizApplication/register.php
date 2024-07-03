<?php
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

// Check if the registration form is submitted
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the username is 'admin'
    $is_admin = ($username === 'admin') ? 1 : 0;


    $query = "INSERT INTO users (username, email, password,is_admin) VALUES ('$username', '$email', '$hashed_password',$is_admin)";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo '<script>alert("Registration successful! Please login."); window.location.href = "login.php";</script>';;
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <h2>Register</h2>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" name="register" value="Register">
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>
</body>
</html>
