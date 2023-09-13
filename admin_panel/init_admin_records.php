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

$allUsers = $member->getAllUsers();
foreach ($allUsers as $item) {
    if ($item['user_type'] == 2) {
        $users[] = $item;
    } else {
        $members[] = $item;
    }
}
$allUsers = $_GET['content'] === 'users' ? $users : $members;
// $init->print_butiful_array($allUsers);
// foreach ($allUsers as $user) {
//     if($_GET['content']=='users')
// }
// $all_members = $member->