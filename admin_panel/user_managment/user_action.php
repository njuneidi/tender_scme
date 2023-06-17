<?PHP
use Phppot\Member;
use nidal\Init;

//session_start();
//echo session_id();

require_once '../../lib/Member.php';
require_once '../../Init.php';

//require_once("init.php");
$member = new Member();

$init = new Init();
if (isset($_POST['save_user'])) {
    require_once 'add_user_action.php';
}
if (isset($_GET['user_id'])) {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'reset') {
            require_once 'reset_password_user_action.php';
            return;
        }

        if ($_GET['action'] == 'sendEamil') {
            require_once 'send_email_user_action.php';
            return;
        }

    }

    require_once 'edit_user_action.php';
}
if (isset($_POST['update_user'])) {
    require_once 'update_user_action.php';
}
if (isset($_POST['reset_password_form'])) {
    require_once 'reset_password_user_action.php';
}
if (isset($_POST['reset_password_btn'])) {
    require_once 'reset_password_user_action.php';
}
if (isset($_POST['resetBtn'])) {
    require_once 'reset_password_user_action.php';
}
if (isset($_POST['send_email'])) {
    require_once 'send_email_user_action.php';
}

if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'];
    $isAdminUser = $_POST['admin'];
    $userStatus = $_POST['userStatus'] < 4 ? 4 : 3;
    switch ($action) {
        case 'edit':
            # code...
            break;
        case 'delete':
            $memberDeleted = $member->deletUserByCallFunction($id);
            $memberDeleted ?

                $res = [
                    'status' => 0,
                    'message' => $init::USER_DELETED . $id,
                    'data' => $memberDeleted
                ] :


                $res = [
                    'status' => 500,
                    'message' => $init::USER_NOT_DELETED,
                    'data' => $memberDeleted
                ];




            echo json_encode($res);
            return;
        // break;
        case 'activate':
            $member->updateUserStatus($id, $userStatus);


            break;
        case 'reset':
            # code...
            break;

        default:
            # code...
            break;
    }
}
?>