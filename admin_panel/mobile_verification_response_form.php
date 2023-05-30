<?PHP
session_start();
//require_once('init_user_status.php');
$memberInfo = $member->getMemberByUserID($user_code);

?>
<div class="error alert-danger"></div>
<div class="success  alert-success"></div>


<form id="frm-mobile-verification">
	<div class="row">
		<div class="col-md-12 mb-1">
			<label id="mobileOtpLbl">
				<?PHP echo $init::OTP . $init::TAB . $memberInfo[0]['otp']; ?>
			</label>
		</div>
	</div>

	<div class="row">

		<div class="col-md-12 mb-1">
			<input type="number" id="mobileOtp" name="mobileOtp" class="form-control col-md-12 mb-1 rtl"
				placeholder=<?PHP echo "\"" . $init::OTP_CAPTION . "\"" ?>>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12 mb-1">
			<input id="verify" type="button" class="col-md-12 mb-1 btn btn-lg btn-info btn-block" value=<?PHP echo "\"" . $init::CONFIRM . "\"" ?> onClick="verifyOTP(<?PHP echo $init::OTP_ERROR ?>);">
		</div>


	</div>
</form>
<div class="resend"></div>

<script src="js/scripts.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="js/jquery-3.6.4.js"></script>