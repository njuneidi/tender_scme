<?PHP
getTenderQuestions($model, $tenderModel, $tenderId);
function getTenderQuestions($model, $tenderModel, $tenderId)
{

}
/*
// $tender_questions = $tenderModel->getTenderQuestions($tender->getId());
// // $init->print_butiful_array($tender_questions);
// foreach ($tender_questions as $question) {
//     $questionPreview = $model->getQuestionById($question['question_bank_id'])->question_preview;
//     ?>
//     <div class="movable-div<?php echo $question['question_bank_id']; ?>">
//         <div class="card rounded-3 text-black mt-2 p-1" style="background-color: rgb(240, 248, 255);">
//             <div class="card-header" style="background-color:#E3E3E3">
//                 <button type="button" value="<?PHP echo $tender->getId() . "-" . $question['question_bank_id'] ?>"
//                     class="btn btn-danger  remove-tender-question<?php echo $question['question_bank_id']; ?>">
//                     <i class="fas fa-times-circle fa-2x"></i>
//                 </button>
//             </div>
//             <div class="row g-0">
//                 <div class="col-lg-12">
//                     <div class="card-body p-lg-4 mx-lg-2">
//                         <!-- padding for md is 7 marging left right for md 4 -->
//                         <div class="row d-flex justify-content-center align-items-center h-100">
//                             <div class="row">
//                                 <div class="col-md-12 mb-1">
//                                     <?php echo $questionPreview; ?>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </div>
//     </div>
//     <?PHP
//     // $init->print_butiful_array($questionPreview);
//     // echo "<p>" . $question['question_bank_id'] . "</p>";
// }
// ?>
*/