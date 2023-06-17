<?php
use nidal\Question;
use nidal\Init;

require_once '../init_question.php';
require_once '../../../init.php';
require_once '../../question_type/init_question_type.php';


$init = new Init();
//$init->print_butiful_array($_POST);
$questionAction = $_POST['action'];
switch ($questionAction) {
    case 'addQuestion':
        require_once 'add_question_action.php';
        break;
    case 'deleteQuestion':
        $res = [];
        $model->deleteQuestion($_POST['questionId']) ?
            $res = [
                'status' => 0,
                'message' => $init::DELETED_SUCCESSFULLY
            ] : $res = [
                'status' => 500,
                'message' => $init::DOESNOT . $init::SPACE . $init::PREVIEW . $init::SPACE . $init::QUESTION
            ];

        echo json_encode($res);
        // return;

        break;
    case 'previewQuestion':
        // echo $_POST['questionId'];
        $questionPreview = $model->getQuestionById($_POST['questionId'])->question_preview;
        !empty($questionPreview) ?
            $res = [
                'status' => 0,
                'message' => $questionPreview
            ] : $res = [
                'status' => 500,
                'message' => $init::DOESNOT_DELETED_SUCCESSFULLY
            ];
        echo json_encode($res);
        break;

    case 'editQuestion':
        $question = $model->getQuestionById($_POST['questionId']);
        !empty($question) ?

            $res = [
                'status' => 0,
                'message' => $question
            ] : $res = [
                'status' => 500,
                'message' => $init::DOESNOT_EXISTS
            ];
        echo json_encode($res);
        break;


    default:
        # code...
        break;
}

// // Get the question data from the modal
// $question_title = $_POST['question_title'];
// $question_description = $_POST['question_description'];
// $question_type = $_POST['question_type'];
// if ($question_title == NULL || $question_description == NULL || $question_type == NULL) {
//     $res = [
//         'status' => 422,
//         'message' => $init::ALL_FIELD_ARE_MANDATORY
//     ];
//     echo json_encode($res);
//     return;
// }

// // Create a new question object
// $question = new Question('', $question_title, $question_description, $question_type, '', '');
// //$model->startTransaction();
// // Add the question to the database
// $lastID = $model->addQuestion($question);
// if ($lastID < 1) {
//     $res = [
//         'status' => 423,
//         'message' => $init::DOESNOT_ADDED_SUCCESSFULLY
//     ];
//     echo json_encode($res);
//     return;
// }
// // Update the question preview field
// $questionTypeCode = $questonTypeModel->getQuestionTypeById($lastID);
// $question_preview = $init->getQuestionPreview($lastID, $question_title, $question_type);
// $updated = $model->updateQuestionPreview($lastID, $question_preview);
// if ($updated) {

//     $res = [
//         'status' => 0,
//         'message' => $init::ADDED_SUCCESSFULLY
//     ];
//     echo json_encode($res);
//     return;


// }
// $res = [
//     'status' => 500,
//     'message' => $init::DOESNOT_ADDED_SUCCESSFULLY
// ];
// echo json_encode($res);
// return;


// Redirect to the question list page
//header('Location: ../index.php');

?>