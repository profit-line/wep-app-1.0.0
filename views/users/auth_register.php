<?php

view('users/inc/header');
?>

<body class="hold-transition theme-primary bg-img" style="background-image: url(<?= asset('../../../images/auth-bg/bg-16.jpg') ?>)">

	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">

			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h2 class="text-primary fw-600">Get started with Us</h2>
								<p class="mb-0 text-fade">Register a new membership</p>
								<?php
								flash('ErrorRegisterInUser');
								?>
							</div>
							<div class="p-40">
								<form action="<?= url_view_builder('user/register') ?>" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
											<input type="text" name="user_name" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'user_name'); ?>" placeholder="Username" value="<?= (isset($data['requests']['user_name'])) ? $data['requests']['user_name'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'user_name') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
											<input type="text" name="family_name" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'family_name'); ?>" placeholder="Family Name" value="<?= (isset($data['requests']['family_name'])) ? $data['requests']['family_name'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'family_name') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
											<input type="text" name="last_name" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'last_name'); ?>" placeholder="Last Name" value="<?= (isset($data['requests']['last_name'])) ? $data['requests']['last_name'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'last_name') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-phone"></i></span>
											<input type="tel" name="mobile_phone_number" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'mobile_phone_number'); ?>" placeholder="Mobile Phone Number" value="<?= (isset($data['requests']['mobile_phone_number'])) ? $data['requests']['mobile_phone_number'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'mobile_phone_number') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-phone"></i></span>
											<input type="tel" name="house_phone_number" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'house_phone_number'); ?>" placeholder="House Phone Number" value="<?= (isset($data['requests']['house_phone_number'])) ? $data['requests']['house_phone_number'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'house_phone_number') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-email"></i></span>
											<input type="email" name="email" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'email'); ?>" placeholder="Email" value="<?= (isset($data['requests']['email'])) ? $data['requests']['email'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data, 'email') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-lock"></i></span>
											<input type="password" name="password" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'password'); ?>" placeholder="Password" required>
											<span class="invalid-feedback"><?= view_error($data, 'password', "password 8 , 30 characters") ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-lock"></i></span>
											<input type="password" name="password_confirm" class="form-control ps-15 bg-transparent" placeholder="Confirm Password" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-map-alt"></i></span>
											<select name="city" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'city'); ?>" required>
												<option value="">Select City</option>
												<?php foreach ($data['citys'] as $city): ?>
													<option value="<?= $city ?>" <?= (isset($data['requests']['city']) && $data['requests']['city'] == $city) ? 'selected' : '' ?>><?= $city ?></option>
												<?php endforeach; ?>
											</select>
											<span class="invalid-feedback"><?= view_error($data, 'city') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-image"></i></span>
											<input type="file" name="profile_image" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'profile_image'); ?> <?= add_class_error($data, 'name'); ?> <?= add_class_error($data, 'size'); ?>" placeholder="Profile Image" accept=".png" required>
											<span class="invalid-feedback"><?= view_error($data, 'name') ?></span>
											<span class="invalid-feedback"><?= view_error($data, 'size') ?></span>

										</div>
									</div>

									<input type="hidden" name="csrf_token" value="<?= setCsrfToken() ?>">
									<div class="row">
										<div class="col-6">
											<div class="checkbox">
												<input type="checkbox" name="remember" id="basic_checkbox_1" value="ok">
												<label for="basic_checkbox_1">Remember Me</label>
											</div>
										</div>
										<div class="col-6">
											<div class="fog-pwd text-end">
												<a href="<?= url_view_builder('user/resetPassword') ?>" class="text-primary fw-500 hover-primary"><i class="ion ion-locked"></i> Forgot password?</a><br>
											</div>
										</div>
										<div class="col-12 text-center">
											<input type="submit" class="btn btn-primary w-p100 mt-10" value="SIGN UP">
										</div>
									</div>
								</form>


								<div class="text-center">
									<p class="mt-15 mb-0 text-fade">Already have an account?<a href="<?= url_view_builder('users/auth_register') ?>" class="text-primary ms-5">Sign In</a></p>
								</div>

								<div class="text-center">
									<p class="mt-20 text-fade">- Register With -</p>
									<p class="gap-items-2 mb-0">
										<a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook-light" href="#"><i class="fa fa-facebook"></i></a>
										<a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter-light" href="#"><i class="fa-brands fa-x-twitter"></i></a>
										<a class="waves-effect waves-circle btn btn-social-icon btn-circle btn-instagram-light" href="#"><i class="fa fa-instagram"></i></a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php

	view('users/inc/footer');

	?>