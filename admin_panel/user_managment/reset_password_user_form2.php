<form id="resetPasswordForm">
    <div class="modal-body">
        <div id="errorMessageReset" class="alert alert-warning d-none"></div>
        <input type="hidden" name="reset_user_id" id="reset_user_id">
        <div class="row">

            <div class="row">
                <div class="m-1">

                    <label for=<?PHP echo "\"" . $init::NEW_PASSWORD . " \"" ?>>
                        <?PHP echo $init::NEW_PASSWORD ?>
                    </label>
                </div>
                <div class="col-md-12 mb-1">
                    <div class="form-group input-group pass_show">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock m-1 alert-primary"></i>
                            </span>
                        </div>
                        <input name="resetPassword" id="resetPassword" class="newPassword form-control" type="password"
                            onkeyup="validateNewPassword(this.value)" value="" placeholder=<?PHP echo "\"" . $init::NEW_PASSWORD . "
                        \""; ?>>

                    </div>
                    <div class="newPasswordMsg"></div>
                </div>
            </div>
            <div class="row">
                <div class="m-1">

                    <label for=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . " \"" ?>>
                        <?PHP echo $init::CONFIRM_PASSWORD ?>
                    </label>
                </div>
                <div class="col-md-12 mb-1">
                    <div class="form-group input-group pass_show">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock m-1 alert-success"></i>
                            </span>
                        </div>
                        <input name="confirmResetPassword" id="confirmResetPassword" class="form-control"
                            onkeyup="validateConfirmPassword(resetPassword.value, this.value)" type="password" value="" placeholder=<?PHP
                            echo "\"" . $init::CONFIRM_PASSWORD . " \""; ?>>

                    </div>
                    <div class="confirmPasswordMsg"></div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="closeUpdateUserBtn btn btn-secondary" data-bs-dismiss="modal">
                <?PHP echo $init::CLOSE ?>
            </button>
            <button type="submit" class="btn btn-primary">
                <?PHP echo $init::SAVE.$init::SPACE. $init::AND.$init::SPACE. $init::SEND ?>
            </button>
        </div>
    </div>
</form>