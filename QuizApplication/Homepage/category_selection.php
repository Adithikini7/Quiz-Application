<?php
session_start();

include('../check_login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Quiz Category</title>
    <link rel="stylesheet" href="style1.css"> 
</head>
<body>
<?php include('nav.php') ?>

<div class="container">
    <h2>Select Quiz Category</h2>
    <table>
        <tr>
            <th>Subject</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>History</td>
            <td><button onclick="startQuiz(1)">Take Quiz</button></td>
        </tr>
        <tr>
            <td>Science</td>
            <td><button onclick="startQuiz(2)">Take Quiz</button></td>
        </tr>
        <tr>
            <td>General Knowledge</td>
            <td><button onclick="startQuiz(3)">Take Quiz</button></td>
        </tr>
    </table>
</div>

<script src="script.js"></script> 

</body>
</html>
