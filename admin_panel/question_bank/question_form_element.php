<?PHP
//$questionType=$modal->   
require_once 'question_type/init_question_type.php';
$questionType = $questonTypeModel->getQuestionType();
// $init->print_butiful_array($questionType);
?>

<div class="row">
    <div class=" m-1">
        <label for="question_title">Title</label>

    </div>
    <div class="col-md-12 mb-3">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question m-1 alert-primary"></i>
                </span>
            </div><input type="text" class="form-control" id="question_title" name="question_title"
                placeholder="Enter question question_title">
            <input type="hidden" name="question_id" id="question_id">
            <input type="hidden" name="action" id="action">

        </div>

    </div>

</div>


<div class="row">
    <div class="mb-3">
        <div class="form-group">
            <div class="m-1"> <label for="question_description">Description</label>
            </div>
            <textarea class="form-control" id="question_description" name="question_description" rows="3"></textarea>
        </div>
    </div>

</div>
<div class="row">
    <div class="mb-3">
        <div class="form-group">
            <div class="m-1"> <label for="question_type">Question Type</label>
            </div>
            <select class="form-control" id="question_type" name="question_type">

                <?PHP // Loop through the results and create an option for each row
                foreach ($questionType as $item) {
                    echo '<option value="' . $item->question_type_id . '">' . $item->question_type_arabic . '</option>';
                } ?>

            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="mb-1">
        <div id="answerMainContainer" class=" m-3">
            <input type="hidden" name="answer_no" id="answer_no" value="0">
            <div id="answerContainer" class="row">

            </div>
            <div class="row">
                <div class="d-none m-1" id="addAnswer" onclick="addAnswer()">
                    <i class="fa fa-add"></i>
                    <label for="">
                        <?PHP echo $init::ADD_QUESTION ?>
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.6.4.js"></script>
<!-- <script src="../assets/js/scripts.js"></script> -->


<script>
    const questionType = document.getElementById('question_type');
    // answerNo = document.getElementById('answer_no').value;

    // function addAnswer() {
    //     const questionAnswerContainer = document.getElementById("answerContainer");

    //     answerNo = document.getElementById('answer_no').value;
    //     answerNo = parseInt(answerNo, 10) + 1;
    //     //$('#answer_no').val(answerNo);
    //     const questionAnswer = document.createElement("input");
    //     questionAnswer.type = "text";
    //     questionAnswer.name = "answers[]";
    //     questionAnswer.id = "questionAnswer";
    //     questionAnswer.className = "form-control";
    //     questionAnswer.placeholder = ADD_YOUR_ANSWER;
    //     ;
    //     answerDiv = document.createElement("div");
    //     answerDiv.className = "col-md-10";
    //     answerDiv.appendChild(questionAnswer);



    //     const removeAnswerIcon = document.createElement('i');
    //     removeAnswerIcon.classList.add('fa', 'fa-trash');
    //     removeAnswerIcon.classList.add('btn', 'btn-link');
    //     iconDiv = document.createElement("div");
    //     iconDiv.className = "col-md-2";
    //     // icondiv.id = "icon-trash";
    //     iconDiv.appendChild(removeAnswerIcon);
    //     iconDiv.addEventListener('click', deleteAnswer);

    //     rowAnswer = document.createElement('div');
    //     rowAnswer.id = "rowAnswer" + answerNo;
    //     rowAnswer.className = "row";
    //     rowAnswer.appendChild(answerDiv);
    //     rowAnswer.appendChild(iconDiv);

    //     questionAnswerContainer.appendChild(rowAnswer);

    //     $('#answer_no').val(answerNo);


    // }
    // function deleteAnswer() {
    //     questionAnswerContainer = document.getElementById('answerContainer');
    //     var row = event.target.parentElement;
    //     alert(row.className);
    //     row = row.parentElement;
    //     alert(row.className);
    //     row = row.parentElement;
    //     alert(row.className);
    //     questionAnswerContainer.removeChild(row);
    //     // alert(row );
    //     // row = row.parentElement;
    //     // alert(row );

    //     // // Remove the row from the answer container
    //     // questionAnswerContainer.removeChild(row);
    //     // alert(answerNo);
    //     // div = document.getElementById('rowAnswer' + answerNo);
    //     // //questionAnswerContainer.removeChild("rowAnswer1");
    //     // // Remove the div from the DOM
    //     // div.parentNode.removeChild(div);
    //     // answerNo = parseInt(answerNo, 10) - 1;
    //     // // $('#answer_no').val(answerNo);
    //     // $('#answer_no').val(answerNo);


    // }


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


</script>