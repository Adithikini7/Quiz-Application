<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection

    include('../config.php');

    // Extract submitted answers from the $_POST array
    $answers = $_POST['answers'];

    // Process the submitted answers and calculate the score
    $score = 0;
    foreach ($answers as $question_id => $selected_option) 
    {
        $query = "SELECT correct_option FROM quiz_questions WHERE question_id = $question_id";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
        if ($row['correct_option'] == $selected_option) {
            $score += 5; 
        }
        }
    }

    
    $user_id = $_SESSION['user_id'];

    $category_id = $_GET['category_id'] ?? null;

    $current_date = date('Y-m-d');

    if ($category_id !== null) {
        $insert_query = "INSERT INTO quiz_results (user_id, category_id, score,quiz_date) VALUES ($user_id, $category_id, $score,'$current_date')";

        if (mysqli_query($con, $insert_query)) {
            echo "<script>alert('Quiz results stored successfully!')</script>";
            echo "<script>location.href='view_results.php'</script>";
        } else {
            echo "Error: " . $insert_query . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Category ID not provided!";
    }

    
    mysqli_close($con);
} else {
    
    echo "Form not submitted!";
}
?>
