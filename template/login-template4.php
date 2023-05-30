<?PHP
session_start();
use nidal\Init;

require_once '../init.php';
$init = new Init();


?>
<section style="background-color: #eee;">
  <div class="container py-1 bg1-info ">
    <div class=" bg1-danger row d-flex justify-content-center align-items-center h-100 bg1-primary">
      <div class="col-xl-10 bg1-primary">
        <div class="card rounded-3 text-black m-1 ">
          <div class="row g-0">
            <div class="col-lg-8 bg1-danger">
              <div class="card-body p-lg-4 mx-lg-2 bg1-info">
                <!-- padding for md is 7 marging left right for md 4 -->

                <div class="text-center">
                  <img src="assets/images/logo.png" style="width: 185px;" alt="logo">
                  <!-- <h5 class="mt-1 mb-1 pb-1"> صفحة العطاءات</h4> -->
                </div>

                <div class="text-center text-danger">
                  <?PHP

                  ?>
                </div>

                <form name="login" action="" method="post" class="m-1  bg1-primary"
                  onsubmit="return checkPassword(this)">
                  <p>
                    <?PHP echo $init::PAGE . $init::TAB . $init::THE . $init::REGISTER ?>
                  </p>
                  <!-- row 1 -->
                  <div class="row">
                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group ">

                        <div class="input-group-prepend ">
                          <span class="input-group-text"> <i class="fa fa-user m-1 rq">
                            </i> </span>
                        </div>

                        <input required name="fname" id="fname" class="form-control" id="fullname"
                          placeholder= <?PHP echo $init::DQ.$init::FULL_NAME.$init::DQ  ?> type="text">


                      </div>
                    </div>
                  </div>
                  <!-- End row 1 -->
                  <!-- row 1 -->

                  <div class="row">

                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa-solid fa-building m-1 rq"></i> </span>
                        </div>
                        <input required name="company_name" id="company_name" class="form-control"
                          placeholder =<?PHP echo $init::DQ.$init::COMPANY_NAME.$init::DQ ?> type="text">
                      </div>
                    </div>

                  </div>
                  <!-- End row 1 -->
                  <!-- row 2 -->

                  <div class="row">
                    <div class="col-md-5 mb-1">
                      <div class="form-group input-group ">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa-regular fa-id-card m-1 rq"></i> </span>
                        </div>
                        <input required name="username" id="username" class="form-control"
                          placeholder =<?PHP echo $init::DQ.$init::NO.$init::OPERATION_LICENSED.$init::DQ  ?> type="text">
                      </div>
                    </div>

                    <div class="col-md-7 mb-1">

                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-envelope m-1 rq"></i> </span>
                        </div>
                        <input required name="email" id="email" class="form-control" placeholder=<?PHP echo $init::DQ.$init::EMAIL.$init::DQ  ?> type="email">
                      </div>
                    </div>
                  </div>
                  <!--  End row 2 -->
                  <!-- row - 3 -->
                  <div class="row">
                    <!-- form-group// -->
                    <div class="col-md-6 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-phone m-1"></i> </span>
                        </div>

                        <input name="phone" id="phone" class="form-control" placeholder =<?PHP echo $init::DQ.$init::NO.$init::SPACE.$init::PHONE.$init::DQ  ?> type="text">
                      </div> <!-- form-group// -->
                    </div>
                    <div class="col-md-6 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-mobile m-1 rq "></i> </span>
                        </div>

                        <input name="mobile" id="mobile" class="form-control" placeholder =<?PHP echo $init::DQ.$init::NO.$init::SPACE.$init::MOBILE.$init::DQ  ?> type="text">
                      </div> <!-- form-group// -->
                    </div>


                  </div><!-- form-group// -->
                  <!-- End row - 3  -->
                  <!-- row - 4  -->
                  <div class="row">
                    <div class="col-md-5 mb-1">

                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-city m-1 "></i></span>
                        </div>
                        <input name="city" id="city" class="form-control" placeholder =<?PHP echo $init::DQ.$init::CITY.$init::DQ ?> type="text">
                      </div>
                    </div>

                    <!-- form-group// -->
                    <div class="col-md-7 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class=" fa-solid fa-location-dot m-1"></i> </span>
                        </div>

                        <input name="address" id="address" class="form-control" placeholder=<?PHP echo $init::DQ.$init::ADDRESS.$init::DQ ?> type="text">
                      </div> <!-- form-group// -->
                    </div>



                  </div><!-- form-group// -->
                  <!-- end row - 4  -->
                  <div class="row">
                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-lock m-1 rq"></i> </span>
                        </div>
                        <input name="password" id="password1" class="form-control" placeholder=<?PHP echo $init::DQ.$init::PASSWORD.$init::DQ ?>
                          type="password">
                      </div> <!-- form-group// -->
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group required">
                        <div class="input-group-prepend ">
                          <span class="input-group-text"> <i class="fa fa-lock m-1 rq"></i> </span>
                        </div>
                        <input name="password2" id="password2" class="form-control" placeholder=<?PHP echo $init::DQ.$init::CONFIRM_PASSWORD.$init::DQ ?>
                          type="password">

                      </div> <!-- form-group// -->

                    </div>
                  </div>

<!-- // echo $_SERVER['DOCUMENT_ROOT']."<br>";
// echo __DIR__."<br>";
// echo realpath(__DIR__)."<br>";
// $dir = str_replace("\\","/",realpath(__DIR__));
// echo $dir."<br>";
// echo str_replace($_SERVER['DOCUMENT_ROOT'],"",$dir);

//echo "<br>".$init->get_current_file_url('http://',__DIR__); -->
<!-- <?PHP echo $init->get_current_file_url('http://', __DIR__);?> -->

                  <div class="mb-1">
                    <input class="form-check-input" type="checkbox" value="" id="approved">
                    <label class="form-check-label" for="approved" id="lcb"> <a href="#"
                        onClick="window.open('<?PHP echo $init->get_current_file_url($init::PROTOCOL, __DIR__);?>/rules.php','windowname',' width=400,height=200,scrollbars=yes,status=yes,location=yes,location=yes,top=window.innerHeight-50',left=window.innerHeight-50); return false;">
                        <!-- onClick="window.open('<?PHP echo $init->get_current_file_url($init::PROTOCOL, __DIR__);?>/rules.php'); return false;"> -->
                        <?PHP echo $init::ACCEPT_RULES ?></a></label>

                    <!-- <label class="form-label" for="form2Example11">Username</label> -->
                  </div>


                  <div class="text-center pt-1 mb-1 pb-1">
                    <input type="submit" name="signup-btn" class="btn btn-primary btn-block fa-lg mb-1 p-3"
                      value=<?PHP echo $init::DQ.$init::REGISTER.$init::DQ ?>>
                    <!-- <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-1" type="button">تسجيل</button> -->

                  </div>
                  <?php if (!empty($loginResult)) { ?>
                    <div id="msg" class="text-danger">
                      <?php echo $loginResult; ?>
                    </div>

                  <?php } ?>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <div class="col-md-6" mb-1><p class=" text-center mb-0 me-2"><?PHP echo $init::DONT_HAVE_ACCOUNT.$init::SPACE.$init::WELCOM_TO_LOGIN ?> </p></div> 
                   <div class="col-md-6 mb-1"> <button type="button" class="btn btn-outline-primary"
                      onclick=" window.location = 'index.php';"><?PHP echo $init::ENTER ?></button></div>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center gradient-custom-2">
              <!-- <iframe src="rules.php" frameborder="0"></iframe> -->
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4"><?PHP echo $init::TENDER_GATE.$init::SPACE.$init::SCME ?></h4>
                <p class="small mb-0"></p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>