<?PHP
use Phppot\Member;
use nidal\Init;

require_once '../init.php';
require_once '../lib/Member.php';
//$member = new Member();
$init = new Init();
#$init->print_butiful_array($memberInfo[0][name]);
#print $username;
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark  ">
    <!-- Navbar Brand-->
    <a class="navbar-brand py-3 px-3 " style=" text-align:center; " href="index.html">
        <img src="../assets/images/logo.png" style="width: 70%" alt="logo">
        <!-- <?PHP
        echo $init::WELCOM_MESSAGE . (!empty($memberInfo) ? $memberInfo[0]['name'] : $username) . $init::TAB;
        if (!$isAdmin) {
            //            echo $init::USER_STATUS . $init::TAB
            echo $init::TAB;



            // $init->print_butiful_array($_SESSION);
            ?>
            <i id="status" class="fa-solid fa-circle  <?PHP echo $status ?>"></i>
        <?PHP } ?> -->
    </a>


    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4  me-lg-0  " id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="  d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group ">
            <input class="form-control" type="text" placeholder="البحث عن ...." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>



    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-start" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">
                        <?PHP
                        //echo $init::WELCOM_MESSAGE . $username . $init::TAB; 
                        echo $init::WELCOM_MESSAGE . (!empty($memberInfo) ? $memberInfo[0]['name'] : $username);
                        ?>


                    </a></li>
                <li><a class="dropdown-item" href="#" onclick="btnclick('change_password.php')">
                        <?PHP
                        //echo $init::WELCOM_MESSAGE . $username . $init::TAB; 
                        echo $init::CHANGE_PASSWORD;
                        ?>


                    </a></li>
                <?PHP
                if (!$isAdmin) {

                    ?>

                    <li><a class="dropdown-item" style="text-align: center;" href="#!"><i
                                class="fa-solid fa-circle center <?PHP echo $status ?>"></i></a></li>

                <?PHP } else { ?>



                    <li><a class="dropdown-item" href="#!">
                            <?PHP echo $init::USER_SETTINGS ?>
                        </a></li>

                <?PHP } ?>
                <li><a class="dropdown-item disabled" href="#!">
                        <?PHP echo $init::ENGLISH ?>
                    </a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="../logout.php">
                        <?PHP echo $init::LOGOUT ?>
                    </a></li>
            </ul>
        </li>
    </ul>
</nav>