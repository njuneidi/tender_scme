<?PHP
use Phppot\Member;
use nidal\Init;

//session_start();
//echo session_id();

require_once __DIR__ . '/lib/Member.php';
require_once __DIR__ . '/Init.php';

//require_once("init.php");
$member = new Member();
$init = new Init();
$init->print_butiful_array($_POST);
?>