<?php


require_once 'init_question.php';
require_once 'add_question_modal.php';



$questions = $model->getQuestions();

?>

<div class="container">

    <h1>Question Bank</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Question Type</th>
                <th>Answers</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($questions as $question): ?>
                <tr>
                    <td>
                        <?php echo $question->title; ?>
                    </td>
                    <td>
                        <?php echo $question->description; ?>
                    </td>
                    <td>
                        <?php echo $question->question_type; ?>
                    </td>
                    <td>
                        <?php echo $question->answers; ?>
                    </td>
                    <td>
                        <a href="?action=edit&id=<?php echo $question->id; ?>">Edit</a>
                        <a href="?action=delete&id=<?php echo $question->id; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr />

    <ul>
        <li><a href="?action=add">Add New Question</a></li>

        <button id="addQuestion" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#addQuestionModal">Add
            Question</button>



    </ul>

</div>
<script src="../../assets/js/jquery-3.6.4.js"></script>
<!-- <script>$(document).on('click', '.editUserBtn', function () {
        //alert(5);

        var user_id = $(this).val();
        //  alert(user_id);
        $.ajax({
            type: "GET",
            url: "user_managment/user_action.php?user_id=" + user_id,
            success: function (response) {
                //  alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res.status + res.data.user_id);
                if (res.status == 404) {

                    //alert(res.message);
                } else if (res.status == 423) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    // alert('Error');

                } else if (res.status == 200) {

                    $('#reset_user_id').val(res.data);
                    // $('#fname').val(res.data.name);
                    // $('#m-email').val(res.data.email);
                    // $('#user_id').val(res.data.user_id);
                    // $('#phone').val(res.data.phone);
                    // $('#course').val(res.data.course);

                    $('#userEditModal').modal('show');
                }

            }
        });

    });</script> -->