<?PHP
//print_r($_SESSION);
if (empty($_SESSION)) {
    header('location:../index.php');
}
use Phppot\Member;
use nidal\Init;

require_once '../init.php';
require_once '../lib/Member.php';
$member = new Member();
$memberInfo = null;
$init = new Init();
$username = $_SESSION['user']['0']['username'];
$memberRecord = $member->getUser($username);


$isAdmin = $memberRecord[0]['user_type'] == '2' ? true : false;
$isSuperAdmin = $memberRecord[0]['super_admin'] == '1' ? true : false;
$isUser = $memberRecord[0]['user_type'] == '1' ? true : false;
$isNewUser = $memberRecord[0]['user_status'] == '1' ? true : false;
$isCompletedUser = $memberRecord[0]['user_status'] == '2' ? true : false;
$isActiveUser = $memberRecord[0]['user_status'] == '3' ? true : false;
$isStoppedUser = $memberRecord[0]['user_status'] == '4' ? true : false;
$user_code = $memberRecord[0]['user_id'];
// Get User Status 
$status = "";
$userStatus = 1;
if (!$isAdmin) {
    $userStatus = 0;
    if ($isCompletedUser) {
        $userStatus = 2;
    } elseif ($isActiveUser) {
        $userStatus = 3;
    } elseif ($isStoppedUser) {
        $userStatus = 4;
    } elseif ($isNewUser) {
        $userStatus = 1;
    }
}
// echo $userStatus;
$status = (!empty($member->getUserStatus($userStatus))) ? $member->getUserStatus($userStatus) : "new";
// echo $status;
$statusArabic = $status[0]['user_status_arabic'];
$status = $status[0]['user_status_code'];


if (!empty($username)) {

    if (!empty($user_code)) {
        $memberInfo = $member->getMemberByUserID($user_code);
    }
} else {
    header("Location:logout.php");
}
// $memberInfo = $member->getMemberByUserID($user_code);
if (!empty($memberInfo)) {
    $isEmailVerified = $memberInfo[0]['verified_email'] != "0" ? true : false;
    $isMobileVerified = $memberInfo[0]['verified_mobile'] != "0" ? true : false;

    $savedOTP = (!empty($memberInfo[0]['otp'])) ? $memberInfo[0]['otp'] : "notsent";
}

?>