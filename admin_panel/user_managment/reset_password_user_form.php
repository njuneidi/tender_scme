<?PHP
//session_start();
//$init->print_butiful_array($_SESSION);
?>
<div class="container">
    <div class='row justify-content-center'>
        <div class="m-1 text-center">


            <?PHP echo $init::SEND_ONE_TIME_PASSWORD . $init::FOR_USER ?>
        </div>
        <div class="rest-form-title col-md-3 alert-primary text-center mt-1 mb-2"></div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-10 mb-1 ">
            <button type="button" name="btnSubmit" id="resetPasswordBtn" value="<?PHP ?>"
                class="btn btn-lg btn-success btn-block col-md-12 mb-1">
                <?PHP echo $init::SEND . $init::TAB . $init::PASSWORD; ?>
            </button>
        </div>
    </div>
    <div class="row">


        <div class="row justify-content-center">
            <div class="col-md-12 mb-1">

                <div class="text-center fs-4 mt-4 ">

                    - OR -
                </div>
            </div>
        </div>
    </div>
    <?PHP require_once 'reset_password_user_form2.php' ?>

</div>