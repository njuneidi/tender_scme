<?PHP
namespace nidal;

echo __DIR__;


require_once 'question.php';

use nidal\Init;
use nidal\Question;
use Phppot\DataSource;

class QuestionModel
{

    // protected $db;

    private $ds;
    private $init;
    public function __construct()
    {
        //$this->db = $db;
        require_once __DIR__ . '/../../lib/DataSource.php';
        $this->ds = new DataSource();
        $this->init = new Init();
    }

    public function getQuestions()
    {
        $query = "SELECT * FROM questions";
        $results = $this->ds->select($query);
        $questions = array();
        foreach ($results as $result) {
            $questions[] = new Question($result['id'], $result['title'], $result['description'], $result['question_type'], $result['answers']);
        }
        return $questions;
    }

    public function getQuestionById($id)
    {
        $query = "SELECT * FROM questions WHERE id = ?";
        $paramType = "s";
        $paramValue = array($id);
        $result = $this->ds->select($query, $paramType, $paramValue);
        if ($result) {
            return new Question($result['id'], $result['title'], $result['description'], $result['question_type'], $result['answers']);
        } else {
            return null;
        }
    }

    public function addQuestion($question)
    {
        $query = "INSERT INTO questions (title, description, question_type, answers) VALUES (?, ?, ?, ?)";
        $paramType = 'ssss';
        $paramValue = array(
            $question->title,
            $question->description,
            $question->question_type,
            $question->answers
        );
        $this->ds->insert($query, $paramType, $paramValue);
    }

    public function updateQuestion($question)
    {
        $query = "UPDATE questions SET title = ?, description = ?, question_type = ?, answers = ? WHERE id = ?";
        $paramType = 'sssss';
        $paramValue = array(
            $question->title,
            $question->description,
            $question->question_type,
            $question->answers,
            $question->id
        );
        $this->ds->insert($query, $paramType, $paramValue);
    }

    public function deleteQuestion($id)
    {
        $query = "DELETE FROM questions WHERE id = ?";
        $paramType = 's';
        $paramValue = array( $id);
        $this->ds->delete($query, $paramType, $paramValue);
    }
} ?>