<?PHP
namespace nidal;

//echo __DIR__;


require_once 'question.php';

//use nidal\Init;
use nidal\Question;
use Phppot\DataSource;

class QuestionModel
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

    public function getQuestions()
    {


        $query = "SELECT q.*, qt.* FROM questions q, question_Type qt where q.question_type = qt.question_type_id order by q.question_id ";
        $results = $this->ds->select($query);
        $questions = array();
        foreach ($results as $result) {
            $questions[] = new Question($result['question_id'], $result['question_title'], $result['question_description'], $result['question_type_arabic'], $result['question_answers'], $result['question_preview']);
        }
        return $questions;
    }

    public function getQuestionById($id)
    {
        $query = "SELECT * FROM questions WHERE question_id = ?";
        $paramType = "s";
        $paramValue = array($id);
        $result = $this->ds->select($query, $paramType, $paramValue);
        if ($result) {
            return new Question($result[0]['question_id'], $result[0]['question_title'], $result[0]['question_description'], $result[0]['question_type'], $result[0]['question_answers'], $result[0]['question_preview']);
        } else {
            return null;
        }
    }
    public function startTransaction()
    {
        return $this->ds->startTransaction();
    }
    public function commit()
    {
        return $this->ds->commit();
    }

    public function addQuestion($question)
    {
        $query = "INSERT INTO tender.questions (question_id, question_title, question_description, question_type, question_answers) VALUES (?,?,?,?,?) ON DUPLICATE KEY UPDATE question_title = VALUES(question_title), question_description = VALUES(question_description), question_type = VALUES(question_type), question_answers = VALUES(question_answers)";
        //echo $query;";
        //echo $query;
        $paramType = 'sssss';
        $paramValue = array(
            $question->question_id,
            $question->question_title,
            $question->question_description,
            $question->question_type,
            $question->question_answers

        );
        return $this->ds->insert($query, $paramType, $paramValue);
    }

    public function updateQuestion($question)
    {
        $query = "UPDATE questions SET question_title = ?, question_description = ?, question_type = ?, question_answers = ? WHERE id = ?";
        $paramType = 'sssss';
        $paramValue = array(
            $question->question_title,
            $question->question_description,
            $question->question_type,
            $question->question_answers,
            $question->id
        );
        $this->ds->insert($query, $paramType, $paramValue);
    }


    public function deleteQuestion($id)
    {
        $query = "DELETE FROM questions WHERE question_id = ?";
        $paramType = 's';
        $paramValue = array($id);
        return $this->ds->delete($query, $paramType, $paramValue);
    }
    public function updateQuestionPreview($id, $questionPreview)
    {
        $query = "UPDATE questions SET question_preview = ?  WHERE question_id = ?";
        $paramType = 'ss';
        $paramValue = array(
            $questionPreview,
            $id
        );
        return $this->ds->update($query, $paramType, $paramValue);
    }

} ?>