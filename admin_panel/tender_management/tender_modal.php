<style>
    .modal-dialog {
        width: 70%;
        background-image: linear-gradient(to right, #ffffff, #000000);
        background-image: linear-gradient(to bottom, #ffffff, #000000);
        background-image: radial-gradient(circle, #ffffff, #000000);
        background-image: repeating-linear-gradient(to right, #ffffff, #000000);

    }
</style>
<!-- Modal -->
<div class="modal fade" id="tender-modal-container" tabindex="-1" aria-labelledby="questionModalLabel"
    aria-hidden="true" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="direction:ltr">
                <h5 class="modal-title" id="questionModalLabel">

                </h5>
                <button id="close-add-question-btn" type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">

                <div class="container  d-flex justify-content-center  ">
                    <div class="card mb-3  p-3" style="flex-basis:100%;background-color:#F8FAFD">

                        <h2>
                            <?PHP echo $init::EDIT_TENDER

                                ?>
                        </h2>
                        <?PHP echo $init::error_Message_edit_tender ?>
                        <div class="tender-modal-body"></div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="close-question btn btn-secondary" data-bs-dismiss="modal">
                    <?PHP echo $init::CLOSE ?>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- The container element -->

<!-- <div id="tender-modal-container" style="display: block;"> -->

<!-- The modal dialog -->
<!-- <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-bs-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This is the content of the modal.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div> -->