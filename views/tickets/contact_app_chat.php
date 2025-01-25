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
		<!-- Content Wrapper. Contains page content -->
		 
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-lg-4 col-12">
							<div class="box">
								<div class="box-header no-border p-0">
									<ul class="nav nav-tabs nav-bordered" role="tablist">
										<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#messages" role="tab">Chat </a> </li>
										<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#contacts" role="tab">New</a> </li>
									</ul>
								</div>
								<div class="box-body">
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="messages" role="tabpanel">
											<!-- start search box -->
											<div class="app-search">
												<form>
													<div class="mb-15 position-relative">
														<input type="text" class="form-control"
															placeholder="People, groups & messages..." />
														<span class="mdi mdi-magnify search-icon"></span>
													</div>
												</form>
											</div>
											<!-- end search box -->
											<div class="chat-box-one-side3">
												<div class="media-list media-list-hover">
													<a href="javascript:void(0);" class="media p-0">
														<div class="w-p100 d-flex align-items-center m-1 p-2" id="admin-user">
															<img src="../../../images/avatar/avatar-9.png" class="bg-light ms-0 me-2 rounded-circle" height="48" alt="Brandon Smith" />
															<div class="w-p100 overflow-hidden">
																<h5 class="mt-0 mb-0 fs-14 fw-600">
																	<span class="float-end text-muted fs-12 fw-400">4:30am</span>
																	Brandon Smith
																</h5>
																<p class="mt-1 mb-0 text-muted fs-14">
																	<span class="w-25 float-end text-end"><span class="badge badge-danger-light">3</span></span>
																	<span class="w-75 text-dark">How are you today?</span>
																</p>
															</div>
														</div>
														<style>
															.pinned {
																background-color: #d3d3d3;
																/* رنگ خاکستری برای زمانی که پین شد */
															}
														</style>
														<script>
															window.onload = function() {
																const admin = document.getElementById("admin-user");

																// اضافه کردن کلاس 'pinned' به اکانت ادمین
																admin.classList.add("pinned");
															}
														</script>
													</a>

													<!-- <a href="javascript:void(0);" class="media p-0 bg-gray-300"> -->
													<?php
													if(isset($data['users_chat']) && count($data['users_chat']) > 0){
														foreach($data['users_chat'] as $chat):
													?>
													        <a href="javascript:void(0);" class="media p-0 chat-user" data-user-id="<?= $chat->id ?>">

														<div class="w-p100 d-flex align-items-center m-1 p-2">
															<img src="<?= asset('../../../images/avatar/' . $chat->profile_image) ?>" class="bg-light ms-0 me-2 rounded-circle" height="48" alt="Sarah Kortney" />
															<div class="w-p100 overflow-hidden">
																<h5 class="mt-0 mb-0 fs-14 fw-600 text-primary">
																	<span class="float-end text-muted fs-12 fw-400 ">5:30am</span>
																	<?= $chat->last_name . ' ' . $chat->family_name ?>
																</h5>
																<p class="mt-1 mb-0 text-muted fs-14">
																	<span class="w-75">Hey! a reminder for tomorrow's meeting...</span>
																</p>
															</div>
														</div>
													</a>
													<?php
														endforeach;
													}
													?>

												</div>
											</div>
										</div>
										<div class="tab-pane" id="contacts" role="tabpanel">
											<div class="chat-box-one-side3">
												<?php
												if (isset($data['users'])) {
													foreach ($data['users'] as $user):
												?>
														<div class="media-list media-list-hover">
															<div class="media py-10 px-0 align-items-center">
																<a class="avatar avatar-lg status-success me-2" href="#">
																	<img src="<?= asset('../../../images/avatar/' . $user->profile_image) ?>" class="bg-light" alt="...">
																</a>
																<div class="ms-0 media-body">
																	<p class="fs-14 fw-600">
																		<a class="hover-primary" href="#"><?= $user->last_name . ' ' . $user->family_name ?></a>
																	</p>
																</div>
															</div>

														</div>
												<?php
													endforeach;
												}
												?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-12">
							<div class="box">
								<div class="box-header">
									<div class="media align-items-top p-0">
										<a class="avatar avatar-lg status-success mx-0" href="#" data-bs-toggle="modal" data-bs-target="#right-modal">
											<img src="../../../images/avatar/avatar-1.png" class="bg-light rounded-circle" alt="...">
										</a>
										<div class="d-lg-flex d-block justify-content-between align-items-center w-p100">
											<div class="media-body mb-lg-0 mb-20">
												<p class="fs-16">
													<a class="hover-primary fw-600" href="#" data-bs-toggle="modal" data-bs-target="#right-modal">Sarah Kortney</a>
												</p>
												<p class="fs-12 text-fade">Last Seen 10:30pm ago</p>
											</div>
											<div>
												<ul class="list-inline mb-0 fs-18">
													<li class="list-inline-item"><a href="#" class="hover-primary"><i class="fa fa-phone"></i></a></li>
													<li class="list-inline-item"><a href="#" class="hover-primary"><i class="fa fa-video-camera"></i></a></li>
													<li class="list-inline-item"><a href="#" class="hover-primary"><i class="fa fa-ellipsis-h"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="box-body">
									<div class="chat-box-one2">

										<div class="card no-border d-inline-block my-20 float-start me-2 no-shadow max-w-p80">
											<div class="d-flex flex-row pb-2 align-items-center">
												<a class="d-flex align-items-center" href="#">
													<img alt="Profile" src="../../../images/avatar/avatar-1.png" class="bg-light avatar rounded-circle me-10">
													<p class="mb-0 fs-14 fw-500 text-dark">Sarah Kortney</p>
												</a>
											</div>
											<div class="mt-5 card-body p-15 bg-info-light rounded10 d-inline-block">
												<div class="chat-text-start">
													<p class="mb-0 text-dark">Yeah everything is fine</p>
												</div>
											</div>
											<p class="ps-5 mt-10 mb-0 fs-12 text-mute"><i class="me-5 fa fa-clock-o"></i>09:25</p>
										</div>
										<div class="clearfix"></div>

										<div class="card no-border d-inline-block my-20 text-end float-end me-2 no-shadow max-w-p80">
											<div class="d-flex flex-row pb-2 align-items-center justify-content-end">
												<a class="d-flex align-items-center" href="#">
													<p class="mb-0 fs-14 fw-500 text-dark">You</p>
													<img alt="Profile" src="../../../images/avatar/avatar-2.png" class="bg-light avatar rounded-circle ms-10">
												</a>
											</div>
											<div class="mt-5 card-body p-15 bg-primary-light rounded10 d-inline-block">
												<div class="chat-text-start">
													<p class="mb-0 text-dark">Wow</p>
												</div>
											</div>
											<p class="pe-5 mt-10 mb-0 fs-12 text-mute"><i class="me-5 fa fa-clock-o"></i>09:25</p>
										</div>
										<div class="clearfix"></div>


									</div>
								</div>
								<div class="box-footer no-border">
									<div class="d-md-flex d-block justify-content-between align-items-center bg-white p-5 rounded10 b-1 overflow-hidden">
										<input class="form-control b-0 py-10" type="text" placeholder="Say something...">
										<div class="d-flex justify-content-between align-items-center mt-md-0 mt-30">
											<button type="button" class="waves-effect waves-circle btn btn-circle me-10 btn-outline-secondary">
												<i class="mdi mdi-link"></i>
											</button>
											<button type="button" class="waves-effect waves-circle btn btn-circle me-10 btn-outline-secondary">
												<i class="mdi mdi-face"></i>
											</button>
											<button type="button" class="waves-effect waves-circle btn btn-circle me-10 btn-outline-secondary">
												<i class="mdi mdi-microphone"></i>
											</button>
											<button type="button" class="waves-effect waves-circle btn btn-circle btn-primary" id="sub">
												<i class="mdi mdi-send"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div id="right-modal" class="modal modal-right fade" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-header no-border">
											<div class="dropdown d-block">
												<a href="#" class="dropdown-toggle no-caret" data-bs-toggle="dropdown" aria-expanded="false">
													<i class="fs-18 mdi mdi-dots-horizontal"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-start">
													<!-- item-->
													<a href="javascript:void(0);" class="dropdown-item">View full</a>
													<!-- item-->
													<a href="javascript:void(0);" class="dropdown-item">Edit Contact Info</a>
													<!-- item-->
													<a href="javascript:void(0);" class="dropdown-item">Remove</a>
												</div>
											</div>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body pt-0">
											<div class="card no-shadow no-border">
												<div class="card-body p-0">

													<div class="clearfix"></div>
													<div class="text-center">
														<img src="../../../images/avatar/avatar-1.png" alt="shreyu" class="bg-light img-thumbnail rounded-circle" />
														<h4 class="mt-3">Sarah Kortney</h4>
														<button class="btn btn-primary btn-sm my-2">Send Email</button>
														<p class="my-2 fs-14 text-muted">Last Interacted: <sapn class="text-dark">Few hours back</sapn>
														</p>
													</div>

													<div class="mt-30">
														<hr class="" />
														<p class="mt-30 mb-1"><strong><i class="mdi mdi-link"></i> Email:</strong></p>
														<p class="mb-30 text-mute">support@coderthemes.com</p>

														<p class="mt-3 mb-1"><strong><i class="mdi mdi-phone"></i> Phone Number:</strong></p>
														<p class="mb-30 text-mute">+1 456 9595 9594</p>

														<p class="mt-3 mb-1"><strong><i class="mdi mdi-map-marker"></i> Location:</strong></p>
														<p class="mb-30 text-mute">California, USA</p>
													
													</div>
												</div> <!-- end card-body -->
											</div>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
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
			</script> <a href="https://profitline.app/">ProfitLine</a>. Ofic.
		</footer>
	
		<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
			<?php

			view('pages/inc/sidebar_user');

			?>
		</div>


		<?= view('pages/inc/sidebar_setting') ?>

	</div>
	<!-- ./wrapper -->
	<script>
$(document).ready(function() {
    $('#sub').click(function() {
		alert('df');
        var message = $('#chatInput').val();

        if (message.trim() === '') {
            return; // Do not send empty messages
        }

        var formData = new FormData();
        formData.append("sender_id", "1"); // Replace with actual sender ID
        formData.append("receiver_id", "3"); // Replace with actual receiver ID
        formData.append("message", message);

        $.ajax({
            url: "http://localhost/web-app/message/sendMessage",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(result) {
                // Append the sent message to the chat box
                var newMessage = `
                    <div class="card no-border d-inline-block my-20 text-end float-end me-2 no-shadow max-w-p80">
                        <div class="d-flex flex-row pb-2 align-items-center justify-content-end">
                            <a class="d-flex align-items-center" href="#">
                                <p class="mb-0 fs-14 fw-500 text-dark">You</p>
                                <img alt="Profile" src="../../../images/avatar/avatar-2.png" class="bg-light avatar rounded-circle ms-10">
                            </a>
                        </div>
                        <div class="mt-5 card-body p-15 bg-primary-light rounded10 d-inline-block">
                            <div class="chat-text-start">
                                <p class="mb-0 text-dark">${message}</p>
                            </div>
                        </div>Object not found!
                        <p class="pe-5 mt-10 mb-0 fs-12 text-mute"><i class="me-5 fa fa-clock-o"></i></p> 
                    </div>
                    <div class="clearfix"></div>
                `;
                $('.chat-box-one2').append(newMessage);
                $('#chatInput').val(''); // Clear the input field

                // Scroll to the bottom of the chat box
                $('.chat-box-one2').scrollTop($('.chat-box-one2')[0].scrollHeight);
            },
            error: function(error) {
                console.log('error', error);
                // Display an error message to the user
                // e.g., alert('Failed to send message.');
            }
        });
    });
});
</script>

	<!-- Page Content overlay -->
	<?php

	view('users/inc/footer');

	?>