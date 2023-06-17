<?PHP
namespace nidal;

class QuestionType
{

    public $question_type_id;
    public $question_type_code;
    public $question_type_name;
    public $question_type_arabic;


    public function __construct($question_type_id, $question_type_code, $question_type_name, $question_type_arabic)
    {
        $this->question_type_id = $question_type_id;
        $this->question_type_code = $question_type_code;
        $this->question_type_name = $question_type_name;
        $this->question_type_arabic = $question_type_arabic;
    }
} ?>