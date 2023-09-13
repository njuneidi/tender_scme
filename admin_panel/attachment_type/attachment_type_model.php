<?PHP
namespace nidal;



require_once 'attachment_type.php';

//use nidal\Init;
//use nidal\Attachment;
use Phppot\DataSource;

class AttachmentTypeModel
{

    // protected $db;

    private $ds;
    // private $init;
    public function __construct()
    {
        //$this->db = $db;
        require_once __DIR__ . '/../../lib/DataSource.php';
        $this->ds = new DataSource();
        //  $this->init = new Init();
    }

    public function getAttachmentTypeList()
    {
        $query = "SELECT * FROM attachment_type_code";
        // echo $query;
        $results = $this->ds->select($query);
        $attachments = array();
        foreach ($results as $result) {
            $attachments[] = new AttachmentType($result['attachment_type_id'], $result['attachment_type_code'], $result['attachment_type_name'], $result['attachment_type_arabic']);
        }
        return $attachments;
    }


    public function getAttachmentTypeById($id)
    {
        $query = "SELECT * FROM attachment_type_code WHERE attachment_type_id = ?";
        $paramType = "s";
        $paramValue = array($id);
        $result = $this->ds->select($query, $paramType, $paramValue);
        if ($result) {
            return new AttachmentType($result[0]['attachment_type_id'], $result[0]['attachment_type_code'], $result[0]['attachment_type_name'], $result[0]['attachment_type_arabic']);
        } else {
            return null;
        }
    }

    public function addAttachment($attachmentType)
    {
        $query = "INSERT INTO tender.attachment_type (attachment_type_code, attachment_type_name, attachment_type_arabic) VALUES (?,?,?)";
        echo $query;
        $paramType = 'sss';
        $paramValue = array(
            $attachmentType->attachment_type_code,
            $attachmentType->attachment_type_name,
            $attachmentType->attachment_type_arabic

        );
        return $this->ds->insert($query, $paramType, $paramValue);
    }

    public function updateAttachment($attachmentType)
    {
        $query = "UPDATE attachment_type SET attachment_type_code = ?, attachment_type_name = ?, attachment_type_arabic = ? WHERE attachment_type_id = ?";
        $paramType = 'ssss';
        $paramValue = array(
            $attachmentType->attachment_type_code,
            $attachmentType->attachment_type_name,
            $attachmentType->attachment_type_arabic,
            $attachmentType->attachment_type_id
        );
        $this->ds->insert($query, $paramType, $paramValue);
    }


    public function deleteAttachment($id)
    {
        $query = "DELETE FROM attachment_type WHERE id = ?";
        $paramType = 's';
        $paramValue = array($id);
        $this->ds->delete($query, $paramType, $paramValue);
    }


} ?>