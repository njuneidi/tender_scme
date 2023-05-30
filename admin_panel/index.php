<?PHP
session_start();
require_once('init_user_status.php');
if (empty($_SESSION['username'])) {
    header("Location:../index.php");
}

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
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap"
        rel="stylesheet">
    <!-- 
    <link rel="icon" href="assets/images/favicon_io/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/tender.css">
    <link rel="stylesheet" href="assets/css/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="admin_panel/css/styles.css" /> -->

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" /> -->

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
    require_once("footer.php");
    ?>

        </div>
    </div>

    <script src="../assets/js/all.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js.map"></script>
    <script defer src="../assets/js/datatables-simple-demo"></script>
    <script src="../assets/js/jsscripts.js"></script>
    <script defer src="../assets/js/jquery-3.6.4.js"></script>
    <script defer src="../assets/js/scripts.js"></script>


    <!-- <script>

        function menubtnclick(content) {
            // times++;
            // hash = location.hash = times;
            // alert(hash);
            // times = parseInt(location.hash.replace('#', ''), 10);
            // alert(times)
            // alert('Click to');
            var mainContent = document.getElementById('DIVID');

            // Create an XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Set the request method to GET
            xhr.open('GET', 'getMenuItem.php?content=' + content);
            //xhr.open('GET', window.location.href);

            // Send the request
            xhr.send();
            // When the request is complete, set the content of the main-content element to the response text
            xhr.onload = function () {

                // localStorage.setItem('content', xhr.responseText);
                mainContent.innerHTML = xhr.responseText;
            };
            // Use history.pushState() to change the state of the browser without changing the URL of the page

            history.pushState(content, null, '?content=' + content);
            window.location.href;
            // Use history.replaceState() to update the content in the main section without changing the URL of the page
            //  history.replaceState(localStorage.getItem('content'), null, '?content=' + content);
            // location.reload(localStorage.getItem('content'));
            // history.pushState(content, null, content);
            //history.go(-1);
            // location.href('?content=' + content);
        }
    </script> -->

    <!-- <script>
        $(document).ready(function () {

            // Listen for clicks on the sidebar menu items.
            $('.nav-link8').on('click', function () {
                // Get the id of the clicked menu item.
                var menuItemId = $(this).attr('id');
                //  alert(menuItemId);
                // Fetch the content of the main section for the clicked menu item.
                $.get('getMenuItem.php', { menuItemId: menuItemId }, function (content) {
                    // Replace the content of the main section with the content that was returned from the PHP function.
                    $('#DIVID').html(content);

                    // Use the history.pushState() method to create a new entry in the browser's history.
                    // history.pushState({}, "", "");
                    $.cache.set("DIVID", content);                      // history.pushState({}, "", menuItemId);
                    //history.pushState({ page: 1 }, "title 1", "?menuItemId=" + menuItemId);
                    //$.cache.remove("main-section");
                    // history.popState();
                });
            });
        });</script> -->

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script> -->
    <!-- <script src="assets/demo/chart-area-demo.js"></script> -->
    <!-- <script src="assets/demo/chart-bar-demo.js"></script> -->

</body>