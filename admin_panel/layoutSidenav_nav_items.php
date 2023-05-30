<div class="sb-sidenav-header card bg-secondary">
    <div class="small px-3 py-2">
        <?PHP
        echo $init::WELCOM_MESSAGE;
        ?>
    </div>
    <h6 class="px-3 pb-1">
        <?PHP
        echo (!empty($memberInfo) ? $memberInfo[0]['name'] : $username) . $init::TAB;
        ?>
    </h6>
    <div class="small px-3 pb-2">
        <?PHP echo $init::ACCOUNT_STATUS . $init::TAB;

        ?>
        <i id='icon' class="fa-solid fa-circle <?PHP echo $status; ?> ps-3"> </i>

    </div>

</div>
<div class=" sb-sidenav-menu-heading">

    <?PHP echo $init::TENDER_GATE ?>
</div>
<input type="hidden" name="" id="link">
<?PHP $link = 'dashboard';
$icon = 'fas fa-tachometer-alt';
echo $init->menuItem($link, $icon, $init::DASHBOARD, 'dashboard') ?>


<?PHP

if ($isAdmin) {
    $link = $init::adminMenu['a_members'];
    $icon = 'fas fa-chart-area';
    echo $init->menuItem($link, $icon, $init::MEMBER_MANGEMEMT_PAGE, 'member');
    $link = $init::adminMenu['a_users'];
    $icon = 'fas fa-chart-area';
    echo $init->menuItem($link, $icon, $init::USER_MANGEMEMT_PAGE, 'user');
    $link = $init::adminMenu['a_questions'];
    $icon = 'fas fa-chart-area';
    echo $init->menuItem($link, $icon, $init::QUESTION_BANK_MANGEMEMT_PAGE, 'question');
    $link = $init::adminMenu['a_tenders'];
    $icon = 'fas fa-chart-area';
    echo $init->menuItem($link, $icon, $init::TENDER_MANGEMEMT_PAGE, 'tender');
    $link = $init::adminMenu['a_tenderList'];
    $icon = 'fas fa-chart-area';
    echo $init->menuItem($link, $icon, $init::TENDER_LIST_PAGE, 'tlist');

} elseif ($isUser) {
    if (!$isNewUser) {
        $link = $init::userMenu['u_userProfile'];
        $icon = 'fas fa-chart-area';
        echo $init->menuItem($link, $icon, $init::USER_INFORMATION_PAGE, 'userifno');

        $link = $init::userMenu['u_attachments'];
        $icon = 'fas fa-chart-area';
        echo $init->menuItem($link, $icon, $init::ATTACHMETNS, 'attach');
        $link = $init::userMenu['u_tenders'];
        $icon = 'fas fa-chart-area';
        echo $init->menuItem($link, $icon, $init::TENDER_LIST_PAGE, 'tlist2');

    }
    if ($isActiveUser) {
        $link = $init::userMenu['u_mytenders'];
        $icon = 'fas fa-chart-area';
        echo $init->menuItem($link, $icon, $init::MY_TENDERS, 'mytender');

    }
}

?>