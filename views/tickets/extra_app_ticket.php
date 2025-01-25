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
				<!-- Content Header (Page header) -->
				<!-- Main content -->
				<section class="content">

					<div class="row">
						<div class="col-xxl-4 col-xl-4 col-lg-12 col-sm-12 col-12">
							<div class="row">
								<div class="col-6">
									<a class="box box-link-shadow text-center" href="javascript:void(0)">
										<div class="box-body">
											<div class="fs-24"><?= $data['totalMessageAdmin'] ?></div>
											<span>Total Tickets</span>
										</div>
										<div class="box-body bg-info btsr-0 bter-0">
											<p>
												<span class="mdi mdi-ticket-confirmation fs-30"></span>
											</p>
										</div>
									</a>
									<a class="box box-link-shadow text-center" href="javascript:void(0)">
										<div class="box-body">
											<div class="fs-24">0</div>
											<span>Resolve</span>
										</div>
										<div class="box-body bg-success btsr-0 bter-0">
											<p>
												<span class="mdi mdi-thumb-up-outline fs-30"></span>
											</p>
										</div>
									</a>
								</div>
								<div class="col-6">
									<a class="box box-link-shadow text-center" href="javascript:void(0)">
										<div class="box-body">
											<div class="fs-24"><?= $data['totalAdminResponses'] ?></div>
											<span>Responded</span>
										</div>
										<div class="box-body bg-warning btsr-0 bter-0">
											<p>
												<span class="mdi mdi-message-reply-text fs-30"></span>
											</p>
										</div>
									</a>
									<a class="box box-link-shadow text-center" href="javascript:void(0)">
										<div class="box-body">
											<div class="fs-24">0</div>
											<span>Pending</span>
										</div>
										<div class="box-body bg-danger btsr-0 bter-0">
											<p>
												<span class="mdi mdi-ticket fs-30"></span>
											</p>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h5 class="box-title">Tickets share per category</h5>
								</div>

								<div class="box-body">
									<div class="text-center pb-10">
										<div class="donut" data-peity='{ "fill": ["#fc4b6c", "#ffb22b", "#398bf7"], "radius": 92, "innerRadius": 50  }'>9,6,5</div>
									</div>

									<ul class="list-inline">
										<li class="flexbox mb-5">
											<div>
												<span class="badge badge-dot badge-lg me-1" style="background-color: #fc4b6c"></span>
												<span>Technical</span>
											</div>
											<div>8952</div>
										</li>

										<li class="flexbox mb-5">
											<div>
												<span class="badge badge-dot badge-lg me-1" style="background-color: #ffb22b"></span>
												<span>Accounts</span>
											</div>
											<div>7458</div>
										</li>

										<li class="flexbox">
											<div>
												<span class="badge badge-dot badge-lg me-1" style="background-color: #398bf7"></span>
												<span>Other</span>
											</div>
											<div>3254</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-4 col-lg-6 col-sm-12 col-12">
							<div class="box">
								<div class="box-header with-border">
									<h5 class="box-title">Tickets share per agent</h5>
								</div>

								<div class="box-body">
									<div class="flexbox mt-10">
										<div class="bar" data-peity='{ "fill": ["#666EE8", "#1E9FF2", "#28D094", "#FF4961", "#FF9149"], "height": 265, "width": 120, "padding":0.2 }'>952,558,1254,427,784</div>
										<ul class="list-inline align-self-end text-muted text-end mb-0">
											<li>Andrew <span class="badge badge-primary ms-2">154</span></li>
											<li>Benjamin <span class="badge badge-info ms-2">154</span></li>
											<li>Elijah <span class="badge badge-success ms-2">254</span></li>
											<li>Chloe <span class="badge badge-danger ms-2">854</span></li>
											<li>Daniel <span class="badge badge-warning ms-2">215</span></li>
										</ul>
									</div>

								</div>
							</div>
						</div>
						<div class="col-12">
							<div class="box">
								<div class="box-header with-border">
									<h4 class="box-title">Support Ticket List</h4>
									<h6 class="box-subtitle">List of ticket opend by customers</h6>
								</div>
								<div class="box-body p-15">
									<div class="table-responsive">
										<table id="tickets" class="table mt-0 table-hover no-wrap" data-page-size="10">
											<thead>
												<tr>
													<th>Gönderenin adı</th>
													<th>Gönderenin e-postası</th>
													<th>Alıcının e-postası</th>
													<th>Alıcının adı</th>
													<th>mesaj</th>
													<th>Nakliye süresi</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											if(isset($data['messages'])):
											foreach ($data['messages'] as $message): ?>
                <tr>
                    <td><?= $message->sender_name ?></td>
                    <td><?= $message->sender_email ?></td>
                    <td><?= $message->receiver_name ?></td>
                    <td><?= $message->receiver_email ?></td>
                    <td><?= $message->message ?></td>
                    <td><?= $message->created_at ?></td>
                </tr>
                <?php endforeach; endif; ?>
											
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /.row -->

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
					<div class="text-dark fs-18">Mayra Sibley</div>
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
								<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
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
								<a href="#" class="text-dark hover-primary fw-bold">You</a>
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
								<a href="#" class="text-dark hover-primary fw-bold">Mayra Sibley</a>
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


	<script src="<?= asset('../../../assets/vendor_components/jquery.peity/jquery.peity.js') ?>"></script>
	<script src="<?= asset('../src/js/pages/data-table.js') ?>"></script>
	<script src="<?= asset('../src/js/pages/app-ticket.js') ?>"></script>


	<?php

	view('users/inc/footer');

	?>