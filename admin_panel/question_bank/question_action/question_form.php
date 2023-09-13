<form id='addQuestion'>
    <div id="errorMessage" class="alert alert-warning d-none"></div>

    <?PHP
    require_once __DIR__ . '/../question_form_element.php'; ?>
    <button id="add_edit_question" type="submit" class="btn btn-primary" value="<?PHP echo 1; ?>">
        <?PHP echo $init::SAVE
            ?>
    </button>
    <?PHP echo "</form>" ?>

    </div>