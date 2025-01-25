<?php

view('users/inc/header');

?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">

	<div class="wrapper">
		<div id="loader"></div>

		<?php

		view('pages/inc/header_nav');
		view('pages/inc/sidebar');

		?>

		<div class="content-wrapper">
			<div class="container-full">
				<!-- Content Header (Page header) -->
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xl-4 col-lg-5">
							<div class="card text-center">
								<div class="card-body">
									<img src="<?= asset('../../../images/avatar/' . get('user')['profile_image']) ?>" class="bg-light w-100 h-100 rounded-circle avatar-lg img-thumbnail" alt="profile-image">

									<h4 class="mb-0 mt-2"><?= get('user')['last_name'] . ' ' . get('user')['family_name'] ?></h4>
									<p class="text-muted fs-14"><?= get('user')['role'] ?></p>

									<div class="text-start mt-3">
										<p class="header-title text-info mb-2"><strong>About Me :</strong></p>
										<p class="text-muted  mb-3">
										<?= isset($data['consultant']->about_me) ? $data['consultant']->about_me : '' ?>	
									</p>
										<p class="text-muted mb-2 "><strong class="text-info">User Name :</strong> <span class="ms-2"><?= get('user')['user_name'] ?></span></p>

										<p class="text-muted mb-2 "><strong class="text-info">Mobile :</strong><span class="ms-2"><?= get('user')['mobile_phone_number'] ?></span></p>

										<p class="text-muted mb-2 "><strong class="text-info">Email :</strong> <span class="ms-2 "><?= get('user')['email'] ?></span></p>

										<p class="text-muted mb-1 "><strong class="text-info">Location :</strong> <span class="ms-2"><?= get('user')['city'] ?></span></p>
									</div>

									<ul class="social-list list-inline mt-3 mb-0">
										<li class="list-inline-item">
											<a href="javascript: void(0);" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-facebook-light"><i class="fa fa-facebook"></i></a>
										</li>
										<li class="list-inline-item">
											<a href="javascript: void(0);" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-twitter-light"><i class="fa-brands fa-x-twitter"></i></a>
										</li>
										<li class="list-inline-item">
											<a href="javascript: void(0);" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-google-light"><i class="fa fa-google"></i></a>
										</li>
										<li class="list-inline-item">
											<a href="javascript: void(0);" class="waves-effect waves-circle btn btn-social-icon btn-circle btn-instagram-light"><i class="fa fa-instagram"></i></a>
										</li>
									</ul>
								</div> <!-- end card-body -->
							</div> <!-- end card -->


						</div> <!-- end col-->

						<div class="col-xl-8 col-lg-7">
							<div class="card">
								<div class="card-body">
									<ul class="nav nav-pills bg-nav-pills nav-justified mb-3">

										<li class="nav-item">
											<a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link rounded-0 active">
												Settings
											</a>
										</li>
									</ul>
									<!-- end about me section content -->

									<link href="https://cdn.jsdelivr.net/npm/@mdi/font/css/materialdesignicons.min.css" rel="stylesheet">
<?php
flash('UserUpdated');
flash('UserNotFound');
flash('ErrorAddImageProfile');

?>
									<div class="tab-pane" id="settings">
										<form action="<?= url_view_builder('user/editUser/' . get('user')['id']) ?>" method="post" enctype="multipart/form-data">

											<h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle"></i> Personal Info</h5>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3"> 
														<label for="family_name" class="form-label">family Name</label>
														<input type="text" class="form-control <?= add_class_error($data , 'family_name') ?>" id="family_name" name="family_name" value="<?= get('user')['family_name'] ?>" required>
														<span class="invalid-feedback"><?= view_error($data, 'family_name') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="last_name" class="form-label">Last Name</label>
														<input type="text" class="form-control <?= add_class_error($data , 'last_name') ?>" id="last_name" name="last_name"  value="<?= get('user')['last_name'] ?>" required>
														<span class="invalid-feedback"><?= view_error($data, 'last_name') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="user_name" class="form-label">User Name</label>
														<input type="text" class="form-control <?= add_class_error($data , 'user_name') ?>" id="user_name" name="user_name"  value="<?= get('user')['user_name'] ?>" required>
														<span class="invalid-feedback"><?= view_error($data, 'user_name') ?></span>
													</div>
												</div>
												
											</div>
											<div class="row">
												<div class="col-12">
													<div class="mb-3">
														<label for="about_me" class="form-label">Bio</label>
														<textarea class="form-control <?= add_class_error($data , 'about_me') ?>" id="about_me" rows="4" name="about_me"><?= isset($data['consultant']->about_me) ? $data['consultant']->about_me : '' ?></textarea>
														<span class="invalid-feedback"><?= view_error($data, 'description') ?></span>
													</div>
												</div>
											</div>

											<h5 class="mt-3 mb-4 text-uppercase"><i class="mdi mdi-phone"></i> Contact Info</h5>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label for="email" class="form-label">Email Address</label>
														<input type="email" class="form-control <?= add_class_error($data , 'email') ?>" id="email" name="email" value="<?= isset(get('user')['email']) ? get('user')['email'] : '' ?>" required>
														<span class="invalid-feedback"><?= view_error($data, 'email') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="office_phone_number" class="form-label">Office Phone Number</label>
														<input type="tel" class="form-control <?= add_class_error($data , 'office_phone_number') ?>" id="office_phone_number" name="office_phone_number" value="<?= isset($data['consultant']->office_phone_number) ? $data['consultant']->office_phone_number : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="mobile_phone_number" class="form-label">mobile phone number</label>
														<input type="tel" class="form-control <?= add_class_error($data , 'mobile_phone_number') ?>" id="mobile_phone_number" name="mobile_phone_number" value="<?= isset(get('user')['mobile_phone_number']) ? get('user')['mobile_phone_number'] : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="house_phone_number" class="form-label">house phone number</label>
														<input type="tel" class="form-control <?= add_class_error($data , 'house_phone_number') ?>" id="house_phone_number" name="house_phone_number" value="<?= isset(get('user')['house_phone_number']) ? get('user')['house_phone_number'] : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="address_agency" class="form-label">address agency</label>
														<input type="tel" class="form-control <?= add_class_error($data , 'address_agency') ?>" id="address_agency" name="address_agency" value="<?= isset($data['consultant']->address) ? $data['consultant']->address : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'address') ?></span>
													</div>
												</div>
												<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="text-fade ti-map-alt"></i></span>
											<select name="city" class="form-control ps-15 bg-transparent <?= add_class_error($data, 'city'); ?>" required>
												<option value="">Select City</option>
												<?php foreach ($data['citys'] as $city): ?>
													<option value="<?= $city ?>" <?= (isset($data['requests']['city']) && $data['requests']['city'] == $city || $city == get('user')['city']) ? 'selected' : '' ?>><?= $city ?></option>
												<?php endforeach; ?>
											</select>
											<span class="invalid-feedback"><?= view_error($data, 'city') ?></span>
										</div>
									</div>
											</div>

											<h5 class="mt-3 mb-4 text-uppercase"><i class="mdi mdi-office me-1"></i> Company Info</h5>
									

											<h5 class="mt-3 mb-4 text-uppercase"><i class="mdi mdi-earth me-1"></i> Social</h5>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label for="social-fb" class="form-label">Facebook</label>
														<div class="input-group">
															<span class="input-group-text"><i class="mdi mdi-facebook"></i></span>
															<input type="text" class="form-control <?= add_class_error($data , 'social-fb') ?>" id="social-fb" name="social_fb" value="<?= isset($data['consultant']->social_fb) ? $data['consultant']->social_fb : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'social-fb') ?></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="social-tw" class="form-label">Twitter</label>
														<div class="input-group">
															<span class="input-group-text"><i class="mdi mdi-twitter"></i></span>
															<input type="text" class="form-control <?= add_class_error($data , 'social_tw') ?>" id="social-tw" name="social_tw" value="<?= isset($data['consultant']->social_tw) ? $data['consultant']->social_tw : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'social_tw') ?></span>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label for="social-insta" class="form-label">Instagram</label>
														<div class="input-group">
															<span class="input-group-text"><i class="mdi mdi-instagram"></i></span>
															<input type="text" class="form-control <?= add_class_error($data , 'social_insta') ?>" id="social-insta" name="social_insta" value="<?= isset($data['consultant']->social_insta) ? $data['consultant']->social_insta : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'social_insta') ?></span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="social-lin" class="form-label">Linkedin</label>
														<div class="input-group">
															<span class="input-group-text"><i class="mdi mdi-linkedin"></i></span>
															<input type="text" class="form-control <?= add_class_error($data , 'social_lin') ?>" id="social-lin" name="social_lin" value="<?= isset($data['consultant']->social_lin) ? $data['consultant']->social_lin : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'social_lin') ?></span>
														</div>
													</div>
												</div>
											</div>


											<h5 class="mt-3 mb-4 text-uppercase"><i class="mdi mdi-image"></i> Profile Picture</h5>
											<div class="row">
												<div class="col-md-6">
													<div class="mb-3">
														<label for="agency_image" class="form-label">agency image</label>
														<input type="file" class="form-control <?= add_class_error($data , 'size') ?> <?= add_class_error($data , 'name') ?>" id="agency_image" name="agency_image" value="<?= isset($data['consultant']->agency_image) ? $data['consultant']->agency_image : '' ?>">
														<span class="invalid-feedback"><?= view_error($data, 'name') ?></span>
														<span class="invalid-feedback"><?= view_error($data, 'size') ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="mb-3">
														<label for="profile_image" class="form-label">profile image</label>
														<input type="file" class="form-control <?= add_class_error($data , 'size') ?> <?= add_class_error($data , 'name') ?>" id="profile_image" name="profile_image" value="<?= get('user')['profile_image'] ?>">
														<span class="invalid-feedback"><?= view_error($data, 'size') ?></span>
														<span class="invalid-feedback"><?= view_error($data, 'name') ?></span>
													</div>
												</div>
											</div>

											<div class="text-end">
											<input type="submit" class="btn btn-primary" value="update">		
										</div>
										</form>
									</div>
									<!-- end settings content-->

								</div> <!-- end tab-content -->
							</div> <!-- end card body -->
						</div> <!-- end card -->
					</div> <!-- end col -->
			</div>
			<!-- end row-->

			</section>
			<!-- /.content -->
		</div>
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="pull-right d-none d-sm-inline-block">
			<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
				<li class="nav-item">
					<a class="nav-link" href="#" target="_blank">Purchase Now</a>
				</li>
			</ul>
		</div>
		&copy; <script>
			document.write(new Date().getFullYear())
		</script> <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
	</footer>
	<!-- Side panel -->
	<!-- quick_user_toggle -->
	<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
		<?php

		view('pages/inc/sidebar_user');

		?>
	</div>
	</div>
	<!-- /quick_user_toggle -->

	<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
			<?php

			view('pages/inc/sidebar_user');

			?>
		</div>


		<?php
		view('pages/inc/sidebar_setting');
		?>
	</div>
	<!-- /quick_user_toggle --> 
	
	<!-- Control Sidebar -->
	
	
	<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div> 
	
</div>
<!-- ./wrapper -->
	<!-- ./wrapper -->



	<div id="chat-box-body">


		<div class="chat-box">
			<div class="chat-box-header p-15 d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<button class="waves-effect waves-circle btn btn-circle btn-primary-light h-40 w-40 rounded-circle l-h-50" type="button" data-bs-toggle="dropdown">
						<span class="icon-Add-user fs-22"><span class="path1"></span><span class="path2"></span></span>
					</button>
					<div class="dropdown-menu min-w-200">
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Color me-15"></span>
							New Group</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Clipboard me-15"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
							Contacts</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Group me-15"><span class="path1"></span><span class="path2"></span></span>
							Groups</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Active-call me-15"><span class="path1"></span><span class="path2"></span></span>
							Calls</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Settings1 me-15"><span class="path1"></span><span class="path2"></span></span>
							Settings</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Question-circle me-15"><span class="path1"></span><span class="path2"></span></span>
							Help</a>
						<a class="dropdown-item fs-16" href="#">
							<span class="icon-Notifications me-15"><span class="path1"></span><span class="path2"></span></span>
							Privacy</a>
					</div>
				</div>
				<div class="text-center flex-grow-1">
					<div class="text-info fs-18">Mayra Sibley</div>
					<div>
						<span class="badge badge-sm badge-dot badge-primary"></span>
						<span class="text-muted fs-12">Active</span>
					</div>
				</div>
				<div class="chat-box-toggle">
					<button id="chat-box-toggle" class="waves-effect waves-circle btn btn-circle btn-danger-light h-40 w-40 rounded-circle l-h-50" type="button">
						<span class="icon-Close fs-22"><span class="path1"></span><span class="path2"></span></span>
					</button>
				</div>
			</div>
			<div class="chat-box-body">
				<div class="chat-box-overlay">
				</div>
				<div class="chat-logs">
					<div class="chat-msg user">
						<div class="d-flex align-items-center">
							<span class="msg-avatar">
								<img src="../../../images/avatar/2.jpg" class="avatar avatar-lg" alt="">
							</span>
							<div class="mx-10">
								<a href="#" class="text-info hover-primary fw-bold">Mayra Sibley</a>
								<p class="text-muted fs-12 mb-0">2 Hours</p>
							</div>
						</div>
						<div class="cm-msg-text">
							Hi there, I'm Jesse and you?
						</div>
					</div>
					<div class="chat-msg self">
						<div class="d-flex align-items-center justify-content-end">
							<div class="mx-10">
								<a href="#" class="text-info hover-primary fw-bold">You</a>
								<p class="text-muted fs-12 mb-0">3 minutes</p>
							</div>
							<span class="msg-avatar">
								<img src="../../../images/avatar/3.jpg" class="avatar avatar-lg" alt="">
							</span>
						</div>
						<div class="cm-msg-text">
							My name is Anne Clarc.
						</div>
					</div>
					<div class="chat-msg user">
						<div class="d-flex align-items-center">
							<span class="msg-avatar">
								<img src="../../../images/avatar/2.jpg" class="avatar avatar-lg" alt="">
							</span>
							<div class="mx-10">
								<a href="#" class="text-info hover-primary fw-bold">Mayra Sibley</a>
								<p class="text-muted fs-12 mb-0">40 seconds</p>
							</div>
						</div>
						<div class="cm-msg-text">
							Nice to meet you Anne.<br>How can i help you?
						</div>
					</div>
				</div><!--chat-log -->
			</div>
			<div class="chat-input">
				<form>
					<input type="text" id="chat-input" placeholder="Send a message..." />
					<button type="submit" class="chat-submit" id="chat-submit">
						<span class="icon-Send fs-22"></span>
					</button>
				</form>
			</div>
		</div>
	</div>

	<!-- Page Content overlay -->
	<script src="<?= asset('../src/js/pages/timeline.js'); ?>"></script>
	<?php

	view('users/inc/footer');

	?>