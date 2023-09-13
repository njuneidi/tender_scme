<?PHP
namespace nidal;

class AttachmentType
{

    public $attachment_type_id;
    public $attachment_type_code;
    public $attachment_type_name;
    public $attachment_type_arabic;


    public function __construct($attachment_type_id, $attachment_type_code, $attachment_type_name, $attachment_type_arabic)
    {
        $this->attachment_type_id = $attachment_type_id;
        $this->attachment_type_code = $attachment_type_code;
        $this->attachment_type_name = $attachment_type_name;
        $this->attachment_type_arabic = $attachment_type_arabic;
    }
} ?>