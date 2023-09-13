<div class="add_question_list d-none">
    <div class="card rounded-3 ">
        <div class="row d-flex justify-content-center m-3">
            <div class="col-md-8">
                <input type="text" id="search-input" class="form-control" placeholder="البحث عن">
            </div>


        </div>
        <div class="row">
            <div class="col-md-12">



                <table class="table table-striped table-hover table-bordered">
                    <thead>

                        <tr>
                            <th style="width: 12%"><input type="checkbox" id="select-all-checkbox" />
                                <?PHP echo $init::SELECT_ALL ?>
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

                        <div class="row justify-content-center">

                            <div class="col-md-12 p-1">
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

                        </div>
                        <div class="row p-3 d-flex justify-content-center">
                            <div class="col-md-1">
                                <div class="row d-flex justify-content-center">
                                    <button id="addQuestionBtn" type="button" class="btn btn-dark "><i
                                            class="fas fa-plus " aria-hidden="true"></i></button>
                                </div>

                            </div>
                        </div>
                        <?PHP
                        // $total_pages = ceil(count($question_previews) / 10);
                        $current_page = 1;
                        $items = array_slice($question_previews, ($current_page - 1) * 10, 10);
                        foreach ($items as $item) {
                            echo "<tr>";
                            echo "<td><input type=\"checkbox\" value {$item->question_id}/></td>";
                            echo "<td>{$item->question_title}</td>";
                            echo "<td>{$item->question_preview}</td>";
                            echo "</tr>";
                        }
                        ?>









                    </tbody>
                </table>
            </div>

        </div>
        <div class="question-list-footer">
            <button type="button" class="btn btn-secondary" id="dismiss-question-lookup">
                <?php echo $init::CANCEL ?>
            </button>
            <button type="button" class="btn btn-primary" id="add-question-previews">
                <?php echo $init::ADD_TO_TENDER ?>
            </button>
        </div>

    </div>

</div>
<!-- <script src="../../tender_scme/assets/js/jquery-3.6.4.js"></script> -->

<script>



    var selectAllCheckbox = document.getElementById("select-all-checkbox");
    var checkboxes = document.querySelectorAll("input[type='checkbox']");
    var searchInput = document.getElementById("search-input");
    var questionPreviews = [];

    selectAllCheckbox.addEventListener("click", function () {
        for (var checkbox of checkboxes) {
            checkbox.checked = selectAllCheckbox.checked;
        }
    });

    searchInput.addEventListener("keyup", function () {
        var filter = searchInput.value.toLowerCase();

        $.ajax({

            type: "GET",
            url: "tender_management/tender_question_action.php?filter=" + filter,
            success: function (response) {

                var res = jQuery.parseJSON(response);

                if (res.status == 0) {

                }
            }
        })

    });




    $(document).on('click', '.page-item.next', function () {

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
                        $(".pagination").append(newPaginationLinks);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("Next clicked, but there is no next page.");
                    }

                }
                appendRowsToTable(res.question_ist);
            }
        });
    });

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
                    console.log('currentSet: ' + currentSet);
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
                        $(".pagination").append(newPaginationLinks);


                        // Alert the next active page.
                        // alert("Next clicked, next active page: " + previousPage);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("previous clicked, but there is no previous page.");
                    }

                    appendRowsToTable(res.question_ist);

                }
            }
        });
    });

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

                    pulishQuestions($res, $pageLink);

                }


            }
        });

    });



    document.getElementById("addQuestionBtn").addEventListener("click", function () {
        alert("Add Question");
        document.getElementById("addQuestionForm").classList.remove("d-none");
    });
    document.getElementById("dismiss-button").addEventListener("click", function () {
        document.getElementById("add-tender-form").classList.add("d-none");
    });



    $(document).on('submit', '#addTender', function (e) {
        e.preventDefault();
        //  alert('Please');
        var formData = new FormData(this);
        //alert(formData.tender_title.val());
        // var formData2 = $(this).serialize();
        //    alert(formData2);
        // alert(ADD_QUESTION);
        var action = $(this).attr('action');
        // // console.log(formData['username']);

        // formData.append("action", "addTender");
        // // console.log('documame');
        // //  $('#errorMessage').removeClass('d-none');
        $.ajax({
            type: "POST",
            //url: "tender_management/tender_action.php",
            url: action,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                alert(res.message);
                //$("#add-tender-form").addClass("d-none");
                if (res.status === 422) {
                    // errorMessageAddTender
                    $('#errorMessageAddTender').removeClass('d-none');
                    $('#errorMessageAddTender').text(res.message);
                    alert('Error');



                } else if (res.status == 0) {

                    //  alert('Success');
                    $('#errorMessageAddTender').addClass('d-none');
                    //$('#addQuestionModal').modal('hide');
                    // $('#add_edit_question').text("");
                    // alert($('#addQuestion')[0]['question_id']);
                    $('#addTender')[0].reset();
                    $('#add-tender-form').addClass('d-none');
                    // alertify.set('notifier', 'delay', 1);
                    // alertify.set('notifier', 'position', 'top-right');
                    // alertify.success(res.message);
                    alertifyMsg(1, res.message);
                    //alert(location.href);
                    // window.location.reload();
                    // window.history.pushState("object or string", "Title", "/tender_scme/?content=a_questions");
                    //$('#myQuestionTable').load(location.href + '#myQuestionTable');
                    $('.add-tender').load(location.href + " .add-tender");
                    $("html, body").scrollTop(0);
                    //$('#questionList').html(response);

                } else if (res.status == 500) {
                    alert(res.message);
                }
                // else {
                //     alert(res.message);
                // }
            }

        });

    });
    $(document).on('submit', '#addNewQuestionForTender', function (e) {
        e.preventDefault();


        alert('buttonValue');
        var formData = new FormData(this);
        //  alert(ADD_QUESTION);
        // console.log(formData['username']);

        formData.append("action", "addNewQuestionForTender");
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
                    alert('Error');

                } else if (res.status == 423) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    //  $('#username').css('border', '1px solid red');
                    $('#username').addClass('border-red');
                    // alert('Error');

                } else if (res.status == 0) {
                    // pulishQuestions($res, $pageLink);
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
                    //pulishQuestions($res, $pageLink);
                    //alert(location.href);
                    // window.location.reload();
                    // window.history.pushState("object or string", "Title", "/tender_scme/?content=a_questions");
                    //$('#myQuestionTable').load(location.href + '#myQuestionTable');
                    // $('#questionList').load(location.href + " #questionList");
                    // $('#question-previews-modal').load(location.href + " #question-previews-modal");
                    //$('#questionList').html(response);

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