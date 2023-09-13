<?PHP
session_start();
// define('SESSION_USER_ID', $_SESSION['user'][0]['user_id']);

require_once('init_user_status.php');
if (empty($_SESSION['username'])) {
    header("Location:../index.php");
}



// Now $user_id contains the user_id value
// echo $user_id; // You can use this variable as needed

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>

    <link rel="icon" href="../assets/images/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
    <!-- <link rel="stylesheet" href="../assets/css/tender.css"> -->
    <link rel="stylesheet" href="../assets/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">

</head>

<body class="sb-nav-fixed">

    <?PHP

    //(!$isStoppedUser) ? require_once("main.php") : require_once('main_stopped_account.html');
    if ($isStoppedUser) {

        require_once('main_stopped_account.php');
    } else {
        require_once("header.php");
        ?>

        <div id="layoutSidenav">
            <?PHP
            // $isAdmin ? require_once("layoutSidenav_nav.php") : require_once("layoutSidenav_nav.php") 
            require_once("layoutSidenav_nav.php");
            ?>
            <div id="layoutSidenav_content">
                <main>
                    <?PHP
                    require_once("main.php");
                    // require_once("main.php");
                    ?>
                </main>
            <?PHP }
    // Access the user_id from the $_SESSION array
    // session_start();
    // error_reporting(E_ALL);
    // ini_set('display_errors', 1);
    

    require_once("footer.php");
    ?>

        </div>
    </div>

    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/alertify.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="../assets/js/bootstrap.bundle.min.js.map"></script> -->
    <script defer src="../assets/js/datatables-simple-demo.js"></script>
    <script defer src="../assets/js/jquery-3.6.4.js"></script>
    <script defer src="../assets/js/scripts.js"></script>
    <!-- <script defer src="assets/js/ckeditor.js"></script> -->
    <!-- <script src="../assets/ckeditor/ckeditor.js"></script> -->

</body>