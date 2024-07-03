<?php
session_start();

include('../config.php');

// Check if the user is logged in and is an admin
if (!isset($_SESSION['is_admin'])) {
    header("Location: ../login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Insert question</title>
<link rel="stylesheet" href="style1.css">
</head>
<body>
<div>
<form method="POST" action="#">
<p>category ID<br>
<input type="number" placeholder="categoryid" name="categoryid" required maxlength="50">
</p>
<p>Question<br>
<input type="text" placeholder="question" name="question" required max="100" min="18">
</p>
<p>option 1<br>
<input type="text" placeholder="option1" name="option1" required max="100" min="18">
</p>
<p>option 2<br>
<input type="text" placeholder="option2" name="option2" required max="100" min="18">
</p>
<p>option 3<br>
<input type="text" placeholder="option3" name="option3" required max="100" min="18">
</p>
<p>option 4<br>
<input type="text" placeholder="option4" name="option4" required max="100" min="18">
</p>
<p>correct option<br>
<input type="number" placeholder="correctoption" name="correctoption" required max="100">
</p>
<br>
<input type="submit" style="width:100%;" name="add" value="add">
</form>
<?php
if(isset($_POST['add']))
{
$categoryid=$_POST['categoryid'];
$question=$_POST['question'];
$option1=$_POST['option1'];
$option2=$_POST['option2'];
$option3=$_POST['option3'];
$option4=$_POST['option4'];
$correctoption=$_POST['correctoption'];
$query ="INSERT INTO `quiz_questions`(`category_id`,`question_text`,`option1`, `option2`,`option3`,`option4`,`correct_option`) VALUES
('".$categoryid."','".$question."','".$option1."','".$option2."','".$option3."','".$option4."','".$correctoption."')";
mysqli_query($con, $query);
echo "<script>
alert('Added Successfully');
</script>";
echo "<script> location.href=''; </script>";
}
?>

</body>
</html>