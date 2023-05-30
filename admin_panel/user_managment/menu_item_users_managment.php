<?PHP require_once 'add_user_modal.php' ?>

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

                            <?PHP
                            $action = 'edit';
                            $icon = 'fa-solid fa-pen-to-square fs-5 me-1';
                            echo $init->userAction($action, $id, $admin, $userStatus, $icon);

                            $action = 'delete';
                            $icon = 'fa-solid fa-trash fs-5 me-1';
                            echo $init->userAction($action, $id, $admin, $userStatus, $icon);

                            $action = 'reset';
                            $icon = 'fa-solid fa-key fs-5 me-1';
                            echo $init->userAction($action, $id, $admin, $userStatus, $icon);

                            ?>





                        </td>
                    </tr>
                    <?php
                }


                ?>
            </tbody>\
        </table>
    </div>
</div>

<script defer src="../assets/js/jquery-3.6.4.js"></script>



<script>
    $(document).on('submit', '#saveUser', function (e) {
        e.preventDefault();
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
                alert('res.message');
                if (res.status == 422) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    alert('Error');

                } else if (res.status == 423) {

                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);
                    alert('Error');

                } else if (res.status == 0) {

                    alert('Success');
                    $('#errorMessage').addClass('d-none');
                    $('#userAddModal').modal('hide');
                    $('#saveUser')[0].reset();

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

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

    $(document).on('click', '.editStudentBtn', function () {

        var student_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "code.php?student_id=" + student_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#student_id').val(res.data.id);
                    $('#name').val(res.data.name);
                    $('#email').val(res.data.email);
                    $('#phone').val(res.data.phone);
                    $('#course').val(res.data.course);

                    $('#studentEditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateStudent', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_student", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                } else if (res.status == 200) {

                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier', 'position', 'top-right');
                    alertify.success(res.message);

                    $('#studentEditModal').modal('hide');
                    $('#updateStudent')[0].reset();

                    $('#myTable').load(location.href + " #myTable");

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