<?PHP
$action = !empty($_GET) ? "recover" : "reset";

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">
                        <?PHP echo $init::CHANGE_PASSWORD . $init::TAB;

                        ?>

                    </h3>
                    <div class="small mb-3 text-muted">
                        <?PHP echo $init::WELCOM_MESSAGE . $init::TAB . $init::PASSWORD_RULES ?>.

                    </div>
                </div>

                <div id="valid-msg" class="validation-message text-center">

                </div>

                <div class="card-body p-lg-4 mx-lg-2 bg1-info">
                    <form>

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
                                    <input name="newPassword" id="newPassword" class="newPassword form-control"
                                        type="password" onkeyup="validateNewPassword(this.value)" value=""
                                        placeholder=<?PHP echo "\"" . $init::NEW_PASSWORD . "\""; ?>>

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
                                        onkeyup="validateConfirmPassword(newPassword.value, this.value)" type="password"
                                        value="" placeholder=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . "\""; ?>>

                                </div>
                                <div class="confirmPasswordMsg"></div>
                            </div>
                        </div>

                        <div class="row justify-content-center">



                        </div>
                        <div class="col-md-12 mt-3 d-flex align-items-center justify-content-between">

                            <input id="submit" type="button" class="btn btn-success"
                                value="<?PHP echo $init::CHANGE_PASSWORD ?>"
                                onclick="recover(<?PHP echo $userID ?>, newPassword.value, confirmPassword.value, '<?PHP echo $action ?>')" />
                            <a class="" href="index.php">
                                <?PHP echo $init::RETRURN_TO_LOGIN_PAGE ?>
                            </a>
                        </div>

                    </form>


                </div>

            </div>
        </div>
    </div>
</div>