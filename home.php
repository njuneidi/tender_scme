<?PHP
use Phppot\Member;

require_once("init.php");

session_start();
#echo session_id();

// require_once __DIR__ . '/lib/Member.php';
// print_butiful_array($_SESSION);
require_once __DIR__ . '/lib/Member.php';
$member = new Member();
if (!empty($_SESSION['username'])) {
	$loginResult = $member->getUser($_SESSION['username']);
	// print_butiful_array($loginResult);
	if (!empty($loginResult[0]['user_id'])) {
		// print($loginResult[0]['user_id']);
		$memberInfo = $member->getMemberByUserID($loginResult[0]['user_id']);
	}

} elseif (!empty($_SESSION['member_id'])) {

	$memberInfo = $member->getMember($_SESSION['member_id']);
	$loginResult = $member->getUser($memberInfo[0]['licence_id']);
}


$isAdmin = $loginResult[0]['user_type'] == '2' ? true : false;
$isUser = $loginResult[0]['user_type'] == '1' ? true : false;
//$isGuest = $loginResult[0]['user_type'] == '3' ? true : false;
$isNewUser = $loginResult[0]['user_status'] == '1' ? true : false;
$isApproavedUser = $loginResult[0]['user_status'] == '2' ? true : false;
$isActiveUser = $loginResult[0]['user_status'] == '3' ? true : false;
$isStoppedUser = $loginResult[0]['user_status'] == '4' ? true : false;
$user_code = $loginResult[0]['user_id'];
// print($user_code);





?>
<!-- 
<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
		integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<link href="vendor/fontawesome/css/all.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<link href="assets/css/style2.css" rel="stylesheet">
</head>

<body>
	<?php
	if ($isAdmin) {
		$isSuperAdmin = $loginResult[0]['super_admin'] == '1' ? true : false;
		if ($isSuperAdmin) { ?>
			<div class="contianer">
				<h1>Super Admin Page</h1>
			</div>



			<?PHP
			//require_once __DIR__ . '/template/profile-template.php';
			require_once __DIR__ . '/admin.php';


		} elseif ($isActiveUser) { ?>
			<div class="contianer">
				<h1>Active Admin Page</h1>
			</div>


			<?PHP
			#echo session_id();
		} else { ?>
			<div class="contianer">
				<h1>InActive Admin Page</h1>
			</div>


		<?PHP }


	} elseif ($isUser) { 
		if ($isNewUser) { ?>
			<div class="contianer">
				<h1>New User Page</h1>
			</div>

			<?PHP
			#echo session_id();
			//require_once __DIR__ . '/activation.php';
			//require_once __DIR__ . '/admin_dashboard\nice-html\ltr\index.html';
			require_once __DIR__ . '/admin_panel/index.html';

		} elseif ($isApproavedUser) {
			?>
			<div class="contianer">
				<h1>Approaved User Page</h1>
			</div>

			<?PHP
			// require_once __DIR__ . '/activation.php';
	
		} elseif ($isActiveUser) {
			?>
			<div class="contianer">
				<h1>Active User Page</h1>
			</div>

			<?PHP
		} elseif ($isStoppedUser) {
			?>
			<div class="contianer">
				<h1>Stopped User Page</h1>
			</div>

			<?PHP
		}

	}

	//require_once __DIR__ . '/template/profile-template.php';
	//require_once __DIR__ . '/admin_dashboard\nice-html\ltr\index.html';
	require_once __DIR__ . '/admin_panel/index.html';
	#session_destroy();
	?>
</body>

</html> -->