<?php
use nidal\Question;
use nidal\Init;
use nidal\TenderModel;

require_once '../init_question.php';
require_once '../../../init.php';
require_once '../../question_type/init_question_type.php';
require_once '../../tender_management/tender_model.php';


$init = new Init();
$tenderModel = new TenderModel();

$questionAction = $_POST['action'];
switch ($questionAction) {
    case 'addQuestion':
        require_once 'add_question_action.php';
        break;

    case 'addNewQuestionForTender':
        require_once 'add_question_action.php';
        break;
    case 'deleteQuestion':
        $res = [];
        // echo $_POST['questionId'];
        // $init->print_butiful_array($model->validateDeleteQuestion($_POST['questionId'])[0]['count']);
        // // $x = intval($model->validateDeleteQuestion($_POST['questionId'])[0]);
        // echo $x;
        intval($model->validateDeleteQuestion($_POST['questionId'])[0]['count']) > 0 ?
            // $init->getStatusMessage(423, $init::YOU_CANT_DELETE . $init::SPACE . $init::THE_QUESTION . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE)
            $res = [
                'status' => 423,
                'message' => $init::YOU_CANT_DELETE . $init::SPACE . $init::THE_QUESTION . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE
            ] :

            ($model->deleteQuestion($_POST['questionId']) ?
                $res = [
                    'status' => 0,
                    'message' => $init::DELETED_SUCCESSFULLY
                ] : $res = [
                    'status' => 500,
                    'message' => $init::DOESNOT . $init::SPACE . $init::PREVIEW . $init::SPACE . $init::QUESTION
                ]);

        echo json_encode($res);
        // return;

        break;
    case 'deleteTenderQuestion':
        $res = [];
        $tenderModel->deleteTenderQuestion($_POST['tenderId'], $_POST['questionId']) ?
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
    case 'getTenderQuestions':
        // $init->print_butiful_array($_POST);
        $init->getTenderQuestionshtml($model, $tenderModel, $_POST['tenderId']);
        // $res = [];
        // $tenderModel->deleteTenderQuestion($_POST['tenderId'], $_POST['questionId']) ?
        //     $res = [
        //         'status' => 0,
        //         'message' => $init::DELETED_SUCCESSFULLY
        //     ] : $res = [
        //         'status' => 500,
        //         'message' => $init::DOESNOT . $init::SPACE . $init::PREVIEW . $init::SPACE . $init::QUESTION
        //     ];

        // echo json_encode($res);
        // return;

        break;
    case 'previewQuestion':
        // echo $_POST['questionId'];
        // $questionPreview = $model->getQuestionById($_POST['questionId']);
        $questionPreview = $model->getQuestionById($_POST['questionId']);
        if ($questionPreview === null) {
            $questionPreview = "";
        } else {
            $questionPreview = $model->getQuestionById($_POST['questionId'])->question_preview;
        }
        // if ($questionPreview !== null) {
        //     $questionPreview->$questionPreview;
        // }
        !empty($questionPreview) ?
            $res = [
                'status' => 0,
                'message' => $questionPreview,
            ] : $res = [
                'status' => 500,
                'message' => 'no question to preview'
            ];


        echo json_encode($res);
        break;
    case 'addToTender':
        // $init->print_butiful_array($_POST);


        // Get the tender ID and question bank IDs
        $tenderId = $_POST['tenderId'];
        $tenderModel->deleteTenderQuestions($tenderId);
        $questionBankIds = $_POST['questionBankIds'];
        $questionBankIdsArray = explode(",", $questionBankIds);
        $init->print_butiful_array($questionBankIdsArray);
        // var_dump($questionBankIdsArray);



        // Create one or more tender questions in the database
        foreach ($questionBankIdsArray as $questionBankId) {
            echo "$tenderId $questionBankId";

            $tenderModel->createTenderQuestion($tenderId, $questionBankId);
        }

        // Return a response to the Ajax request
        $response = array(
            'success' => true,
            'message' => 'The tender question was created successfully.'
        );

        echo json_encode($response);


        // $x = explode(",", $_POST['questionBankIds']);
        // $x = $x[0];
        // // $questionPreview = $model->getQuestionById($_POST['questionId'])->question_preview;
        // // !empty($questionPreview) ?
        // $res = [
        //     'status' => 0,
        //     'message' => 'addToTender',
        //     'tenderId' => $_POST['tenderId'],
        //     'questionBankId' => $x,
        //     'action' => 'addToTender'

        // ];

        // echo json_encode($res);
        // echo "Success";
        break;

    case 'editQuestion':

        if (intVal($model->validateDeleteQuestion($_POST['questionId'])[0]['count']) > 0) {
            $res = [
                'status' => 423,
                'message' => $init::YOU_CANT_EDIT . $init::SPACE . $init::THE_QUESTION . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE
            ];
        } else {
            $question = $model->getQuestionById($_POST['questionId']);

            if ($question->question_type > 3 && $question->question_type < 6 && empty($question->question_answers)) {
                $res = [
                    'status' => 424,
                    'message' => $init::AT_LEAST_ONE_ANSWER,
                ];
            } else {
                !empty($question) ?
                    $res = [
                        'status' => 0,
                        'message' => $question
                    ] : $res = [
                        'status' => 500,
                        'message' => $init::DOESNOT_EXISTS
                    ];
            }
        }
        // $init->getStatusMessage(423, $init::YOU_CANT_DELETE . $init::SPACE . $init::THE_QUESTION . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE)



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