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
								<h2 class="text-primary fw-600">Let's Get Started</h2>
								<p class="mb-0 text-fade">Sign in to continue to EV Admin.</p>	
								<?php

								 flash('ErrorLoggedInUser');
								 
								 
								?>						
							</div>
							<div class="p-40">
							<form action="<?= url_view_builder('user/login') ?>" method="post">

									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
											<input type="text" name="user_name" class="form-control ps-15 bg-transparent <?= add_class_error($data , 'user_name'); ?>" placeholder="Username" value="<?= (isset($data['requests']['user_name'])) ? $data['requests']['user_name'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data , 'user_name') ?></span>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text  bg-transparent"><i class="text-fade ti-lock"></i></span>
											<input type="password" name="password" class="form-control ps-15 bg-transparent  <?= add_class_error($data , 'password'); ?>" placeholder="Password" required>	
											<span class="invalid-feedback"><?= view_error($data , 'password') ?></span>
										</div>
									</div>
									  <div class="row">
										<div class="col-6">
										  <div class="checkbox">
											<input type="checkbox" name="remember" id="basic_checkbox_1" value="ok" >
											<label for="basic_checkbox_1">Remember Me</label>
										  </div>
										</div>
										<input type="hidden" name="csrf_token" value="<?= setCsrfToken() ?>">
										<!-- /.col -->
										<div class="col-6">
										 <div class="fog-pwd text-end">
											<a href="<?= url_view_builder('user/requestPasswordReset') ?>" class="text-primary fw-500 hover-primary"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
										  </div>
										</div>
										<!-- /.col -->
										<div class="col-12 text-center">
											<input type="submit" class="btn btn-primary w-p100 mt-10" value="SIGN IN">
										
										</div>
										<!-- /.col -->
									  </div>
								</form>	
								<div class="text-center">
									<p class="mt-15 mb-0 text-fade">Don't have an account? <a href="<?= url_view_builder('user/register') ?>" class="text-primary ms-5">Sign Up</a></p>
								</div>
								
								<div class="text-center">
								  <p class="mt-20 text-fade">- Sign With -</p>
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
