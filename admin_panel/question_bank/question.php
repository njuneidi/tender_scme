<?PHP
namespace nidal;

class Question
{

    public $id;
    public $title;
    public $description;
    public $question_type;
    public $answers;

    public function __construct($id, $title, $description, $question_type, $answers)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->question_type = $question_type;
        $this->answers = $answers;
    }
} ?>