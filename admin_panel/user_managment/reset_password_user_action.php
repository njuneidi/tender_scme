<?PHP
session_start();

$res = [];
if (!empty($_POST)) {
    // if (isset($_POST['reset_user_id'])) {
    //     $res = [
    //         'status' => 422,
    //         'message' => $init::ALL_FIELD_ARE_MANDATORY
    //     ];
    //     echo json_encode($res);
    //     return;
    // }
    $password = isset($_POST['resetPassword']) ? $_POST['resetPassword'] : $init->password_generate(7);
    $confirmPassword = isset($_POST['confirmResetPassword']) ? $_POST['confirmResetPassword'] : $password;
    $userID = $_POST['reset_user_id'];
    //$user = array();
    $user['password'] = $password;
    $user['user_id'] = $userID;

    if (isset($userID)) {
        //$userInfo = $member->getUser($username);
        $userInfo = $member->getUserByUserID($userID);
        $val = $_SESSION['user'][0]['user_type'] > 1 ? 1 : 0;
        $email = $userInfo[0]['email'];
        $member_id = $userInfo[0]['member_id'];
        $username = $userInfo[0]['username'];
        $fname = $userInfo[0]['name'];
        $OTP = $password;

        $user['user_id'] = $userInfo[0]['user_id'];
        $user['username'] = $userInfo[0]['username'];
        if (isset($_POST['reset_password_form']))
            if (($_POST['reset_password_form'])) {
                if ($_POST['resetPassword'] == null || $_POST['confirmResetPassword'] == null) {
                    $res = [
                        'status' => 422,
                        'message' => $init::ALL_FIELD_ARE_MANDATORY
                    ];
                    echo json_encode($res);
                    return;
                }
            }

        $sent = $init->sendReassignPasswordEamil($email, $member_id, $username, $fname, $OTP);
        if ($sent < 2) {
            $member->updatePassword($userID, $password, $val, 0) ?
                $res = [
                    'status' => 200,
                    'message' => $init::UPDATED_PASSWORD_SUCCESSFULLY,
                    'data' => $_POST
                ] :
                $res = [
                    'status' => 500,
                    'message' => $init::DOESNOT_UPDATE_PASSWORD_SUCCESSFULLY,
                    'data' => $user
                ];
        } else {
            $res = [
                'status' => 501,
                'message' => $init::NOT_SENT_EMAIL . " " . $sent,
                'data' => $user
            ];
        }


    }
}




if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $userInfo = $member->getUserByUserID($user_id);
    $user['user_id'] = $userInfo[0]['user_id'];
    $user['username'] = $userInfo[0]['username'];

    $res = [
        'status' => 200,
        'message' => $init::UPDATED_SUCCESSFULLY,
        'data' => $user
    ];

}
echo json_encode($res);
return;



?>