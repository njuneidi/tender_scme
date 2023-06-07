<form id="updateUser">
    <div class="modal-body">
        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>
        <input type="hidden" name="user_id" id="user_id">
        <div class="row">
            <div class="m-1">

                <label for=<?PHP echo "\"" . $init::USERNAME . " \"" ?>>
                    <?PHP echo $init::USERNAME ?>
                </label>
            </div>
            <div class="col-md-12 mb-1">
                <div class="form-group input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user m-1 alert-primary"></i>
                        </span>
                    </div>
                    <input name="username" id="username" class="form-control" type="text" value="" placeholder=<?PHP echo "\"" . $init::USERNAME . "
                        \""; ?>>

                </div>
                <div class=""></div>
            </div>
        </div>
        <div class="row">
            <div class="m-1">

                <label for=<?PHP echo "\"" . $init::EMAIL . " \"" ?>>
                    <?PHP echo $init::EMAIL ?>
                </label>
            </div>
            <div class="col-md-12 mb-1">
                <div class="form-group input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user m-1 alert-primary"></i>
                        </span>
                    </div>
                    <input name="m-email" id="m-email" class="form-control" type="email" value="" placeholder=<?PHP echo "\"" . $init::EMAIL . "
                        \""; ?>>

                </div>
                <div class=""></div>
            </div>
        </div>
        <div class="row">
            <div class="m-1">

                <label for=<?PHP echo "\"" . $init::FULL_NAME . " \"" ?>>
                    <?PHP echo $init::FULL_NAME ?>
                </label>
            </div>
            <div class="col-md-12 mb-1">
                <div class="form-group input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text"> <i class="fa fa-user m-1 alert-primary"></i>
                        </span>
                    </div>
                    <input name="fname" id="fname" class="form-control" type="text" value="" placeholder=<?PHP echo "\"" . $init::FULL_NAME . "
                        \""; ?>>

                </div>
                <div class=""></div>
            </div>
        </div>
        <!-- <div class="row">
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
                    <input name="newPassword" id="newPassword" class="form-control" type="password"
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
                    <input name="confirmPassword" id="confirmPassword" class="form-control"
                        onkeyup="validateConfirmPassword()" type="password" value="" placeholder=<?PHP
                        echo "\"" . $init::CONFIRM_PASSWORD . " \""; ?>>

                </div>
                <div class="confirmPasswordMsg"></div>
            </div>
        </div> -->

    </div>
    <div class="modal-footer">
        <button type="button" class="closeUpdateUserBtn btn btn-secondary" data-bs-dismiss="modal">
            <?PHP echo $init::CLOSE ?>
        </button>
        <button type="submit" class="btn btn-primary">
            <?PHP echo $init::SAVE ?>
        </button>
    </div>
</form>