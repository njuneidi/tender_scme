<?PHP
if (session_status() === PHP_SESSION_NONE) {

    // Start the session
    session_start();
}
use Phppot\Member;
use nidal\Init;

//session_start();
//echo session_id();

require_once __DIR__ . '/lib/Member.php';
require_once __DIR__ . '/Init.php';
if (isset($_GET['pwd'])) {

    $member = new Member();
    $init = new Init();

    //$userID = $_GET['username'];
    $_token = $_GET['pwd'];
    $recoverd = false;
    // $_GET = null;

    $memberInfo = $member->getUserByUserToken($_token);

    // $userInfo = $member->getUserByUserID($memberInfo[0]['user_id']);
    // $userId = $memberInfo[0]['user_id'];

    if (!empty($memberInfo)) {
        $email = $memberInfo[0]['email'];
        $member_id = $memberInfo[0]['member_id'];
        $userID = $memberInfo[0]['user_id'];
        $recoveryRequestTime = $memberInfo[0]['recovery_request_time'];
        $recoverd = $memberInfo[0]['recovery_request'] == 0 ? true : false;


        //  $userId = $memberInfo[0]['user_id'];
        $token = md5($email . $member_id . $recoveryRequestTime);
        // echo $recoveryRequestTime . '<br>';
        // // $update_password_time = $userInfo[0]['update_password_time'];
        // $init->getTimeDefferencet($recoveryRequestTime);
        $datetime = new DateTime($recoveryRequestTime);

        $timeDiff = $init->getTimeDefferencet($datetime);
    } else {
        $token = '';
    }

    if ($recoverd || $_token != $token || $timeDiff > $init::RECOVERY_EXPIRATION_TIMEOUT) {
        // session_destroy();
        $status = '';
        if ($recoverd) {
            $status = $init::RECOVERY_ALREADY_DONE;

        }
        if ($_token != $token) {
            $status .= $init::RECOVERY_NOT_VALID_TOKEN;
        }
        if ($timeDiff > ($init::RECOVERY_EXPIRATION_TIMEOUT)) {
            $status .= $init::RECOVERY_EXPIR;
        }
        $_SESSION['recoveredEmail'] = $status;

        $url = "http://localhost/tender_scme/";
        header("Location: $url");
    }

    require_once 'recover_password_form.php';
} else {
    $userID = $_SESSION['user'][0]['user_id'];
    require_once 'recover_password_form.php';
}
?>