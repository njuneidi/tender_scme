<div class="modal fade" id="userEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="direction:ltr">
                <h5 class="modal-title" id="exampleModalLabel">
                    <?PHP echo $init::Eidt_USER . $init::TAB ?>

                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <?PHP include_once('update_user_form.php'); ?>

        </div>
    </div>
</div>