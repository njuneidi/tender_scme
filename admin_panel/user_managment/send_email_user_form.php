<div class="container">
    <div class='row justify-content-center'>
        <div class="col-md-10 mb-1 ">
            <form id="sendEmailUserForm">
                <input type="hidden" name="send_email_user_id" id="send_email_user_id">
                <div id="errorMessageSendEmail" class="alert alert-warning d-none"></div>


                <div class="form-group">
                    <label for="email">
                        <?PHP echo $init::RECIPIENT ?>
                    </label>
                    <input type="email" class="form-control" id="r-email" name=r-email"
                        placeholder="<?PHP echo $init::EMAIL ?>">
                </div>
                <div class="form-group">
                    <label for="subject">
                        <?PHP echo $init::SUBJECT ?>
                    </label>
                    <input type="text" class="form-control" id="subject" name="subject"
                        placeholder="<?php echo $init::SUBJECT ?>">
                </div>

                <div class="form-group">
                    <label for="message">
                        <?PHP echo $init::MESSAGE_TEXT ?>
                    </label>
                    <textarea class="form-control" id="message" name="message" rows="3"
                        placeholder="<?PHP echo $init::MESSAGE_TEXT ?>"></textarea>
                </div>
                <button type="submit" class="btn btn-primary m-3">
                    <?PHP echo $init::SEND ?>
                </button>
            </form>
        </div>
    </div>
</div>