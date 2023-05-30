<?PHP
session_start();
require_once('init_user_status.php');
//echo "hi";


require_once('process_upoload_init.php');

if ($td_attachment_exist) {
    $init->add_attachment($member, $init::TAX_DEDUCTION_ATTACHMENT_TYPE, $path, $memberID);
    // if (!$td_attachment_approaved) {
    //     $init->add_attachment($member, $init::TAX_DEDUCTION_ATTACHMENT_TYPE, $path, $memberID);

    // }
} ?>