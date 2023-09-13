<?PHP
use nidal\Init;
use nidal\Tender;
use nidal\TenderModel;

require_once '../../init.php';
require_once 'tender.php';
require_once 'tender_model.php';
require_once '../../admin_panel/question_bank/init_question_list.php';
$tenderModel = new TenderModel();

//require_once 'tender_management/tender_model.php';
$init = new Init();


// $current_page = $_GET['page_link'];
// $res = [
//     'status' => 0,
//     'current_page' => $current_page,
//     //'message' => $items
// ];
// echo json_encode($res);
// return;
// if (isset($current_page)) {
//     // // $current_page = 1;
//     // $page = 1;
//     $total_pages = ceil(count($question_previews) / 10);
//     // // If the current page is not defined, set it to 1
//     // if (!isset($current_page)) {
//     //     $current_page = 1;
//     // }
//     // $items = array_slice($question_previews, ($current_page - 1) * 10, 10);

//     $res = [
//         'status' => 0,
//         'current_page' => $current_page,
//         'total_page' => $total_pages,
//         //'message' => $items
//     ];
//     echo json_encode($res);
//     return;




// }
$postData = $_POST;
$tenderData = [
    'tender_id' => '',
    'tender_title' => '',
    'tender_start_date' => '',
    'tender_due_date' => '',
    'tender_details' => '',
    'tender_description' => '',
    'tender_status_id' => '',
    'tender_questions_bank' => '',
    'tender_winner' => '',
    'tender_applied_code' => '',
    'tender_attachment_id' => '',
    'tender_pinned' => '',
    'tender_posted' => '',
    'tender_classification_id' => ''
];
// $init->print_butiful_array($_POST);
if (!empty($_POST['tender_attachment_id'])) {
    $_POST['tender_attachment_id'] = json_encode($_POST['tender_attachment_id']);
}

$data = array_merge($tenderData, $_POST);
// $init->print_butiful_array($data);
$tender = new Tender($data);
// $init->print_butiful_array($tender);
// $init->print_butiful_array($_POST);
if (!empty($_POST['action'])) {
    // session_start();
    if ($_POST['action'] === 'applyToTender') {
        // session_start();
        // echo $_SESSION[0]['user_id'];
        // $init->print_butiful_array($_POST);
        // print(sizeof($_POST));
        if (sizeof($_POST) > 2) {
            if ($init->checkNullEntries($_POST) || is_null($_POST) || empty($_POST)) {
                // echo 'd';
                echo json_encode($init->getStatusMessage(422, $init::ALL_FIELD_ARE_MANDATORY));
                return;
            } else {
                session_start();
                $applicantAnswers = [];


                foreach ($_POST as $key => $value) {

                    if (str_starts_with($key, 'answer')) {
                        if (is_array($value)) {
                            array_push($applicantAnswers, implode(', ', $value));
                        } else {
                            array_push($applicantAnswers, $value);
                        }
                    }


                }

                // $init->print_butiful_array($postData);
                // $init->print_butiful_array($applicantAnswers);
                $applyTener = $tenderModel->applyTender($_POST['tenderId'], $_SESSION['user'][0]['user_id']);
                if ($applyTener) {
                    echo json_encode($init->getStatusMessage(0, "success"));
                } else {
                    echo json_encode($init->getStatusMessage(500, "failure"));
                }

                return;

                // $applyTener = $tenderModel->applyTender($_POST['tenderId'], $_SESSION['user'][0]['user_id']);
                // if ($applyTener) {

                // }
                // return;

                // }


            }
        } else {
            echo json_encode($init->getStatusMessage(0, "success"));

        }
        $applicantAnswers = [];
        return;

    }
    if ($_POST['action'] === 'applyToTenderBtn') {
        $tender_questions = $tenderModel->getTenderQuestions(($_POST['tenderId']));
        $questionPreview = [];
        foreach ($tender_questions as $question) {
            array_push($questionPreview, $model->getQuestionById($question['question_bank_id'])->question_preview);
            // $questionPreview =
        }
        // require_once 'tender_management/apply_tender_form.php';
        // $tenderModel->updateTenderPost($_POST['tender_id'], $_POST['post']);
        echo json_encode($init->getStatusMessage(0, $questionPreview));
        return;

    }
    if ($_POST['action'] === 'post') {
        $tenderModel->updateTenderPost($_POST['tender_id'], $_POST['post']);
        echo json_encode($init->getStatusMessage(0, $init::THE_TENDER . $init::SPACE . $init::POST));
        return;

    }
    if ($_POST['action'] === 'tenderEdit') {

        $tenderData = $tenderModel->getTenderById($_POST['tender_id']);

        // print($tenderData->getId());
        // $init->print_butiful_array($tenderData);
        if (!empty($tenderData)) {
            echo json_encode($init->getStatusMessage(0, ($tenderData[0])));
        } else {
            echo json_encode($init->getStatusMessage(500, $init::NOT_COMPLETED));
        }

        return;

    }
    if ($_POST['action'] === 'tenderDelete') {
        // $init->print_butiful_array($_POST);
        if (intval($tenderModel->validateDeleteTender($_POST['tender_id'])[0]['count']) > 0) {
            // $res = [
            //     'status' => 423,
            //     'message' => $init::YOU_CANT_EDIT . $init::SPACE . $init::THE_TENDER . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE
            // ];
            echo json_encode($init->getStatusMessage(423, $init::YOU_CANT_DELETE . $init::SPACE . $init::THE_TENDER . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE));
            return;
        } else {
            if ($tenderModel->deleteTenderQuestion($_POST['tender_id'])) {
                // echo json_encode($init->getStatusMessage(0, $init::DELETED_SUCCESSFULLY));
                if ($tenderModel->deleteTender($_POST['tender_id'])) {
                    echo json_encode($init->getStatusMessage(0, $init::DELETED_SUCCESSFULLY));
                }
            }
            return;
        }



    }
}
// $init->print_butiful_array($postData);

if ($init->checkNullEntries($postData) || is_null($postData) || empty($postData)) {

    echo json_encode($init->getStatusMessage(422, $init::ALL_FIELD_ARE_MANDATORY));
    return;
}

if (intval($tenderModel->validateDeleteTender($_POST['tender_id'])[0]['count']) > 0) {
    // $res = [
    //     'status' => 423,
    //     'message' => $init::YOU_CANT_EDIT . $init::SPACE . $init::THE_TENDER . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE
    // ];
    echo json_encode($init->getStatusMessage(423, $init::YOU_CANT_EDIT . $init::SPACE . $init::THE_TENDER . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE));
    return;
}
// $init->getStatusMessage(423, $init::YOU_CANT_DELETE . $init::SPACE . $init::THE_QUESTION . $init::SPACE . $init::THE_QUESTION . " !! " . $init::ALREADY_IN_USE)


// $init->print_butiful_array($tender);
$tenderModel->createTender($tender) > 0 ?
    $message = json_encode($init->getStatusMessage(0, $init::NOT_COMPLETED)) :
    $message = json_encode($init->getStatusMessage(500, $init::NOT_COMPLETED));
echo $message;
return;

?>