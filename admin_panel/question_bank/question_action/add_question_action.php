<?php
use nidal\Question;

require_once '../../question_type/init_question_type.php';

// use nidal\Question;
// use nidal\Init;

// require_once '../init_question.php';
// require_once '../../../init.php';
// require_once '../../question_type/init_question_type.php';


// $init = new Init();
//$init->print_butiful_array($_POST);


// Get the question data from the modal
$question_id = isset($_POST['question_id']) ? $_POST['question_id'] : '';
$question_title = $_POST['question_title'];
$question_action = $_POST['action'];
$question_description = $_POST['question_description'];
$question_type = $_POST['question_type'];

$question_answer = isset($_POST['answers']) ? json_encode($_POST['answers']) : '';
// $_POST = array();
// $question_answer = json_encode($question_answer);
//echo json_decode($question_answer);

if ($question_title == NULL || $question_description == NULL || $question_type == NULL) {
    $res = [
        'status' => 422,
        'message' => $init::ALL_FIELD_ARE_MANDATORY
    ];
    echo json_encode($res);
    return;
}

// Create a new question object
$question = new Question($question_id, $question_title, $question_description, $question_type, $question_answer, '');
//echo $question_id;
//$model->startTransaction();
// Add the question to the database
$lastID = $model->addQuestion($question);
if (strlen($question_id) == 0)
    if ($lastID < 1) {
        $res = [
            'status' => 423,
            'message' => $init::DOESNOT . $lastID
        ];
        echo json_encode($res);
        return;
    }
// Update the question preview field
//$questionTypeCode = $questonTypeModel->getQuestionTypeById($lastID);
// $questionTypeCode = $questonTypeModel->getQuestionType();
$questionTypeCode = $questonTypeModel->getQuestionTypeById($question_type);
$question_preview = $init->getQuestionPreview($lastID, $question_title, $question_type, $questionTypeCode, $question_answer);
//echo $question_preview;
$updated = $model->updateQuestionPreview($lastID, $question_preview);
if ($updated) {

    $res = [
        'status' => 0,
        'message' => $init::COMPLETED . " " . $init::OPERATION . $init::SUCCESSFULLY . " " . $question_id

    ];
    echo json_encode($res);
    return;


}
$res = [
    'status' => 500,
    'message' => $init::DOESNOT . "500"
];
echo json_encode($res);
return;



?>