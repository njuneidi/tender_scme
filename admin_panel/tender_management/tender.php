<?PHP
namespace nidal;

class Tender
{

    private $id;
    private $title;
    private $start_date;
    private $due_date;
    private $details;
    private $description;
    private $status_id;
    private $questions_bank;
    private $winner;
    private $applied_code;
    private $attachment_id;
    private $pinned;
    private $posted;
    private $classificaton_id;

    public function __construct(array $data)
    {
        $this->id = $data['tender_id'];
        $this->title = $data['tender_title'];
        $this->start_date = $data['tender_start_date'];
        $this->due_date = $data['tender_due_date'];
        $this->details = $data['tender_details'];
        $this->description = $data['tender_description'];
        $this->status_id = $data['tender_status_id'];
        $this->questions_bank = $data['tender_questions_bank'];
        $this->winner = $data['tender_winner'];
        $this->applied_code = $data['tender_applied_code'];
        $this->attachment_id = $data['tender_attachment_id'];
        $this->pinned = $data['tender_pinned'];
        $this->posted = $data['tender_posted'];
        $this->classificaton_id = $data['tender_classification_id'];
    }

    public function getId()
    {
        return $this->id;
    }
    public function getPinned()
    {
        return $this->pinned;
    }
    public function getPosted()
    {
        return $this->posted;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getStratDate()
    {
        return $this->start_date;
    }

    public function getDueDate()
    {
        return $this->due_date;
    }

    public function getDetails()
    {
        return $this->details;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function getQuestionsBank()
    {
        return $this->questions_bank;
    }

    public function getWinner()
    {
        return $this->winner;
    }

    public function getAppliedCode()
    {
        return $this->applied_code;
    }

    public function getAttachmentId()
    {
        return $this->attachment_id;
    }
    public function getClassificationId()
    {
        return $this->classificaton_id;
    }
    // public function getPinned()
    // {
    //     return $this->pinned;
    // }

}
?>