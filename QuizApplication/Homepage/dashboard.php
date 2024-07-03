<?php
session_start();

include('../check_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Application</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php include('nav.php') ?>
<center><img src="images\article-quiz.png" alt="Description of the image"></center>
<div class="container">
<h2>Are you ready to put your knowledge to the test?</h2>
<p> QuizMaster offers a diverse
   collection of quizzes on a wide range of topics, so you're sure to find something that interests you. 
   Whether you're a history buff, a science enthusiast, or just looking to challenge yourself with some 
   general knowledge questions, we've got you covered.</p>
</div>
</body>
</html>
