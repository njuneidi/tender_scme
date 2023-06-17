<?php
require_once 'init_question.php';
require_once 'question_type/init_question_type.php';
require_once 'question_action/preview_question_modal.php';
require_once 'question_action/question_modal.php';


// require_once 'question_type/init_question_type.php';
//$init->print_butiful_array($_POST);
$questions = $model->getQuestions();
//$questionTypeCode = $questonTypeModel->getQuestionTypeById(171);
$questionTypeCode = $questonTypeModel->getQuestionType();

$totalQuestions = count($questions);
// echo $totalQuestions;


$questions = array_reverse($questions);
// print_r($questions);

function getItems($page, $perPage, $items)
{
    // Get the total number of questions
    $totalItems = count($items);

    // Get the start and end index of the current page
    $start = ($page - 1) * $perPage;
    $end = min($start + $perPage, $totalItems);

    // Get the questions for the current page
    $itemsOnPage = array_slice($items, $start, $end);

    return $itemsOnPage;

}

// Get the current page number
$page = (isset($_GET['page']) ? $_GET['page'] : 1);

// Get the number of questions per page
$perPage = 10;

// Get the questions for the current page
$questionsOnPage = getItems($page, $perPage, $questions);



?>

<div class="container">

    <h1>
        <?PHP echo $init::QUESTION_BANK ?>
    </h1>
    <button id="addQuestionBtn" type="button" class="btn btn-dark" data-bs-toggle="modal"
        data-bs-target="#addQuestionModal"><i class="fas fa-plus " aria-hidden="true"></i></button>

    <!-- <a data-bs-toggle="modal" data-bs-target="#addQuestionModal" class="btn btn-dark mb-3"><i class="fas fa-plus "
            aria-hidden="true"></i></a> -->




    <table id="myQuestionTable" class="table table-striped">
        <thead>
            <tr>
                <th style="width: 40%">Title</th>
                <th style="width: 25%">Description</th>
                <th style="width: 20%">Question Type</th>
                <!-- <th>معاينة السؤال</th> -->
                <th style="width: 15%">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $index = 0;
            foreach ($questionsOnPage as $question): ?>
                <tr>
                    <td>
                        <?php echo $question->question_title; ?>
                    </td>
                    <td>
                        <?php echo $question->question_description; ?>
                    </td>
                    <td>
                        <?php echo $question->question_type; ?>
                    </td>
                    <!-- <td>
                        <?php echo $question->question_preview; ?>
                    </td> -->
                    <td>
                        <!-- <a href="?action=edit&id=<?php echo $question->question_id; ?>">Edit</a>
                        <a href="?action=delete&id=<?php echo $question->question_id; ?>">Delete</a> -->
                        <?PHP




                        ?>
                        <!-- <a data-bs-toggle="modal" data-bs-target="#addQuestionModal" class="btn btn-dark mb-3"><i
                                class="fas fa-plus " aria-hidden="true"></i></a> -->

                        <button id="previewQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            data-bs-toggle="modal" data-bs-target="#previewQuestionModal"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="far fa-eye fs-5 pe-2"
                                aria-hidden="true"></i></button>
                        <button id="editQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            data-bs-toggle="modal" data-bs-target="#addQuestionModal"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="far fa-edit fs-5 pe-2"
                                aria-hidden="true"></i></button>
                        <button id="deleteQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="fas fa-trash fs-5 pe-2"
                                aria-hidden="true"></i></button>


                    </td>
                </tr>
            <?php endforeach;


            ?>
        </tbody>
    </table>

    <hr />
    <?PHP // Create the pagination links
    $pagination = array();
    for ($i = 1; $i <= ceil($totalQuestions / $perPage); $i++) {
        $pagination[] = "<a class='page-link' href='?page=$i'>$i</a>";
    }
    // Display the pagination links
    echo "<ul class='pagination d-flex justify-content-center'>";
    foreach ($pagination as $pageLink) {
        echo "<li class='page-item'>$pageLink</li>";
    }
    echo "</ul>"; ?>


</div>
<script>
    $(document).on('click', '#close-add-question-btn', function (event) {
        // alert('Please1');
        // Do something when the close button is clicked
        $('#addQuestion')[0].reset();
        $('#errorMessage').addClass('d-none');
        $('#answerMainContainer').addClass('d-none');
        $('#DIVID').load(location.href + " #DIVID");
    });
    $(document).on('click', '.close-question', function () {
        // alert('Please2');
        $('#addQuestion')[0].reset();
        $('#errorMessage').addClass('d-none');
        $('#answerMainContainer').addClass('d-none');
        $('#DIVID').load(location.href + " #DIVID");

    })
    // $(document).on('click', '.closeUpdateUserBtn', function () {
    //     // $('#updateUser')[0].reset();
    //     $('#errorMessageUpdate').addClass('d-none');
    //     $('#username').removeClass('border-red');
    //     //  $('#username').addClass('input-group-text ');
    // })
    $(document).on('keydown', function (event) {
        // alert('Please3');
        if (event.key == "Escape") {
            $('#addQuestion')[0].reset();
            $('#errorMessage').addClass('d-none');
            $('#answerMainContainer').addClass('d-none');
            $('#DIVID').load(location.href + " #DIVID");
            //  $('#errorMessageUpdate').addClass('d-none');
        }
    });


    $(document).on('click', '#previewQuestion', function (e) {
        e.preventDefault();

        var questionId = $(this).val();
        // alert(questionId);
        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: {
                'action': 'previewQuestion',
                'questionId': questionId,
            },
            //processData: false,
            // contentType: false,
            success: function (response) {
                //alert(response);
                var res = jQuery.parseJSON(response);
                // alert(res);\

                if (res.status == 0) {


                    // alertifyMsg(1, res.message);
                    $('#questonPreviw').html(res.message);
                    // $('#test').val('res.message');
                    //$('#myQuestionTable').load(location.href + " #myQuestionTable");


                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });
    $(document).on('click', '#addQuestionBtn', function (e) {
        e.preventDefault();

        $('#questionModalLabel').text(ADD_QUESTION);
    })
    $(document).on('click', '#editQuestion', function (e) {
        e.preventDefault();

        $('#questionModalLabel').text(EDIT_QUESTION);
        // alert(EDIT_QUESTION);
        var questionId = $(this).val();
        //  alert(questionId);
        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: {
                'action': 'editQuestion',
                'questionId': questionId
            },
            //processData: false,
            // contentType: false,
            success: function (response) {

                // alert(EDIT_QUESTION);
                var res = jQuery.parseJSON(response);
                //alert(res);

                if (res.status == 0) {
                    $('#question_id').val(res.message.question_id);
                    $('#question_title').val(res.message.question_title);
                    $('#question_description').val(res.message.question_description);
                    $('#question_type').val(res.message.question_type);
                    var answers = jQuery.parseJSON(res.message.question_answers);

                    if (res.message.question_type == 4 || res.message.question_type == 5) {
                        $('#answerMainContainer').removeClass('d-none');
                        $('#addAnswer').removeClass('d-none');
                        answers.forEach(function (answer) {
                            addAnswer(answer);
                            //alert(answer);
                        });
                    }

                    //  $('#add_edit_question').text("update");


                    // $('#errorMessage').addClass('d-none');
                    // $('#addQuestionModal').modal('hide');
                    // $('#addQuestion')[0].reset();

                    // alertifyMsg(1, res.message);
                    // $('#myQuestionTable').load(location.href + " #myQuestionTable");


                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });
    $(document).on('click', '#deleteQuestion', function (e) {
        e.preventDefault();

        var questionId = $(this).val();

        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: {
                'action': 'deleteQuestion',
                'questionId': questionId,
            },
            //processData: false,
            // contentType: false,
            success: function (response) {

                // alert(ADD_QUESTION);
                var res = jQuery.parseJSON(response);
                // alert(res);

                if (res.status == 0) {


                    alertifyMsg(1, res.message);
                    $('#DIVID').load(location.href + " #DIVID");


                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });
    $(document).on('submit', '#addQuestion', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        //  alert(ADD_QUESTION);
        // console.log(formData['username']);

        formData.append("action", "addQuestion");
        // console.log('documame');
        //  $('#errorMessage').removeClass('d-none');
        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                // alert(ADD_QUESTION);
                var res = jQuery.parseJSON(response);
                // alert('res.message');
                if (res.status == 422) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    // alert('Error');

                } else if (res.status == 423) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    //  $('#username').css('border', '1px solid red');
                    $('#username').addClass('border-red');
                    // alert('Error');

                } else if (res.status == 0) {

                    //  alert('Success');
                    $('#errorMessage').addClass('d-none');
                    $('#addQuestionModal').modal('hide');
                    // $('#add_edit_question').text("");
                    // alert($('#addQuestion')[0]['question_id']);
                    $('#addQuestion')[0].reset();
                    // alertify.set('notifier', 'delay', 1);
                    // alertify.set('notifier', 'position', 'top-right');
                    // alertify.success(res.message);
                    alertifyMsg(1, res.message);
                    //alert(location.href);
                    // window.location.reload();
                    // window.history.pushState("object or string", "Title", "/tender_scme/?content=a_questions");
                    //$('#myQuestionTable').load(location.href + '#myQuestionTable');
                    $('#DIVID').load(location.href + " #DIVID");
                    //$('#DIVID').html(response);

                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });</script>