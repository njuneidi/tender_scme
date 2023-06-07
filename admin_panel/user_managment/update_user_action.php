<?PHP
$username = $_POST['username'];
$email = $_POST['m-email'];
$fname = $_POST['fname'];
$user_id = $_POST['user_id'];

// $password = $_POST['newPassword'];
$user = array();
$user['user_id'] = $user_id;
$user['username'] = $username;
$user['email'] = $email;
$user['name'] = $fname;
// $user['password'] = $password;
// $user['user_status'] = 3;
// $user['user_type'] = 2;

if ($fname == NULL || $email == NULL || $username == NULL) {
    $res = [
        'status' => 422,
        'message' => 'All fields are mandatory'
    ];
    echo json_encode($res);
    return;
}
$userRecord = $member->getUser($username);
if (!empty($userRecord) && ($userRecord[0]['user_id']) != $user_id) {
    $res = [
        'status' => 423,
        'message' => $username . $init::TAB . $init::ALREADY_HAVE_ACCOUNT
    ];
    echo json_encode($res);
    return;
}
$member->updateUser($user) ?
    $res = [
        'status' => 200,
        'message' => $init::UPDATED_SUCCESSFULLY,
        'data' => $user_id
    ] :
    $res = [
        'status' => 500,
        'message' => $init::DOESNOT_UPDATE_SUCCESSFULLY,
        'data' => []
    ];
echo json_encode($res);
return;
// ($no) > 0 ?
//     $res = [
//         'status' => 0,
//         'message' => $init::USER_CREATED
//     ] :


//     $res = [
//         'status' => 500,
//         'message' => $init::USER_NOT_CREATED
//     ];

// echo json_encode($res);
// return;

?>