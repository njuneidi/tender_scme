<?PHP
use nidal\Init;

require_once '../../question_type/init_question_type.php';
require_once '../../../init.php';
$init = new Init();
$questionType = $questonTypeModel->getQuestionType();
?>
<form id='addNewQuestionForTender'>
    <div id="errorMessage" class="alert alert-warning d-none"></div>

    <?PHP
    require_once __DIR__ . '/../question_form_element_div.php'; ?>
    <button  type="submit" class="btn btn-primary" value="<?PHP echo 1; ?>">
        <?PHP echo $init::SAVE
            ?>
    </button>
    <?PHP echo "</form>" ?>

    </div>