<?php
use nidal\Question;
use nidal\QuestionModel;

require_once __DIR__ . 'init_question.php';
require_once 'add_question_modal.php';

// Get the model
$model = new QuestionModel();

// Get the current user
$user = $_SESSION['user'];

// Get the question data from the modal
$title = $_POST['title'];
$description = $_POST['description'];
$question_type = $_POST['question_type'];
$answers = $_POST['answers'];

// Create a new question object
$question = new Question($id, $title, $description, $question_type, $answers);

// Add the question to the database
$model->addQuestion($question);

// Redirect to the question list page
header('Location: questions.php');

?>