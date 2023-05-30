<div class="container">
	<!-- <div class="error"></div> -->
	<div class="success"></div>
	<div class="error"></div>
	<!-- success -->

	<form id="frm-mobile-verification" role="form" method="post" enctype="multipart/form-data">

		<div class="row">
			<div class="col-md-12 mb-1">
				<label for="mobile" class="mb-1">
					<?PHP echo $init::MOBILE ?>
				</label>
				<input type="text" class="form-control col-md-12 mb-1 fw-bold" id="mobile_no" name="mobile_no"
					value="<?PHP echo $memberInfo[0]['mobile_no'] ?>" maxlength="10"
					placeholder="Enter valid mobile number" required="">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mb-1">
				<button type="button" name="btnSubmit" onClick="sendOTP('هناك خطاء')"
					class="btn btn-lg btn-success btn-block col-md-12 mb-1">
					<?PHP echo $init::SEND . $init::TAB . $init::OTP; ?>
				</button>
			</div>
		</div>
	</form>

</div>
<script src="js/scripts.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script src="js/jquery-3.6.4.js"></script>