<?PHP

require_once 'tender_management/add_tender_modal.php'
    // require_once 'tender_management/question_card.php';
    ?>

<div id="add-tender-button" class="btn btn-primary mb-3 p-7">
    <?PHP echo $init::ADD_TENDER ?>
</div>
<div class="add-tender">
    <?PHP require_once 'tender_form.php' ?>
</div>

<?PHP require_once 'tender_list_items.php' ?>



<script src="../assets/js/jquery-3.6.4.js"></script>



<script>
    console.log('function');


    var buttons = document.querySelectorAll("button[id^='addQuestionToTender']");

    for (var i = 0; i < buttons.length; i++) {
        buttons[i].addEventListener("click", function () {

            // alert(qarray);
            // Do something when the button is clicked
            // this.value.split('-');
            openQuestionPreviewsModal(this.value.split("-")[0], this.value.split("-")[1]);
        });
    }

    // Get the initial screen width.
    const initialScreenWidth = window.innerWidth;

    // Add an event listener to the window.
    // window.addEventListener("resize", () => {
    //     // Get the current screen width.
    //     const currentScreenWidth = window.innerWidth;

    //     // If the current screen width is different from the initial screen width,
    //     // then the screen width has changed.
    //     if (currentScreenWidth !== initialScreenWidth) {
    //         // Do something when the screen width changes.
    //         const modalDialogWidth = questionPreviewsModal.querySelector(".modal-dialog").offsetWidth;

    //         // Set the left position of the modal dialog to 20% of the screen width.

    //         if (window.innerWidth <= 768) {
    //             questionPreviewsModal.style.width = "100%";
    //         } else {
    //             questionPreviewsModal.style.width = "50%";
    //             // questionPreviewsModal.style.height = "50%";
    //         }
    //     }
    // });
    const questionPreviewsModal = document.getElementById("question-previews-modal");


    function openQuestionPreviewsModal(id, title) {

        // alert(id);
        // questionPreviewsModal.classList.add("show");

        // var windowHeight = $(window).height();
        // var modalHeight = $('.modal-content').height();
        // var middleOfPage = windowHeight / 2 - modalHeight / 2;
        // $(this).animate({ scrollTop: middleOfPage }, 'fast');
        // Get the width of the modal dialog.
        const modalDialogWidth = questionPreviewsModal.querySelector(".modal-dialog").offsetWidth;

        // Set the left position of the modal dialog to 20% of the screen width.

        if (window.innerWidth <= 768) {
            questionPreviewsModal.style.width = "100%";
        } else {
            questionPreviewsModal.style.width = "50%";
            // questionPreviewsModal.style.height = "50%";
        }

        // Set the value of the textbox.
        const tenderTitle = document.querySelector(".tender-title");
        tenderTitle.innerHTML = title;

        const tenderId = document.querySelector(".tender-id");

        const tenderQuestionContiner = document.querySelector(".tender-question-continer");


        const tId = document.getElementById("tenderid");
        tId.value = id;
        // alert('fff' + id);


        var qarray = document.getElementById('bank-question-ids' + id);
        if (qarray !== null) {
            qarray = qarray.value;
            qarray = qarray.split(",");
            // alert(qarray);
            // qarray.forEach(fruit => console.log(fruit));
            console.log(qarray);
            qarray.forEach(element => {
                // alert(element);
                handleAddButtonClick(element)


            });
        }
        // });





    }

    function changeHandler(event) {
        // Get the date entered in the input element
        var date = new Date(event.target.value);

        // Get the current date
        var currentDate = new Date();

        // Check if the date is less than the current date
        if (date <= currentDate) {
            // The date is less than the current date
            alert('يرجى ادخال تاريخ اكبر او يساوي من تاريخ اليوم');
            event.target.value = "";
        }
    }

    // Set up an event listener for the change event
    document.getElementById("tender_due_date").addEventListener("change", changeHandler);
    document.getElementById("tender_start_date").addEventListener("change", changeHandler);



    document.getElementById("add-tender-button").addEventListener("click", function () {
        document.getElementById("add-tender-form").classList.remove("d-none");
    });

    function showQuestionList(questionListDiv) {
        alert(questionListDiv);
        const questionPreviewsModal = document.getElementById("question-previews-modal");
        questionPreviewsModal.classList.add("show");
        const modalDialogWidth = questionPreviewsModal.querySelector(".modal-dialog").offsetWidth;

        // Set the left position of the modal dialog to 20% of the screen width.
        questionPreviewsModal.style.left = "20%";



    }
    function hideQuestionList(id) {
        alert(id);
        // document.getElementById("question-list").classList.add("d-none");
        document.getElementById("question-list" + id).classList.add("d-none");
    }

    document.getElementById("dismiss-button").addEventListener("click", function () {
        document.getElementById("add-tender-form").classList.add("d-none");
    });
    // document.getElementById("dismiss-question-lookup").addEventListener("click", function () {
    // document.getElementById("dismiss-button_edit").addEventListener("click", function () {
    //     document.getElementById("add-tender-form").classList.add("d-none");
    // });
    // document.getElementById("dismiss-question-lookup").addEventListener("click", function () {
    //     document.getElementById("question-list").classList.add("d-none");
    // });
    document.addEventListener("keydown", function (event) {
        if (event.keyCode === 27) { // Esc key
            document.getElementById("add-tender-form").classList.add("d-none");
            $('#applyTenderContainer').empty();


        }
    });




</script>


<script src="../../tender_scme/assets/js/jquery-3.6.4.js"></script>

<script>

    // var selectAllCheckbox = document.getElementById("select-all-checkbox");
    var checkboxes = document.querySelectorAll("input[type='checkbox']");
    var searchInput = document.getElementById("search-input");
    var questionPreviews = [];

    // selectAllCheckbox.addEventListener("click", function () {
    //     for (var checkbox of checkboxes) {
    //         checkbox.checked = selectAllCheckbox.checked;
    //     }
    // });

    // searchInput.addEventListener("keyup", function () {
    //     var filter = searchInput.value.toLowerCase();
    //     //  alert(filter);
    //     $.ajax({

    //         type: "GET",
    //         url: "tender_management/tender_question_action.php?filter=" + filter,
    //         success: function (response) {
    //             // alert(page_link);
    //             //alert(response);
    //             var res = jQuery.parseJSON(response);
    //             //alert(res);
    //             //alert(res.status + res.data.user_id);
    //             if (res.status == 0) {

    //             }
    //         }
    //     })

    // });




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
                        // alert("`Next` clicked, next active page: " + nextPage);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("`Next` clicked, but there is no next page.");
                    }

                }
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
                        $(".pagination").append(newPaginationLinks);


                        // Alert the next active page.
                        // alert("`Next` clicked, next active page: " + previousPage);
                    } else {
                        // If the new start page exceeds the total number of pages, do nothing or handle accordingly (e.g., display a message).
                        alert("`previous` clicked, but there is no previous page.");
                    }

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
                    // const tableBody = document.getElementById("table-body");
                    // tableBody.innerHTML = "";
                    appendRowsToTable(res.question_ist);


                }


            }
        });

    });

</script>

<script>function createTableRow(question) {
        const row = document.createElement("tr");

        // Create the checkbox column
        const checkboxCell = document.createElement("td");
        const checkbox = document.createElement("input");
        checkbox.type = "checkbox";
        checkbox.value = question.question_id;
        checkboxCell.appendChild(checkbox);
        row.appendChild(checkboxCell);

        // Create the question title column
        const titleCell = document.createElement("td");
        titleCell.textContent = question.question_title;
        row.appendChild(titleCell);

        // Create the question preview column
        const previewCell = document.createElement("td");
        const previewDiv = document.createElement("div");
        previewDiv.innerHTML = question.question_preview; // Append as HTML code

        previewCell.appendChild(previewDiv);
        // previewCell.innerHTML = question.question_preview;
        row.appendChild(previewCell);

        return row;
    }

    function appendRowsToTable(questions) {
        const tableBody = document.getElementById("table-body");
        tableBody.innerHTML = "";
        questions.forEach(question => {
            const row = createTableRow(question);
            tableBody.appendChild(row);
        });
    }

</script>
<script>
    // document.getElementById("addQuestionBtn").addEventListener("click", function () {
    //     alert("Add Question");
    //     document.getElementById("addQuestionForm").classList.remove("d-none");
    // });
    document.getElementById("dismiss-button").addEventListener("click", function () {
        document.getElementById("add-tender-form").classList.add("d-none");
    });


</script>