<?PHP
$username = $_POST['username'];
$email = $_POST['m-email'];
$fname = $_POST['fname'];

$password = $_POST['newPassword'];
$user = array();
$user['username'] = $username;
$user['email'] = $email;
$user['fname'] = $fname;
$user['password'] = $password;
$user['user_status'] = 3;
$user['user_type'] = 2;

if ($fname == NULL || $email == NULL || $username == NULL) {
    $res = [
        'status' => 422,
        'message' => 'All fields are mandatory'
    ];
    echo json_encode($res);
    return;
}
$userRecord = $member->getUser($username);
if (!empty($userRecord)) {
    $res = [
        'status' => 423,
        'message' => $username . $init::TAB . $init::ALREADY_REGISTERED
    ];
    echo json_encode($res);
    return;
}
$no = $member->addMember($user);

($no) > 0 ?
    $res = [
        'status' => 0,
        'message' => $init::USER_CREATED
    ] :


    $res = [
        'status' => 500,
        'message' => $init::USER_NOT_CREATED
    ];

echo json_encode($res);
return;

?>