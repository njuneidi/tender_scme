<?PHP

$res = [];
if (!empty($_POST)) {
    // $password = $_POST['resetPassword'];
    $userID = $_POST['send_email_user_id'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    // $email = $_POST['r-email'];
    //$user = array();
    // $user['password'] = $password;
    $user['user_id'] = $userID;
    $user['message'] = $message;
    if ($userID == null || $message == null || $subject == null) {
        $res = [
            'status' => 422,
            'message' => $init::ALL_FIELD_ARE_MANDATORY
        ];
        echo json_encode($res);
        return;
    }


    if (isset($userID)) {
        //$userInfo = $member->getUser($username);
        $userInfo = $member->getUserByUserID($userID);
        // $val = $userInfo[0]['user_type'] > 2 ? 1 : 0;
        $email = $userInfo[0]['email'];
        $member_id = $userInfo[0]['member_id'];
        $username = $userInfo[0]['username'];
        $fname = $userInfo[0]['name'];
        //  $OTP = $password;

        // $user['user_id'] = $userInfo[0]['user_id'];
        // $user['username'] = $userInfo[0]['username'];
        // $user['content'] = $userInfo[0]['content'];
        $sent = $init->sendEmail($email, $member_id, $username, $fname, $message, $subject);
        if ($sent < 2) {
            $res = [
                'status' => 200,
                'message' => $init::SENT_EMAIL,
                'data' => $user
            ];
        } else {
            $res = [
                'status' => 501,
                'message' => $init::NOT_SENT_EMAIL . " " . $sent,
                'data' => $user
            ];
        }
        echo json_encode($res);
        return;


    }
}


$user_id = $_GET['user_id'];
$userInfo = $member->getUserByUserID($user_id);
$user['user_id'] = $userInfo[0]['user_id'];
$user['username'] = $userInfo[0]['username'];
$user['email'] = $userInfo[0]['email'];

$res = [
    'status' => 200,
    'message' => $init::UPDATED_SUCCESSFULLY,
    'data' => $user
];
echo json_encode($res);
return;



?>