<?php
use nidal\TenderModel;

require_once 'tender_management/tender_model.php';
$tenderModel = new TenderModel();
require_once 'question_bank/init_question_list.php';
$header = "";
switch ($_SESSION['content']) {
    case 'tenders-list':
        $header = $init::TENDER_LIST_PAGE;
        $bodyfile = "tender_application.php";
        break;
    case 'tenders':
        $header = $init::TENDER_MANGEMEMT_PAGE;
        $bodyfile = "tenders.php";
        break;

    default:
        # code...
        break;
}

?>

<div class="container" id="tender-list">

    <h1 class="mb-3">
        <?PHP echo $header ?>
    </h1>

    <?PHP
    // Get the  from the database
    // Render the HTML file
    require_once $bodyfile;
    // include 'tenders.php';
    ?>
</div>
