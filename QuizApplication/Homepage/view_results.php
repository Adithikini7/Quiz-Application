<?php
session_start();

include('../check_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Results</title>
    <link rel="stylesheet" href="style1.css"> 
</head>
<body>

<?php include('nav.php'); ?>
<div class="container">
<h2> Quiz Results</h2>
<?php
// Database connection

include('../config.php');

// Assuming you have the user ID available (replace with the actual user ID)
$user_id = $_SESSION['user_id'];

// Query to retrieve quiz results for the user
$query = "SELECT quiz_categories.category_name, quiz_results.score
          FROM quiz_results
          INNER JOIN quiz_categories ON quiz_results.category_id = quiz_categories.category_id
          WHERE quiz_results.user_id = $user_id";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    // Display table header
    echo "<table border='1'>";
    echo "<tr><th>Category</th><th>Score</th></tr>";

    // Display table rows
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['category_name']}</td>";
        echo "<td>{$row['score']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No quiz results found for the user.";
}

// Close the database connection
mysqli_close($con);
?>

</div>
</body>
</html>
