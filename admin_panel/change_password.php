<?PHP
session_start();
require_once('init_user_status.php');
//$init->print_butiful_array($_POST);
//echo $_POST['currentPassword'];
$currentPassword = $memberRecord[0]['password'];
$message = "";
if (!empty($_POST['currentNewPassword'])) {
    $hashedPassword = $memberRecord[0]['password'];
    $password = PASSWORD_HASH($_POST["currentNewPassword"], PASSWORD_DEFAULT);
    if (password_verify($_POST["currentNewPassword"], $hashedPassword)) {

        // $member->updatePassword($memberRecord[0]['user_id'], $password);

        $message = "";
        // echo <script>
    } else {

        $message = $init::OLD_PASSWORD_MESSAGE;
    }


    // echo "<div class=\"match\">$message</div>";


}

if (!empty($_POST['newPassword'])) {
    // $hashedPassword = $memberRecord[0]['password'];
    $password = $_POST['newPassword'];
    $member->updatePassword($memberRecord[0]['user_id'], $password);
    // if (password_verify($_POST["newPassword"], $hashedPassword)) {

    //     $member->updatePassword($memberRecord[0]['user_id'], $password);

    //     $message = "Password Changed";
    // } else
    //     $message = "Current Password is not correct".$hashedPassword." ".$password;

}

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">
                        <?PHP echo $init::CHANGE_PASSWORD . $init::TAB;
                        //echo $memberRecord[0]['password'];
                        //$init->print_butiful_array($memberRecord);
                        ?>

                    </h3>
                    <div class="small mb-3 text-muted">
                        <?PHP echo $init::WELCOM_MESSAGE . $init::TAB . $init::PASSWORD_RULES ?>.

                    </div>
                </div>

                <div id="valid-msg" class="validation-message text-center">
                    <!-- <?php if (isset($message)) {
                        echo $message;
                    } ?> -->
                </div>

                <div class="card-body p-lg-4 mx-lg-2 bg1-info">
                    <form name="frmChange" method="post" action="#" onsubmit=" return changePassword()">

                        <div class="row">
                            <div class="m-1">
                                <label for=<?PHP echo "\"" . $init::CURRENT_PASSWORD . "\"" ?>><?PHP echo $init::CURRENT_PASSWORD . $init::TAB ?></label>
                            </div>
                            <div class="col-md-12 mb-1">
                                <div class="form-group input-group pass_show">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i
                                                class="fa-solid fa-unlock-keyhole m-1 alert-secondary"></i></i>
                                        </span>
                                    </div>
                                    <input name="currentPassword" id="currentPassword" class="form-control"
                                        onchange="validateCurrentPassword('<?PHP echo $currentPassword ?>')"
                                        type="password" value="" placeholder=<?PHP echo "\"" . $init::CURRENT_PASSWORD . "\""; ?>>

                                </div>
                                <div class="currentPasswordMsg">
                                    <?PHP echo $message ?>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="m-1">

                                <label for=<?PHP echo "\"" . $init::NEW_PASSWORD . "\"" ?>><?PHP echo $init::NEW_PASSWORD ?></label>
                            </div>
                            <div class="col-md-12 mb-1">
                                <div class="form-group input-group pass_show">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock m-1 alert-primary"></i>
                                        </span>
                                    </div>
                                    <input name="newPassword" id="newPassword" class="form-control" type="password"
                                        onkeyup="validateNewPassword()" value="" placeholder=<?PHP echo "\"" . $init::NEW_PASSWORD . "\""; ?>>

                                </div>
                                <div class="newPasswordMsg"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="m-1">

                                <label for=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . "\"" ?>><?PHP echo $init::CONFIRM_PASSWORD ?></label>
                            </div>
                            <div class="col-md-12 mb-1">
                                <div class="form-group input-group pass_show">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock m-1 alert-success"></i>
                                        </span>
                                    </div>
                                    <input name="confirmPassword" id="confirmPassword" class="form-control"
                                        onkeyup="validateConfirmPassword()" type="password" value="" placeholder=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . "\""; ?>>

                                </div>
                                <div class="confirmPasswordMsg"></div>
                            </div>
                        </div>

                        <div class="row justify-content-center">


                            <div class="col-md-12 mt-3 ">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <?PHP echo $init::CHANGE_PASSWORD ?>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {
        $('.pass_show').append('<span class="ptxt">اظهار</span>');
    });


    $(document).on('click', '.pass_show .ptxt', function () {

        $(this).text($(this).text() == "اظهار" ? "اخفاء" : "اظهار");

        $(this).prev().attr('type', function (index, attr) { return attr == 'password' ? 'text' : 'password'; });

    });</script>