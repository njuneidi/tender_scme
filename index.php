<?php
session_start();
if (!empty($_SESSION['username'])) {
    header("Location:logout.php");
}
use Phppot\Member;
use nidal\Init;

require_once("init.php");
require_once __DIR__ . '/lib/Member.php';

$init = new Init();
$member = new Member();
$verifiedEmail = 0;
//$init->print_butiful_array($_POST);

//echo $_POST['forgot-btn'];

// after verify email
if (isset($_SESSION['verifiedEmail'])) {
    $verifiedEmail = $_SESSION['verifiedEmail'];
    unset($_SESSION['verifiedEmail']);
}
if (isset($_GET['token'])) {
    require_once __DIR__ . '/activation.php';
} elseif (!empty($_POST["login-btn"])) {

    $loginResult = $member->loginMember();
} elseif (!empty($_POST['newPassword'])) {
    //echo $_POST['newPassword'];
    // echo $_POST['userID'];
    $member->updatePassword($_POST['userID'], $_POST['newPassword']);
    $loginResult = $init::PASSWORD_CHANGING_COMPLETED_SUCCSESSFULLY;
    // header("Location:logout.php");
} elseif (!empty($_POST["forgot-btn"])) {
    $memberInfo = $member->getEmail($_POST['inputEmail']);
    if (!empty($memberInfo)) {
        $sent = $init->sendRecoveryEmail($_POST['inputEmail'], $memberInfo[0]['member_id'], $memberInfo[0]['user_id'], $memberInfo[0]['name']);
        $loginResult = ($sent > 1) ? $init::NOT_SENT_EMAIL : $init::FORGOT_EMAIL_RESPONSE;
        //echo $_POST['inputEmail'];
        //echo 55;
        require_once __DIR__ . '/template/login_template_forgot_password_controller.php';
    } else {
        $loginResult = $init::NOT_REGISTER_EMAIL;
    }
} elseif (!empty(($_POST["signup-btn"]))) {

    $signUPArr = $member->createMember();
    if ($signUPArr['status'] == 100) {
        $loginResult = $init::ALREADY_REGISTERED;
    } elseif ($signUPArr['status'] == 0) {
        if (isset($_SESSION['member_id'])) {
            $member_id = $_SESSION['member_id'];
            unset($_SESSION['member_id']);
        }
        $sent = $init->send_verification_email($signUPArr['email'], $member_id, $signUPArr['username'], $signUPArr['fname']);
        $loginResult = ($sent > 1) ? $init::NOT_SENT_EMAIL : $init::REGISTRATION_COMPLETED;
    }

} elseif ($verifiedEmail > 0) {

    if ($verifiedEmail == 1) {
        $loginResult = $init::EMAIL_IS_VERIFIED;

    } elseif ($verifiedEmail == 2) {
        $loginResult = $init::EMAIL_IS_AlREADY_VERIFIED;

    }

}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحة العطاءات الكلية الذكية \ Tender Gate</title>

    <link rel="icon" href="assets/images/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/tender.css">
    <link rel="stylesheet" href="assets/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="assets/css/styles.css" />

    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet"> -->

</head>

<body>

    <div id="signupid">
        <?php
        if (isset($_GET['pwd'])) {
            // $url = "http://localhost/tender_scme/recover_password.php";
            //header("Location: $url");
            require_once __DIR__ . '/recover_password.php';

        } else {
            require_once __DIR__ . '/template/login-template.php';
        }

        ?>
    </div>

    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js.map"></script>
    <script defer src="assets/js/datatables-simple-demo"></script>
    <script src="assets/js/jsscripts.js"></script>
    <script defer src="assets/js/jquery-3.6.4.js"></script>
    <script defer src="assets/js/scripts.js"></script>


</body>

</html>