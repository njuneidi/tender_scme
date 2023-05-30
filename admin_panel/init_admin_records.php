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
// $all_members = $member->