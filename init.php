<?PHP
namespace nidal;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';



class Init
{
    // define("ALREADY_REGISTERED", "تم تسجيل الحساب");
    // define("ALREADY_REGISTERED", "تم تسجيل الحساب");
    //require_once __DIR__ . 'ignor_init.php';
    //require_once __DIR__ . '/lib/Member.php';
    //require_once
    private $lang = "ar";
    const VERSION = 1;
    const menueItems = [
        'dashboard' => 'dashboard',
        'profile' => 'profile',
        'attachments' => 'attachments',
        'tenders-list' => 'tenders-list',
        'my-tenders' => 'my-tenders',
        'members' => 'members',
        'users' => 'users',
        'questions' => 'questions',
        'tenders' => 'tenders',
        'applied-tenders-comparison' => 'applied-tenders-comparison'


    ];
    const userMenu = [
        'u-dashboard' => 'u-dashboard',
        'profile' => 'profile',
        // 'u_users' => 'u_users',
        'u_attachments' => 'u_attachments',
        'tenders-list' => 'tenders-list',
        'my-tenders' => 'my-tenders'

    ];
    const adminMenu = [
        'a-dashboard' => 'a-dashboard',
        'profile' => 'profile',
        'a_members' => 'a_members',
        'a_users' => 'a_users',
        'a_questions' => 'a_questions',
        'tenders' => 'tenders',
        'tenders-list' => 'tenders-list',
        'applied-tenders-comparison' => 'applied-tenders-comparison',

    ];
    // var $addQuestionToBankinModal = 0;



    const YOU_CANT_DELETE = "لا تستطيع الحذف";
    const YOU_CANT_EDIT = "لا تستطيع التحرير";
    const QUESTION = "سؤال";
    const THE_QUESTION = "السؤال";
    const ALREADY_IN_USE = "قيد الاسستخدام";
    const ADD_TENDER = "إضافة عطاء";
    const AT_LEAST_ONE_ANSWER = "يجب ان يكون هناحك اجابة واحدة على الاقل ";
    const EDIT_TENDER = "تعديل العطاء";
    const VIEW_TENDER = "معاينة العطاء";
    const DELETE_TENDER = "حذف العطاء";
    const TITLE = "العنوان";
    const DESCRIPTION = "الوصف";
    const DETAILS = "التفاصيل";
    const DUEDATE = "آخر موعد للتسليم";
    const START_DATE = "تاريخ البدء";
    const PUBLISH_DATE = "تاريخ النشر";
    const CANCEL = "إلغاء";
    const SELECT_ALL = "تحديد الكل";
    const RECOVERY_EXPIRATION_TIMEOUT = 60 * 60 * 24;
    //const RECOVERY_EXPIRATION_TIMEOUT = 60;
    const RECOVERY_EXPIR = 'انتهت صلاحية رابطة الاستعادة هذا';
    const RECOVERY_NOT_VALID_TOKEN = "رابط الاستعادة غير صحيح او انه رابط سابق ";
    const RECOVERY_ALREADY_DONE = 'تم استعادة البريد الالكتروني عبر هذا الرابط سابقا';
    const ALREADY_REGISTERED = " تم انشاء حساب لهذه الشركة مسبقا";
    const ALREADY_HAVE_ACCOUNT = "لا يمكنك استخدام هذا الحساب هذا الحساب مسجل سابقا";
    const ALREADY_APPLIED = "تم التقديم للعطاء";
    const ACTIVATIO_EMAIL_SUBJECT = "تفعيل البريد الاكتروني";
    const RECOVERY_EMAIL_SUBJECT = "طلب تغيير كلمة المررو";
    const REASSIGN_PASSWORD_SUBJECT = "إعادة تعيين كلمة المرور";
    const REGISTRATION_COMPLETED = "تهانينا لقد تم تسجيلك في  مصنة العطاءات التابعة للكلية الذكية للتعليم الحديث يرجى فحص البريد الاكتروني لاكمال عملية التسجيل !!";
    const ACTIVATIO_EMAIL_RESPONSE = "لقدتم ارسال رسالة الى بريدك الخاص لتفعيل الايميل يرجى فحص البريد الالكتروني لكمال عملية التسجيل ";
    const FORGOT_EMAIL_RESPONSE = "لقدتم ارسال رسالة الى بريدك الخاص لتغيير كلمة المرور يرجى فحص البريد الالكتروني لتغيير كلمة المرور   ";
    const NOT_SENT_EMAIL = "لم يتم ارسال البريد الالكتروني ";
    const SENT_EMAIL = "تم ارسال البريد الالكتروني";
    const NOT_REGISTER_EMAIL = "هذا الايميل غير مسجل!!";
    const DONT_HAVE_ACCOUNT = "ليس لديك حساب?";
    const ALL_FIELD_ARE_MANDATORY = "يجب ملأ جميع الحقول";
    const WELCOM_TO_LOGIN = "تفضل بالدخول";
    // const ALREAD
    const EMAIL_IS_VERIFIED = "تم تفعيل الايميل بنجاح";
    const EMAIL_IS_AlREADY_VERIFIED = "الايميل مفعل سابقا";
    const START_PAGE = "صفحة البداية";
    const WELCOM_MESSAGE = "مرحبا بك ";
    const MESSAGE = "الرسالة";
    const ACCOUNT_STATUS = "حالة الحساب ";
    const SPACE = " ";
    const TAB = "   ";
    const LOGOUT_EN = "logout";
    const LOGOUT = "تسجيل الخروج";
    const USER_SETTINGS_EN = "User Settings";
    const USER_SETTINGS = "اعدادت المستخدمين";
    const SETTINGS_EN = "Settings";
    const SETTINGS = "الإعدادات";
    const ARABIC = "العربية";
    const ENGLISH = "English";
    const TENDER_GATE = "منصة العطاءات";
    const TENDER_GATE_EN = "Tender Gate";
    const VENDOR_PAGE = "صفحة المزودين";
    const VENDOR_PAGE_EN = "Vendors Page";
    const USER_DELETED = "تم حذف المستخدم";
    const USER_CREATED = "تم انشاء مسستخدم جديد";
    const USER_NOT_CREATED = "لم يتم انشاء مسستخدم جديد";
    const USER_NOT_DELETED = "لم يتم حذف المستخدم";
    const UPDATED_SUCCESSFULLY = "تمت تحديث البيانات بنحاح";
    const DOESNOT_UPDATE_SUCCESSFULLY = "لم يتم تحديث البيانات";
    const UPDATED_PASSWORD_SUCCESSFULLY = "تمت اعادة تعيين كلمة ا لمرور  بنحاح";
    const DOESNOT_UPDATE_PASSWORD_SUCCESSFULLY = "لم يتم اعادة تعيين  كلمة المرور بنجاح ";
    const ADDED_SUCCESSFULLY = "تمت الاضافة بنجاح";
    const DOESNOT_ADDED_SUCCESSFULLY = "لم تتم الاضافة بنجاح";
    const DELETED_SUCCESSFULLY = "تم الحذف بنجاح";
    const DOESNOT_DELETED_SUCCESSFULLY = "لم يتم الحذف بنجاح";
    const DOESNOT_EXISTS = "هذا العنصر غير متوفر";
    const DONE = "تمت العملية بنحاح";
    const DOESNOT = "لم تتم العملية بنجاح";
    const USER_NO_CREATED = "لم يتم انشاء مسستخدم جديد";

    const QUESTION_TYPE = "نوع السؤال";
    const QUESTION_PREVIEW = "معاينة السؤال";
    const PREVIEW = "معاينة ";
    const NOT_COMPLETED = "لم تتم";
    const DOESNOT_COMPLETED = "لم يتم";
    const COMPLETED = "تمت";
    const OPERATION = "العملية";
    const SUCCESSFULLY = "بنجاح";
    const USER_INFORMATION_PAGE = "الصفحة الشخصية";
    const USER_INFORMATION_PAGE_EN = "User Information Page";
    const DASHBOARD = "لوحة المعلومات";
    const DASHBOARD_EN = "Dashboard";
    const USER_MANGEMEMT_PAGE = " ادارة المستخدمين";
    const MEMBER_MANGEMEMT_PAGE = " ادارة الاعضاء";
    const SUPPLIER_MANGEMEMT_PAGE = " ادارة الموردين";
    const USER_MANGEMEMT_PAGE_EN = "User Managment Page";
    const OPERATION_MANGEMEMT = " ادارة العمليات";
    const OPERATION_MANGEMEMT_EN = "Operation Managment";

    const TENDER_MANGEMEMT_PAGE = " ادارة العطاءات";
    const TENDER_MANGEMEMT_PAGE_EN = "Tender Managment Page";
    const TENDER_LIST_PAGE = " قائمة العطاءات";
    const TENDER_LIST_PAGE_EN = "Tender List Page";
    const QUESTION_BANK_MANGEMEMT_PAGE = " ادارة بنك الاسئلة";
    const QUESTION_BANK_MANGEMEMT_PAGE_EN = "Question Bank Managment Page";
    const QUESTION_BANK = "بنك الاسئلة";
    const APPLY_FOR_TENDER_PAGE = "الاشتراك في العطاء";
    const APPLY_FOR_TENDER = "التقديم للعطاء";
    const APPLY_FOR_TENDER_PAGE_EN = "";
    const CONTROL_PANEL = "لوحة التحكم";
    const CONTROL_PANEL_EN = "Control Panel";
    const USER_TRANSACTIONS = "حركات المستخدم";
    const USER_TRANSACTIONS_EN = "USER TRANSACTIONS";
    const ADMIN_TRANSACTIONS = "حركات المدير";
    const ADMIN_TRANSACTIONS_EN = "ِADMIN TRANSACTIONS";
    const TRANSACTIONS = "العمليات";
    const TRANSACTIONS_EN = " TRANSACTIONS";
    const ADDONS = "إضافات";
    const ADDONS_EN = "ADDONS";
    const CHARTS = "الرسوم البيانية";
    const CHARTS_EN = "Charts";
    const TABLES = "الجداول ";
    const TABLES_EN = "Tables";
    const PAGES = "الصفحات";
    const PAGES_EN = "Pages";
    const THE_TENDER = "العطاء";
    const TENDERS = "العطاءات";
    const TENDERS_EN = "Tenders ";
    const MY_TENDERS = "عطاءاتي";
    const MY_TENDERS_EN = "My Tenders";
    const ATTACHMETNS = "المرفقات";
    const ATTACHMETNS_EN = "ِAttachments";
    const BRAND = "الكلية الذكية للتعليم الحديث";
    const BRAND_EN = "Smart College For Modern Education";
    const LOGGED_IN_AS = "تم تسجيل دخولك ك";
    const LOGGED_IN_AS_EN = "Logged in as";
    const ADD_USER = "اضافة مستخدم";
    const ADD_USER_EN = "Add User";
    const Eidt_USER = "تعديل بيانات المستخدم";
    const ADD_QUESTION = "اضافة سؤال";
    const ADD_TO_TENDER = "اضافة للعطاء";
    const EDIT_QUESTION = "تعديل السؤال";
    const ADD_ANSWER = "اضافة اجابة";
    const EDIT_ANSWER = "تعديل اجابة";
    const Edit_USER_EN = "ُEdit User";
    const VIEW = "عرض";
    const VIEW_EN = "View";
    const EDIT = "تحرير";
    const EDIT_EN = "Edit";
    const DELETE = "حذف";
    const DELETE_EN = "Delete";
    const ID = "الرقم";
    const ID_EN = "ID";
    const USERNAME = "اسم المستخدم";
    const USERNAME_EN = "اسم المستخدم";
    const USER_TYPE = "نوع المستخدم";
    const USER_TYPE_EN = "User Type ";
    const USER_STATUS = "حالة المستخدم";
    const USER_STATUS_EN = "User Status";
    const PASSWORD = "كلمة المرور";
    const PASSWORD_EN = "Password";
    const CHANGE_PASSWORD = "تغيير كلمة المرور !";
    const REASSIGN_PASSWORD = "اعادة تعيين كلمة المرور";
    const PASSWORD_RECOVERY = "استعادة كلمة المرور!";
    const PASSWORD_RECOVERY_MESSAGE = "أدخل عنوان بريدك الإلكتروني وسنرسل لك رابطًا لإعادة تعيين كلمة المرور الخاصة بك.";
    const RESET_PASSWPRD = "اعادة تعيين كلمة المرور";
    const RETRURN_TO_LOGIN_PAGE = "العودة لصفحة الدخول";
    const CURRENT_PASSWORD = "كلمة المرور الحالية";
    const NEW_PASSWORD = "كلمة المرور الجديدة";
    const CONFIRM_PASSWORD = "تأكيد كلمة المرور";
    const SEND_ONE_TIME_PASSWORD = "ارسال كلمة مرور عشوائية لمرة واحدة ";
    const FOR = "ل";
    const USER = "مستخدم";
    const THE = "ال";
    const FOR_USER = "للمستخدم";
    const PASSWORD_RULES = "كلمة المرور مكونة من 6 خانات  بحتي تحتوى على حروف وارقام ورموز";
    const OLD_PASSWORD_MESSAGE = "كلمة المرورة السابقة غير صحيحة";
    const PASSWORD_CHANGING_COMPLETED_SUCCSESSFULLY = "تم تغيير كلمة المرور بنجاح";
    const PASSWORD_DOESNOT_CHANGING = "لم يتم تغيير كلمة المرور بنجاح";

    const ACTION = "الإجراء";
    const ACTION_EN = "ACTION";
    const ACCOUNT_NO = "رقم الحساب";
    const DQ = "\"";
    const SQ = "\'";
    const CERTIFICATE = "شهادة";
    const EMAIL = "البريد الاكتروني";
    const ADMIN_EMAIL = "gnidal@gmail.com";
    const LOGIN = "تسجيل الدخول";
    const PAGE = "صفحة";
    const LOGIN_INFO = "معلومات الحساب";
    const LOGIN_MSG = "الرجاء ادخال معلومات الحساب <br>حتى يتسنى لك الدخول الى صفحة العطاءات";
    const SCME = "الكلية الذكية للتعليم الحديث";
    const FORGOT_PASSWORD = "هل نسيت كلمة المرور?";
    const FULL_NAME = "الاسم كاملا";
    const COMPANY_NAME = "اسم الشركة";
    const NO = "رقم";
    const PHONE = "الهاتف";
    const MOBILE = "الموبايل";
    const CITY = "المدينة";
    const ADDRESS = "العنوان";
    const ACCEPT_RULES = "الموافقة على الشروط والأحكام";
    const RULES = "الشروط والأحكام";
    const PRIVACY_POLICY = "سياسية الخصوصية";
    const ENTER = "دخول";
    const DEVELOPER_EN = "Nidal Aljuneidi";
    const SENDER_NAME = "Nidal Aljuneidi";
    const RECIPIENT = "المستلم";
    const RECIPIENTS = "المستلمون";
    const SUBJECT = "الموضوع";
    const MESSAGE_TEXT = "نص ا لرسالة";
    const SENDER_EMAIL = "gnidal@gmail.com";
    const DEVELOPER = "نضال الجنيدي";
    const COPYRIGHT = "جميع الحقوق محفوظة";


    const ACTIVATE_EMAIL = "تفعيل الايميل ";
    const EMAIL_EN = "Email";
    const SAVE = "حفظ";
    const AND = "و";
    const SAVE_EN = "Save";
    const CLOSE = "اغلاق";
    const STOP_ACCOUNT_MESSAGE = "!!! تم ايقاف حساب يرجى مراجعة مسؤال النظام";
    const STOP_ACCOUNT_MESSAGE_EN = "Your Account Was Stopped Contact System Administrator !!!";
    const COMPLETE_REGESTRATION_PROCESS = "اكمال عملية التسجيل";
    const COMPLETED_REGESTRATION_PROCESS = "تهانينا لقد تمت عملية التسجيل !";
    const REGISTER = "تسجيل";

    const COMPLETED_REGESTRATION_PROCESS_MESSAGE = "سيقوم مسؤال النظام بتفعيل حسابك بشكل كامل خلال 24 ساعة بعد التأكد من صحة البيانات";
    const THANK_YOU = "شكرا لك لانضمامك الى منصة العطاءات التابعة للكلية الذكية";
    const NEXT = "التالي";

    const SEND_OTP = "ارسال الرمز السري";
    const SEND = "ارسال ";
    const OTP = "الرمز السري";
    const OTP_MESSAGE = "الرمز ا لسري ا لخاص بك ";
    const OTP_ERROR = "'الرمز السري غير صحيح.'";
    const OTP_SUCCESS = "الرمز السري صحيح.";
    const MOBILE_COFIRMED = " !لقد تم تفعيل رقم هاتفك";
    const MOBILE_NOT_COFIRMED = "!رمز التفعيل غير صحيح";
    const MOBILE_NO_ERROR = "رقم التلفون غير صحيح";
    // const MOBILE = "رقم الموبايل";
    const OTP_CAPTION = "ادخل الرمز السري الذي تم ارساله الى الموبايل";
    const COMPLETE_REGESTRATION_PROCESS_EN = "Complete Registration";
    const COMPLETE_REGESTRATION_UPLOAD_MESSAGE = "لاتمام عملية التسجيل يرجع ارفاق الملفات التالية بصيغة PDF او باحدى صيغ الصور JPG, JPEG, PING  ";
    const COMPLETE_REGESTRATION_EMAIL_MESSAGE = "لاتمام عملية التسجيل يرجى تفعيل الايميل";
    const COMPLETE_REGESTRATION_MOBILE_MESSAGE = "لامتام عملية  التسجيل يرجى تفعيل الموبايل ";
    const COMPLETE_REGESTRATION_MOBILE_FORM_MESSAGE = "تفعيل الموبايل";
    const COMPLETE_REGESTRATION_PROCESS_MESSAGE_EN = "Complete Registration";
    const OPERATION_CERTIFICATE = "شهادة مشتغل مرخص";
    const OPERATION_LICENSED = " المشتغل المرخص";
    const OPERATION_CERTIFICATE_EN = "Operation Certifacte";
    const TAX_DEDUCTION_CERTIFICATE = "شهادة خصم المصدر";
    const TAX_DEDUCTION = "خصم المصدر";
    const TAX_DEDUCTION_CERTIFICATE_EN = "TAX Deduction Certificate";
    const CHOOSE_FILE = "ارفق الملف";
    const CHOOSE_FILE_EN = "Choose File";
    const NO_FILE_CHOSEN = "لم يتم ارفاق الملف بعد";
    const NO_FILE_CHOSEN_EN = "No file chosen";
    const UPLOAD = "تحميل";
    const UPLOAD_EN = "Upload";
    // Need Englsih lookup needed 
    const ALERT_FILE_FORMATE_NOT_SUPPORTED = '  <div class="alert alert-warning">
    <strong>انتباه!</strong> نوع الملف غير مدعوم يرجى رفع ملف صورة او بصغيفة PDF</div>';
    const OPERATION_CERTIFACTE_ATTACHMENT_TYPE = '1';
    const TAX_DEDUCTION_ATTACHMENT_TYPE = '2';
    const OffERED_PRICE_ATTACHMENT_TYPE = '3';
    const VALID_EXTENSIONS = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt');
    const UPLOAD_PATH = 'uploads/';
    const DOT = ".";
    const YESANSWER = 'نعم';
    const NOANSWER = 'لا';
    const TRUEANSWER = 'صحيح';
    const FALSEANSWER = 'خطأ';

    const CONFIRM = "تأكيد";
    const RESEND = "اعادة ارسال ";
    const PINNED = "تثبيت";
    const POST = "نشر";

    const URL = "localhost";
    const PROTOCOL = "http://";
    const SIGNATURE = "التوقيع";
    const SIGNATURE_TAG = '<p style="text-align:right"><span style="font-size:20px;dir:rtl">التوقيع</span></p>        <p style="text-align:right"><span style="font-size:24px"><img alt="" src="https://portal.scme.edu.ps/Content/images/Logo.gif" style="border-style:solid; border-width:1px; float:right; height:50px; margin:1px; width:114px" /></span></p><p>';
    const error_Message = '<div id="errorMessage" class="alert alert-warning d-none"></div>';
    const error_Message_tender = '<div id="errorMessageTender" class="alert alert-warning d-none"></div>';
    const error_Message_edit_tender = '<div id="errorMessageEditTender" class="alert alert-warning d-none"></div>';
    const error_Message_apply_tender = '<div id="errorMessageApplyTender" class="alert alert-warning d-none"></div>';
    const error_Message_add_tender = '<div id="errorMessageAddTender" class="alert alert-warning d-none"></div>';

    public function getStatusMessage($status, $message, $other = [])
    {

        $res = [
            'status' => $status,
            'message' => $message
            // $other

        ];
        return $res;
    }












    private $activationMessage;
    private $recoveryMessage;
    private $reassignPasswordMessage;
    private $content;
    private $otp_code;

    function __construct()
    {

    }
    public function getTenderQuestionshtml($model, $tenderModel, $tenderId)
    {

        // echo $tenderId;
        $tender_questions = $tenderModel->getTenderQuestions($tenderId);
        // $this->print_butiful_array($tender_questions);
        $questonBannkArray = [];
        foreach ($tender_questions as $question) {
            $questionPreview = $model->getQuestionById($question['question_bank_id'])->question_preview;
            // array_push($questonBannkArray, $question['question_bank_id']);
            $questonBannkArray[] = $question['question_bank_id'];
            // $this->print_butiful_array($questonBannkArray);
            ?>
            <div class="movable-div<?php echo $question['question_bank_id']; ?>">

                <div class="card rounded-3 text-black mt-2 p-1" style="background-color: rgb(240, 248, 255);">

                    <div class="card-header" style="background-color:#E3E3E3">
                        <button type="button" value="<?PHP echo $tenderId . "-" . $question['question_bank_id'] ?>"
                            class="remove-tender-question<?php echo $question['question_bank_id']; ?> btn btn-danger ">
                            <i class="fas fa-times-circle fa-2x"></i>
                        </button>
                    </div>

                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-lg-4 mx-lg-2">
                                <!-- padding for md is 7 marging left right for md 4 -->
                                <div class="row d-flex justify-content-center align-items-center h-100">
                                    <div class="row">
                                        <div class="col-md-12 mb-1">
                                            <?php echo $questionPreview; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?PHP
            // $init->print_butiful_array($questionPreview);
            // echo "<p>" . $question['question_bank_id'] . "</p>";
        }
        echo '<input type="hidden" name="" id="bank-question-ids' . $tenderId . '" value="' . implode(",", $questonBannkArray) . '">';




    }
    public function generateRandomPassword()
    {
        // Define the character sets
        $letters = ['abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'];
        $numbers = ['0123456789'];
        $special = ['!@#$%^&*()_+{}[]\|;:<>?/'];

        // Combine the character sets
        $characters = array_merge($letters, $numbers, $special);

        // Generate a random password
        $password = '';
        for ($i = 0; $i < 8; $i++) {
            $password .= $characters[rand(0, count($characters) - 1)];
        }

        // echo the password
        echo $password;
    }
    function menuItem3($link, $icon, $title, $id, )
    {
        $link = "";
        //onclick="btnclick(\'' . $updateFile . '\')"
        return ' <a id="' . $link . '" class="nav-link8" href ="#" onclick="menubtnclick(\'' . $link . '\')">
        <div class="sb-nav-link-icon"><i class="' . $icon . '"></i></div>
        ' . $title . '</a>';
    }
    function menuItem($link, $icon, $title, $id, )
    {
        $a = 'x';
        //onclick="btnclick(\'' . $updateFile . '\')"
        return ' <a  id="' . $link . '" class="nav-link" href="?content=' . $link . '" onclick1="menubtnclick(\'' . $link . '\')">
        <div class="sb-nav-link-icon"><i class="' . $icon . '"></i></div>
        ' . $title . '</a>';
    }

    function userAction($action, $id, $admin, $userStatus, $icon)
    {
        //onclick="btnclick(\'' . $updateFile . '\')"
        return ' <button type="button" class="btn btn-link link-dark btn-sm  p-1"  onclick="actionclick(\'' . $action . '\',\'' . $id . '\',\'' . $admin . '\',\'' . $userStatus . '\')">
        <i class="' . $icon . ' " aria-hidden="true"></i></a>';




    }
    //   <a href="#" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-1"></i></a>
    function add_attachment($member, $attachmentType, $path, $memberID)
    {
        $member->addAttachment($attachmentType, $path, $memberID);

        header("Location:main.php");



    }
    function get_current_file_url($Protocol = 'http://', $dir = __DIR__)
    {
        $dir = str_replace("\\", "/", $dir);
        // echo $dir;
        $rootDirectory = str_replace("\\", "/", $_SERVER['DOCUMENT_ROOT']);
        return $Protocol . $_SERVER['HTTP_HOST'] . str_replace($rootDirectory, '', $dir);
    }
    function delete_attachment($member, $fileType, $path, $memberID, $attachment_file)
    {
        $fileName = '';
        if ($fileType == '1') {
            $fileName = $this::OPERATION_CERTIFICATE;
        } elseif ($fileType == '2') {
            $fileName = $this::TAX_DEDUCTION_CERTIFICATE;
        } elseif ($fileType == '3') {
            $fileName = $this::OffERED_;

        }

        // echo '<script>alert(\`hi\')</script>';
        //unlink($path . "/" . $fileName . $this::DOT . $this->getUploadedFileExt($path, $fileName));
        unlink($path . "/" . $attachment_file);
        // }
        header("Location:main.php");



    }
    public function checkIfFileExist($path, $type)
    {
        $file_exist = false;

        foreach ($path as $file) {
            if ($file->isDot())
                continue;
            //print $file->getFilename() . '<br>';
            $x = explode(".", $file->getFilename());
            //print($x[0]);
            if ($type == $x[0]) {
                $file_exist = true;
            }
        }
        return $file_exist;
    }
    public function getUploadedFileByType($path, $type)
    {
        $file_exist = '';

        foreach ($path as $file) {
            if ($file->isDot())
                continue;
            //print $file->getFilename() . '<br>';
            $x = explode(".", $file->getFilename());
            //print($x[0]);
            if ($type == $x[0]) {
                $file_exist = $file->getFilename();
                return $file_exist;
            }
        }
        return $file_exist;
    }
    public function getUploadedFileExt($path, $fileName)
    {
        $file_ext = '';

        foreach ($path as $file) {
            if ($file->isDot())
                continue;
            //print $file->getFilename() . '<br>';
            $x = explode(".", $file->getFilename());
            //print($x[0]);
            if ($fileName == $x[0]) {
                $file_ext = $x[1];
            }
        }
        return $file_ext;
    }

    public function password_generate($chars)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
    }
    public function crypto($token)
    {
        $account = crypt($token, 'NJ');
        $account = str_replace(".", "", $account);
        $account = str_replace("/", "", $account);
        $account = str_replace("\\", "", $account);
        $account = strtolower($account);
        return $account;

    }

    public function activationMessage()
    {
        $this->activationMessage = '<div dir="rtl"><p style="text-align:right"><span style="font-size:22px;dir:rtl"> مرحبا بك السيد <span style="font-size:22px;dir:rtl">: </span>&lt;&lt;name&gt;&gt;</span></p>
        <p style="text-align:right"><span style="font-size:24px;dir:rtl">رمز الحساب الخاص بك هو </span><strong><span style="font-size:20px;dir:rtl">&lt;&lt;code&gt;&gt;</span></strong></p>

        <p style="text-align:right"><span style="font-size:20px;dir:rtl">&nbsp; هذا البريد الاكتروني ارسل لك من منصة العطائات التابعة للكلية الذكية للتعليم الحديث&nbsp; لاكمال اجراءات التسجيل والتحقق من البريد الاكتروني&nbsp;</span></p>
        
        
        <p style="text-align:right"></p>
        
        <p style="text-align:right"><span style="font-size:20px;dir:rtl"><strong>لتفعيل الايميل الاكتروني يرجى الضغط على هذا البرابط <a href="http://localhost/tender_scme/?token=&lt;&lt;token&gt;&gt;">الى صفحة الكلية الذكية</a></strong></span></p></div>
       

        <p style="text-align:right"></p>';


        return $this->activationMessage;
    }
    public function recoveryMessage()
    {
        $this->recoveryMessage = '<div dir="rtl"><p style="text-align:right"><span style="font-size:22px;dir:rtl"> مرحبا بك السيد <span style="font-size:22px;dir:rtl">: </span>&lt;&lt;name&gt;&gt;</span></p>
        <p style="text-align:right"><span style="font-size:24px;dir:rtl">رمز الحساب الخاص بك هو </span><strong><span style="font-size:20px;dir:rtl">&lt;&lt;code&gt;&gt;</span></strong></p>

        <p style="text-align:right"><span style="font-size:20px;dir:rtl">&nbsp; هذا البريد الاكتروني ارسل لك من منصة العطائات التابعة للكلية الذكية للتعليم الحديث&nbsp; لاستعادة كلمة المرور&nbsp;</span></p>
        
        
        <p style="text-align:right"></p>
        
        <p style="text-align:right"><span style="font-size:20px;dir:rtl"><strong>لاستعادة البريد الاكتروني يرجى الضغط على هذا الرابط <a href="http://localhost/tender_scme/?pwd=&lt;&lt;token&gt;&gt;">الى صفحة الكلية الذكية</a></strong></span></p></div>
      

        <p style="text-align:right">&nbsp;</p>';

        return $this->recoveryMessage;
    }
    public function reassignPasswordMessage()
    {
        $this->reassignPasswordMessage = '<div dir="rtl"><p style="text-align:right"><span style="font-size:22px;dir:rtl"> مرحبا بك السيد <span style="font-size:22px;dir:rtl">: </span>&lt;&lt;name&gt;&gt;</span></p>
        <p style="text-align:right"><span style="font-size:24px;dir:rtl">رمز الحساب الخاص بك هو </span><strong><span style="font-size:20px;dir:rtl">&lt;&lt;code&gt;&gt;</span></strong></p>
        <p style="text-align:right"><span style="font-size:24px;dir:rtl">كلمة المرور الخاصة بك </span><strong><span style="font-size:20px;dir:rtl">&lt;&lt;OTP&gt;&gt;</span></strong></p>

        <p style="text-align:right"><span style="font-size:20px;dir:rtl"><strong> <a href="http://localhost/tender_scme/">الى صفحة الكلية الذكية</a></strong></span></p></div>
        
        
        <p style="text-align:right"></p>
        

        <p style="text-align:right">&nbsp;</p>';

        return $this->reassignPasswordMessage;
    }

    public function content()
    {
        $this->content = '<div dir="rtl"><p style="text-align:right"><span style="font-size:22px;dir:rtl"> مرحبا بك السيد <span style="font-size:22px;dir:rtl">: </span>&lt;&lt;name&gt;&gt;</span></p>
        <p style="text-align:right"><span style="font-size:24px;dir:rtl">رمز الحساب الخاص بك هو </span><strong><span style="font-size:20px;dir:rtl">&lt;&lt;code&gt;&gt;</span></strong></p>

        <p style="text-align:right"><span style="font-size:20px;dir:rtl">&lt;&lt;content&gt;&gt;</span></p>
        <p style="text-align:right"><span style="font-size:20px;dir:rtl"><strong> <a href="http://localhost/tender_scme/">الى صفحة الكلية الذكية</a></strong></span></p></div>

        
        
        <p style="text-align:right"></p>
        

        <p style="text-align:right">&nbsp;</p>';

        return $this->content;
    }
    public function file_format_notSupported($file)
    {
        return "  <div class='alert alert-warning'>
        <strong>انتباه!</strong> الملف $file نوع الملف غير مدعوم يرجى رفع ملف صورة او بصغيفة PDF </div>";
    }
    public function file_preview($ext, $path, $final_file, $fileType)
    {
        $updateFile = '';
        $deleteFile = '';
        $ext_image = strtolower($ext) == "pdf" ? "../assets/images/pdf.png" : $path . $final_file;
        if ($fileType == '1') {
            $updateFile = 'confirm_uploaded_oc.php';
            $deleteFile = 'delete_uploaded_oc.php';
        } elseif ($fileType == '2') {
            $updateFile = 'confirm_uploaded_td.php';
            $deleteFile = 'delete_uploaded_td.php';
        } elseif ($fileType == '3') {
            $updateFile = 'confirm_uploaded_of.php';
            $deleteFile = 'delete_uploaded_of.php';

        }
        return '
       <a href="#"
                onClick="window.open(\'' . $path . $final_file . '\',\'windowname\',\' width=400,height=200,scrollbars=yes\'); return false;">
                <figure><img src="' . $ext_image . '" style=\'width:50px; height:50px\' />
                    <figcaption>' . $final_file .
            '</figcaption>
                </figure>
            </a>
         <a class="btn btn-success" href="#" onclick="btnclick(\'' . $updateFile . '\')">' . $this::CONFIRM . '</a>
            <a class="btn btn-warning" href="#" onclick="btnclick(\'' . $deleteFile . '\')">' . $this::DELETE . '</a>
             ';


    }
    public function send_verification_email($email, $member_id, $username, $fname)
    {
        $token = md5($email . $member_id) . "&username=" . $username;
        $content = $this->activationMessage() . $this::SIGNATURE_TAG;
        $content = str_replace("&lt;&lt;name&gt;&gt;", $fname, $content);
        $content = str_replace("&lt;&lt;code&gt;&gt;", $username, $content);
        $content = str_replace("&lt;&lt;token&gt;&gt;", $token, $content);
        $sent = $this->send_email(from: $this::ADMIN_EMAIL, from_name: $this::SENDER_NAME, to: $email, recipient_name: $fname, subject: $this::ACTIVATIO_EMAIL_SUBJECT, content: $content);
        return $sent;

    }
    public function sendRecoveryEmail($email, $token, $username, $fname)
    {
        // $token = md5($email . $member_id) . "&username=" . $username;
        $content = $this->recoveryMessage() . $this::SIGNATURE_TAG;

        $content = str_replace("&lt;&lt;name&gt;&gt;", $fname, $content);
        $content = str_replace("&lt;&lt;code&gt;&gt;", $username, $content);
        $content = str_replace("&lt;&lt;token&gt;&gt;", $token, $content);
        $sent = $this->send_email(from: $this::ADMIN_EMAIL, from_name: $this::SENDER_NAME, to: $email, recipient_name: $fname, subject: $this::RECOVERY_EMAIL_SUBJECT, content: $content);
        return $sent;

    }
    public function sendReassignPasswordEamil($email, $member_id, $username, $fname, $OTP)
    {
        // $token = md5($email . $member_id) . "&username=" . $username;
        $content = $this->reassignPasswordMessage() . $this::SIGNATURE_TAG;

        $content = str_replace("&lt;&lt;name&gt;&gt;", $fname, $content);
        $content = str_replace("&lt;&lt;code&gt;&gt;", $username, $content);
        $content = str_replace("&lt;&lt;OTP&gt;&gt;", $OTP, $content);
        $sent = $this->send_email(from: $this::ADMIN_EMAIL, from_name: $this::SENDER_EMAIL, to: $email, recipient_name: $fname, subject: $this::REASSIGN_PASSWORD_SUBJECT, content: $content);
        return $sent;

    }
    public function sendEmail($email, $member_id, $username, $fname, $contentMsg, $subject)
    {
        $content = $this->content() . $this::SIGNATURE_TAG;

        $content = str_replace("&lt;&lt;content&gt;&gt;", $contentMsg, $content);
        $content = str_replace("&lt;&lt;name&gt;&gt;", $fname, $content);
        $content = str_replace("&lt;&lt;code&gt;&gt;", $username, $content);
        $sent = $this->send_email(from: $this::ADMIN_EMAIL, from_name: $this::SENDER_EMAIL, to: $email, recipient_name: $fname, subject: $subject, content: $content);
        return $sent;
    }

    public function send_email(string $from, string $from_name, string $to, string $recipient_name, string $subject, string $content)
    {
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->Mailer = "smtp";

        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = TRUE;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "gnidal@gmail.com";
        $mail->Password = "rfhudzvmsuouzfcc";

        $mail->IsHTML(true);
        $mail->AddAddress($to, $recipient_name);
        $mail->SetFrom($from, $from_name);
        //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
        //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
        $mail->Subject = $subject;
        // $content = $content;

        $mail->SMTPOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true,
            ]
        ];

        $mail->MsgHTML($content);
        if (!$mail->Send()) {
            echo "Error while sending Email.";
            var_dump($mail);
        } else {
            //echo "Email sent successfully";
            return 0;
        }
        return 1;

    }
    public function print_butiful_array($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";




    }

    public function getTimeDefferencet($datetime)
    {

        $requtesTime = $datetime->getTimestamp();
        $current_time_stamp = time();
        $timeDiff = $current_time_stamp - $requtesTime;
        // echo $timeDiff;
        return $timeDiff;
    }

    /**
     * @return mixed
     */
    public function getOtp_code()
    {
        return $this->otp_code;
    }

    /**
     * @param mixed $otp_code 
     * @return self
     */
    public function setOtp_code(): self
    {
        $this->otp_code = rand(100000, 999999);
        return $this;
    }
    public function getShortQuestion($id)
    {

        return '<div class="row">
        <div class="col-md-12 mb-1">
          <div class=" form-control" style="border: 1px solid #ccc;
          border-radius: 4px;
          padding: 8px 12px;
          font-size: 16px;
          width: 100%;">

          

            <input required name="answer' . $id . '" id="answer' . $id . '" class="form-control" 
              placeholder= "" type="text">


          </div>
        </div>
      </div>';


    }
    public function getEssayQuestion($id)
    {

        return '<div class="row">
        <div class="col-md-12 mb-1">
          <div class="form-group">

          

              <label for="answer' . $id . '">Comments</label>
                <textarea required class="form-control rounded-2" id="answer' . $id . '" name="answer' . $id . '" rows="3" placeholder="Write your comments here..."></textarea>
        


          </div>
        </div>
      </div>';


    }
    public function getOddQuestion($id, $radio1, $radio2)
    {

        return '<div class="row">
    <div class="col-md-12 mb-1">
        <div class="form-group">
            <input required type="radio" name="answer' . $id . '" id="true" value="' . $radio1 . '" class="form-check-input">
            <label class="form-check-label" for="true">' . $radio1 . '</label>
        </div>
        <div class="form-group">
            <input required type="radio" name="answer' . $id . '" id="false" value="' . $radio2 . '" class="form-check-input">
            <label class="form-check-label" for="false">' . $radio2 . '</label>
        </div>
    </div>
</div>';


    }
    public function getMulipleQuestion($id, $answers, $multiple = false)
    {
        $answerArray = json_decode($answers);
        $answer = '';
        $type = $multiple ? 'checkbox' : 'radio';

        foreach ($answerArray as $key => $value) {
            $answer .= '<div class="form-group">
           <input type="' . $type . '" name="answer' . $id . '[]" id="answer' . $id . '_' . $key . '" value="' . $value . '" class="form-check-input form-check-inline">
           <label class="form-check-label" for="answer' . $id . '_' . $key . '">' . $value . '</label>
         </div>';
        }
        // str_replace('question[]', 'question[' . $id . ']', $answer);
        $questionPreview = '<div class="row">
        <div class="col-md-12 mb-1">
        ' . $answer . '     
          
        </div>
      </div>';
        return $questionPreview;


    }
    //Question Bank Related Methods
    public function getQuestionPreview($id, $questionTitle, $questionType, $questionTypeCode, $questionAnswers)
    {

        //print_r($questionAnswers);
        $question = '<h5>' . $questionTitle . '<span dir="rtl"> ؟</span>' . '</h5>';
        switch ($questionTypeCode->question_type_code) {
            case 'Short'; // short answer
                $question .= $this->getShortQuestion($id);
                break;
            case 'T/F'; //muliple choice
                $question .= $this->getOddQuestion($id, $this::TRUEANSWER, $this::FALSEANSWER);
                break;
            case 'Y/N'; // True false
                $question .= $this->getOddQuestion($id, $this::YESANSWER, $this::NOANSWER);
                break;
            case 'MC'; // True false
                $question .= $this->getMulipleQuestion($id, $questionAnswers);
                break;
            case 'MS'; // True false
                $question .= $this->getMulipleQuestion($id, $questionAnswers, true);
                break;
            case 'Essay'; // True false
                $question .= '<textarea name="answer" id="answer" rows="5" cols="50"></textarea>';
                break;
            default;
                $question .= '<input type="text" name="answer' . $id . '" id="answer' . $id . '">';


        }
        // $question .= '<input type="submit" value="Submit">';
        //$question = htmlspecialchars($question, ENT_QUOTES);
        return $question;

    }
    public function checkNullEntries(array $data)
    {
        foreach ($data as $key => $entry) {
            // if ($entry == )
            if ($key != 'tender_id') {
                if ($entry === null or empty($entry)) {
                    return true;
                }
            }
        }
    }
}





?>