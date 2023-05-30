<?PHP
session_start();
use nidal\Init;

require_once '../init.php';
$init = new Init();

?>

<style></style>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">
                                    <?PHP echo $init::PASSWORD_RECOVERY ?>
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="small mb-3 text-muted">
                                    <?PHP echo $init::PASSWORD_RECOVERY_MESSAGE ?>
                                </div>
                                <form name="fp" action="" method="post" class="m-1 ">
                                    <div class=" form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="inputEmail" type="email"
                                            required placeholder="name@example.com" />
                                        <label for="inputEmail" style="float:right;display:block">
                                            <?PHP echo $init::EMAIL ?>
                                        </label>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <a class="small" href="index.php">
                                            <?PHP echo $init::RETRURN_TO_LOGIN_PAGE ?>
                                        </a>
                                        <!-- <a class="btn btn-primary" href="#"
                                onclick="reoveryEamil('login_template_forgot_password.php')">
                                <?PHP echo $init::RESET_PASSWPRD ?>
                            </a> -->
                                        <input name="forgot-btn" type="submit" class="btn btn-primary" value="  <?PHP echo $init::RESET_PASSWPRD ?>"
                                          >
                                      

                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <!-- <div class="small"><a href="register.html">Need an account? Sign up!</a></div> -->
                                <div class="d-flex justify-content-center">
                                    <div class="text-primary small">
                                        <?PHP $init::DONT_HAVE_ACCOUNT ?>
                                        <a href="#" id="sign_up" onclick="signup('template/login-template44.php')">
                                            <?PHP echo $init::REGISTER ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>