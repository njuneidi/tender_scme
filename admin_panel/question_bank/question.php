<?PHP
namespace nidal;

class Question
{

    public $question_id;
    public $question_title;
    public $question_description;
    public $question_type;
    public $question_answers;
    public $question_preview;

    public function __construct($question_id, $question_title, $question_description, $question_type, $question_answers, $question_preview)
    {
        $this->question_id = $question_id;
        $this->question_title = $question_title;
        $this->question_description = $question_description;
        $this->question_type = $question_type;
        $this->question_answers = $question_answers;
        $this->question_preview = $question_preview;
    }
} ?>