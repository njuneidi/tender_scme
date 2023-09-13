/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
// 
// Scripts
// 

valuesArray = [];
const OTP = "لقد تم ارسال الرمز السري الى موبايلك";
const OTP_SUCSESS = "لقد تم تفعيل موبايلك بنجاح";
const NEXT = "التالي";
const FILL = "يجب تعبئة هذا الحقل" + "\n";
const EIGHT_CHARACTER = "يجب ان تكون كلمة المرور 6 خانات فاكثر  ";
const CONTAINS_LETTER = "يجب ان تحوي كلمة المرور على حرف واحد على الاقل ";
const CONTAINS_CLETTER = "يجب ان تحوي كلمة المرور على حرف كبير واحد على الاقل ";
CONTAINS_SPECIAL = "يجب ان تحوي كلمة المرور على احد الحروف الخاصة   ";
CONTAINS_DIGIT = "يجب ان تحوي كلمة المرور على عدد واحد على الاقل ";
MATCH_PASSWORD = "كلمة المرور غير متطابقة ";
PASSWORD_UPDATED_SUCCSESSFULL = "تم تغيير كلمة المرور بنجاح";
const MOBILE_NO_SHOULD_BE_10_Digits = "رقم الموبايل يجب ان يكون مكون من 10 خانات";
const ALERTIFIER_TIME = 1;
const ADD_YOUR_ANSWER = "أضف اجابتك";
const ADD_QUESTION = "أضف سؤال";
const EDIT_QUESTION = "تعديل سؤال";
const EDIT_TENDER = "تعديل العطاء";

const DUE_DATE_ALERT = "يرجى ادخال تاريخ لموعد التسليم اكبر من تاريخ اليوم";
const CONFIRM_DELETE = "هل انت متاكذ من عملية حذف العطاء هذه العملية سوف تحذف العطاء مع بنك الاسئلة المرتبط به";

// var modal = document.getElementById("apply-to-tender-modal");
// var openModalBtn = document.getElementById("apply-to-tender");
// var closeModalBtn = document.getElementById("yyy");
// $(document).ready(function () {
//     // Function to open the modal
//     openModalBtn.onclick = function () {
//         modal.style.display = "flex";
//     }

//     // Function to close the modal
//     closeModalBtn.onclick = function () {
//         modal.style.display = "none";
//     }

//     // Close the modal if the user clicks outside of it
//     window.onclick = function (event) {
//         if (event.target == modal) {
//             modal.style.display = "none";
//         }
//     }
// });

$(document).on('click', '.close-apply-page,#close-add-question-btn', function (e) {
    e.preventDefault();
    $('#applyTenderContainer').empty();

    // alert();
});
// Detect escape key press.
document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
        // Esc key was pressed.
        $('#applyTenderContainer').empty();
    }
});
$(document).on('click', '#apply-to-tender', function (e) {
    e.preventDefault();

    var tenderId = $(this).val();
    // alert(tenderId);
    const modalElement = $("#apply-to-tender-modal");
    // Show the modal.
    modalElement.modal("show");
    // Delete the tender
    $.ajax({
        type: "POST",
        url: "tender_management/tender_action.php",

        data: {
            'action': 'applyToTenderBtn',
            'tenderId': tenderId,

        },
        success: function (response) {
            // alert(response);
            var res = jQuery.parseJSON(response);
            if (res.status == 0) {

                // Create a table element
                var table = $('<table class="table table-bordered">');

                // Create the table header row
                // var tr = $('<tr>');
                // tr.append('<th>Name</th>');
                // // tr.append('<th>Age</th>');
                // table.append(tr);

                // Create the table body rows
                (res.message).forEach(function (name) {
                    tr = $('<tr>');
                    tr.append('<td>' + name + '</td>');
                    // tr.style.borderBottom = '1px solid black';
                    // tr.append('<td>' + name + '</td>');
                    table.append(tr);
                });


                // Append the table to the DOM
                // div = documemt.querySelector('.tender-apply-bod');
                // div.append(table);
                $('#applyTenderContainer').append(table);
                $('#submitApplication').val(tenderId);
                // const table0 = document.querySelector('table');
                // const rows = table0.querySelectorAll('tr');

                // for (let row of rows) {
                //     row.style.borderBottom = '1px solid black';
                // }

                // $('.tender-apply-bod').append(table);


                // alertify.success(1, res.message);

                // window.location.reload();
            } else if (res.status == 423) {
                alert(res.message);
            }

        }
    })
}
);
$(document).on('submit', '#applyTender', function (e) {
    e.preventDefault();
    // $('.modal-body').empty();

    var formData = new FormData(this);
    formData.append('action', 'applyToTender');
    formData.append('tenderId', $('#submitApplication').val());



    $.ajax({
        type: "POST",
        url: "tender_management/tender_action.php",
        // url: action,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {

            console.log(response);
            alert(response);
            var res = jQuery.parseJSON(response);
            alert(res.message);
            //$("#add-tender-form").addClass("d-none");
            if (res.status == 422) {

                $('#errorMessageApplyTender').removeClass('d-none');
                $('#errorMessageApplyTender').text(res.message);
                // alert('Error');



            } else if (res.status == 0) {
                $('#errorMessageApplyTender').removeClass('d-none');
                alertifyMsg(1, 'res.message');
            } else if (res.status == 500) {
                alert(res.message);
            }

        }
    })
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
            // alert("Success!");
            alert(response);
            var res = jQuery.parseJSON(response);
            // alert(res.message);
            //$("#add-tender-form").addClass("d-none");
            if (res.status == 422) {

                $('#errorMessageAddTender').removeClass('d-none');
                $('#errorMessageAddTender').text(res.message);
                // alert('Error');



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
                // $('html, body').animate({ scrollTop: 0 }, 'fast');
                //alert(location.href);
                window.location.reload();
                // $('html, body').animate({ scrollTop: 0 }, 'fast');
                // Scroll to the top of the main section
                // $('#main-section').animate({ scrollTop: 0 }, 'fast');
                $('#tender-list').animate({ scrollTop: 0 }, 'fast');
                // Scroll to the top of the page



            } else if (res.status == 500) {
                alert(res.message);
            }
            // else {
            //     alert(res.message);
            // }
        }

    });

});
$(document).on('submit', '#updateTender', function (e) {
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
            // alert("Success!");
            alert(response);
            // console.log(response);
            var res = jQuery.parseJSON(response);
            // alert(res.message);
            //$("#add-tender-form").addClass("d-none");
            if (res.status == 422) {

                $('#errorMessageEditTender').removeClass('d-none');
                $('#errorMessageEditTender').text(res.message);
                // alert('Error');



            } else if (res.status == 0) {

                //  alert('Success');
                $('#errorMessageEditTender').addClass('d-none');
                //$('#addQuestionModal').modal('hide');
                // $('#add_edit_question').text("");
                // alert($('#addQuestion')[0]['question_id']);
                $('#updateTender')[0].reset();
                // $('#add-tender-form').addClass('d-none');
                // alertify.set('notifier', 'delay', 1);
                // // alertify.set('notifier', 'position', 'top-right');
                alertify.success(res.message);
                $("#tender-modal-container").modal('hide');
                // alertifyMsg(1, res.message);
                // // $('html, body').animate({ scrollTop: 0 }, 'fast');
                // //alert(location.href);
                window.location.reload();
                // // $('html, body').animate({ scrollTop: 0 }, 'fast');
                // // Scroll to the top of the main section
                // // $('#main-section').animate({ scrollTop: 0 }, 'fast');
                // $('#tender-list').animate({ scrollTop: 0 }, 'fast');
                // Scroll to the top of the page



            } else if (res.status == 500) {
                alert(res.message);
            }
            else if (res.status == 423) {
                alert(res.message);
            }
        }

    });

});

$(document).on('click', '#deleteTender', function (e) {
    e.preventDefault();

    const confirmationMessage = CONFIRM_DELETE;
    var tenderId = $(this).val();
    // Delete the tender if the user clicks the "OK" button
    if (window.confirm(confirmationMessage)) {
        // Delete the tender
        $.ajax({
            type: "POST",
            url: "tender_management/tender_action.php",

            data: {
                'action': 'tenderDelete',
                'tender_id': tenderId,

            },
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                if (res.status == 0) {
                    alertify.success(1, res.message);

                    window.location.reload();
                } else if (res.status == 423) {
                    alert(res.message);
                }

            }
        })

    }



});
$(document).on('click', '#editTender', function (e) {
    e.preventDefault();

    // $('#questionModalLabel').text(EDIT_QUESTION);
    // alert(EDIT_QUESTION);
    console.log(EDIT_TENDER);
    var tenderId = $(this).val();
    // tender - modal - body
    // alert(questionId);
    // Get the HTML template element.
    // const templateElement = document.getElementById("add-tender");
    const templateElement = document.querySelector("#addTender");
    // alert(templateElement.innerHTML);

    // Create a copy of the template element.
    const cloneElement = templateElement.cloneNode(true);
    // Remove the `id` attribute from the cloned element.
    cloneElement.removeAttribute("id");
    // alert(cloneElement.innerHTML);
    // alert(cloneElement.className);
    cloneElement.classList.remove('d-none');
    // alert(cloneElement.className);
    // Set the form name to `add-tender-form-[tenderId]`.
    // cloneElement.remo("id", `add-tender-form-${tenderId}`);
    // cloneElement.setAttribute("id", `add-tender-form-${tenderId}`);
    // cloneElement.id = `add-tender-form-${tenderId}`;
    cloneElement.id = 'updateTender';
    // alert(cloneElement.innerHTML);
    // console.log(cloneElement.innerHTML);

    const modalElement = $("#tender-modal-container");


    // Show the modal.
    modalElement.modal("show");
    // modal.style.display = "block";
    const div = document.querySelector('.tender-modal-body');
    div.innerHTML = "";

    // const modalElement = $("#tender-modal-container");

    // div = document.querySelector('modal-body tender-modal-body');
    console.log(div);
    div.appendChild(cloneElement);


    $.ajax({
        type: "POST",
        url: "tender_management/tender_action.php",

        data: {
            'action': 'tenderEdit',
            'tender_id': tenderId,

        },
        // data: formData,
        // processData: false,
        // contentType: false,
        success: function (response) {
            alert(response);
            // alert(EDIT_QUESTION);
            var res = jQuery.parseJSON(response);
            // alert((res.message).tender_id);
            // alert(res.message.id);
            // Get the modal element.



            if (res.status == 0) {

                const formElements = document.querySelectorAll('#updateTender input, #updateTender button, #updateTender date, #updateTender checkbox, #updateTender select, #updateTender textarea');
                // if (res.meesage.tender_attachment_id.length > 0) {

                // const
                var attachmentTypes = '';
                if (((res.message).tender_attachment_id.length > 0)) {
                    attachmentTypes = (res.message).tender_attachment_id.slice(2, -2).split('","');
                }
                // alert((res.message).tender_attachment_id.slice(1, -1));
                // alert( jQuery.parseJSON(((res.message).tender_attachment_id.slice(1, -1))));
                // const attachmentTypes = JSON.parse((res.message).tender_attachment_id.slice(1, -1));

                // alert(attachmentTypes.length);
                // }

                // alert
                // const array = JSON.parse((res.message).tender_attachment_id);
                // alert(array);
                // const attachmentTypes = ["OC", "TD", "OP"];

                // Get the checkbox elements.
                const checkboxes = document.querySelectorAll("input[type='checkbox'][id^='tender_attachment_id_']");

                // Loop through the checkboxes.
                for (let checkbox of checkboxes) {

                    // Get the checkbox ID.
                    const id = checkbox.id;

                    // Check the checkbox if the ID includes one of the attachment types.

                    if (attachmentTypes.length > 0) {
                        for (let attachmentType of attachmentTypes) {
                            // alert(`${id} ${attachmentType}`);
                            if (id.includes(attachmentType)) {
                                checkbox.checked = true;
                                break;
                            }
                        }
                    }

                }

                for (const formElement of formElements) {
                    formElement.id += '_edit';
                }
                // alert((res.message).tender_id);
                $('#updateTenderBtn_edit').text(EDIT_TENDER);
                $('#tender_id_edit').val((res.message).tender_id);
                $('#tender_title_edit').val((res.message).tender_title);
                $('#tender_description_edit').val((res.message).tender_description);
                $('#tender_details_edit').val((res.message).tender_details);
                $('#tender_start_date_edit').val(((res.message).tender_start_date).split(' ')[0]);
                // alert((res.message).tender_start_date);
                $('#tender_due_date_edit').val(((res.message).tender_due_date).split(' ')[0]);


                $('#tender_posted_edit').prop('checked', ((res.message).tender_posted));
                // const buttonElement = $("#dismiss-button_edit");
                const buttonElement = document.querySelector("#dismiss-button_edit");

                // Add an onclick event to the button
                // buttonElement.addEventListener('click', function () {
                //     // Close the modal
                //     $("#tender-modal-container").modal('hide');
                // });
                buttonElement.addEventListener('click', function () {
                    $("#tender-modal-container").modal('hide');

                });

                // $('#tender_posted_edit').prop('checked', ((res.message).tender_posted));

                //     $('#addQuestionModal').modal('show');
                //     $('#question_id').val(res.message.question_id);
                //     $('#question_title').val(res.message.question_title);
                //     $('#question_description').val(res.message.question_description);
                //     $('#question_type').val(res.message.question_type);

                //     if (res.message.question_type == 4 || res.message.question_type == 5) {
                //         var answers = jQuery.parseJSON(res.message.question_answers);

                //         $('#answerMainContainer').removeClass('d-none');
                //         $('#addAnswer').removeClass('d-none');
                //         answers.forEach(function (answer) {
                //             addAnswer(answer);
                //             //alert(answer);
                //         });
            }




            // } else if (res.status == 500) {

            //     alert(res.message);
            // }
            // else if (res.status == 424) {
            //     $('#question_id').val(res.message.question_id);
            //     $('#question_title').val(res.message.question_title);
            //     $('#question_description').val(res.message.question_description);
            //     alert(res.message);
            // }
            // else {
            //     alert(res.message);
            // }
        }

    });

});

$(document).ready(function () {



    // Add event listener using event delegation for buttons with class starting with 'remove-tender-question'
    $(document).on('click', '[class^="remove-tender-question"]', removeTenderQuestion);
    var movableDiv = $(".movableDiv");
    // var movableDiv = document.getquerySelector(".movableDiv");

    movableDiv.on("mousedown", function (e) {
        var originalPos = $(this).index(); // Get the original position

        $(this).addClass("dragging");

        $(document).on("mousemove", function (e) {
            $(".dragging").css("top", e.clientY); // Move the element with the cursor
        });

        $(document).on("mouseup", function () {
            var newPos = Math.floor((movableDiv.index($(".dragging")) + originalPos) / 2);
            $(".dragging").removeClass("dragging");

            movableDiv.eq(newPos).before($(".dragging"));
            $(".dragging").css("top", "auto");

            $(document).off("mousemove");
            $(document).off("mouseup");
        });

        return false; // Prevent text selection during drag
    });
});



function resetForm() {// Escape key was pressed
    // //alert("You pressed the Escape key!");
    // $('#addNewQuestionForTender')[0].reset();
    const form = $("#addNewQuestionForTender");
    valuesArray = [];
    if (form.length) {
        form.trigger("reset");
    }
    const regex = /^new-row-[\d-]*$/;

    const divs = document.querySelectorAll("tr[id]");
    divs.forEach(div => {
        // console.log(div.id);
        if (regex.test(div.id)) {
            // console.log(div);
            div.innerHTML = ""; // Empty the contents of the matched div
        }
    });
    var rows = document.querySelectorAll('tr[id^="row"]');

    // Remove the `d-none` class from each row
    for (var i = 0; i < rows.length; i++) {
        rows[i].classList.remove('d-none');
    }

    // $('class^=[tenderQuestionContainer]').empty();


    // Get the hidden input element
    const questionBankIds = document.getElementById("questionBankIds");

    // Empty the hidden input element
    questionBankIds.value = "";

    // Get the hidden input element
    const questionBankIds2 = document.getElementById("questionBankIds");

    // Empty the hidden input element
    questionBankIds2.value = "";
    $(`.tender-question-container`).empty();
    $('#applyTenderContainer').empty();
    // $(`#questionBankIds`).val('');
    // $(`#bank-question-ids`).val('');

    $('#add-question-to-the-bank').collapse('hide');


}

function questionTypeEvent(questionType, questionNo = '') {

    if (questionNo.length > 0) {
        questionNo = `-${questionNo}`;
    }

    // //alert(answerNo);
    if (questionType.value > 3 && questionType.value < 6) {
        const questionAnswerContainer = document.getElementById(`answerContainer${questionNo}`);
        if (questionAnswerContainer != null) {
            while (questionAnswerContainer.firstChild) {
                questionAnswerContainer.removeChild(questionAnswerContainer.firstChild);
            }
        }
        $(`#answerMainContainer${questionNo}`).removeClass('d-none');
        $(`#addAnswer${questionNo}`).removeClass('d-none');
        //alert(`Please enter`);
        addAnswer();
    }

    else {
        $(`#answerMainContainer${questionNo}`).addClass('d-none');
    }
}
// Your logic function
function handleDeleteButtonClick(questionId) {
    // Rest of your logic
    // ... Your AJAX request and other actions ...
    // alert('Clicked on question_id: ' + questionId);

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
            // //alert(ADD_QUESTION);
            var res = jQuery.parseJSON(response);
            // //alert(res);
            // //alert(questionId);
            if (res.status == 0) {


                alertifyMsg(1, res.message);
                $('#questionList').load(location.href + " #questionList");
                // $('#row'+questionId).load(location.href + " #questionList");
                const rowElement = $("#row" + questionId);
                // //alert(questionId);
                rowElement.remove();


            } else if (res.status == 500) {
                alert(res.message);
            }
            else {
                alert(res.message);
            }
        }

    });
    resetForm();
}
function htmlspecialchars(str) {
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}


function addQuestionRow(questionId) {
    const newRow = document.createElement("tr");
    newRow.id = `new-row-${questionId}`;
    const newCell = document.createElement("td");
    newCell.colSpan = 5;



    const cardBody = document.createElement("div");
    cardBody.className = `card-body  add-question-form${questionId} m-3 rounded-3`;
    cardBody.style.backgroundColor = "#f0f8ff";
    cardBody.style.border = "1px solid #f0f";
    // cardBody.style.backgroundColor = "#000000";
    // cardBody.innerHTML = "Please";

    const code = document.createElement("code");
    code.dir = "rtl";

    const innerDiv = document.createElement("div");

    // innerDiv.id = "addQuestionForm";
    innerDiv.dir = "rtl";
    // innerDiv.style.borderRadius = "0px";

    // Create a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "../admin_panel/question_bank/question_action/question_form_edit.php", true);

    // Define the onload event handler
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Set the response as the innerHTML of the inner <div>
            innerDiv.innerHTML = xhr.responseText;
        } else {
            console.error("Request failed:", xhr.status, xhr.statusText);
        }
    };

    // Send the request
    xhr.send();

    code.appendChild(innerDiv);
    cardBody.appendChild(code);
    newCell.innerHTML = cardBody.innerHTML
    newCell.appendChild(cardBody);
    // newCell.innerHTML = "ttttt"
    newRow.appendChild(newCell);
    // if ($('#question_type') != null) {


    return newRow;
    // console.log(newRow);
}
function highlightRow(rowId) {
    // Get the row element with the specified id
    var row = document.getElementById(rowId);

    // Set the background color of the row to red
    row.style.backgroundColor = "red";
}


// Your logic function
function handleEditButtonClick(button, questionId) {



    // //alert(questionId);
    // deleteCurrentRow = document.getElementById()
    // Check if the div exists







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
            var res = jQuery.parseJSON(response);
            // //alert(res.message.question_answers);
            // const collapsible = $("#add-question-to-the-bank");
            // collapsible.toggleClass("collapse");
            if (res.status == 0) {

                const currentRow = button.closest("tr");
                currentRow.style.backgroundColor = "#E3E3E3";
                const newRowDiv = document.getElementById(`new-row-${questionId}`);
                if (newRowDiv !== null) {
                    currentRow.style.backgroundColor = "";
                    // Delete the div
                    newRowDiv.remove();
                    return;
                }

                newRow = addQuestionRow(questionId);
                // row.style.backgroundColor = "red";
                currentRow.after(newRow);

                const div = document.querySelector(`.add-question-form${questionId}`);
                const formElements = div.querySelectorAll("input, textarea, select, div");


                for (const formElement of formElements) {
                    console.log(formElement);
                    const id = formElement.id;

                    if (id) {
                        const newId = `${id}-${questionId}`;
                        formElement.id = newId;
                    }

                    // questionNo++;
                }
                // //alert(message.question_id);


                // $('#question_id').val(res.message.question_id);
                $(`#question_id-${questionId}`).val(res.message.question_id);
                $(`#question_title-${questionId}`).val(res.message.question_title);
                $(`#question_description-${questionId}`).val(res.message.question_description);
                $(`#question_type-${questionId}`).val(res.message.question_type);
                $(`#question_type-${questionId}`).on("change", function () {
                    questionTypeEvent(this);
                });
                // const x = $(`#question_type-${questionId}`).val();

                // const questionTypeEven = $(`#question_type-${questionId}`);
                const questionTypeElement = document.getElementById(`question_type-${questionId}`);
                // const questionIdf = 123;
                $(`#question_type-${questionId}`).change(function () {
                    //alert('x');
                    // //alert($(`#question_type-${questionId}`).value);
                    // ($)
                    // answerNo = document.getElementById('answer_no-${questionId}').value;
                    // const questionTypeNew = $(`#question_type-${questionId}`);
                    // //alert(questionTypeId);
                    // //alert(questionTypeElement.te);
                    if (questionTypeElement.value > 3 && questionTypeElement.value < 6) {
                        //alert('fff');
                        const questionAnswerContainer = document.getElementById(`answerContainer-${questionId}`);
                        while (questionAnswerContainer.firstChild) {
                            questionAnswerContainer.removeChild(questionAnswerContainer.firstChild);
                        }
                        $(`#answerContainer-${questionId}`).removeClass('d-none');
                        $(`#addAnswer-${questionId}`).removeClass('d-none');
                        $(`#addAnswer-${questionId}`).click(function () {
                            // //alert('y');
                            addAnswer('', questionId);
                        });





                    } else {
                        $(`#answerMainContainer-${questionId}`).addClass('d-none');
                    }

                });



                // //alert('d');
                if (res.message.question_type == 4 || res.message.question_type == 5) {
                    //alert('xs');
                    var answers = jQuery.parseJSON(res.message.question_answers);

                    $(`#answerMainContainer-${questionId}`).removeClass('d-none');
                    $(`#addAnswer-${questionId}`).removeClass('d-none');
                    $(`#addAnswer-${questionId}`).click(function () {
                        // //alert('y');
                        addAnswer('', questionId);
                    });
                    answers.forEach(function (answer) {
                        //alert(`${answer} ${questionId}`);
                        addAnswer(answer, questionId);
                        ////alert(answer);
                    });
                }


                // $('#add-question-to-the-bank').collapse('hide');
                //collapsible.toggleClass("collapsed");
            } else if (res.status == 500) {
                //alert(res.message);
            }
            else {
                alert(res.message);
            }
        }

    });
};

function handleAddButtonClick(questionId) {
    // alert(questionId);

    tenderId = document.getElementById('tenderid');
    const questionBankIds = 'questionBankIds';
    questionIds = document.getElementById(questionBankIds);

    // Add the new value to the array
    valuesArray.push(questionId);

    // Update the hidden input value with the updated array
    // questionIds.value = JSON.stringify(valuesArray);
    questionIds.value = valuesArray;

    // For debugging, you can log the array to the console
    // console.log(valuesArray);
    // console.log(questionIds.value);


    // var questionId = $(button).val();

    // const questionContainer = document.getElementById(`question-container${tenderId.value}`);
    // const questionNoContainer = document.getElementById(`questionNo-container${questionId}`);
    // const tenderQuestionContainer = document.querySelector('.tender-question-container');
    // const questionRow = document.getElementById(`row${questionId}`);
    const movableDiv = document.querySelector(`.tender-movable-div${questionId}`);
    if (movableDiv === null) {
        $(`#row${questionId}`).addClass('d-none');
        // The element is empty 
        $.ajax({
            type: "POST",
            url: "question_bank/question_action/question_action.php",
            data: {
                'action': 'previewQuestion',
                'questionId': questionId
            },
            //processData: false,
            // contentType: false,
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                // alert(res);

                if (res.status == 0) {
                    const html = `
                    <div class="tender-movable-div${questionId}"><div class="card rounded-3 text-black mt-2 p-1 " style="background-color: rgb(240, 248, 255); ">
                                    <button type="button" class="btn  btn-danger  remove-question${questionId}">
                                        <i class="fas fa-times-circle fa-2x"></i>    
                                    </button>
                                    <div class="row g-0">
                                        <div class="col-lg-12">
                                        <div class="card-body p-lg-4 mx-lg-2 ">
                                            <!-- padding for md is 7 marging left right for md 4 -->
                                            <div class="row d-flex justify-content-center align-items-center h-100" >
                                            <div class="row">
                                                <div class="col-md-12 mb-1">
                                                ${res.message}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    </div></div>
                                    `;
                    $(`.tender-question-container-button`).removeClass('d-none');
                    $(`.tender-question-container`).append(html);
                    const removeButton = document.querySelector(`.remove-question${questionId}`);

                    removeButton.addEventListener('click', function () {
                        return function () {
                            // Get the value of the hidden input array
                            var questionBankIds = $("#questionBankIds").val();
                            console.log(questionBankIds);
                            // Find the index of the question number in the array
                            // var index = questionBankIds.indexOf(questionNumber);
                            // console.log(index);
                            // Split the value of the hidden input array into an array
                            const indexToRemove = valuesArray.indexOf(questionId);
                            console.log(indexToRemove);
                            if (indexToRemove !== -1) {
                                valuesArray.splice(indexToRemove, 1); // Remove the value from the array
                                questionBankIds.value = JSON.stringify(valuesArray); // Update hidden input
                                $("#questionBankIds").val(valuesArray);
                                console.log($("#questionBankIds").val());
                                console.log(valuesArray);
                                console.log(questionBankIds.value);
                            } else {
                                console.log('Value not found in the array.');
                            }

                            $(`.tender-movable-div${questionId}`).remove();
                            // quetionElement.removeClass('d-none');
                            $(`#row${questionId}`).removeClass('d-none');
                            const movableDivs = document.querySelectorAll('[class^="tender-movable-div"]');
                            const count = movableDivs.length;
                            console.log(count);
                            if (count == 0) {
                                $('.tender-question-container-button').addClass('d-none');

                            }
                        };
                    }(questionId));

                } else if (res.status == 500) {
                    //alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });
    } else {
        // The element is not empty
        // alert();
    }

}
document.addEventListener('DOMContentLoaded', function () {
    var button = $("#question_type");
    if (button != null) {
        button.on("change", function () {
            questionTypeEvent(this);
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {





    // Get the button
    var button = $("#createTenderQuestionButton");
    // let valuesArray = [];
    // if (valuesArray) { console.log(valuesArray); }



    // Add an event listener to the button
    button.click(function () {


        const tenderId = document.getElementById('tenderid').value;
        const questionBankids = document.getElementById('questionBankIds').value;

        console.log(questionBankids);
        // alert(tenderId);
        // alert(questionBankids);

        console.log($("#questionBankIds").val());

        // Create the Ajax request
        $.ajax({

            url: "question_bank/question_action/question_action.php",
            // url: "que.php",
            type: "POST",
            data: {
                'tenderId': `${tenderId}`,
                'questionBankIds': `${questionBankids}`,
                'action': 'addToTender'
            }
        })
            .done(function (response) {
                //  alert(`: ${tenderId}`);



                $.ajax({
                    type: "POST",
                    url: "question_bank/question_action/question_action.php",
                    data: {
                        'action': 'getTenderQuestions',
                        'tenderId': `${tenderId}`,
                    },
                    success: function (data) {

                        // alert(data);
                        // question-container<?PHP echo $tender->getId()
                        // Replace the question-container with the new data.
                        $(`#question-container${tenderId}`).empty();
                        // $(`#tender-question${tenderId}`).html(data);
                        $(`#question-container${tenderId}`).html(data);
                        // $(`#tender-question${tenderId}`).html(data);
                        // Add event listener using event delegation
                        resetForm();



                    }
                });

            })
            .fail(function () {
                // An error occurred
                alert("An error occurred.");
            });
    });
});



$(document).ready(function () {



});

// Attach the onclick event to all buttons with class "question-button"
document.addEventListener("DOMContentLoaded", function () {

    // alert("Please wait...");
    const buttons = document.querySelectorAll(".add-question-button");
    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            handleAddButtonClick(button.value)

        });
    });
});
// Attach the onclick event to all buttons with class "question-button"
document.addEventListener("DOMContentLoaded", function () {
    ////alert("Please wait...");
    const buttons = document.querySelectorAll(".delete-question-button");
    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            // alert("Please   select");
            handleDeleteButtonClick(button.value);
        });
    });

});

// Attach the onclick event to all buttons with class "question-button"
document.addEventListener("DOMContentLoaded", function () {
    ////alert("Please wait...");
    const buttons = document.querySelectorAll(".edit-question-button");
    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            //  //alert("Please   select");
            handleEditButtonClick(button, button.value);
        });
    });

});

// ("[id^='addQuestionToTender']");
function removeTenderQuestion(event) {
    // alert($(this).val());
    tenderQuestionString = $(this).val();
    // Get the button that was clicked
    var button = event.target;

    // Get the question ID from the button's class attribute
    var tenderId = tenderQuestionString.split('-')[0];
    var questionId = tenderQuestionString.split('-')[1];
    // alert(`tenderId: ${tenderId} questionId: ${questionId}`);
    $.ajax({
        type: "POST",
        url: "question_bank/question_action/question_action.php",
        data: {
            'action': 'deleteTenderQuestion',
            'questionId': questionId,
            'tenderId': tenderId,
        },
        //processData: false,
        // contentType: false,
        success: function (response) {

            // alert(response);
            var res = jQuery.parseJSON(response);
            // //alert(res);
            // //alert(questionId);
            if (res.status == 0) {

                $.ajax({
                    type: "POST",
                    url: "question_bank/question_action/question_action.php",
                    data: {
                        'action': 'getTenderQuestions',
                        'tenderId': tenderId,
                    },
                    success: function (data) {
                        // alert(data);
                        // question-container<?PHP echo $tender->getId()
                        // Replace the question-container with the new data.
                        $(`#question-container${tenderId}`).empty();
                        // $(`#tender-question${tenderId}`).html(data);
                        $(`#question-container${tenderId}`).html(data);
                        // $(`#tender-question${tenderId}`).html(data);
                        // Add event listener using event delegation
                        resetForm();

                    }
                });

            }
        }
    });


}
// Attach the onclick event listener to all buttons that start with the class remove-tender-question
var removeQuestoinButtons = document.querySelectorAll('button[class*="remove-tender-question"]');

for (var i = 0; i < removeQuestoinButtons.length; i++) {
    removeQuestoinButtons[i].addEventListener('click', removeTenderQuestion);

    // removeQuestoinButtons[i].onclick = removeTenderQuestion;
}


function createTableRow(question) {
    ////alert('Create');
    const myTable = document.getElementById("myTable");

    // Create the <tr> element
    const row = document.createElement("tr");
    row.setAttribute("id", "row" + question.question_id);
    // Create the first <td> element
    const td1 = document.createElement("td");
    td1.className = "text-center align-middle";

    // Create the first <div> element
    const div1 = document.createElement("div");
    div1.className = "row justify-content-center align-items-center";

    // Create the first <button> element
    const button1 = document.createElement("button");
    button1.type = "button";
    button1.className = "btn btn-link add-question-button";
    button1.value = question.question_id; // Replace with the appropriate value
    button1.addEventListener('click', () => {
        // alert();
        // handleDeleteButtonClick(question.question_id);
        handleAddButtonClick(question.question_id)
        // alert("Delete");
    });
    button1.innerHTML = "<i class='fas fa-plus' aria-hidden='true'></i>";

    // Append the button to the div, and the div to the first td
    div1.appendChild(button1);
    td1.appendChild(div1);

    row.appendChild(td1);

    // Create the question title column
    const titleCell = document.createElement("td");
    titleCell.textContent = question.question_title;
    row.appendChild(titleCell);

    // Create the question preview column
    const previewCell = document.createElement("td");
    const previewDiv = document.createElement("div");
    previewDiv.className = "row justify-content-center align-items-center";
    previewDiv.innerHTML = question.question_preview; // Append as HTML code

    previewCell.appendChild(previewDiv);
    // previewCell.innerHTML = question.question_preview;
    row.appendChild(previewCell);


    // Create the first <td> element
    const td3 = document.createElement("td");
    td1.className = "text-center align-middle";

    // Create the first <div> element
    const div3 = document.createElement("div");
    div3.className = "row justify-content-center align-items-center";

    // Create the first <button> element
    const button3 = document.createElement("button");
    button3.type = "button";
    button3.className = "btn btn-link delete-question-button";
    button3.value = question.question_id; // Replace with the appropriate value
    button3.innerHTML = "<i class='fas fa-trash' aria-hidden='true'></i>";
    button3.addEventListener('click', () => {
        handleDeleteButtonClick(question.question_id);
    });


    // Append the button to the div, and the div to the first td
    div3.appendChild(button3);
    td3.appendChild(div3);

    row.appendChild(td3);

    // Create the first <td> element
    const td4 = document.createElement("td");
    td1.className = "text-center align-middle";

    // Create the first <div> element
    const div4 = document.createElement("div");
    div4.className = "row justify-content-center align-items-center";

    // Create the first <button> element
    const button4 = document.createElement("button");
    button4.type = "button";
    button4.className = "btn btn-link edit-question-button";
    button4.value = question.question_id;// Replace with the appropriate value
    button4.innerHTML = "<i class='fas fa-edit' aria-hidden='true'></i>";
    button4.addEventListener('click', () => {
        handleEditButtonClick(button4, question.question_id);
    });

    // Append the button to the div, and the div to the first td
    div4.appendChild(button4);
    td4.appendChild(div4);

    row.appendChild(td4);

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

function pulishQuestions(res, pageLink) {
    var newPaginationLinks = [];
    // //alert(res.total_pages);
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
    ////alert((res.question_ist)[0].question_title);
    const tableBody = document.getElementById("table-body");
    tableBody.innerHTML = "";
    appendRowsToTable(res.question_ist);


}


window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

function addAnswer(answerString = '', questionNo = '') {
    //alert(`answer: ${ answerString } questionNo: ${ questionNo } ${ questionNo.length } `);
    questionNo = questionNo + ''
    // alert(answerContainer);

    // const questionAnswerContainer = document.getElementById(`answerContainer - ${ questionNo } `);
    // //alert(questionAnswerContainer.id);
    // console.log(questionAnswerContainer);
    // answer_no = 0
    questionAnswerContainer = '';
    // //alert(questionNo);
    if (questionNo.length > 0) {
        questionAnswerContainer = document.getElementById(`answerContainer-${questionNo}`);
        if (document.getElementById(`answer_no-${questionNo}`) == null) {
            answerNo = 0;
        } else {
            answerNo = document.getElementById(`answer_no-${questionNo}`).value;
        }
    }
    else {
        questionAnswerContainer = document.getElementById(`answerContainer`);
        if (document.getElementById(`answer_no`) == null) {
            answerNo = 0;
        } else {
            answerNo = document.getElementById(`answer_no`).value;
        }

        // answerNo = (questionNo.length > 0 ? document.getElementById(`answer_no - ${ questionNo } `).value : document.getElementById('answer_no').value);
    }
    // //alert(answerNo);
    answerNo = parseInt(answerNo, 10) + 1;
    $('#answer_no').val(answerNo);
    const questionAnswer = document.createElement("input");

    questionAnswer.type = "text";
    questionAnswer.name = "answers\[\]";

    questionAnswer.id = questionNo.length > 0 ? `questionAnswer-${questionNo}${answerNo}` : `questionAnswer${answerNo}`;
    questionAnswer.value = answerString;
    questionAnswer.className = "form-control";
    questionAnswer.placeholder = ADD_YOUR_ANSWER;

    answerDiv = document.createElement("div");
    answerDiv.className = "col-md-10";
    answerDiv.appendChild(questionAnswer);



    const removeAnswerIcon = document.createElement('i');
    removeAnswerIcon.classList.add('fa', 'fa-trash');
    removeAnswerIcon.classList.add('btn', 'btn-link');
    // removeAnswerIcon.setAttribute("value", rowAnswer);
    removeAnswerIcon.addEventListener('click', (event) => {
        deleteAnswer();
    });
    // Create a hidden input element
    const hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.value = questionNo;
    iconDiv = document.createElement("div");
    iconDiv.className = "col-md-2";
    iconDiv.id = `${answerNo}`;
    if (questionNo.length > 0) {
        iconDiv.id = `-${questionNo}${answerNo}`;
    }
    // icondiv.id = "icon-trash";
    iconDiv.appendChild(hiddenInput);
    iconDiv.appendChild(removeAnswerIcon);

    iconDiv.addEventListener('click', deleteAnswer);
    // iconDiv.addEventListener('click', (questionNo) => {
    //     deleteAnswer(questionNo);
    // });


    rowAnswer = document.createElement('div');
    rowAnswer.id = `rowAnswer${answerNo}`;
    if (questionNo.length > 0) {
        console.log(questionNo);
        rowAnswer.id = `rowAnswer-${questionNo}${answerNo}`;
    }
    console.log(rowAnswer.id);
    rowAnswer.className = "row";



    rowAnswer.appendChild(hiddenInput);
    rowAnswer.appendChild(answerDiv);
    rowAnswer.appendChild(iconDiv);
    console.log(`rowAnswer-${questionNo}${answerNo}`);
    console.log(rowAnswer);



    questionAnswerContainer.appendChild(rowAnswer);

    $(questionNo.length > 0 ? `#answer_no-${questionNo}` : '#answer_no').val(answerNo);



}
function deleteAnswer() {
    // alert(answerNo);
    // alsert($this.id);
    const iconDivId = this.id;
    alert(iconDivId);
    // //alert(iconDivId);
    // const answerNo = document.querySelector(`#rowAnswer${ answerNo } `);
    // const rowElement = document.querySelector(`#rowAnswer`);
    // const answerNo = $('#hiddenInput');
    // alsert(answerNo);
    const rowElement = $(`#rowAnswer${iconDivId}`);
    // //alert(rowElement.id);
    rowElement.remove();
    // const rowElement = $(questionNo.length > 0 ? '#rowAnswer-' + questionNo + answerNo : '#rowAnswer' + answerNo);
    // // const rowElement = $('#rowAnswer' + answerNo);
    // const rowElement = $(`#rowAnswer${ answerNo } `);
    // // rowElement = document.getElementById(`#rowAnswer${ answerNo } `);
    // //alert(rowElement.id);
    // // console.log('rowElement');
    // // console.log(rowElement.innerHTML);
    // // //alert(rowElement.id);

    // rowElement.remove();



}




// menu item link
function btnclick(_url) {
    ////alert('ffff');
    $.ajax({
        url: _url,
        type: 'post',
        success: function (data) {
            $('#DIVID').html(data);


        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}

function menubtnclick1(_menuItem) {


    $.ajax({
        url: 'main.php',
        type: 'POST',
        data: {
            "menuItem": _menuItem,
        },
        success: function (response, data) {

            $('#DIVID').html(response);
            $.cache.set("DIVID", response);

        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }

    });
    //return false;
}
// function openModal(id) {
//     //alert('Open modal');
//     // Get the record data
//     var record = getDataById(id);

//     // Populate the modal form with the record data
//     document.getElementById('mname').value = record.name;
//     document.getElementById('memail').value = record.email;
//     document.getElementById('mphone').value = record.phone;

//     // Open the modal form
//     document.getElementById('myModal').style.display = 'block';
// }

function alertifyMsg(delay, message) {
    alertify.set('notifier', 'delay', delay);
    alertify.set('notifier', 'position', 'top-right');
    alertify.success(message);

}

function actionclick(_action, _id, _admin, _status) {

    $.ajax({
        url: 'user_managment/user_action.php',
        type: 'POST',
        cache: false,
        data: {
            "action": _action,
            "id": _id,
            "admin": _admin,
            "userStatus": _status

        },
        success: function (response) {
            //   //alert(response);
            var res = jQuery.parseJSON(response);
            if (res.status == 0) {
                alertify.set('notifier', 'delay', ALERTIFIER_TIME);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(res.message);
            }
            if (res.status == 500) {
                alertify.set('notifier', 'delay', ALERTIFIER_TIME);
                alertify.set('notifier', 'position', 'top-right');
                alertify.success(res.message);
            }
            // $('#DIVID').load(location.href + " #DIVID");
            $('#myTable').load(location.href + " #myTable");
        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}
function btnclick2(_url) {
    $.ajax({
        url: _url,
        type: 'post',
        success: function (data) {
            $('#preview').html(data);
        },
        error: function () {
            $('#preview').text('An error occurred');
        }
    });
}

function validateCurrentPassword1() {
    //alert('l');
    $.ajax({
        url: 'change_password.php',
        type: 'post',
        success: function (data) {
            $('#DIVID').html(data);
        },
        error: function () {
            $('#DIVID').text('An error occurred');
        }
    });
}
function validateCurrentPassword() {
    ////alert(currentPassword);
    $(".currentPasswordMsg").html('');
    $(".currentPasswordMsg").hide();
    var isCorrect = false

    currentNewPassword = $("#currentPassword").val();
    // res = $("#res").val();
    ////alert('res');
    $.ajax({
        url: 'change_password.php',
        type: 'post',
        data: { 'currentNewPassword': currentNewPassword },

        success: function (response, data) {

            $('#DIVID').html(response);
            // //alert(document.getElementById($(".currentPasswordMsg")).getAttribute('value'));
            // //alert($(".currentPasswordMsg").attr('data-fullText'));
            // //alert($(".currentPasswordMsg").html());
            if ($.trim(($(".currentPasswordMsg").html())).length > 0) {
                $("#currentPassword").val(currentNewPassword);
                // $(".ptxt").addClass('pass_show');
                $(".currentPasswordMsg").addClass('alert-danger');
                $(".currentPasswordMsg").show();
                // //alert(1);
                // return true;


            } else {
                $("#currentPassword").val(currentNewPassword);
                ////alert(2)
                ////alert("true");
                isCorrect = true;
                return true;
            }


        },
        error: function () {
            //alert(3);
            $('#DIVID').text('An error occurred');

        }
    });

    return isCorrect;


}
function validateConfirmPassword(nPassword, cPassword) {
    $(".confirmPasswordMsg").html('');
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    confirmPassword = cPassword;
    confirmPasswordMsg = "";
    if ((newPassword != confirmPassword)) {
        confirmPasswordMsg = confirmPasswordMsg + MATCH_PASSWORD + "<br>";
        $(".confirmPasswordMsg").addClass(' alert-danger').html(confirmPasswordMsg)
        $(".confirmPasswordMsg").show();
        return false;
    } else {
        // //alert('t');
        return true;

    }
}
function validateNewPassword(password) {
    // newPassword = $(".newPassword").val();
    newPassword = password;

    $(".newPasswordMsg").html('');
    var newPasswordMsg = "";
    //$(".confirmPasswordMsg").hide();
    if (newPassword.length < 6) {
        newPasswordMsg = newPasswordMsg + EIGHT_CHARACTER + "<br>";
    }
    // ////alert(/\d/.test(newPassword));
    if (!(/\d/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_DIGIT + "<br>";
    }
    if (!(/[a-zA-Z]/.test(newPassword) || /[\u0621-\u064A]/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_LETTER + "<br>";
    }
    // if (!(/[A-Z]/.test(newPassword))) {
    //     newPasswordMsg = newPasswordMsg + CONTAINS_LETTER + "<br>";
    // }
    if (!(/[ `!@#$ %^&* ()_ +\-=\[\]{}; ':"\\|,.<>\/?~]/.test(newPassword))) {
        newPasswordMsg = newPasswordMsg + CONTAINS_SPECIAL + "";
    }
    if (newPasswordMsg.length > 0) {
        $(".newPasswordMsg").addClass(' alert-danger').html(newPasswordMsg)
        $(".newPasswordMsg").show();
        return false;

    } else {
        ////alert('true')
        return true;
    }


}

function recover(_userID, nPassword, cPassword, _action) {
    ////alert('x' + _action);
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';
    newPassword = nPassword;
    confirmPassword = cPassword;
    newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {

        $.ajax({
            url: _action == 'recovry' ? 'index.php' : '../index.php',
            type: 'POST',
            data: {
                "userID": _userID,
                "newPassword": newPassword,
                "confirmPassword": confirmPassword,
                "action": _action
            },
            cashe: false,
            success: function (response, data) {
                if (_action == "recover") {
                    //  //alert(response);
                    //  //alert(PASSWORD_UPDATED_SUCCSESSFULL);
                    console.log('xsxx');
                    window.history.pushState("object or string", "Title", "/tender_scme/");
                    document.write(response);
                    $('#feedback-info').html(PASSWORD_UPDATED_SUCCSESSFULL);
                    $('#feedback-info').removeClass('d-none');
                    alertifyMsg(5, PASSWORD_UPDATED_SUCCSESSFULL);
                } else {
                    //alert(PASSWORD_UPDATED_SUCCSESSFULL);
                    ////alert(response);
                    console.log('eeee');
                    // $('#divid').load(location.href + " #divid");
                    //$('#signupid').html(response);
                    //head
                    // window.Location('../index.php');
                    // alertifyMsg(5, PASSWORD_UPDATED_SUCCSESSFULL);
                    location.replace("index.php");

                    //document.write(response);
                }


            },
            error: function () {
                // //alert('not ')
                console.log('xfsxx');
                //  $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    ////alert('out');



};
function reassign(_userID, nPassword, cPassword) {
    //alert('xx');
    // //alert(nPassword + " " + cPassword);
    //  $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    // var currentPasswordMsg = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';
    var userID = _userID;


    // //alert(currentPassword.value);
    // currentPassword = $("#currentPassword").val();
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    confirmPassword = cPassword;
    // recover_password = $("#recover_password").val();
    newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {
        // //alert('x');
        var input = {
            "userID": _userID,
            "newPassword": newPassword,
            "confirmPassword": confirmPassword,
        };
        $.ajax({
            url: 'user_mamgment/reset_password_user_action.php',
            type: 'POST',
            data: {
                "userID": _userID,
                "newPassword": newPassword,
                "confirmPassword": confirmPassword,
            },
            cashe: false,
            success: function (response, data) {
                //alert(PASSWORD_UPDATED_SUCCSESSFULL);
                ////alert('newPassword');
                console.log('xsxx');
                //  window.Location('logout.php');
                window.history.pushState("object or string", "Title", "/tender_scme/");

                document.write(response);
                //$('#DIVID').load(location.href + " #DIVID");
                //$("#DIVID").html(response);
                //   $(".validation-message").html(response);
                //$(".validation-message").addClass('alert-danger');
                //  $(".validation-message").show();

            },
            error: function () {
                // //alert('not ')
                console.log('xfsxx');
                //  $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    ////alert('out');



};
// $(document).ready(function () {
//     $('#submit').click(function () {
//         //alert('ss');
//         $(".newPasswordMsg").hide();
//         $(".confirmPasswordMsg").hide();
//         // var currentPasswordMsg = '';
//         var newPasswordMsg = '';
//         var confirmPasswordMsg = '';
//         var userID = 2;


//         // //alert(currentPassword.value);
//         // currentPassword = $("#currentPassword").val();
//         var newPassword = $("#newPassword").val();
//         var confirmPassword = $("#confirmPassword").val();
//         // recover_password = $("#recover_password").val();
//         newPasswordMsg = validateNewPassword();
//         confirmPasswordMsg = validateConfirmPassword();
//         if (validateNewPassword() && validateConfirmPassword()) {
//             ////alert('x');
//             var input =
//                 $.ajax({
//                     type: 'POST',
//                     url: 'recovery_password_controller.php',

//                     data: {
//                         user_id: '2',
//                         newPassword: newPassword,
//                         confirmPassword: confirmPassword,
//                     },
//                     // contentType: 'application/json',
//                     success: function (response, data) {
//                         //alert(data);
//                         //alert(PASSWORD_UPDATED_SUCCSESSFULL);
//                         ////alert('newPassword');
//                         console.log('xsxx');
//                         //  window.Location('index.php');

//                         document.write(response);

//                         //$("#signupid").html(response);
//                         //   $(".validation-message").html(response);
//                         //$(".validation-message").addClass('alert-danger');
//                         //  $(".validation-message").show();

//                     },
//                     error: function () {
//                         // //alert('not ')
//                         console.log('xfsxx');
//                         //  $("#DIVID").html('data');
//                     }
//                 });

//         } else {
//             return false;
//         }
//     });
// });
function changePassword(nPassword, cPassword) {
    //  //alert('change password' + ' ' + nPassword + ' ' + cPassword);
    $(".currentPasswordMsg").hide();
    $(".newPasswordMsg").hide();
    $(".confirmPasswordMsg").hide();
    var currentPassword = '';
    var newPasswordMsg = '';
    var confirmPasswordMsg = '';

    // //alert(currentPassword.value);
    currentPassword = $("#currentPassword").val();
    // newPassword = $("#newPassword").val();
    // confirmPassword = $("#confirmPassword").val();
    newPassword = nPassword;
    // confirmPassword = cPassword;
    // newPasswordMsg = validateNewPassword(newPassword);
    confirmPasswordMsg = validateConfirmPassword(newPassword, confirmPassword);
    ////alert('xx');
    if (validateNewPassword(newPassword) && validateConfirmPassword(newPassword, confirmPassword)) {
        //  //alert('x');
        var input = {
            "currentPassword": currentPassword,
            "newPassword": newPassword,
            "confirmPassword": confirmPassword,



        };
        $.ajax({
            url: 'change_password.php',
            type: 'POST',
            data: input,
            success: function (response) {
                //  //alert(response);
                // //alert(PASSWORD_UPDATED_SUCCSESSFULL);
                var res = jQuery.parseJSON(response);
                // //alert(res.message);
                ////alert(res.message);
                if (res.status == 0) {
                    alertifyMsg(1, res.message);

                } if (res.status == 500) { alertifyMsg(1, res.message); }
                ////alert('newPassword');
                console.log('xsxx');

                $("#DIVID").html(response);
                //   $(".validation-message").html(response);
                //$(".validation-message").addClass('alert-danger');
                //  $(".validation-message").show();

            },
            error: function () {
                // //alert('not ')
                console.log('xfsxx');
                $("#DIVID").html('data');
            }
        });

    } else {
        return false;
    }
    // return false;
    ////alert('out');




}
function recoverPassword2() {
    //alert('x');




}


function sendOTP(_er) {


    $(".error").html("").hide();
    //$(".resend").hide();
    //$("#resendBtn").hide();
    //  $(".resend").html("").hide();
    var number = $("#mobile_no").val();
    if (number.length == 10 && number != null) {
        //alert(OTP);
        var input = {
            "mobile_number": number,
            "action": "send_otp"
        };
        $.ajax({
            url: 'mobile_verificatoin_controller.php',
            type: 'POST',
            data: input,
            success: function (response) {
                console.log('xsxx');
                $("#new-user-card").html(response);

            }
        });
    } else {
        console.log('xexx');
        $(".error").html(MOBILE_NO_SHOULD_BE_10_Digits);
        $(".error").addClass('alert alert-warning d-none');
        $(".error").show();
    }
}


function verifyOTP(_er) {
    $(".error").html("").hide();
    $(".success").html("").hide();

    // $(".resend").hide();
    // // $("#resendBtn").hide();
    // $(".resend").hide();
    // $(".DIVID").load('mobile_verification_response_form.php', function () {
    //     $(".resend").hide();
    // })



    var otp = $("#mobileOtp").val();
    // id="resend"

    var input = {
        "mobile_otp": otp,
        "action": "verify_otp"
    };
    if (otp.length == 6 && otp != null) {
        ////alert('ok');
        $.ajax({

            url: 'mobile_verificatoin_controller.php',
            type: 'POST',
            dataType: "json",
            data: input,
            //contentType: "application/json; charset=utf-8",
            //dataType: "json",
            /// dataType: input,



            success: function (response) {

                $("." + response.type).html(response.message);
                $("." + response.type).show();
                $('#verify').hide();
                $('#mobileOtp').prop("disabled", true);
                $('#mobileOtp').hide();
                $('#mobileOtpLbl').hide();
                //$("." + response.type).append("<div class=\"col-md-12 mb-1\"><a class=\"btn btn-lg btn-success btn-block col-md-12 mb-1\" href='activate_mobile.php'>" + NEXT + "</a></div>");
                $(".resend").append("<div class=\"col-md-12 mb-1\"><a class=\"btn btn-lg btn-success btn-block col-md-12 mb-1\" href=\"#\" onclick=\"btnclick('activate_mobile.php')\">" + NEXT + "</a></div>");

                ////alert(OTP_SUCSESS);
                //location.href = "activate_mobile.php"




                // $("." + res.type).html(response.message)
                // $("." + res.type).show();
            },
            error: function () {
                //alert('dd');

                // $(".success").html(response.message)
                // $(".success").show();
            }
        });
    } else {
        $(".error").html(_er)
        $(".error").show();
    }
}

function validatePassword() {
    //alert("ddd");
    //return false;

    var currentPassword, newPassword, confirmPassword, output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;
    //alert(currentPassword.value);
    // return false;
    if (!currentPassword.value) {
        // //alert('gg');
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("new_password").innerHTML = "required";
        output = false;
    }
    else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirm_password").innerHTML = "required";
        output = false;
    }
    if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirm_password").innerHTML = "not same";
        output = false;
    }
    return output;
}




function msg2() {
    //alert("ff23");
};