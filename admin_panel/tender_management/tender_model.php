<?PHP
namespace nidal;

require_once 'tender.php';
use Phppot\DataSource;

use nidal\Tender;

//$ds = new DataSource();
class TenderModel
{

  private $db;
  private $ds;

  public function __construct()
  {

    require_once __DIR__ . '/../../lib/DataSource.php';
    $this->ds = new DataSource();
    // $this->db = new DataSource();
    // $this->db = $db;
  }

  public function createTenderQuestion($tenderId, $questionBankId)
  {
    $query = "INSERT INTO tender.tender_questions
                ( tender_id, question_bank_id)
                VALUES( ?, ?);";
    // echo $query;
    $paramType = 'ss';
    $paramValue = array(
      // 'tender_id' => $tenderId,
      // 'question_bank_id' => $questionBankId,
      $tenderId,
      $questionBankId,
    );
    return $this->ds->insert($query, $paramType, $paramValue);
  }
  public function deleteTenderQuestions($tenderId)
  {
    // $query = "Delete  from tender.tender_questions where tender_id = ?";
    $query = "DELETE FROM tender_questions WHERE tender_id = ?";
    $paramType = 's';
    $paramValue = array($tenderId);
    return $this->ds->delete($query, $paramType, $paramValue);


    // return $this->ds->delete($query, $paramType, $paramValue);
  }

  public function getTenders()
  {
    $query = "SELECT * FROM tender";
    $results = $this->ds->select($query);
    $tenders = [];
    foreach ($results as $result) {
      //$tenders[] = new Tender($result['tender_id'], $result['tender_title'], $result['tender_start_date'], $result['tender_due_date'], $result['tender_details'], $result['tender_description'], $result['tender_status_id'], $result['tender_questions_bank'], $result['tender_winner'], $result['tender_applied_code'], $result['tender_attachment_id'], $result['tender_pinned']);
      $tenders[] = new Tender($result);
    }
    return $tenders;
  }
  public function getTenderQuestions($tenderId)
  {
    $query = "SELECT * FROM tender_questions WHERE tender_id = " . $tenderId;
    $results = $this->ds->select($query);
    // $tenders = [];
    // foreach ($results as $result) {
    //   //$tenders[] = new Tender($result['tender_id'], $result['tender_title'], $result['tender_start_date'], $result['tender_due_date'], $result['tender_details'], $result['tender_description'], $result['tender_status_id'], $result['tender_questions_bank'], $result['tender_winner'], $result['tender_applied_code'], $result['tender_attachment_id'], $result['tender_pinned']);
    //   $tenders[] = new Tender($result);
    // }
    return $results;
  }

  public function getTenderById($id)
  {
    $query = "SELECT * FROM tender WHERE tender_id = ?";
    $paramType = "s";
    $paramValue = array($id);
    $result = $this->ds->select($query, $paramType, $paramValue);
    return $result;
    // if ($result) {
    //   //return new Tender($result['tender_id'], $result['tender_title'], $result['tender_start_date'], $result['tender_due_date'], $result['tender_details'], $result['tender_description'], $result['tender_status_id'], $result['tender_questions_bank'], $result['tender_winner'], $result['tender_applied_code'], $result['tender_attachment_id'], $result['pinned']);
    //   return new Tender($result[0]);
    // } else {
    //   return null;
    // }
  }
  public function applyTender($tenderId, $memberId)
  {
    // session_start();
    $query = "INSERT INTO applied_tenders ( tender_id, member_id) VALUES(?, ?)";
    $paramType = 'ss';
    $paramValue = array(
      $tenderId,
      $memberId
    );
    // session_destroy();
    return $this->ds->insert($query, $paramType, $paramValue);
  }


  public function createTender1(Tender $tender)
  {
    $query = "INSERT INTO tender (tender_title, tender_start_date, tender_due_date, tender_details, tender_description, tender_status_id, tender_questions_bank, tender_winner, tender_applied_code, tender_attachment_id, tender_pinned, tender_posted) VALUES (:tender_name, :tender_start_date, :tender_last_date, :tender_detail, :tender_description, :tender_status_id, :tender_questions_bank, :tender_winner, :tender_applied_code, :tender_attachment_id, :tender_pinned, :tender_posted)";
    $paramType = 'sssssssssss';
    $paramValue = array(
      $tender->getTitle(),
      $tender->getStratDate(),
      $tender->getDueDate(),
      $tender->getDetails(),
      $tender->getDescription(),
      $tender->getStatusId(),
      $tender->getQuestionsBank(),
      $tender->getWinner(),
      $tender->getAppliedCode(),
      $tender->getAttachmentId(),
      $tender->getPinned()
    );
    return $this->ds->insert($query, $paramType, $paramValue);
  }

  public function createTender0(Tender $tender)
  {
    $query = "INSERT INTO
                        tender (tender_title)
                    values (?) ON DUPLICATE KEY UPDATE tender_title =values (tender_title)";
    $paramType = 's';
    $paramValue = array(
      empty($tender->getTitle()) ? ":tender_title" : $tender->getTitle(),


    );
    return $this->ds->insert($query, $paramType, $paramValue);
  }

  public function createTender(Tender $tender)
  {
    // echo $tender->getId();
    $query = "INSERT INTO tender (
      tender_id,
            tender_title,
            tender_start_date,
            tender_due_date, 
            tender_details, 
            tender_description,
            tender_status_id,
            tender_questions_bank,
            tender_pinned,
            tender_posted,
            --  tender_winner, 
            -- tender_applied_code,
             tender_attachment_id
            -- tender_pinned
          ) 
          values 
            (?,?,?,?,?,?,?,?,?,?,?) on DUPLICATE key 
          update 
            tender_title = 
          values 
            (tender_title), 
            tender_start_date = 
          values 
            (tender_start_date), 
            tender_due_date = 
          values 
            (tender_due_date), 
            tender_details = 
          values 
            (tender_details), 
            tender_description = 
          values 
            (tender_description), 
            tender_status_id = 
          values 
            (tender_status_id), 
            tender_questions_bank = 
          values 
            (tender_questions_bank), 
            tender_winner = 
          values 
            (tender_winner), 
            tender_applied_code = 
          values 
            (tender_applied_code), 
            tender_attachment_id = 
          values 
            (tender_attachment_id), 
            tender_pinned = 
          values 
            (tender_pinned),
            tender_posted = 
          values 
            (tender_posted),
            tender_attachment_id = 
          values 
            (tender_attachment_id)
         
          ";

    $paramType = 'sssssssssss';
    $paramValue = [
      !empty($tender->getId()) ? $tender->getId() : '',
      !empty($tender->getTitle()) ? $tender->getTitle() : '',
      !empty($tender->getStratDate()) ? $tender->getStratDate() : date("Y-m-d H:i:s"),
      !empty($tender->getDueDate()) ? $tender->getDueDate() : date("Y-m-d H:i:s"),
      !empty($tender->getDetails()) ? $tender->getDetails() : '',
      !empty($tender->getDescription()) ? $tender->getDescription() : '',
      !empty($tender->getStatusId()) ? $tender->getStatusId() : '1',
      !empty($tender->getQuestionsBank()) ? $tender->getQuestionsBank() : null,
      $tender->getPinned() == 'on' ? 1 : 0,
      $tender->getPosted() == 'on' ? 1 : 0,
      !empty($tender->getAttachmentId()) ? $tender->getAttachmentId() : '',
      // 1
      // $tender->getQuestionsBank(),
      // $tender->getWinner(),tender_questions
      // $tender->getAppliedCode(),
      // $tender->getAttachmentId(),
      // $tender->getPinned()

    ];
    return $this->ds->insert($query, $paramType, $paramValue);
  }

  public function updateTenderPost($tenderId, $post)
  {
    $query = "UPDATE tender SET tender_posted = ?  WHERE tender_id = ?";
    $paramType = 'ss';
    $paramValue = array(
      $post,
      $tenderId
    );
    return $this->ds->update($query, $paramType, $paramValue);
  }
  public function updateTender(Tender $tender)
  {
    $query = "UPDATE tender SET tender_title = :tender_title, tender_start_date = :tender_start_date, tender_due_date = :tender_due_date, tender_details = :tender_details, tender_description = :tender_description, tender_status_id = :tender_status_id, tender_questions_bank = :tender_questions_bank, tender_winner = :tender_winner, tender_applied_code = :tender_applied_code, tender_attachment_id = :tender_attachment_id, tender_pinned=tender_pinned, tender_posted=tender_posted WHERE tender_id = :tender_id";
    $paramType = 'ssssssssssss';
    $paramValue = array(
      $tender->getTitle(),
      $tender->getStratDate(),
      $tender->getDueDate(),
      $tender->getDetails(),
      $tender->getDescription(),
      $tender->getStatusId(),
      $tender->getQuestionsBank(),
      $tender->getWinner(),
      $tender->getAppliedCode(),
      $tender->getAttachmentId(),
      $tender->getPinned(),
      $tender->getPosted(),

    );
    return $this->ds->update($query, $paramType, $paramValue);
  }
  public function deleteTender($id)
  {
    $query = "DELETE FROM tender WHERE tender_id = ?";
    $paramType = 's';
    $paramValue = array($id);
    return $this->ds->delete($query, $paramType, $paramValue);
  }
  public function deleteTenderQuestion($tendeId, $questionId = '')
  {
    if (strlen($questionId) > 0) {
      $query = "DELETE FROM tender_questions WHERE tender_id = ? and question_bank_id = ?";
      $paramType = 'ss';
      $paramValue = array($tendeId, $questionId);
    } else {
      $query = "DELETE FROM tender_questions WHERE tender_id = ?";
      $paramType = 's';
      $paramValue = array($tendeId);
    }

    return $this->ds->delete($query, $paramType, $paramValue);
  }
  public function checkIfapplid($tenderId, $memberId)
  {
    $query = "SELECT EXISTS 
    (
      SELECT 1 
      FROM applied_tenders
      WHERE tender_id = ?
      AND member_id = ?
    ) as exist;";

    $paramType = 'ss';
    $paramValue = array($tenderId, $memberId);
    return $this->ds->select($query, $paramType, $paramValue)[0];

  }

  public function validateDeleteTender($id)
  {
    // echo $id;
    $query = "SELECT COUNT(*) AS count
        FROM applied_tenders
        WHERE tender_id = ?;";
    // echo $query;
    $paramType = 's';
    $paramValue = array($id);
    return $this->ds->select($query, $paramType, $paramValue);
  }
}
?>