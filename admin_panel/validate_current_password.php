<?PHP
session_start();
require_once('init_user_status.php');
$init->print_butiful_array($_POST);
// $currentPassword = $memberRecord[0]['password'];
// if (!empty($_POST['currentPassword'])) {

//     $password = PASSWORD_HASH($_POST["currentPassword"], PASSWORD_DEFAULT);
//     if (password_verify($_POST["currentPassword"], $hashedPassword)) {
//         echo "hi";
//     } else {
//         echo 'nothi';
//     }
// }

?>