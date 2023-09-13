<?php
namespace nidal;

use Phppot\DataSource;
use nidal\TenderAttachment;

require_once 'tender_attachments.php';
class TenderAttachmentModel
{


    private $db;
    private $ds;

    public function __construct()
    {

        require_once __DIR__ . '/../../lib/DataSource.php';
        $this->ds = new DataSource();

    }

}



?>