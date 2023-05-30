<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

//require ('textlocal.class.php');
//echo "controller";
class Controller
{
    function __construct()
    {
        $this->processMobileVerification();


    }
    function getOpt()
    {
        return rand(100000, 999999);
    }
    function processMobileVerification()
    {
        // echo $_POST['action'];
        // echo json_encode(array("type" => "success", "message" => "Your mobile number is verified!"));
        require_once('init_user_status.php');
        $member_id = $memberInfo[0]['member_id'];
        //  echo $member_id;
        //$init->print_butiful_array($memberInfo);
        //$init->print_butiful_array($_POST);
        switch ($_POST["action"]) {
            case "send_otp":
                // $init->print_butiful_array($_POST);
                $mobile_number = $_POST['mobile_number'];

                // $apiKey = urlencode('YOUR_API_KEY');
                //$Textlocal = new Textlocal(false, false, $apiKey);

                $numbers = array(
                    $mobile_number
                );
                $sender = 'SCME';
                //$otp = rand(100000, 999999);
                $otp = $this->getOpt();
                //echo $otp;
                //                $init::OTP;
                $_SESSION['session_otp'] = $otp;
                $message = $init::OTP_MESSAGE . $init::TAB . "  " . $otp;
                // validation reqired for mobile no
                if (!empty($_POST['mobile_number'])) {
                    $member->updateMobile($member_id, $_POST['mobile_number'], $otp);


                }
                // send otp


                // echo $message;
                try {
                    //$response = $Textlocal->sendSms($numbers, $message, $sender);
                    require_once("mobile_verification_response_form.php");
                    exit();
                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }
            // break;

            case "verify_otp":
                // require_once('init_user_status.php');
                // $init->print_butiful_array($_POST);
                $otp = $_POST['mobile_otp'];

                //echo "dddd";
                //  if ($otp == $_SESSION['session_otp']) {
                if ($otp == $savedOTP) {
                    unset($_SESSION['session_otp']);
                    echo json_encode(array("type" => "success", "message" => $init::MOBILE_COFIRMED));

                } else {
                    echo json_encode(array("type" => "error", "message" => $init::MOBILE_NOT_COFIRMED));
                }

            // break;
        }
    }
}
$controller = new Controller();
?>