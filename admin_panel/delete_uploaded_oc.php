<?PHP
session_start();
require_once('init_user_status.php');
echo "hi";
//$init->add_attachment($member, $init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE, $path, $memberID);

require_once('process_upoload_init.php');
$init->delete_attachment($member, $init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE, $path, $memberID, $oc_attachment_file);
// if (!$oc_attachment_approaved) {
//   //  echo "dddd";
//     $member->addAttachment($init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE, $path, $memberID);
//     //$init->delete_attachment($member, $init::OPERATION_CERTIFACTE_ATTACHMENT_TYPE, $path, $memberID);


// }
?>