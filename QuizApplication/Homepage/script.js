// script.js

// Function to start the quiz for the selected category
function startQuiz(categoryId) {
    // Redirect to another page based on the selected category ID
    window.location.href = 'quiz.php?category=' + categoryId;
}
