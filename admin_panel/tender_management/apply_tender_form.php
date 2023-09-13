<?PHP

$tender_questions = $tenderModel->getTenderQuestions($tenderId);
foreach ($tender_questions as $question) {
    $questionPreview = $model->getQuestionById($question['question_bank_id'])->question_preview;
}

?>