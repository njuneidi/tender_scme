<?PHP if (empty($_SESSION)) {
    session_start();
    require_once('init_user_status.php');

} ?>

<div id="DIVID">
    <?php
    if (isset($_GET['content']))
        $_SESSION['content'] = $_GET['content'];
    //$_SESSION['link'] = $_POST['menuItem'];
    if (!empty($_SESSION['content'])) {
        switch ($_SESSION['content']) {
            case $init::menueItems['dashboard']:
                // echo "Admin Panel";
                require_once('tender_management/index.php');
                break;
            case $init::menueItems['members']:
                // echo 44;
                require_once('init_admin_records.php');
                require_once 'user_managment/menu_item_users_managment.php';

                break;
            case $init::menueItems['users']:
                ?>
                <div id='a2'>
                    <?PHP
                    require_once('init_admin_records.php');
                    require_once 'user_managment/menu_item_users_managment.php';
                    ?>
                </div>
                <?PHP
                break;
            case $init::menueItems['questions']:
                require_once('question_bank/index.php');
                break;
            case $init::menueItems['tenders']:
                require_once('tender_management/index.php');
                break;
            case $init::menueItems['tenders-list']:
                require_once('tender_management/index.php');

                break;
            // case $init::menueItems['dashboard']:
            //     # code...
            //     break;
            case $init::menueItems['profile']:
                require_once('user_profile/index.php');
                # code...
                break;
            case $init::menueItems['attachments']:
                # code...
                break;
            // case $init::menueItems['tenders-list']:
            //     # code...
            //     break;
            case $init::menueItems['my-tenders']:
                # code...
                break;


            default:
                require_once('main_dashboard.php');
                break;
        }
        // (!$isStoppedUser) ? require_once('main_dashboard.php') : require_once('main_stopped_account.php');
    } else {
        require_once('main_dashboard.php');
    }


    ?>
</div>