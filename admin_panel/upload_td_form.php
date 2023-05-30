<form id="form_td" action="#" method="post" enctype="multipart/form-data">
    <div id="upload_td" class="d-flex align-items-center justify-content-start mt-4 mb-0">
        <div class="mb-3">
            <label for="tax_deduction">
                <?PHP echo $init::TAX_DEDUCTION_CERTIFICATE ?>
            </label>
            <input id="tax_deduction" type="file" accept="application/pdf,image/*" name="tax_deduction" />
        </div>


        <div class="small"> <button id="upload_td_btn" type="submit" class="btn btn-success">
                <?PHP echo $init::UPLOAD ?>
            </button></div>


    </div>
    <?PHP include('upload_preview_td.php') ?>

</form>