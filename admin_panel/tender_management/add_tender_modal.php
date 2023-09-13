<style>
    .modal-dialog {
        --bs-modal-width: 90%;
    }

    /* .my-div {
        position: relative;
    }

    .my-div i {
        position: absolute;
        top: 0;
        right: 0;
    } */
</style>

<style>
    /* Custom CSS to create a circle around the icon */
    .circle-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #007bff;
        /* Change this to your desired background color */
        color: #ffffff;
        /* Change this to your desired icon color */
    }
</style>

<?PHP
//require_once '../admin_panel/question_bank/question_action/question_modal.php'; ?>
<!-- admin_panel\question_bank\question_action\question_modal.php -->
<div class="modal" id="question-previews-modal" tabindex="-1" role="dialog"
    aria-labelledby="question-previews-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="question-previews-modal-label">
                    <?php echo $init::QUESTION_BANK ?>
                </h5>

                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="row  m-1">
                        <div class="col-md-12">
                            <div class="card" style="background-color: #dddddd;">
                                <h5 class="card-title text-center tender-title">
                                    <?php echo $init::TITLE . $init::SPACE . $init::THE_TENDER ?>
                                </h5>
                                <div class="tender-id d-none"></div>
                                <input type="hidden" name="" id="tenderid">
                            </div>
                        </div>

                    </div>
                    <div class="row  m-1">
                        <div class="col-md-12">
                            <input type="text" id="search-input" class="form-control" placeholder="Search question">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="myTable">
                                <thead>

                                    <tr>
                                        <th style="width: 12%">
                                            <?PHP echo $init::ADD_TO_TENDER ?>
                                        </th>
                                        <th>
                                            <?php echo $init::TITLE ?>
                                        </th>
                                        <th>
                                            <?php echo $init::PREVIEW ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <div class="col-md-12">
                                        <?PHP
                                        $total_pages = ceil(count($question_previews) / 10); ?>


                                        <ul class="pagination d-flex justify-content-center">
                                            <!-- <li class="page-item previous">
                                            <button type="button" class="btn btn-link"
                                                --bs-modal-widthvalue="previous">Previous</button>
                                        </li> -->
                                            <?php

                                            $total_pages = ceil(count($question_previews) / 10);

                                            // Get the current page number.
                                            $page_number = $_GET['page_link'] ?? 1;
                                            $page_number = 1;

                                            // Limit the number of links to 10.
                                            $pagination_links = array();
                                            for ($i = 1; $i <= 10; $i++) {
                                                if ($i <= $total_pages) {
                                                    $pagination_links[] = $i;
                                                }
                                            }

                                            // Generate the pagination links.
                                            foreach ($pagination_links as $page_link) {
                                                $active_class = ($page_link == $page_number) ? 'active' : '';
                                                echo '<li class="page-item ' . $active_class . '"><button type="button" class="page-link btn btn-link" value="' . $page_link . '">' . $page_link . '</button></li>';
                                            }
                                            ?>
                                            <li class="page-item next"><button type="button" class="btn btn-link"
                                                    value="next">Next</button></li>
                                        </ul>
                                    </div>
                                    <!-- collapse  -->
                                    <div class="card m-3 rounded-3 question-form">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-center">
                                                <div class="col-md-12 text-center">
                                                    <h5>إضافة سؤال إلى بنك الأسئلة</h5>
                                                    <button id="addNewQ" type="button" class="btn btn-link"
                                                        data-bs-toggle="collapse"
                                                        data-bs-target="#add-question-to-the-bank"
                                                        aria-expanded="false">
                                                        <div class="circle-icon">
                                                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                                                        </div>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card-body collapse" id="add-question-to-the-bank"
                                            style="background-color: #f0f8ff;">
                                            <!-- <div id="new-div"></div> -->
                                            <!-- admin_panel\question_bank\question_action\question_form_new.php -->
                                            <?PHP require_once '../admin_panel/question_bank/question_action/question_form_new.php' ?>
                                        </div>

                                    </div>
                                    <div class="card rounded-3 text-black m-1 p-1 ">

                                        <div class="row g-0 d-felex justify-content-center ">
                                            <div class="col-lg-10 col-md-10  ">

                                                <div class="tender-question-container border-0 border-radius-3">
                                                    <?PHP
                                                    // $init->getTenderQuestionshtml($model, $tenderModel, $tender->getId())
                                                    ?>

                                                </div>
                                            </div>

                                        </div>
                                        <input type="hidden" id="questionBankIds" name="questionBankIds" value="" />
                                        <div class="tender-question-container-button  d-none">
                                            <div class="row g-0 d-flex justify-content-center  mt-2 ">
                                                <!-- <div class=" m-3  col-md-11 col-lg-11"> -->
                                                <button id="createTenderQuestionButton" data-bs-dismiss="modal"
                                                    class="btn btn-lg btn-success d-felex justify-content-center ">
                                                    <?PHP echo $init::ADD_TO_TENDER ?>
                                                </button>
                                                <!-- </div> -->
                                                <!-- <div class="tender-question-container"></div> -->
                                            </div>
                                        </div>


                                    </div>

                        </div>




                        <?PHP
                        $questions = $model->getQuestions();
                        $totalQuestions = count($questions);
                        $questions = array_reverse($questions);
                        $question_previews = $questions;
                        // $total_pages = ceil(count($question_previews) / 10);
                        $current_page = 1;
                        $items = array_slice($question_previews, ($current_page - 1) * 10, 10);
                        foreach ($items as $item) {
                            echo "<div class=\"question-row\"><tr id=\"row{$item->question_id}\">";
                            // echo "<input type=\"checkbox\" value />";
                            echo "<td  class=\"text-center align-middle\"><div class=\"row  justify-content-center align-items-center\">
                                        <button type=\"button\"   class=\"btn btn-link add-question-button\" value=\"{$item->question_id}\">
                                         
                                            <i class=\"fas fa-plus\" aria-hidden=\"true\"></i>
                                      
                                        </button>
                                      </div></td>";

                            echo "<td>{$item->question_title}</td>";
                            echo "<td>{$item->question_preview}</td>";
                            echo "<td  class=\"text-center align-middle\"><div class=\"row  justify-content-center align-items-center\">
                                        <button type=\"button\" class=\"btn btn-link delete-question-button\" value=\"{$item->question_id}\">
                                         
                                            <i class=\"fas fa-trash\" aria-hidden=\"true\"></i>
                                      
                                        </button>
                                      </div></td>";
                            echo "<td  class=\"text-center align-middle\"><div class=\"row  justify-content-center align-items-center\">
                                        <button type=\"button\" class=\"btn btn-link edit-question-button\" value=\"{$item->question_id}\" >
                                         
                                            <i class=\"fas fa-edit\" aria-hidden=\"true\"></i>
                                      
                                        </button>
                                      </div></td>";
                            echo "</tr>";
                        }
                        ?>









                        </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


    </div>

</div>

</div>


<script src="../../tender_scme/assets/js/jquery-3.6.4.js"></script>


<script>




    const button = document.getElementById('addNewQ');

    // Your code here, including event listener setup

    button.addEventListener('click', function () {

        const questionType = document.getElementById('question_type');
        if (questionType !== null) {
            document.addEventListener("DOMContentLoaded", function () {
                questionType.addEventListener("change", function () {
                    questionTypeEvent(this);
                    console.log("Question type changed");
                });
            });
            const selectedQuestionType = questionType.value;
            // alert("Selected question type: " + selectedQuestionType);
        } else {
            console.log("Element with id 'question_type' not found.");
        }




    });




    const closeButton = document.querySelector(".close");

    closeButton.addEventListener("click", function () {
        resetForm();

    });

    $(document).on('keydown', function (event) {
        // alert('Please3');
        if (event.key == "Escape") {
            resetForm();

        }
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

                alert(ADD_QUESTION);
                var res = jQuery.parseJSON(response);
                alert(res);

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



    $(document).on('click', '.page-item.next', function () {
        // alert('next');

        var activePage = $(".page-item.active").find("button").val();

        var nextPage = parseInt(activePage) + 1;
        var newPaginationLinks = [];
        var paginationLinks = $(".page-link");
        var paginationItem = $(".page-item");

        $.ajax({
            type: "GET",
            url: "tender_management/tender_question_action.php?page_link=" + nextPage,
            success: function (response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 0) {
                    var totalPage = res.total_pages;



                    // Check if the next page exists within the pagination links.
                    var nextLink = $(".page-item").find("button[value='" + nextPage + "']");

                    paginationLinks.each(function () {
                        $(this).remove();
                    });
                    paginationItem.each(function () {
                        $(this).remove();
                    });
                    // If the next page doesn't exist within the visible pagination links, shift the pagination links one page to the left.

                    // Get the current set of 10 pages.
                    var currentSet = Math.floor(activePage / 10);
                    // Calculate the starting page for the new set.
                    var newStartPage = (currentSet - 1) * 10 + 1;
                    var newStartPage = (currentSet) * 10 + 1;
                    // Check if the new start page is less than or equal to the total number of pages.
                    if (newStartPage < totalPage) {
                        // Generate the new pagination links for the next set.

                        if (nextPage > 1) {
                            newPaginationLinks.push('<li class="page-item previous"><button type="button" class="btn btn-link"--bs-modal-width value="previous">Previous</button></li>');
                        }

                        for (var i = newStartPage; i < newStartPage + 10; i++) {
                            if (i <= totalPage) {
                                var activeClass = (i === nextPage) ? "active" : "";
                                newPaginationLinks.push("<li class='page-item " + activeClass + "'><button type='button' class='page-link btn btn-link' value='" + i + "'>" + i + "</button></li>");
                            }
                        }
                        if (activePage < totalPage - 1) {
                            newPaginationLinks.push('<li class="page-item next"><button type="button" class="btn btn-link"--bs-modal-width value="next">Next</button></li>');
                        }

                        // Replace the pagination links with the new set.
                        //   $(".pagination").append(newPaginationLinks);
                        // alert("`Next` clicked, next active page: " + nextPage);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("`Next` clicked, but there is no next page.");
                    }

                }
                const tableBody = document.getElementById("table-body");

                tableBody.innerHTML.empty();
                appendRowsToTable(res.question_ist);
            }
        });
    });
</script>
<script>
    $(document).on('click', '.page-item.previous', function () {

        // Get the current active page.
        var activePage = $(".page-item.active").find("button").val();

        // Get the next page number.
        var previousPage = parseInt(activePage) - 1;
        var newPaginationLinks = [];
        var paginationLinks = $(".page-link");
        var paginationItem = $(".page-item");


        $.ajax({
            type: "GET",
            url: "tender_management/tender_question_action.php?page_link=" + previousPage,
            success: function (response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 0) {
                    var totalPage = res.total_pages;



                    // Check if the next page exists within the pagination links.
                    var previousLink = $(".page-item").find("button[value='" + previousPage + "']");

                    // If the next page doesn't exist within the visible pagination links, shift the pagination links one page to the left.
                    console.log('activePage: ' + previousPage);
                    // Get the current set of 10 pages.
                    var currentSet = Math.ceil(previousPage / 10);
                    console.log('`currentSet`: ' + currentSet);
                    // Calculate the starting page for the new set.
                    var newStartPage = (currentSet - 1) * 10 + 1;
                    //var newStartPage = (currentSet) * 10 + 1;
                    console.log('newStartPage: ' + newStartPage);

                    paginationLinks.each(function () {
                        $(this).remove();
                    });
                    paginationItem.each(function () {
                        $(this).remove();
                    });
                    // Check if the new start page is less than or equal to the total number of pages.
                    if (newStartPage > 0) {
                        // Generate the new pagination links for the next set.
                        //var newPaginationLinks = "";

                        if (previousPage > 1) {
                            newPaginationLinks.push('<li class="page-item previous"><button type="button" class="btn btn-link"--bs-modal-width value="previous">Previous</button></li>');
                        }

                        for (var i = newStartPage; i < newStartPage + 10; i++) {
                            if (i <= totalPage) {
                                var activeClass = (i === previousPage) ? "active" : "";
                                newPaginationLinks.push("<li class='page-item " + activeClass + "'><button type='button' class='page-link btn btn-link' value='" + i + "'>" + i + "</button></li>");
                            }
                        }
                        if (previousPage < totalPage) {
                            // alert("You have reached" + totalPage + " pages --> " + activePage);
                            newPaginationLinks.push('<li class="page-item next"><button type="button" class="btn btn-link"--bs-modal-width value="next">Next</button></li>');
                        }

                        // Replace the pagination links with the new set.
                        // $(".pagination").append(newPaginationLinks);


                        // Alert the next active page.
                        // alert("`Next` clicked, next active page: " + previousPage);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("`previous` clicked, but there is no previous page.");
                    }
                    const tableBody = document.getElementById("table-body");
                    tableBody.innerHTML.empty();
                    appendRowsToTable(res.question_ist);

                }
            }
        });
    });
</script>
<script>
    $(document).on('click', '.page-link', function () {


        var page_link = $(this).val();
        // alert(page_link);
        // Get the page link value.
        var pageLink = $(this).val();
        var newPaginationLinks = [];


        $.ajax({

            type: "GET",
            url: "tender_management/tender_question_action.php?page_link=" + page_link,
            success: function (response) {
                // alert(page_link);
                //alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res);
                //alert(res.status + res.data.user_id);
                if (res.status == 0) {

                    // Get the total page.
                    var totalPage = res.total_pages;
                    // Remove the previous pagination link.
                    var paginationLinks = $(".page-link");
                    paginationLinks.each(function () {
                        $(this).remove();
                    });
                    var paginationItem = $(".page-item");
                    paginationItem.each(function () {
                        $(this).remove();
                    });

                    // Rebuild the pagination link.

                    var currentSet = Math.ceil(pageLink / 10);
                    var newStartPage = (currentSet - 1) * 10 + 1;
                    // var newStartPage = (currentSet) * 10 + 1;

                    if (pageLink > 1) {
                        newPaginationLinks.push('<li class="page-item previous"><button type="button" class="btn btn-link"--bs-modal-width value="previous">Previous</button></li>');
                    }
                    for (var i = newStartPage; i <= newStartPage + 9; i++) {
                        if (i <= totalPage) {
                            newPaginationLinks.push('<li class="page-item ' + (i == pageLink ? 'active' : '') + '"><button type="button" class="page-link btn btn-link" value="' + i + '">' + i + '</button></li>');
                        }
                    }
                    if (pageLink < totalPage) {
                        newPaginationLinks.push('<li class="page-item next"><button type="button" class="btn btn-link"--bs-modal-width value="next">Next</button></li>');
                    }
                    $(".pagination").append(newPaginationLinks);


                    // Set the active class to the clicked link.
                    $(this).addClass("active");
                    //alert((res.question_ist)[0].question_title);
                    const tableBody = document.getElementById("table-body");
                    tableBody.innerHTML = ""
                    appendRowsToTable(res.question_ist);


                }


            }
        });

    });


    $(document).on('submit', '#addNewQuestionForTender', function (e) {
        e.preventDefault();

        // alert(111);

        var formData = new FormData(this);
        //  alert(ADD_QUESTION);
        // console.log(formData['username']);

        // Get the input elements with the name "answers[]"
        const answerInputs = $("[name='answers[]']");

        // Create an array to store the values of the input elements
        const answers = [];

        // Loop through the input elements and add their values to the array
        if (!formData.has("answers[]")) {
            answerInputs.each((index, element) => {
                answers.push($(element).val());
                formData.append("answers[]", $(element).val());
            });
        }
        // Print the values of the array
        // console.log(answers);
        // alert(formData.)




        // const element = $(`input[name='answers[]']`);
        // alert(element.val());
        // value = formData['value'];
        formData.append("action", "addQuestion");
        // formData.append("answers[]", answers);
        for (const [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }
        // console.log(formData);
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
                questionId = ((res.question_id).length > 0) ? `-${res.question_id}` : '';

                // alert(res.question_ist[0].question_id);
                if (res.status == 422) {

                    $(`#errorMessage${questionId}`).removeClass('d-none');
                    $(`#errorMessage${questionId}`).text(res.message);
                    // alert('Error');

                } else if (res.status == 423) {

                    $(`#errorMessage${questionId}`).removeClass('d-none');
                    $(`#errorMessage${questionId}`).text(res.message);
                    //  $('#username').css('border', '1px solid red');
                    $('#username').addClass('border-red');
                    // alert('Error');

                } else if (res.status == 0) {

                    // alert('Success');
                    $(`#errorMessage${questionId}`).addClass('d-none');

                    $('#addNewQuestionForTender')[0].reset();
                    if ((res.question_id).length > 0) { $(`new-row${questionId}`).empty(); } else { $(`new-div`).empty(); }
                    var answerContainers = $("div[id^='answerContainer']");
                    // Empty all the divs
                    answerContainers.empty();


                    // $(`#answerContainer${questionId}`).empty();
                    // $(`#rowAnswer${questionId}`).empty();
                    // $('div#answerMainContainer').empty();
                    // $('div#answerMainContainer').html('');
                    $('#add-question-to-the-bank').collapse('hide');

                    alertifyMsg(1, res.message);

                    $('#questionList').load(location.href + " #ql", function () {

                        $(`#question_type${questionId}`).on("change", function () {
                            questionTypeEvent(this);
                        });
                    });
                    console.log(questionId);
                    rowOffset = $(`#row${res.question_id}`);
                    rowOffset.offsetTop;
                    // var currentRow = $(`#row${res.question_id}`);
                    // rowOffset.css("background-color", "#E3E3E3");
                    // currentRow.style.backgroundColor = "#E3E3E3";
                    // document.getElementById(`row${res.question_id}`).offsetTop
                    // document.getElementById(`row${res.question_id}`).style.backgroundColor = "#E3E3E3";
                    // $('#questionList').load(location.href + " #ql");
                    // $('#questionList').html(response);
                    pulishQuestions(res, 1);
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


</script>