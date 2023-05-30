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
if (isset($_POST['action'])) {
    $action = $_POST['action'];
    $id = $_POST['id'];
    $isAdminUser = $_POST['admin'];
    $userStatus = $_POST['userStatus'] < 4 ? 4 : 3;
    switch ($action) {
        case 'add':
            # code...
            break;

        default:
            # code...
            break;
    }
}
?>