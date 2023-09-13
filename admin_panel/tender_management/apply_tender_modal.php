<div class="modal fade" id="apply-to-tender-modal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="direction:ltr">
                <h5 class="modal-title" id="questionModalLabel">
                    <h2>
                        <?PHP echo $init::APPLY_FOR_TENDER

                            ?>
                    </h2>

                </h5>
                <button id="close-add-question-btn" type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">

                <div class="container  d-flex justify-content-center  ">
                    <div class="card mb-3  p-3" style="flex-basis:100%;background-color:#F8FAFD">


                        <?PHP echo $init::error_Message_apply_tender ?>
                        <form id="applyTender">
                            <div class="tender-apply-body" id="applyTenderContainer">


                            </div>
                            <button id="submitApplication" type="submit" class="btn btn-primary"
                                value="<?PHP echo 1; ?>">
                                <?PHP echo $init::SAVE
                                    ?>
                            </button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-apply-page btn btn-secondary" data-bs-dismiss="modal">
                    <?PHP echo $init::CLOSE ?>
                </button>
            </div>
        </div>
    </div>
</div>