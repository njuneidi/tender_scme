<div class="sb-sidenav-footer">
    <div class="small">
        <?PHP echo $init::LOGGED_IN_AS ?>:
    </div>
    <?PHP
    echo !empty($memberInfo[0]['licence_id']) ? ($memberInfo[0]['licence_id']) : $username;
    ?>
</div>