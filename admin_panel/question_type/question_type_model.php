<?PHP
namespace nidal;



require_once 'question_type.php';

//use nidal\Init;
//use nidal\Question;
use Phppot\DataSource;

class QuestionTypeModel
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

    public function getQuestionType()
    {
        $query = "SELECT * FROM question_type";
        // echo $query;
        $results = $this->ds->select($query);
        $questions = array();
        foreach ($results as $result) {
            $questions[] = new QuestionType($result['question_type_id'], $result['question_type_code'], $result['question_type_name'], $result['question_type_arabic']);
        }
        return $questions;
    }


    public function getQuestionTypeById($id)
    {
        $query = "SELECT * FROM question_type WHERE question_type_id = ?";
        $paramType = "s";
        $paramValue = array($id);
        $result = $this->ds->select($query, $paramType, $paramValue);
        if ($result) {
            return new QuestionType($result[0]['question_type_id'], $result[0]['question_type_code'], $result[0]['question_type_name'], $result[0]['question_type_arabic']);
        } else {
            return null;
        }
    }

    public function addQuestion($questionType)
    {
        $query = "INSERT INTO tender.question_type (question_type_code, question_type_name, question_type_arabic) VALUES (?,?,?)";
        echo $query;
        $paramType = 'sss';
        $paramValue = array(
            $questionType->question_type_code,
            $questionType->question_type_name,
            $questionType->question_type_arabic

        );
        return $this->ds->insert($query, $paramType, $paramValue);
    }

    public function updateQuestion($questionType)
    {
        $query = "UPDATE question_type SET question_type_code = ?, question_type_name = ?, question_type_arabic = ? WHERE question_type_id = ?";
        $paramType = 'ssss';
        $paramValue = array(
            $questionType->question_type_code,
            $questionType->question_type_name,
            $questionType->question_type_arabic,
            $questionType->question_type_id
        );
        $this->ds->insert($query, $paramType, $paramValue);
    }


    public function deleteQuestion($id)
    {
        $query = "DELETE FROM question_type WHERE id = ?";
        $paramType = 's';
        $paramValue = array($id);
        $this->ds->delete($query, $paramType, $paramValue);
    }


} ?>