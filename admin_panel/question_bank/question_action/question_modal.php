<!-- Modal -->
<div class="modal fade" id="addQuestionModal" tabindex="-1" aria-labelledby="questionModalLabel" aria-hidden="true"
    aria-hidden="true">
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
            <div class="modal-body">
                <?PHP require_once 'question_form.php' ?>
                <div class="modal-footer">
                    <button type="button" class="close-question btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>