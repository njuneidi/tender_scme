<?PHP
use nidal\AttachmentTypeModel;

require_once 'attachment_type_model.php';
require_once 'attachment_type.php';


$attachmentTypeModel = new AttachmentTypeModel(); 
$attachmentTypeList = $attachmentTypeModel->getAttachmentTypeList();
?>

