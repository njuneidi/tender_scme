<?PHP

require_once 'question_type/init_question_type.php';
// require_once '../../admin_panel/question_type/init_question_type.php';
$questionType = $questonTypeModel->getQuestionType();
// $init->print_butiful_array($questionType);
require_once 'question_form_element_div.php';
?>
<!-- 
<script src="../assets/js/jquery-3.6.4.js"></script>



<script>
    const questionType = document.getElementById('question_type');
    questionType.addEventListener("change", () => {
        // alert(questionType.value);

        if (questionType.value > 3 && questionType.value < 6) {
            const questionAnswerContainer = document.getElementById("answerContainer");
            while (questionAnswerContainer.firstChild) {
                questionAnswerContainer.removeChild(questionAnswerContainer.firstChild);
            }
            $('#answerMainContainer').removeClass('d-none');
            $('#addAnswer').removeClass('d-none');
            addAnswer();


        } else {
            $('#answerMainContainer').addClass('d-none');
        }


    })


</script> -->