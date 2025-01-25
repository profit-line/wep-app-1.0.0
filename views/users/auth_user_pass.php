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
								<h2 class="mb-10 fw-600 text-primary">Forgot Password ?</h2>
								<p class="mb-0 text-fade">Enter your email to reset your password.</p>
								<?php
									flash('resetPass');
								?>
							</div>
							<div class="p-40">
								<form action="<?= url_view_builder('user/requestPasswordReset') ?>" method="post">
									<div class="form-group">
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-user"></i></span>
											<input type="email" name="email" class="form-control ps-15 bg-transparent <?= add_class_error($data , 'email'); ?>" placeholder="Email" value="<?= (isset($data['requests']['email'])) ? $data['requests']['email'] : '' ?>" required>
											<span class="invalid-feedback"><?= view_error($data , 'email') ?></span>
										</div>
									</div>
										
									</div>
									<input type="hidden" name="csrf_token" value="<?= setCsrfToken() ?>">

									  <div class="row">
										<div class="col-12 text-center">
										<input type="submit" class="btn btn-primary w-p100 mt-10" value="SIGN IN">
										</div>
										<!-- /.col -->
									  </div>
								</form>	
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