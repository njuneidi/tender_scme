<?php

require_once 'init_question_list.php';
// require_once 'init_question.php';
// require_once 'question_type/init_question_type.php';
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
        <?PHP echo $init::QUESTION_BANK . "f" ?>
    </h1>

    <button id="addQuestionBtn" type="button" class="btn btn-dark" data-bs-toggle="modal"
        data-bs-target="#addQuestionModal"><i class="fas fa-plus " aria-hidden="true"></i></button>



    <ul class="list-unstyled">
        <?php foreach ($questionsOnPage as $question): ?>
            <li class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title">
                        <?php echo $question->question_title; ?>
                    </h5>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo $question->question_description; ?>
                    </p>
                    <p class="card-text">
                        <!-- <strong>Status:</strong>
                        <?php echo $question->question_status; ?> -->
                        <strong>
                            <?PHP echo $init::QUESTION_TYPE ?>:
                        </strong>
                        <?php echo $question->question_type; ?>

                    </p>
                    <p><strong>
                            <?PHP echo $init::QUESTION_PREVIEW ?>:
                        </strong>
                        <!-- <?php echo $question->question_preview; ?> -->
                    <div class=" container ">
                        <div class=" row d-flex justify-content-center align-items-center h-100">
                            <div class="col-xl-12">
                                <div class="card rounded-3 text-black ">
                                    <div class="row g-0">
                                        <div class="col-lg-12">
                                            <div class="card-body p-lg-4 mx-lg-2 ">
                                                <!-- padding for md is 7 marging left right for md 4 -->


                                                <div class="row d-flex justify-content-center align-items-center h-100">
                                                    <?php echo $question->question_preview; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </p>

                    <div class="card-footer">
                        <!-- <a href="/tenders/view/<?php echo $question->question_id; ?>" class="btn btn-primary">View</a>
                        <a href="/tenders/edit/<?php echo $question->question_id; ?>" class="btn btn-secondary">Edit</a>
                        <a href="/tenders/delete/<?php echo $question->question_id; ?>" class="btn btn-danger">Delete</a> -->

                        <button id="previewQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            data-bs-toggle="modal" data-bs-target="#previewQuestionModal"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="far fa-eye fs-5 pe-2"
                                aria-hidden="true"></i></button>
                        <button id="editQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            2data-bs-toggle="modal" 2data-bs-target="#addQuestionModal"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="far fa-edit fs-5 pe-2"
                                aria-hidden="true"></i></button>
                        <button id="deleteQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            class=" btn btn-link link-dark btn-sm p-0"> <i class="fas fa-trash fs-5 pe-2"
                                aria-hidden="true"></i></button>

                        <button id="previewQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            data-bs-toggle="modal" data-bs-target="#previewQuestionModal" class=" btn btn-primary  ">
                            View</button>
                        <button id="editQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            2data-bs-toggle="modal" 2data-bs-target="#addQuestionModal" class=" btn btn-secondary  ">
                            Edit</button>
                        <button id="deleteQuestion" type="button" value="<?PHP echo $question->question_id; ?>"
                            class=" btn btn-danger ">delete</i></button>


                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
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
<script src="../../tender_scme/assets/js/jquery-3.6.4.js"></script>
<script>
    if ($('#question_type') != null) {
        $('#question_type').on("change", function () {
            questionTypeEvent(this);
            console.log("Question");
        });
    }
    // const questionType = $("#question_type");
    // // $('#questionList').load(location.href + " #ql", function () {

    // questionType.on("change", function () {
    //     questionTypeEvent(this);
    // });


    // function questionTypeEvent(questionType) {
    //     alert(questionType.text)
    //     // const questionTypeNo = questionType.id;
    //     // alert(questionTypeNo);
    //     let answerNo = 0;
    //     if ($("#answer_no").length > 0) {
    //         answerNo = $("#answer_no").val();
    //     }
    //     // alert(answerNo);
    //     if (questionType.value > 3 && questionType.value() < 6) {
    //         $("#answerContainer").empty();
    //         $('#answerMainContainer').removeClass('d-none');
    //         $('#addAnswer').removeClass('d-none');
    //         alert('Please enter');
    //         addAnswer();
    //     }

    //     else {
    //         $('#answerMainContainer').addClass('d-none');
    //     }
    // }

    $(document).on('submit', '#addQuestion', function (e) {
        e.preventDefault();
        // alert(1);
        var formData = new FormData(this);

        //  alert(ADD_QUESTION);
        // console.log(formData['username']);

        // Get the input elements with the name "answers[]"
        const answerInputs = $("[name='answers[]']");

        // Create an array to store the values of the input elements
        const answers = [];

        // Loop through the input elements and add their values to the array
        answerInputs.each((index, element) => {
            answers.push($(element).val());
        });

        // Print the values of the array
        console.log(answers);




        // const element = $(`input[name='answers[]']`);
        // alert(element.val());
        // value = formData['value'];
        formData.append("action", "addQuestion");
        // formData.append("answers[]", answers);
        for (const [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }
        // console.log('documame');
        //  $('#errorMessage').removeClass('d-none');
        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // alert(response);
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

                } else if (res.status == 424) {

                    alert(res.message);
                } else if (res.status == 0) {

                    // alert('Success');
                    $('#errorMessage').addClass('d-none');
                    $('#addQuestionModal').modal('hide');
                    // $('#addQuestionModal').modal('dismiss');
                    $('#addQuestion')[0].reset();
                    $('#add-question-to-the-bank').collapse('hide');
                    alertifyMsg(1, res.message);
                    // $('#questionList').load(location.href + " #ql");
                    $('#questionList').load(location.href + " #ql", function () {

                        $('#question_type').on("change", function () {
                            questionTypeEvent(this);
                        });
                    });

                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });
    $(document).on('click', '#close-add-question-btn', function (event) {
        // alert('Please1');
        // Do something when the close button is clicked
        $('#addQuestion')[0].reset();
        $('#errorMessage').addClass('d-none');
        $('#answerMainContainer').addClass('d-none');
        $('#questionList').load(location.href + " #ql");
    });
    $(document).on('click', '.close-question', function () {
        // alert('Please2');
        $('#addQuestion')[0].reset();
        $('#errorMessage').addClass('d-none');
        $('#answerMainContainer').addClass('d-none');
        $('#questionList').load(location.href + " #questionList");

    })

    $(document).on('keydown', function (event) {
        // alert('Please3');
        if (event.key == "Escape") {
            $('#addQuestion')[0].reset();
            $('#errorMessage').addClass('d-none');
            // $('#answerMainContainer').addClass('d-none');
            $('#questionList').load(location.href + " #questionList");
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
        console.log(EDIT_QUESTION);
        var questionId = $(this).val();
        // alert(questionId);
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
                // alert(response);
                // alert(EDIT_QUESTION);
                var res = jQuery.parseJSON(response);



                if (res.status == 0) {
                    $('#addQuestionModal').modal('show');
                    $('#question_id').val(res.message.question_id);
                    $('#question_title').val(res.message.question_title);
                    $('#question_description').val(res.message.question_description);
                    $('#question_type').val(res.message.question_type);

                    if (res.message.question_type == 4 || res.message.question_type == 5) {
                        var answers = jQuery.parseJSON(res.message.question_answers);

                        $('#answerMainContainer').removeClass('d-none');
                        $('#addAnswer').removeClass('d-none');
                        answers.forEach(function (answer) {
                            addAnswer(answer);
                            //alert(answer);
                        });
                    }




                } else if (res.status == 500) {

                    alert(res.message);
                }
                else if (res.status == 424) {
                    $('#question_id').val(res.message.question_id);
                    $('#question_title').val(res.message.question_title);
                    $('#question_description').val(res.message.question_description);
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
        alert(questionId);

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

                // alert(response);
                var res = jQuery.parseJSON(response);
                // alert(res);

                if (res.status == 0) {


                    alertifyMsg(1, res.message);
                    $('#questionList').load(location.href + " #questionList");


                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });

</script>