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
            case $init::adminMenu['a_dashboard']:

                break;
            case $init::adminMenu['a_members']:

                require_once 'view/menu_item_members_managment.php';

                break;
            case $init::adminMenu['a_users']:
                ?>
                <div id='a2'>
                    <?PHP
                    require_once('init_admin_records.php');
                    require_once 'user_managment/menu_item_users_managment.php';
                    ?>
                </div>
                <?PHP
                break;
            case $init::adminMenu['a_questions']:
                # code...
                break;
            case $init::adminMenu['a_tenders']:
                # code...
                break;
            case $init::adminMenu['a_tenderList']:
                # code...
                break;
            case $init::userMenu['u_dashboard']:
                # code...
                break;
            case $init::userMenu['u_userProfile']:
                # code...
                break;
            case $init::userMenu['u_attachments']:
                # code...
                break;
            case $init::userMenu['u_tenders']:
                # code...
                break;
            case $init::userMenu['u_mytenders']:
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