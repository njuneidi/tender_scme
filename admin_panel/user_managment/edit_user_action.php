<?PHP
$user_id = $_GET['user_id'];
$userInfo = $member->getUserByUserID($user_id);

(!empty($userInfo)) ?

    $res = [
        'status' => 200,
        'message' => $init::DONE,
        'data' => $userInfo[0]
    ] :
    $res = [
        'status' => 404,
        'message' => $init::DOESNOT,
        'data' => []
    ];

echo json_encode($res);
return;

?>