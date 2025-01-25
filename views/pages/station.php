<?php

view('pages/inc/header');

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
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
							  <h4 class="fw-500">Total Chargers</h4>
							  <div class="d-flex">
							  	<img src="../../../images/battery.png" class="w-50 h-50">
							  	<h2 class="fw-500">256</h2>
							  </div>
							  <div>
							  	<div class="progress mt-10 mb-5" style="height:8px;">
								  <div class="progress-bar" role="progressbar" aria-valuenow="0" style="width: 100%" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mt-0 text-fade mb-0">100%</p>
							  </div> 
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
							  <h4 class="fw-500">Available Chargers <i class="fa-solid fa-circle-info text-fade"></i></h4>
							  <div class="d-flex">
							  	<h2 class="fw-500">425</h2>
							  </div>
							  <div>
							  	<div class="progress mt-10 mb-5" style="height:8px;">
								  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="0" style="width:75%" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mt-0 text-fade mb-0">75%</p>
							  </div> 
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
							  <h4 class="fw-500">In Use Chargers <i class="fa-solid fa-circle-info text-fade"></i></h4>
							  <div class="d-flex">
							  	<h2 class="fw-500">100</h2>
							  </div>
							  <div>
							  	<div class="progress mt-10 mb-5" style="height:8px;">
								  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" style="width:45%" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mt-0 text-fade mb-0">45%</p>
							  </div> 
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
							  <h4 class="fw-500">Unavailable Charger <i class="fa-solid fa-circle-info text-fade"></i></h4>
							  <div class="d-flex">
							  	<h2 class="fw-500">18</h2>
							  </div>
							  <div>
							  	<div class="progress mt-10 mb-5" style="height:8px;">
								  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" style="width: 8%" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<p class="mt-0 text-fade mb-0">8%</p>
							  </div> 
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12">
							<div class="box box-body pull-up">
							  <div class="d-flex justify-content-between align-items-center">
							  	<img src="../../../images/charging-station.png" class="w-50 h-50">
							  	<ul class="box-controls pull-right">
									<li class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1"><i class="ti-more-alt fs-18"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</li>
								</ul>
							  </div>
							  <div class="d-flex justify-content-between align-items-center mt-10">
							  	<h1 class="mb-0">2.5 <span class="text-fade fs-16">miles</span></h1>
							  	<a href="#"><span class="border border-3 rounded-2 border-success px-5"><i class="fa-solid fa-xmark text-success"></i></span></a>
							  </div>
							  <div>
							  	<h4 class="mt-10">Tesla Station</h4 class="mt-10">
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<p class="text-fade mb-0">Type</p>
							  	<p class="text-fade mb-0">Price</p>
							  	<p class="text-fade mb-0">Slot</p>
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<h5 class="mb-0">DC</h5>
							  	<h5 class="mb-0">$2.2kW</h5>
							  	<h5 class="mb-0">2</h5>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12">
							<div class="box box-body pull-up">
							  <div class="d-flex justify-content-between align-items-center">
							  	<img src="../../../images/charging-station.png" class="w-50 h-50">
							  	<ul class="box-controls pull-right">
									<li class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1"><i class="ti-more-alt fs-18"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</li>
								</ul>
							  </div>
							  <div class="d-flex justify-content-between align-items-center mt-10">
							  	<h1 class="mb-0">3.8 <span class="text-fade fs-16">miles</span></h1>
							  	<a href="#"><span class="border border-3 rounded-2 border-success px-5"><i class="fa-solid fa-share text-success"></i></span></a>
							  </div>
							  <div>
							  	<h4 class="mt-10">Benz Station</h4 class="mt-10">
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<p class="text-fade mb-0">Type</p>
							  	<p class="text-fade mb-0">Price</p>
							  	<p class="text-fade mb-0">Slot</p>
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<h5 class="mb-0">DC</h5>
							  	<h5 class="mb-0">$1.5kW</h5>
							  	<h5 class="mb-0">5</h5>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12">
							<div class="box box-body pull-up">
							  <div class="d-flex justify-content-between align-items-center">
							  	<img src="../../../images/charging-station.png" class="w-50 h-50">
							  	<ul class="box-controls pull-right">
									<li class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1"><i class="ti-more-alt fs-18"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</li>
								</ul>
							  </div>
							  <div class="d-flex justify-content-between align-items-center mt-10">
							  	<h1 class="mb-0">2.6 <span class="text-fade fs-16">miles</span></h1>
							  	<a href="#"><span class="border border-3 rounded-2 border-success px-5"><i class="fa-solid fa-xmark text-success"></i></span></a>
							  </div>
							  <div>
							  	<h4 class="mt-10">Nissan Station</h4 class="mt-10">
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<p class="text-fade mb-0">Type</p>
							  	<p class="text-fade mb-0">Price</p>
							  	<p class="text-fade mb-0">Slot</p>
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<h5 class="mb-0">DC</h5>
							  	<h5 class="mb-0">$1.2kW</h5>
							  	<h5 class="mb-0">6</h5>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12">
							<div class="box box-body pull-up">
							  <div class="d-flex justify-content-between align-items-center">
							  	<img src="../../../images/charging-station.png" class="w-50 h-50">
							  	<ul class="box-controls pull-right">
									<li class="dropdown">
										<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1"><i class="ti-more-alt fs-18"></i></a>
										<div class="dropdown-menu dropdown-menu-end">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Import</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Export</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Print</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#"><i class="ti-settings"></i> Settings</a>
										</div>
									</li>
								</ul>
							  </div>
							  <div class="d-flex justify-content-between align-items-center mt-10">
							  	<h1 class="mb-0">1.6 <span class="text-fade fs-16">miles</span></h1>
							  	<a href="#"><span class="border border-3 rounded-2 border-success px-5"><i class="fa-solid fa-share text-success"></i></span></a>
							  </div>
							  <div>
							  	<h4 class="mt-10">SUV Station</h4 class="mt-10">
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<p class="text-fade mb-0">Type</p>
							  	<p class="text-fade mb-0">Price</p>
							  	<p class="text-fade mb-0">Slot</p>
							  </div>
							  <div class="d-flex justify-content-between align-items-center">
							  	<h5 class="mb-0">DC</h5>
							  	<h5 class="mb-0">$0.9kW</h5>
							  	<h5 class="mb-0">8</h5>
							  </div>
							</div>
						</div>
					</div>	
					<div class="row">
						<div class="col-xxl-4 col-xl-5 col-lg-12 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title mb-0">Station Usage <i class="fa-solid fa-circle-info text-fade"></i></h4>
									<p class="text-fade mb-0">Last 15 days</p>
								</div>
								<div class="box-body">
									<div>
										<div id="bar-chart"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-8 col-xl-7 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Station Location</h4>
								</div>
								<div class="box-body">
									<div class="col-12">
										   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48357.40681918931!2d-74.03144296225061!3d40.75459171897265!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sin!4v1725696949991!5m2!1sen!2sin" class="map" style="border:0; height:280px; width:100%;" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="row">
						<div class="col-xxl-4 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up">
								<div>
								  <h4 class="mb-1 fw-500">Environment</h4>
								  <p class="text-fade">Lifetime</p> 
								</div>
								<div class='d-flex justify-content-around align-items-center'>
									<div class="text-center">
										<i class="fa-solid fa-earth-asia text-primary fs-36"></i>
										<p class="mt-20">You've avoided<br><strong class="fs-20">365,254</strong><span class="text-fade fs-12">Kg</span><br>greenhouse gas<br>emissions</p>
									</div>
									<div class="text-center">
										<i class="fa-solid fa-seedling text-success fs-36"></i>
										<p class="mt-20">that's like planting<br><strong class="fs-20">4598</strong><br>tress and letting them<br>grow for 10 years</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-8 col-xl-6 col-lg-6 col-12">
							<div class="box">
								<div class="box-header d-flex justify-content-between align-items-center">
									<h4 class="box-title mb-0">Total Revenue</h4>
									<div>
											<ul class="box-controls pull-right d-md-flex d-none">
											  <li class="dropdown">
												<button class="dropdown-toggle btn border border-3 px-10" data-bs-toggle="dropdown" href="#">Last Month</button>					  
												<div class="dropdown-menu dropdown-menu-end">
												  <a class="dropdown-item" href="#">Weekly</a>
												  <a class="dropdown-item" href="#">Yearly</a>
												</div>
											  </li>
											</ul>
									</div>
								</div>
								<div class="box-body">
									<div>
										<div id="apexcharts-area"></div>
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
	
	<!-- Side panel -->   
	<!-- quick_user_toggle -->
	<div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
		<div class="modal-dialog">
		<div class="modal-content slim-scroll3">
			<div class="modal-body p-30 bg-white">
			<div class="d-flex align-items-center mb-15 justify-content-between pb-30">
				<h4 class="m-0">User Profile
				<small class="text-fade fs-12 ms-5">12 messages</small></h4>
				<a href="#" class="btn btn-icon btn-danger-light btn-sm no-shadow" data-bs-dismiss="modal">
					<span class="fa fa-close"></span>
				</a>
			</div>
						<div>
								<div class="d-flex flex-row">
										<div class=""><img src="../../../images/avatar/avatar-13.png" alt="user" class="rounded bg-danger-light w-150" width="100"></div>
										<div class="ps-20">
												<h5 class="mb-0">Nil Yeager</h5>
												<p class="my-5 text-fade">Manager</p>
												<a href="mailto:dummy@gmail.com"><span class="icon-Mail-notification me-5 text-success"><span class="path1"></span><span class="path2"></span></span> dummy@gmail.com</a>
												<button class="btn btn-success-light btn-sm mt-5"><i class="ti-plus"></i> Follow</button>
										</div>
								</div>
			</div>
							<div class="dropdown-divider my-30"></div>
							<div>
								<div class="d-flex align-items-center mb-30">
										<div class="me-15 bg-primary-light h-50 w-50 l-h-60 rounded text-center">
													<span class="icon-Library fs-24"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="d-flex flex-column fw-500">
												<a href="extra_profile.html" class="text-dark hover-primary mb-1 fs-16">My Profile</a>
												<span class="text-fade">Account settings and more</span>
										</div>
								</div>
								<div class="d-flex align-items-center mb-30">
										<div class="me-15 bg-danger-light h-50 w-50 l-h-60 rounded text-center">
												<span class="icon-Write fs-24"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="d-flex flex-column fw-500">
												<a href="mailbox.html" class="text-dark hover-danger mb-1 fs-16">My Messages</a>
												<span class="text-fade">Inbox and tasks</span>
										</div>
								</div>
								<div class="d-flex align-items-center mb-30">
										<div class="me-15 bg-success-light h-50 w-50 l-h-60 rounded text-center">
												<span class="icon-Group-chat fs-24"><span class="path1"></span><span class="path2"></span></span>
										</div>
										<div class="d-flex flex-column fw-500">
												<a href="setting.html" class="text-dark hover-success mb-1 fs-16">Settings</a>
												<span class="text-fade">Accout Settings</span>
										</div>
								</div>
								<div class="d-flex align-items-center mb-30">
										<div class="me-15 bg-info-light h-50 w-50 l-h-60 rounded text-center">
												<span class="icon-Attachment1 fs-24"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></span>
										</div>
										<div class="d-flex flex-column fw-500">
												<a href="extra_taskboard.html" class="text-dark hover-info mb-1 fs-16">Project</a>
												<span class="text-fade">latest tasks and projects</span>
										</div>
								</div>
							</div>
							<div class="dropdown-divider my-30"></div>
							<div>
								<div class="media-list">
										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">10:10</h4>
											<div class="media-body ps-15 bs-5 rounded border-primary">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Johne</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">08:40</h4>
											<div class="media-body ps-15 bs-5 rounded border-success">
												<p>Proin iaculis eros non odio ornare efficitur.</p>
												<span class="text-fade">by Amla</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">07:10</h4>
											<div class="media-body ps-15 bs-5 rounded border-info">
												<p>In mattis mi ut posuere consectetur.</p>
												<span class="text-fade">by Josef</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">01:15</h4>
											<div class="media-body ps-15 bs-5 rounded border-danger">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Rima</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">23:12</h4>
											<div class="media-body ps-15 bs-5 rounded border-warning">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Alaxa</span>
											</div>
										</a>
										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">10:10</h4>
											<div class="media-body ps-15 bs-5 rounded border-primary">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Johne</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">08:40</h4>
											<div class="media-body ps-15 bs-5 rounded border-success">
												<p>Proin iaculis eros non odio ornare efficitur.</p>
												<span class="text-fade">by Amla</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">07:10</h4>
											<div class="media-body ps-15 bs-5 rounded border-info">
												<p>In mattis mi ut posuere consectetur.</p>
												<span class="text-fade">by Josef</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">01:15</h4>
											<div class="media-body ps-15 bs-5 rounded border-danger">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Rima</span>
											</div>
										</a>

										<a class="media media-single px-0" href="#">
											<h4 class="w-50 text-gray fw-500">23:12</h4>
											<div class="media-body ps-15 bs-5 rounded border-warning">
												<p>Morbi quis ex eu arcu auctor sagittis.</p>
												<span class="text-fade">by Alaxa</span>
											</div>
										</a>
									</div>
						</div>
			</div>
		</div>
		</div>
	</div>
	<!-- /quick_user_toggle --> 
	
	<!-- Control Sidebar -->
	<aside class="control-sidebar">
		
	<div class="rpanel-title"><span class="pull-right btn btn-circle btn-danger" data-toggle="control-sidebar"><i class="ion ion-close text-white" ></i></span> </div>  <!-- Create the tabs -->
		<ul class="nav nav-tabs control-sidebar-tabs">
			<li class="nav-item"><a href="#control-sidebar-home-tab" data-bs-toggle="tab" ><i class="mdi mdi-message-text"></i></a></li>
			<li class="nav-item"><a href="#control-sidebar-settings-tab" data-bs-toggle="tab"><i class="mdi mdi-playlist-check"></i></a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<!-- Home tab content -->
			<div class="tab-pane" id="control-sidebar-home-tab">
					<div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Users</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
			</div>
			<div class="lookup lookup-sm lookup-right d-none d-lg-block">
			<input type="text" name="s" placeholder="Search" class="w-p100">
			</div>
					<div class="media-list media-list-hover mt-20">
			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-success" href="#">
				<img src="../../../images/avatar/1.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
					<span>Just now</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-danger" href="#">
				<img src="../../../images/avatar/2.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
					<span>33 min ago</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-warning" href="#">
				<img src="../../../images/avatar/3.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
					<span>42 min ago</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-primary" href="#">
				<img src="../../../images/avatar/4.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
					<span>42 min ago</span>
				</div>
			</div>			
			
			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-success" href="#">
				<img src="../../../images/avatar/1.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Tyler</strong></a>
				</p>
				<p>Praesent tristique diam...</p>
					<span>Just now</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-danger" href="#">
				<img src="../../../images/avatar/2.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Luke</strong></a>
				</p>
				<p>Cras tempor diam ...</p>
					<span>33 min ago</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-warning" href="#">
				<img src="../../../images/avatar/3.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
					<span>42 min ago</span>
				</div>
			</div>

			<div class="media py-10 px-0">
				<a class="avatar avatar-lg status-primary" href="#">
				<img src="../../../images/avatar/4.jpg" alt="...">
				</a>
				<div class="media-body">
				<p class="fs-16">
					<a class="hover-primary" href="#"><strong>Evan</strong></a>
				</p>
				<p>In posuere tortor vel...</p>
					<span>42 min ago</span>
				</div>
			</div>
				
			</div>

			</div>
			<!-- /.tab-pane -->
			<!-- Settings tab content -->
			<div class="tab-pane" id="control-sidebar-settings-tab">
					<div class="flexbox">
			<a href="javascript:void(0)" class="text-grey">
				<i class="ti-more"></i>
			</a>	
			<p>Todo List</p>
			<a href="javascript:void(0)" class="text-end text-grey"><i class="ti-plus"></i></a>
			</div>
				<ul class="todo-list mt-20">
			<li class="py-15 px-5 by-1">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_1" class="filled-in">
				<label for="basic_checkbox_1" class="mb-0 h-15"></label>
				<!-- todo text -->
				<span class="text-line">Nulla vitae purus</span>
				<!-- Emphasis label -->
				<small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
				<!-- General tools such as edit or delete-->
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_2" class="filled-in">
				<label for="basic_checkbox_2" class="mb-0 h-15"></label>
				<span class="text-line">Phasellus interdum</span>
				<small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5 by-1">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_3" class="filled-in">
				<label for="basic_checkbox_3" class="mb-0 h-15"></label>
				<span class="text-line">Quisque sodales</span>
				<small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_4" class="filled-in">
				<label for="basic_checkbox_4" class="mb-0 h-15"></label>
				<span class="text-line">Proin nec mi porta</span>
				<small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5 by-1">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_5" class="filled-in">
				<label for="basic_checkbox_5" class="mb-0 h-15"></label>
				<span class="text-line">Maecenas scelerisque</span>
				<small class="badge bg-primary"><i class="fa fa-clock-o"></i> 1 week</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_6" class="filled-in">
				<label for="basic_checkbox_6" class="mb-0 h-15"></label>
				<span class="text-line">Vivamus nec orci</span>
				<small class="badge bg-info"><i class="fa fa-clock-o"></i> 1 month</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5 by-1">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_7" class="filled-in">
				<label for="basic_checkbox_7" class="mb-0 h-15"></label>
				<!-- todo text -->
				<span class="text-line">Nulla vitae purus</span>
				<!-- Emphasis label -->
				<small class="badge bg-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
				<!-- General tools such as edit or delete-->
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_8" class="filled-in">
				<label for="basic_checkbox_8" class="mb-0 h-15"></label>
				<span class="text-line">Phasellus interdum</span>
				<small class="badge bg-info"><i class="fa fa-clock-o"></i> 4 hours</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5 by-1">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_9" class="filled-in">
				<label for="basic_checkbox_9" class="mb-0 h-15"></label>
				<span class="text-line">Quisque sodales</span>
				<small class="badge bg-warning"><i class="fa fa-clock-o"></i> 1 day</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li class="py-15 px-5">
				<!-- checkbox -->
				<input type="checkbox" id="basic_checkbox_10" class="filled-in">
				<label for="basic_checkbox_10" class="mb-0 h-15"></label>
				<span class="text-line">Proin nec mi porta</span>
				<small class="badge bg-success"><i class="fa fa-clock-o"></i> 3 days</small>
				<div class="tools">
				<i class="fa fa-edit"></i>
				<i class="fa fa-trash-o"></i>
				</div>
			</li>
			</ul>
			</div>
			<!-- /.tab-pane -->
		</div>
	</aside>
	<!-- /.control-sidebar -->
	
	<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
	<div class="control-sidebar-bg"></div> 
	
</div>
<!-- ./wrapper -->
	
	
		
	  
	
	<!-- Page Content overlay -->


<?php

view('pages/inc/footer');

?>