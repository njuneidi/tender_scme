<?PHP
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

$path = $init::UPLOAD_PATH . "$account/";
$dir = new DirectoryIterator($path);
$oc_attachment_exist = $init->checkIfFileExist($dir, $init::OPERATION_CERTIFICATE);
$td_attachment_exist = $init->checkIfFileExist($dir, $init::TAX_DEDUCTION_CERTIFICATE);
$oc_attachment_file = $init->getUploadedFileByType($dir, $init::OPERATION_CERTIFICATE);
$td_attachment_file = $init->getUploadedFileByType($dir, $init::TAX_DEDUCTION_CERTIFICATE);

?>