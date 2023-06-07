<?PHP
require_once 'add_user_modal.php';
require_once 'update_user_modal.php';
require_once 'reset_password_user_modal.php';
require_once 'send_email_user_modal.php';
?>


<!-- Edit Student Modal -->
<!-- <div class="modal fade" id="studentEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="updateStudent">
                <div class="modal-body">

                    <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                    <input type="hidden" name="student_id" id="student_id">

                    <div class="mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" id="name" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <input type="text" name="email" id="email" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Phone</label>
                        <input type="text" name="phone" id="phone" class="form-control" />
                    </div>
                    <div class="mb-3">
                        <label for="">Course</label>
                        <input type="text" name="course" id="course" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Student</button>
                </div>
            </form>
        </div>
    </div>
</div> -->

<!-- View Student Modal -->
<!-- <div class="modal fade" id="studentViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="mb-3">
                    <label for="">Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Email</label>
                    <p id="view_email" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Phone</label>
                    <p id="view_phone" class="form-control"></p>
                </div>
                <div class="mb-3">
                    <label for="">Course</label>
                    <p id="view_course" class="form-control"></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<div class="card">
    <div class="container p-3 m-1">
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        ?>

        <a data-bs-toggle="modal" data-bs-target="#userAddModal" class="btn btn-dark mb-3"><i class="fa fa-user-plus"
                aria-hidden="true"></i></a>

        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#userAddModal">
            <?PHP echo $init::ADD_USER ?>
        </button>

        <table id="myTable" class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">
                        <?PHP echo $init::USERNAME ?>
                    </th>
                    <th scope="col">
                        <?PHP echo $init::FULL_NAME ?>
                    </th>
                    <th scope="col">
                        <?PHP echo $init::EMAIL ?>
                    </th>
                    <th scope="col">
                        <?PHP echo $init::USER_STATUS ?>
                    </th>
                    <th scope="col">
                        <?PHP echo $init::ACTION ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($allUsers as $key => $value) {
                    $id = $allUsers[$key]["user_id"];
                    $admin = true;
                    ?>
                    <tr>
                        <td>
                            <?php echo $allUsers[$key]["username"] ?>
                        </td>
                        <td>
                            <?php echo $allUsers[$key]["name"] ?>
                        </td>

                        <td>
                            <?php echo $allUsers[$key]["email"] ?>
                        </td>
                        <td>
                            <?php
                            $checked = $allUsers[$key]["user_status"] < 4 ? "checked" : "" ?>
                            <label class="switch"> <i class="fa-solid fa-key"></i>
                                <input type="checkbox" <?PHP echo $checked ?>
                                    onClick="actionclick('activate','<?PHP echo $id ?>','<?PHP echo $admin ?>','<?PHP echo $allUsers[$key]["user_status"] ?>')">
                                <span size="4" class="slider round"></span>
                            </label>
                            <?PHP
                            // echo $allUsers[$key]["user_status"] ?>
                        </td>
                        <td>
                            <!-- <a href="#" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-1"></i></a> -->
                            <!-- <a data-bs-toggle="modal" data-bs-target="#userEditModal" class="link-dark"><i
                                    class="fa-solid fa-pen-to-square fs-5 me-1" aria-hidden="true"></i></a> -->



                            <button type="button" value="<?PHP echo $allUsers[$key]["user_id"]; ?>"
                                class="editUserBtn btn btn-link link-dark btn-sm p-0"> <i
                                    class="fa-solid fa-pen-to-square fs-5 " aria-hidden="true"></i></button>
                            <?PHP
                            // $action = 'edit';
                            // $icon = 'fa-solid fa-pen-to-square fs-5 ';
                            // echo $init->userAction($action, $id, $admin, $userStatus, $icon);
                        
                            $action = 'delete';
                            $icon = 'fa-solid fa-trash fs-5 pe-2';
                            echo $init->userAction($action, $id, $admin, $userStatus, $icon);

                            // $action = 'reset';
                            // $icon = 'fa-solid fa-key fs-5 ';
                            // echo $init->userAction($action, $id, $admin, $userStatus, $icon);
                        
                            ?>
                            <button type="button" value="<?PHP echo $allUsers[$key]["user_id"]; ?>"
                                class="resetUserPasswordBtn btn btn-link link-dark btn-sm p-0"> <i
                                    class="fa-solid fa-key fs-5 pe-2" aria-hidden="true"></i></button>
                            <button type="button" value="<?PHP echo $allUsers[$key]["user_id"]; ?>"
                                class="sendEmailBtn btn btn-link link-dark btn-sm p-0"> <i
                                    class="fa-solid fa-envelope fs-5 pe-2" aria-hidden="true"></i></button>





                        </td>
                    </tr>
                    <?php
                }


                ?>
            </tbody>
        </table>
    </div>
</div>

<script src="../assets/js/jquery-3.6.4.js"></script>
<!-- <script src="../assets/js/scripts.js"></script> -->


<script>
    $(document).on('submit', '#saveUser', function (e) {
        e.preventDefault();
        //alert('Please');
        //alert(document.getElementsByTagName("script"));
        console.log('document.getElementsByTagName');
        //history.pushState(null, null, 'index.php');
        var formData = new FormData(this);
        console.log(formData['username']);

        formData.append("save_user", true);
        console.log('documame');
        //  $('#errorMessage').removeClass('d-none');
        $.ajax({
            type: "POST",
            url: "user_managment/user_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                //alert(response);
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
                    $('#userAddModal').modal('hide');
                    $('#saveUser')[0].reset();
                    // alertify.set('notifier', 'delay', 1);
                    // alertify.set('notifier', 'position', 'top-right');
                    // alertify.success(res.message);
                    alertifyMsg(1, res.message);
                    $('#myTable').load(location.href + " #myTable");

                } else if (res.status == 500) {
                    alert(res.message);
                }
                else {
                    alert(res.message);
                }
            }

        });

    });
    $(document).on('click', '.closeSaveUserBtn', function () {
        $('#saveUser')[0].reset();
        $('#errorMessage').addClass('d-none');

    })
    $(document).on('click', '.closeUpdateUserBtn', function () {
        // $('#updateUser')[0].reset();
        $('#errorMessageUpdate').addClass('d-none');
        $('#username').removeClass('border-red');
        //  $('#username').addClass('input-group-text ');
    })
    $(document).on('keydown', function (event) {
        if (event.key == "Escape") {
            $('#saveUser')[0].reset();
            $('#errorMessage').addClass('d-none');
            $('#errorMessageUpdate').addClass('d-none');
            $('#username').removeClass('border-red');
        }
    });


    $(document).on('click', '.sendEmailBtn', function () {
        // alert(5);

        var user_id = $(this).val();
        // alert(user_id);
        $.ajax({
            type: "GET",
            url: "user_managment/user_action.php?user_id=" + user_id,
            data: { 'action': 'sendEmail' },
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                // alert(res.data.user_id + res.data.email);
                if (res.status == 404) {

                    alert(res.data.email);
                } else if (res.status == 423) {

                    // $('#errorMessage').removeClass('d-none');
                    //   $('#errorMessage').text(res.message);
                    // alert('Error');

                } else if (res.status == 200) {

                    $('#send_email_user_id').val(res.data.user_id);
                    // $('.rest-form-title').append('<div class="alert-info text-center">' + res.data.username + '</div>');
                    //  $('.rest-form-title').removeClass('d-none');
                    //  $('.rest-form-title').text(res.data.username);
                    //  $('#reset_user_id').val(res.data.user_id);
                    //  $('#resetPassword').val(res.data.password);
                    // $('#username').val(res.data.username);
                    // $('#fname').val(res.data.name);
                    $('#r-email').val(res.data.email);
                    $("#r-email").attr("disabled", "disabled");
                    // $('#user_id').val(res.data.user_id);
                    // $('#phone').val(res.data.phone);
                    // $('#course').val(res.data.course);

                    $('#sendEmailModal').modal('show');
                }

            }
        });

    });

    $(document).on('click', '.resetUserPasswordBtn', function () {
        // alert(5);

        var user_id = $(this).val();
        //  alert(user_id);
        $.ajax({
            type: "GET",
            url: "user_managment/user_action.php?user_id=" + user_id,
            data: { 'action': 'reset' },
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                // alert(res.status + res.message);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 423) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    // alert('Error');

                } else if (res.status == 200) {

                    $('#reset_user_id').val(res.data.user_id);
                    // $('.rest-form-title').append('<div class="alert-info text-center">' + res.data.username + '</div>');
                    $('.rest-form-title').removeClass('d-none');
                    $('.rest-form-title').text(res.data.username);
                    //  $('#reset_user_id').val(res.data.user_id);
                    //  $('#resetPassword').val(res.data.password);
                    // $('#username').val(res.data.username);
                    // $('#fname').val(res.data.name);
                    // $('#m-email').val(res.data.email);
                    // $('#user_id').val(res.data.user_id);
                    // $('#phone').val(res.data.phone);
                    // $('#course').val(res.data.course);

                    $('#resetPasswordModal').modal('show');
                }

            }
        });

    });
    $(document).on('click', '.editUserBtn', function () {
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

    });

    $(document).on('submit', '#sendEmailUserForm', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("send_email", true);

        $.ajax({
            type: "POST",
            url: "user_managment/user_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res.message);
                if (res.status == 422) {
                    $('#errorMessageSendEmail').removeClass('d-none');
                    $('#errorMessageSendEmail').text(res.message);

                } if (res.status == 423) {

                    $('#errorMessageSendEmail').removeClass('d-none');
                    $('#errorMessageSendEmail').text(res.message);
                    //$('#username').text(res.username);
                    //$('#username').css('border', '1px solid red');
                    // $('#username').addClass('border-red');

                    //alert('Error');

                } else if (res.status == 200) {

                    $('#errorMessageSendEmail').addClass('d-none');

                    alertifyMsg(2, res.message);

                    $('#sendEmailModal').modal('hide');
                    $('#sendEmailUserForm')[0].reset();

                    $('#myTable').load(location.href + " #myTable");
                    // $("#myTable tr").addClass("highlight");

                } else if (res.status == 500) {
                    //alert(res.message);
                    alertifyMsg(2, res.message);
                } else if (res.status == 501) {
                    //  alert(res.message);
                    alertifyMsg(2, res.message);
                }
            }
        });

    });
    $(document).on('submit', '#resetPasswordForm', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("reset_password_form", true);

        $.ajax({
            type: "POST",
            url: "user_managment/user_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res.message);
                if (res.status == 422) {
                    $('#errorMessageReset').removeClass('d-none');
                    $('#errorMessageReset').text(res.message);

                } if (res.status == 423) {

                    $('#errorMessageReset').removeClass('d-none');
                    $('#errorMessageReset').text(res.message);
                    //$('#username').text(res.username);
                    //$('#username').css('border', '1px solid red');
                    // $('#username').addClass('border-red');

                    //alert('Error');

                } else if (res.status == 200) {

                    $('#errorMessageReset').addClass('d-none');

                    alertifyMsg(2, res.message);

                    $('#resetPasswordModal').modal('hide');
                    $('#resetPasswordForm')[0].reset();

                    $('#myTable').load(location.href + " #myTable");
                    // $("#myTable tr").addClass("highlight");

                } else if (res.status == 500) {
                    //alert(res.message);
                    alertifyMsg(2, res.message);
                } else if (res.status == 501) {
                    //  alert(res.message);
                    alertifyMsg(2, res.message);
                }
            }
        });

    });
    $(document).on('click', '#resetPasswordBtn', function (e) {
        e.preventDefault();

        // var formData = new FormData(this);
        //  formData.append("reset_password_btn", true);
        var user_id = $('#reset_user_id').val();
        alert(user_id);
        $.ajax({
            type: "POST",
            url: "user_managment/user_action.php",
            data: {
                'reset_user_id': user_id,
                'resetBtn': true
            },
            //processData: false,
            // contentType: false,
            success: function (response) {
                alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res.message);
                if (res.status == 422) {
                    $('#errorMessageReset').removeClass('d-none');
                    $('#errorMessageReset').text(res.message);

                } if (res.status == 423) {

                    $('#errorMessageReset').removeClass('d-none');
                    $('#errorMessageReset').text(res.message);
                    //$('#username').text(res.username);
                    //$('#username').css('border', '1px solid red');
                    // $('#username').addClass('border-red');

                    //alert('Error');

                } else if (res.status == 200) {

                    $('#errorMessageReset').addClass('d-none');

                    alertifyMsg(2, res.message);

                    $('#resetPasswordModal').modal('hide');
                    $('#resetPasswordForm')[0].reset();

                    $('#myTable').load(location.href + " #myTable");
                    // $("#myTable tr").addClass("highlight");

                } else if (res.status == 500) {
                    //alert(res.message);
                    alertifyMsg(2, res.message);
                } else if (res.status == 501) {
                    //  alert(res.message);
                    alertifyMsg(2, res.message);
                }
            }
        });

    });
    $(document).on('submit', '#updateUser', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_user", true);

        $.ajax({
            type: "POST",
            url: "user_managment/user_action.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // alert(response);
                var res = jQuery.parseJSON(response);
                //alert(res.message);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } if (res.status == 423) {

                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);
                    //$('#username').text(res.username);
                    //$('#username').css('border', '1px solid red');
                    $('#username').addClass('border-red');

                    //alert('Error');

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    alertifyMsg(1, res.message);

                    $('#userEditModal').modal('hide');
                    $('#updateUser')[0].reset();

                    $('#myTable').load(location.href + " #myTable");
                    $("#myTable tr").addClass("highlight");

                } else if (res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.viewStudentBtn', function () {

        var student_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "code.php?student_id=" + student_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#view_name').text(res.data.name);
                    $('#view_email').text(res.data.email);
                    $('#view_phone').text(res.data.phone);
                    $('#view_course').text(res.data.course);

                    $('#studentViewModal').modal('show');
                }
            }
        });
    });

    $(document).on('click', '.deleteStudentBtn', function (e) {
        e.preventDefault();

        if (confirm('Are you sure you want to delete this data?')) {
            var student_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'delete_student': true,
                    'student_id': student_id
                },
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 500) {

                        alert(res.message);
                    } else {
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        }
    });

</script>