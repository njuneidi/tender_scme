<?PHP
require_once '../admin_panel/question_bank/init_question_list.php';

require_once '../admin_panel/attachment_type/init_attachment_type.php';
require_once 'tender_form_body.php';
// $init->print_butiful_array($attachmentTypeList);
?>
<!-- <div class="container  d-flex justify-content-center  ">
    <div id="add-tender-form" class="card mb-3  p-3  d-none" style="flex-basis:70%;background-color:#F8FAFD">

        <h2>
            <?PHP echo $init::ADD_TENDER ?>
        </h2>
        <form id="addTender" action="tender_management/tender_action.php">
            <?PHP echo $init::error_Message ?>
            @csrf
            <div class="card mb-3 mx-auto">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group">
                                <label for="name">

                                    <?PHP echo $init::TITLE ?>
                                </label>
                                <input type="text" value="test" name="tender_title" id="tender_title"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group">
                                <label for="description">
                                    <?PHP echo $init::DESCRIPTION ?>
                                </label>
                                <textarea name="tender_description" id="tender_description"
                                    style="font-family: ElMessiri-Regular" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group">
                                <label for="details">
                                    <?PHP echo $init::DETAILS ?>
                                </label>
                                <textarea style=" overflow-y: scroll;" name="tender_details" id="tender_details"
                                    defaultValue="test" class="form-control" rows="10" cols="50"></textarea>

                            </div>
                        </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group">
                                <label for="date">
                                    <?PHP echo $init::START_DATE ?>
                                </label>
                                <input type="date" name="tender_start_date" id="tender_start_date" class=" form-control"
                                    value="<?php echo date('Y-m-d'); ?>">

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <div class="form-group">
                                <label for="date">
                                    <?PHP echo $init::DUEDATE ?>
                                </label>
                                <input type="date" name="tender_due_date" id="tender_due_date" class=" form-control"
                                    value="<?php echo date('Y-m-d'); ?>">

                            </div>
                        </div>
                    </div>






                    <div class="row">
                        <div class="col-md-10 mx-auto m-3">
                            <div class="form-group">

                                <input type="checkbox" name="tender_pinned" id="tender_pinned" class="form-check-input">
                                <label class="form-check-label" for="pinned">
                                    <?php echo $init::POST ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 mx-auto">
                            <button type="submit" class="btn btn-primary">
                                <?PHP echo $init::ADD_TENDER ?>
                            </button>
                            <button type="button" class="dismiss-button btn btn-danger float-right"
                                id="dismiss-button"><?PHP echo $init::CANCEL ?></button>

                            </button>


                        </div>
                    </div>




                </div>
            </div>
        </form>
    </div>
</div> -->