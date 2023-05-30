<?PHP
use Phppot\Member;
use nidal\Init;

//session_start();
//echo session_id();

require_once __DIR__ . '/lib/Member.php';
require_once __DIR__ . '/Init.php';

//require_once("init.php");
$member = new Member();
$init = new Init();
// $init->print_butiful_array($_POST);
//require_once('admin_panel/change_password.php');
$userID = $_GET['username'];
$_token = $_GET['pwd'];
// $_GET = null;
$memberInfo = $member->getMemberByUserID($userID);
$userInfo = $member->getUser($memberInfo[0]['user_id']);
$email = $memberInfo[0]['email'];
$member_id = $memberInfo[0]['member_id'];
$userId = $memberInfo[0]['user_id'];
$token = md5($email . $member_id);
$update_password_time = $userInfo[0]['update_password_time'] ;
$current_time_stamp = time();
//echo $update_password_time;
//echo "<br>".$current_time_stamp;
//echo $token;
//echo"<br>".$token;
//$token = $memberInfo[0]['member_id']
if ($_token != $token  ) {
    header('Location: logout.php');
    //  exit;
} else {

    ?>
  
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">
                                <?PHP echo $init::CHANGE_PASSWORD . $init::TAB;
                                //echo $memberRecord[0]['password'];
                                //$init->print_butiful_array($memberRecord);
                                ?>

                            </h3>
                            <div class="small mb-3 text-muted">
                                <?PHP echo $init::WELCOM_MESSAGE . $init::TAB . $init::PASSWORD_RULES ?>.

                            </div>
                        </div>

                        <div id="valid-msg" class="validation-message text-center">
                            <!-- <?php if (isset($message)) {
                                echo $message;
                            } ?> -->
                        </div>

                        <div class="card-body p-lg-4 mx-lg-2 bg1-info">
                            <form>

                                <!-- <div class="row">
                            <div class="m-1">
                                <label for=<?PHP echo "\"" . $init::CURRENT_PASSWORD . "\"" ?>><?PHP echo $init::CURRENT_PASSWORD . $init::TAB ?></label>
                            </div>
                            <div class="col-md-12 mb-1">
                                <div class="form-group input-group pass_show">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i
                                                class="fa-solid fa-unlock-keyhole m-1 alert-secondary"></i></i>
                                        </span>
                                    </div>
                                    <input name="currentPassword" id="currentPassword" class="form-control"
                                        onchange="validateCurrentPassword('<?PHP echo $currentPassword ?>')"
                                        type="password" value="" placeholder=<?PHP echo "\"" . $init::CURRENT_PASSWORD . "\""; ?>>

                                </div>
                                <div class="currentPasswordMsg">
                                    <?PHP echo $message ?>
                                </div>

                            </div>

                        </div> -->
                                <div class="row">
                                    <div class="m-1">

                                        <label for=<?PHP echo "\"" . $init::NEW_PASSWORD . "\"" ?>><?PHP echo $init::NEW_PASSWORD ?></label>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group input-group pass_show">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-lock m-1 alert-primary"></i>
                                                </span>
                                            </div>
                                            <input name="newPassword" id="newPassword" class="form-control" type="password"
                                                onkeyup="validateNewPassword()" value="" placeholder=<?PHP echo "\"" . $init::NEW_PASSWORD . "\""; ?>>

                                        </div>
                                        <div class="newPasswordMsg"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="m-1">

                                        <label for=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . "\"" ?>><?PHP echo $init::CONFIRM_PASSWORD ?></label>
                                    </div>
                                    <div class="col-md-12 mb-1">
                                        <div class="form-group input-group pass_show">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> <i class="fa fa-lock m-1 alert-success"></i>
                                                </span>
                                            </div>
                                            <input name="confirmPassword" id="confirmPassword" class="form-control"
                                                onkeyup="validateConfirmPassword()" type="password" value=""
                                                placeholder=<?PHP echo "\"" . $init::CONFIRM_PASSWORD . "\""; ?>>

                                        </div>
                                        <div class="confirmPasswordMsg"></div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">

                                    <!-- <div class="col-md-12 mt-3 ">
                                <a class="btn btn-primary" href="#" onclick="changePassword()">
                                    <?PHP echo $init::CHANGE_PASSWORD ?>
                                </a>
                            </div> -->

                                </div>
                                <div class="col-md-12 mt-3 d-flex align-items-center justify-content-between">
                                <a class="" href="index.php">
                                            <?PHP echo $init::RETRURN_TO_LOGIN_PAGE ?>
                                        </a>
                                    <input id="submit" type="button" class="btn btn-success"
                                        value="<?PHP echo $init::CHANGE_PASSWORD ?>"
                                        onclick="recover('<?PHP echo $userId ?>')" />
                                        
                                    <!-- <button type="submit" onclick="return recover('<?PHP echo $userId ?>')"></button> -->
                                </div>

                            </form>


                        </div>

                    </div>
                </div>
            </div>
        </div>
       
        <!-- <script defer src="admin_panel\js\jquery-3.6.4.js"></script> -->
        <!-- <script defer src="admin_panel\js\scripts.js"></script> -->
   
<?PHP } ?>