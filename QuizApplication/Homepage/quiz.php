<?php 
session_start();

include('../check_login.php');

$user_id = $_SESSION['user_id'];
$category_id = $_GET['category'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="style1.css"> 
</head>
<body>

<?php include('nav.php'); ?>

<div class="container">
    <h2>Quiz Questions</h2>
    <form action="submit_quiz.php?category_id=<?php echo $category_id; ?>" method="post">
        <?php

            include('../config.php');

        // Check if category ID is provided in the URL
        if (isset($_GET['category'])) {
            // Sanitize and retrieve the category ID
            $category_id = mysqli_real_escape_string($con, $_GET['category']);

            // Fetch questions from the database based on the category ID
            $query = "SELECT question_id,question_text, option1, option2, option3, option4 FROM quiz_questions WHERE category_id = $category_id";

            // Execute the query and fetch the results
            $result = mysqli_query($con, $query);

            // Check if there are questions available for this category
            if (mysqli_num_rows($result) > 0) {
                // Iterate through each question and display them
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<h3>{$row['question_text']}</h3>";
                    // Display options for the question
                    echo "<input type='radio' name='answers[{$row['question_id']}]' value='1'> {$row['option1']}<br>";
                    echo "<input type='radio' name='answers[{$row['question_id']}]' value='2'> {$row['option2']}<br>";
                    echo "<input type='radio' name='answers[{$row['question_id']}]' value='3'> {$row['option3']}<br>";
                    echo "<input type='radio' name='answers[{$row['question_id']}]' value='4'> {$row['option4']}<br>";
                }
                // Add a submit button or any other navigation buttons here
                echo "<button type='submit'>Submit</button>";
            } else {
                echo "No questions available for this category.";
            }
        } else {
            // Handle case when category ID is not provided
            echo "Category ID is not provided.";
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </form>
</div>

</body>
</html>
