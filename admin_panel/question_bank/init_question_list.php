<?php
require_once 'init_question.php';
$questions = $model->getQuestions();
$totalQuestions = count($questions);
$questions = array_reverse($questions);
$question_previews = $questions;
; ?>