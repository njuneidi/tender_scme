<?PHP
// require_once '../../admin_panel/question_bank/init_question_list.php';
require_once '../../admin_panel/question_bank/init_question.php';
$questions = $model->getQuestions();
$question_previews = array_reverse($questions);

$current_page = $_GET['page_link'];

$total_pages = ceil(count($question_previews) / 10);
$questionList = array_slice($question_previews, ($current_page - 1) * 10, 10);

$res = [
    'status' => 0,
    'current_page' => $current_page,
    'total_pages' => $total_pages,
    'question_ist' => $questionList
];
echo json_encode($res);
return;

?>