<?php
use Phppot\Member;
use nidal\Init;

//session_start();
//echo session_id();

require_once __DIR__ . '/lib/Member.php';
require_once __DIR__ . '/Init.php';

//require_once("init.php");
$member = new Member();
$init = new Init();

//$memberInfo = $member->getMember($_GET['member_id']);
$userInfo = $member->getUser($_GET['username']);
$memberInfo = $member->getMemberByUserID($userInfo[0]['user_id']);
$init->print_butiful_array($userInfo);
$init->print_butiful_array($memberInfo);
$init->print_butiful_array($_POST);
//print($_GET['token'] . '<br>');
//print(md5($memberInfo[0]['email'] . $memberInfo[0]['member_id']) . '<br>');
$isEmailTokenVerified = !strcmp($_GET['token'], md5($memberInfo[0]['email'] . $memberInfo[0]['member_id'])) ? true : false;
$isEmailVerified = $memberInfo[0]['verified_email'] != "0" ? true : false;
$verifiedEmail = 0;
if ($isEmailTokenVerified) {

    if (!$isEmailVerified) {

        $member->validateEmail($memberInfo[0]['member_id'], 1);

        $verifiedEmail = 1;
    } else {
        $verifiedEmail = 2;
    }


}
$_SESSION['verifiedEmail'] = $verifiedEmail;
//echo $verifiedEmail;
//echo $_SESSION['$verifiedEmail'];
// $url = "index.php?email_verified=" . $verifiedEmail;
$url = "http://localhost/tender_scme/";
header("Location: $url");