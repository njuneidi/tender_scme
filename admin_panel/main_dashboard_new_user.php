<?PHP
require_once('init_user_status.php');
$memberID = $memberInfo[0]['member_id'];


if (!empty($memberID)) {

    $oc_attachment_approaved = $member->get_attachment_status($memberID, $init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE);
    $td_attachment_approaved = $member->get_attachment_status($memberID, $init::TAX_DEDUCTION_ATTACHMENT_TYPE);
}

$oc_attachment_approaved = !empty($oc_attachment_approaved) ? true : false;
$td_attachment_approaved = !empty($td_attachment_approaved) ? true : false;


$account = $init->crypto($memberID);
//$account = str_replace(".", "", $account);
//$account = strtolower($account);



if (!file_exists($init::UPLOAD_PATH . $account)) {
    mkdir($init::UPLOAD_PATH . $account, 0777, true);
}

$path = $init::UPLOAD_PATH . $account . "/";
$dir = new DirectoryIterator($path);
$oc_attachment_exist = $init->checkIfFileExist($dir, $init::OPERATION_CERTIFICATE);
$td_attachment_exist = $init->checkIfFileExist($dir, $init::TAX_DEDUCTION_CERTIFICATE);

if ($oc_attachment_exist && $td_attachment_exist && $oc_attachment_approaved && $td_attachment_approaved && $isEmailVerified && $isMobileVerified) {
    $url = "main.php"; ?>
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">
                            <?PHP echo $init::COMPLETED_REGESTRATION_PROCESS ?>
                        </h3>
                    </div>
                    <div id="new-user-card" class="card-body">
                        <div class="small mb-3 text-muted">
                            <?PHP echo $init::THANK_YOU . $init::TAB . $init::COMPLETED_REGESTRATION_PROCESS_MESSAGE ?>.
                        </div>

                        <a class="btn btn-success" href="index.php">
                            <?PHP echo $init::NEXT ?>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <?PHP
    $userID = $memberRecord[0]['user_id'];
    //    $member->updateUserStatus($username, 2);
    $member->updateUserStatus($userID, 2);

    //exit(header("main.php"));
    // header('location:../index.php');
    //echo '


} else { ?>

    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-4">
                            <?PHP echo $init::COMPLETE_REGESTRATION_PROCESS ?>
                        </h3>
                    </div>
                    <div id="new-user-card" class="card-body">





                        <?php
                        if (!$isEmailVerified) {
                            // echo "email not verified";
                            ?>
                            <div class="small mb-3 text-muted">
                                <?PHP echo $init::COMPLETE_REGESTRATION_EMAIL_MESSAGE ?>.
                            </div>
                            <div class="small float-right text-muted">
                                <?PHP echo $memberInfo[0]['email'] ?>.
                            </div>
                            <?PHP
                            require_once('activate_email_form.php');
                        } elseif (!$isMobileVerified) {
                            // echo "Mobile Not verified";
                            ?>
                            <div class="small mb-3 text-muted ">
                                <?PHP echo $init::COMPLETE_REGESTRATION_MOBILE_MESSAGE;
                                // require_once('verify_mobile_form.php');
                                ?>.
                            </div>

                            <?PHP
                            require_once('mobile_verification_form.php');

                        } else { ?>
                            <div class="small mb-3 text-muted">
                                <?PHP echo $init::COMPLETE_REGESTRATION_UPLOAD_MESSAGE;

                                ?>.
                            </div>
                            <?PHP
                            if (!$oc_attachment_exist) {
                                // OC file not uploaded
                                if (!$oc_attachment_approaved) {
                                    // OC file not uploaded
                                    // OC file not approaved
                                    // normal case new
                                    require_once("upload_oc_form.php");
                                    // require_once('upload_preview_oc.php');
                    

                                } else {
                                    // OC file not uploaded
                                    // OC file  approaved
                                    // not normal file deleted after approved
                                    // should delete approve
                                    $member->delete_attachemnt_by_type($memberID, $init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE);


                                    require_once("upload_oc_form.php");
                                    // require_once('upload_preview_oc.php');
                    
                                }

                            } else {
                                // OC file is uploaded
                                if (!$oc_attachment_approaved) {
                                    // $ext, $path, $final_file, $file_type
                                    // echo 'show od file in directory<br>';
                                    // require_once('upload_preview_oc.php');
                                    // require_once("upload_oc_form.php");
                    
                                    $file0 = $init->getUploadedFileByType($dir, $init::OPERATION_CERTIFICATE);
                                    $file = explode(".", $file0);
                                    $final_file = $file[0];
                                    $ext = $file[1];
                                    echo ' <div id="preview_oc" class="d-flex align-items-center justify-content-around ">';
                                    echo $init->file_preview($ext, $path, $final_file . "." . $ext, '1');
                                    echo '</div>';


                                }

                            }
                            if (!$td_attachment_exist) {
                                // OC file not uploaded
                                if (!$td_attachment_approaved) {
                                    // OC file not uploaded
                                    // OC file not approaved
                                    // normal case new
                                    require_once("upload_td_form.php");
                                    // require_once('upload_preview_td.php');
                    

                                } else {
                                    // OC file not uploaded
                                    // OC file  approaved
                                    // not normal file deleted after approved
                                    // should delete approve
                                    $member->delete_attachemnt_by_type($memberID, $init::TAX_DEDUCTION_ATTACHMENT_TYPE);


                                    require_once("upload_td_form.php");
                                    // require_once('upload_preview_td.php');
                    
                                }

                            } else {
                                if (!$td_attachment_approaved) {
                                    // $ext, $path, $final_file, $file_type
                                    //echo 'show od file in directory<br>';
                                    require_once('upload_preview_td.php');
                                    $file = $init->getUploadedFileByType($dir, $init::TAX_DEDUCTION_CERTIFICATE);
                                    $file = explode(".", $file);
                                    $final_file = $file[0];
                                    $ext = $file[1];
                                    echo ' <div id="preview_td" class="d-flex align-items-center justify-content-around ">';
                                    echo $init->file_preview($ext, $path, $final_file . "." . $ext, '2');
                                    echo '</div>';


                                }

                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?PHP


}
?>
    <script src="js/scripts.js"></script>
    <script src="js/jquery-3.6.4.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script type="text/javascript">
        $(document).ready(function (e) {
            //  $("preview_oc_link").hide();
            $("#form_oc").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "process_upload.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $("#preview_oc").fadeOut();
                        $("#err").fadeOut();

                    },
                    success: function (data) {
                        if (data == 'invalid') {
                            // invalid file format.
                            $("#err").html("Invalid File !").fadeIn();
                        }
                        else {
                            $("#preview_oc").html(data).fadeIn();
                            $("#form_oc")[0].reset();

                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });
        $(document).ready(function (e) {
            $("#form_td").on('submit', (function (e) {
                e.preventDefault();
                $.ajax({
                    url: "process_upload.php",
                    type: "POST",
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $("#preview_td").fadeOut();
                        $("#err").fadeOut();
                        // $("#confirm_files").v
                        //$("#upload").h
                    },
                    success: function (data) {
                        if (data == 'invalid') {
                            // invalid file format.
                            $("#err").html("Invalid File !").fadeIn();
                        }
                        else {
                            // view uploaded file.
                            $("#preview_td").html(data).fadeIn();

                            $("#form_td")[0].reset();                              // $("#upload_td_btn").text('تأكيد');

                        }
                    },
                    error: function (e) {
                        $("#err").html(e).fadeIn();
                    }
                });
            }));
        });
    </script>