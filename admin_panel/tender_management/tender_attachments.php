<?php

class TenderAttachments
{

    private $tender_id;
    private $tender_question_id;
    private $question_bank_id;
    private $sort;

    public function __construct($tender_id, $tender_question_id, $question_bank_id, $sort)
    {
        $this->tender_id = $tender_id;
        $this->tender_question_id = $tender_question_id;
        $this->question_bank_id = $question_bank_id;
        $this->sort = $sort;
    }

    public function getTenderId()
    {
        return $this->tender_id;
    }

    public function setTenderId($tender_id)
    {
        $this->tender_id = $tender_id;
    }

    public function getTenderQuestionId()
    {
        return $this->tender_question_id;
    }

    public function setTenderQuestionId($tender_question_id)
    {
        $this->tender_question_id = $tender_question_id;
    }

    public function getQuestionBankId()
    {
        return $this->question_bank_id;
    }

    public function setQuestionBankId($question_bank_id)
    {
        $this->question_bank_id = $question_bank_id;
    }

    public function getSort()
    {
        return $this->sort;
    }

    public function setSort($sort)
    {
        $this->sort = $sort;
    }
}

?>