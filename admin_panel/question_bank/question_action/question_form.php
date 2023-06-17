<!-- <?PHP $init->print_butiful_array($_POST) ?> -->
<form id='addQuestion'>
    <div id="errorMessage" class="alert alert-warning d-none"></div>

    <?PHP
    require_once __DIR__ . '/../question_form_element.php'; ?>
    <button id="add_edit_question" type="submit" class="btn btn-primary">
        <?PHP echo $init::SAVE
            ?>
    </button>
</form>
</div>