<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="direction:ltr">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?PHP echo $init::SEND . $init::TAB . $init::EMAIL ?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- <form id="resetPasswordForm">
                <div class="modal-body">
                    <div id="errorMessageReset" class="alert alert-warning d-none"></div>
                    <input type="hidden" name="reset_user_id" id="reset_user_id">
                </div>
            </form> -->
            <?PHP include_once('send_email_user_form.php'); ?>

        </div>
    </div>
</div>