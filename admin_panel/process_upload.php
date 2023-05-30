<?PHP
session_start();
require_once('init_user_status.php');
//echo "hi";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit("ERRORE_UPLOADE");
}
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



if (!file_exists($init::UPLOAD_PATH . $account)) {
    mkdir($init::UPLOAD_PATH . $account, 0777, true);
}


//echo "ttt";
if (!empty($_FILES['operation_certificate'])) {
    //echo "hitd";
    echo upload_file($_FILES['operation_certificate'], $init, $path, $init::OPERATION_CERTIFICATE, 1);
    // if (!$oc_attachment_exist) {
    //     echo upload_file($_FILES['operation_certificate'], $init, $path, $init::OPERATION_CERTIFICATE);

    // }
}
if (!empty($_FILES['tax_deduction'])) {
    // echo "hitd";
    echo upload_file($_FILES['tax_deduction'], $init, $path, $init::TAX_DEDUCTION_CERTIFICATE, 2);
    // if (!$td_attachment_exist) {

    //     echo upload_file($_FILES['tax_deduction'], $init, $path, $init::TAX_DEDUCTION_CERTIFICATE);
    // }
}



function upload_file($file, $init, $path, $fileName, $type)
{
    $uploaded_file = $file['name'];
    $tmp = $file['tmp_name'];
    $ext = strtolower(pathinfo($uploaded_file, PATHINFO_EXTENSION));

    $final_file = $fileName . "." . $ext;


    // $final_file = $fileType . $ext;

    if (in_array($ext, $init::VALID_EXTENSIONS)) {
        $pathToMove = $path . strtolower($final_file);
        // $path = $path . strtolower($final_file1);
        if (move_uploaded_file($tmp, $pathToMove)) {
            //  $init->$init->createAttachment($tmpOC, $path);
            return $init->file_preview($ext, $path, $final_file, $type);


        }

    } else {
        return $init->file_format_notSupported($uploaded_file);
    }

}


?>