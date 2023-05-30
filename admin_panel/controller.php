<?PHP
require_once('init_user_status.php');
$otp = $_POST['mobile_otp'];

//echo "dddd";
if ($otp == $savedOTP) {
    //if ($otp == $savedOTP) {
    unset($_SESSION['session_otp']);
    echo json_encode(array("type" => "success", "message" => "Your mobile number is verified!"));
} else {
    echo json_encode(array("type" => "error", "message" => "Mobile number verification failed"));
}
?>