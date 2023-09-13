<div class="row">
    <div class=" m-1">
        <label for="question_title">Title</label>

    </div>
    <div class="col-md-12 mb-3">

        <div class="form-group input-group">
            <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-question m-1 alert-primary"></i>
                </span>
            </div><input type="text" class="form-control" id="question_title" name="question_title"
                placeholder="Enter question question_title">
            <input type="hidden" name="question_id" id="question_id">
            <input type="hidden" name="action" id="action">

        </div>

    </div>

</div>


<div class="row">
    <div class="mb-3">
        <div class="form-group">
            <div class="m-1"> <label for="question_description">Description</label>
            </div>
            <textarea class="form-control" id="question_description" name="question_description" rows="3"></textarea>
        </div>
    </div>

</div>
<div class="row">
    <div class="mb-3">
        <div class="form-group">
            <div class="m-1"> <label for="question_type">Question Type</label>
            </div>
            <select class="form-control" id="question_type" name="question_type">

                <?PHP // Loop through the results and create an option for each row
                foreach ($questionType as $item) {
                    echo '<option value="' . $item->question_type_id . '">' . $item->question_type_arabic . '</option>';
                } ?>

            </select>
        </div>
    </div>

</div>
<div class="row">
    <div class="mb-1">
        <div id="answerMainContainer" class=" m-3">
            <input type="hidden" name="answer_no" id="answer_no" value="0">
            <div id="answerContainer" class="row">

            </div>
            <div class="row">
                <div class="d-none m-1" id="addAnswer" onclick="addAnswer()">
                    <i class="fa fa-add"></i>
                    <label for="">
                        <?PHP echo $init::ADD_QUESTION ?>
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>