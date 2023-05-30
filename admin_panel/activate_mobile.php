<?php
session_start();
require('init_user_status.php');

$member->validateMobile($memberInfo[0]['member_id'], 1);
$init->print_butiful_array($memberInfo);
$isMobileVerified = $memberInfo[0]['verified_mobile'] != "0" ? true : false;
echo $memberInfo[0]['verified_mobile'];
$_SESSION['verifiedMobile'] = 1;
//echo $verifiedEmail;
//echo $_SESSION['$verifiedEmail'];
// $url = "index.php?email_verified=" . $verifiedEmail;
//$url = "http://localhost/tender_scme/main.php";
$url = "main.php";
header("Location: $url");