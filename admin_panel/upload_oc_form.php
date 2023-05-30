<form id="form_oc" action="#" method="post" enctype="multipart/form-data">
    <div id="upload_oc" class="d-flex align-items-center justify-content-start mt-4 mb-0">
        <div class="mb-3">
            <label for="operation_certificate">
                <?PHP echo $init::OPERATION_CERTIFICATE ?>
            </label>
            <input id="operation_certificate" type="file" accept="application/pdf,image/*"
                name="operation_certificate" />
        </div>

        <div class="small"> <button id="upload_oc_btn" type="submit" class="btn btn-success">
                <?PHP echo $init::UPLOAD ?>
            </button></div>


    </div>
    <?PHP include('upload_preview_oc.php') ?>

</form>