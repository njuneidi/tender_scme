<div class="sb-sidenav-menu-heading">
    <?PHP echo $init::USER_TRANSACTIONS; ?>
</div>

<a class="nav-link" href="#" onclick="('ajaxupload.php')">
    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
    <?PHP echo $init::ATTACHMETNS; ?>
</a>

<a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false"
    aria-controls="collapsePages">
    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
    <?PHP echo $init::TENDERS; ?>
    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
</a>
<div class="collapse" id="collapsePages" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
    <nav class="sb-sidenav-menu-nested nav">
        <a class="nav-link" href="layout-static.html">
            <?PHP echo $init::TENDER_LIST_PAGE; ?>
        </a>
        <a class="nav-link" href="layout-sidenav-light.html">
            <?PHP echo $init::MY_TENDERS; ?>
        </a>
    </nav>
</div>
<!-- <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                        <div class="small mb-3 text-muted">Enter your email address and we will send you a link to reset your password.</div>
                                        <form>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="login.html">Return to login</a>
                                                <a class="btn btn-primary" href="login.html">Reset Password</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->