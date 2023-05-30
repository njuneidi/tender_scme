<div class="container-fluid px-4">
    <h1 class="mt-4">
        <?PHP echo $init::DASHBOARD . "super"; ?>
    </h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">
            <?PHP echo $init::DASHBOARD; ?>
        </li>
    </ol>
</div>

<div class="small px-3 py-2">

    <?PHP echo $init::WELCOM_MESSAGE . "******";

    ?>
    <!-- <i id='icon' class="fa-solid fa-circle <?PHP echo $status; ?> ps-1"> </i> -->

</div>
<h6 class="px-3 pb-1">
    <?PHP echo (!empty($memberInfo) ? $memberInfo[0]['name'] : $username) . $init::TAB; ?>

</h6>
<div class="small px-3 pb-2">
    <?PHP echo $init::ACCOUNT_STATUS . $init::TAB;

    ?>
    <i id='icond' class="fa-solid fa-circle <?PHP echo $status; ?> ps-3"> </i>
    <?PHP echo $statusArabic . $status ?>
</div>