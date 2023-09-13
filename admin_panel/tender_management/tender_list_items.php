<?PHP require_once 'tender_modal.php' ?>
<?PHP require_once 'apply_tender_modal.php' ?>

<ul class="list-unstyled" id="tenders-list">
    <?PHP
    // $tenders = array($tenders);
    $tenders = $tenderModel->getTenders();
    $tenders = array_reverse($tenders);
    $tenders = array_slice($tenders, 0, 10);

    foreach ($tenders as $tender): ?>
        <li class="card mb-3 rounded-3">
            <div class="card-body" style="background-color:#F8FAFD">

                <div class="card-header" style="background-color:#E3E3E3">

                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start">
                            <strong>
                                <?PHP echo $tender->getTitle(); ?>
                            </strong>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <strong style="text-align: left;">
                                <?PHP echo $init::PUBLISH_DATE ?>

                                <span style="font-weight: normal;">
                                    <?PHP echo $tender->getStratDate() ?>
                                </span>


                            </strong>


                        </div>
                    </div>
                </div>
                <p class="card-text text-muted ps-3 pt-3"> <strong>
                        <?PHP echo $tender->getDescription() ?>
                    </strong>
                </p>
                <p class=" card-text">
                    <?PHP echo $tender->getDetails() ?>
                </p>

                <p class="card-text">
                    <!-- <strong>Status:</strong>
                    <?PHP echo $tender->getStatusId() ?></strong> -->
                    <!-- <strong>Questions Bank:</strong>
                    <?PHP echo $tender->getQuestionsBank() ?></strong>
                    <strong>Winner:</strong>
                    <?PHP echo $tender->getWinner() ?></strong>
                    <strong>Applied Code:</strong>
                    <?PHP echo $tender->getAppliedCode() ?></strong> -->
                    <strong>
                        <?PHP echo $init::ATTACHMETNS ?>
                    </strong>
                    <?PHP echo $tender->getAttachmentId() ?></strong>
                </p>

                <p class="card-text">
                    <strong>
                        <?PHP echo $init::DUEDATE ?>
                    </strong>
                    <?php echo $tender->getDueDate(); ?>
                </p>
                <?PHP if ($_SESSION['content'] === 'tenders') { ?>

                    <p class="card-text">
                    <div class="card rounded-3 text-black " id="tender-question<?PHP echo $tender->getId() ?>">
                        <div class="row g-0">
                            <div class="col-lg-12">
                                <div class="card-body p-lg-4 mx-lg-2 ">
                                    <!-- padding for md is 7 marging left right for md 4 -->
                                    <button type="button" id="addQuestionToTender<?PHP echo $tender->getId() ?>"
                                        value="<?PHP echo $tender->getId() . '-' . $tender->getTitle() ?>"
                                        class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#question-previews-modal">
                                        <?php echo $init::QUESTION_BANK ?>
                                    </button>

                                    <div class="row d-flex justify-content-center align-items-center h-100" id="questonPreviw">

                                        <div class="row">
                                            <div class="col-md-12 mb-1">
                                                <div id="question-container<?PHP echo $tender->getId() ?>">
                                                    <?PHP
                                                    $init->getTenderQuestionshtml($model, $tenderModel, $tender->getId())
                                                        ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?PHP } ?>

                </p>
                <div id="question-list<?PHP echo $tender->getId() ?>" class="d-felex justify-content-center d-none"
                    style="background-color: #f0f8ff;">
                </div>



                <?PHP if ($_SESSION['content'] === 'tenders') { ?>
                    <div class="card-footer d-flex justify-content-between" style="background-color:#F2F2F2">





                        <div>
                            <button type="button" id="editTender" value="<?PHP echo $tender->getId() ?>"
                                class="btn btn-secondary  d-felex justify-content-center" 1data-bs-toggle="modal"
                                1data-bs-target="#tender-modal-container">
                                <?php echo $init::EDIT ?>
                            </button>
                            <button type="button" id="deleteTender" value="<?PHP echo $tender->getId() ?>"
                                class="btn btn-danger  d-felex justify-content-center">
                                <?php echo $init::DELETE ?>
                            </button>

                            <!-- <a href="/tenders/edit/{{ $tender->id }}" class="btn btn-secondary">
                                <?PHP echo $init::EDIT ?>
                            </a> -->
                            <!-- <a href="/tenders/delete/{{ $tender->id }}" class="btn btn-danger">
                                <?PHP echo $init::DELETE ?>
                            </a> -->
                        </div>
                        <div><label class="primary" style="color: red;" for="">
                                <?PHP echo $init::POST ?>
                            </label>
                            <?PHP $checked = $tender->getPosted() > 0 ? "checked" : "" ?>
                            <label class="switch">

                                <input type="checkbox" disabled <?PHP echo $checked ?> value="<?PHP echo $tender->getId() ?>">
                                <span size="4" class="slider round">

                                </span>
                            </label>
                        </div>



                    </div>
                <?PHP } else {
                    $applicationStatus = $tenderModel->checkIfapplid($tender->getId(), $user_code);
                    if ($applicationStatus['exist'] == 1) {
                        ?>
                        <div class="card-footer row d-flex justify-content-center align-items-center "
                            style="background-color:#F2F2F2 ">

                            <div class="col-3 m-3">
                                <div class="row">
                                    <button type="button" id="already-applied" value="<?PHP echo $tender->getId() ?>"
                                        class="btn btn-primary btn-lg  d-felex justify-content-center">
                                        <?php echo $init::ALREADY_APPLIED ?>
                                    </button>
                                </div>
                            </div>


                        </div>

                        <?PHP
                    } else {

                        ?>
                        <div class="card-footer row d-flex justify-content-center align-items-center "
                            style="background-color:#F2F2F2 ">

                            <div class="col-3 m-3">
                                <div class="row">
                                    <button type="button" id="apply-to-tender" value="<?PHP echo $tender->getId() ?>"
                                        class="btn btn-primary btn-lg  d-felex justify-content-center" 1data-bs-toggle="modal"
                                        1data-bs-target="#apply-to-tender-modal">
                                        <?php echo $init::APPLY_FOR_TENDER ?>
                                    </button>
                                </div>
                            </div>


                        </div>

                        <?PHP
                    }
                } ?>

            </div>


        </li>
    <?php endforeach;


    ?>
</ul>

<script>

</script>