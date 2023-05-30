<?PHP
session_start();
require_once('init_user_status.php');
//echo 5;
//$init->print_butiful_array($memberInfo);
$sent = $init->send_verification_email($memberInfo[0]['email'], $memberInfo[0]['member_id'], $username, $memberInfo[0]['name']);
if ($sent == 0) {

    ?>
    <div class="small mb-3 text-muted text-center">
        <?PHP echo $init::ACTIVATIO_EMAIL_RESPONSE;
        // require_once('verify_mobile_form.php');
        ?>.
    </div>
    <?php
}
?>