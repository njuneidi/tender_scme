<!-- <script src="javascript.js"></script> -->

<section style="background-color: #eee;">
  <div class="container py-1 bg1-info ">
    <div class=" bg1-danger row d-flex justify-content-center align-items-center h-100 bg1-primary">
      <div class="col-xl-10 bg1-primary">
        <div class="card rounded-3 text-black ">
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
                  // if (isset($_POST['submit'])) {
                  
                  //   echo ALREADY_REGISTERED;
                  
                  // }
                  ?>
                </div>

                <form name="login" action="" method="post" class="m-1  bg1-primary" onsubmit=" return test(this);">
                  <p>صفحة التسجيل</p>
                  >
                  <div class="row">
                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-lock m-1"></i> </span>
                        </div>
                        <input name="password" id="password" class="form-control" placeholder="كلمة السر"
                          type="password">
                      </div> <!-- form-group// -->
                    </div>
                    <div class="col-md-12 mb-1">
                      <div class="form-group input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"> <i class="fa fa-lock m-1"></i> </span>
                        </div>
                        <input name="password2" id="password2" class="form-control" placeholder="تأكيد كلمة المرور"
                          type="password">
                      </div> <!-- form-group// -->
                    </div>
                  </div>







                  <div class="mb-1">
                    <input class="form-check-input" type="checkbox" value="" id="approved">
                    <label class="form-check-label" for="approved" id="lcb"> <a href="#"
                        onClick="window.open('/template/rules.php','windowname',' width=400,height=200,scrollbars=yes'); return false;">
                        الموافقة على الشروط والاحكام</a></label>
                    <!-- <label class="form-label" for="form2Example11">Username</label> -->
                  </div>


                  <div class="text-center pt-1 mb-1 pb-1">
                    <input type="submit" name="signup-btn" class="btn btn-primary btn-block fa-lg mb-1 p-3"
                      value="تسجيل">
                    <!-- <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-1" type="button">تسجيل</button> -->

                  </div>
                  <?php if (!empty($loginResult)) { ?>
                    <div id="msg" class="text-danger">
                      <?php echo $loginResult; ?>
                    </div>

                  <?php } ?>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <p class=" text-center mb-0 me-2">هل تملك حساب؟ تفضل بالدخول </p>
                    <button type="button" class="btn btn-outline-primary"
                      onclick=" window.location = 'index.php';">دخول</button>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-4 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4">صفحة العطاءت الخاصة بالكلية الذكية للتعليم الحديث</h4>
                <p class="small mb-0"></p>
              </div>
            </div>
            <!-- <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="../assets/images/side-nam-bg1.jpg" alt="Login image" class="w-100 vh-100"
                style="object-fit: cover; object-position: left;">
            </div> -->
            <!-- <div class="col-sm-6 px-0 d-none d-sm-block">
              <img src="assets/images/side-nam-bg1.jpg" alt="Login image" class="w-100 vh-100"
                style="object-fit: fill; object-position: left;">
            </div> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>