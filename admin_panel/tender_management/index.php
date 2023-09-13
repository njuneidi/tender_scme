<?PHP
//$init->print_butiful_array($_SESSION);
//session_start();
// Check if the session is empty
if (session_status() === PHP_SESSION_NONE) {
    // echo 'h';

    // Redirect the user to the login page
    header("Location: ../../index.php");
    exit;
}
//require_once 'init_question.php';
//require_once 'question_type/init_question_type.php';
// $init->print_butiful_array($_SESSION);
?>

<div id="tenderList">
    <?PHP require_once 'tenders_list_view.php'; ?>
</div>
