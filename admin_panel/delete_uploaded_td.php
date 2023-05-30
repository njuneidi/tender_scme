<?PHP
session_start();
require_once('init_user_status.php');
//echo "hi";


require_once('process_upoload_init.php');
$init->delete_attachment($member, $init::TAX_DEDUCTION_ATTACHMENT_TYPE, $path, $memberID, $td_attachment_file);

// if ($td_attachment_exist) {
//     if (!$td_attachment_approaved) {
//         $init->delete_attachment($member, $init::TAX_DEDUCTION_ATTACHMENT_TYPE, $path, $memberID);

//     }
// } 
?>