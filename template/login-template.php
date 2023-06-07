<!-- <div class="sidenav">
	<div class="card  text-white text-center m-5 bg-primary  p-3">
		<img class="card-img-top width " src="assets/images/logo.png" alt="logo">

		<h1>
			<?PHP echo $init::LOGIN_INFO ?> <br />
			<?PHP $init::LOGIN ?>
		</h1>
		<p>
			<?PHP echo $init::LOGIN_MSG ?>
		</p>
	</div>
</div> -->
<div class="main">
	<div class="d-flex flex-column justify-content-center align-items-center  ">


		<div class="col-md-6 col-sm-12 ">

			<div class="login-form ">
				<div class="text-center ">
					<img src="assets/images/logo.png" style="width: 185px;" alt="logo">
					<h4 class="mt-1 mb-3 pb-1 ">
						<?PHP echo $init::SCME ?>
					</h4>
				</div>
				<?php if (!empty($loginResult2)) { ?>
					<div class=" alert alert-info text-danger">
						<?php echo $loginResult2; ?>
					</div>

				<?php } ?>
				<div id="feedback-info" class=" alert alert-info text-danger d-none">

				</div>
				<form name="login" action="" method="post" class="m-3  p-3">


					<div class="form-group">
						<label>
							<?PHP echo $init::ACCOUNT_NO ?>
						</label> <input type="text" class="form-control mt-1 mb-3" placeholder=<?PHP echo "\"" . $init::ACCOUNT_NO . "\"" ?> name="username" id="username">
					</div>
					<div class="form-group  mb-3">
						<label>
							<?PHP echo $init::PASSWORD ?>
						</label> <input type="password" class="form-control mt-1" placeholder=<?PHP echo "\"" . $init::PASSWORD . "\"" ?> name="password" id="password">
						<a class="text-muted" href="recovery/"
							onclick="signup('template/login_template_forgot_password.php')"><?PHP echo $init::FORGOT_PASSWORD; ?></a>
					</div>
					<input type="submit" class="btn text-white bg-primary  w-50 login" value=<?PHP echo $init::DQ . $init::LOGIN . $init::DQ ?> name="login-btn">
					<?php if (!empty($loginResult)) { ?>
						<div class="text-danger">
							<?php echo $loginResult; ?>
						</div>

					<?php } ?>
					<div class="card-footer">
						<div class="d-flex justify-content-center">
							<div class="alert alert-info text-primary">
								<?PHP echo $init::DONT_HAVE_ACCOUNT ?>
								<a href="signup/" id="sign_up" onclick="signup('template/login-template44.php')">
									<?PHP echo $init::REGISTER

										?>
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>