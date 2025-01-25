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
							<div class="box box-body pull-up fill-icon">
							  <div class="d-flex justify-content-between align-items-center">	
								<h4 class="mb-0 fw-500"><i class="fa-solid fa-list-check fs-26 text-primary align-middle"></i> Managing</h4>
								<div>
									<ul class="box-controls pull-right">
										<li class="dropdown">
											<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1" aria-expanded="false"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-end" style="">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Today</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Weekly</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Monthly</a>	 
											</div>
										</li>
									</ul>
								</div>
							  </div>
							  <div class="mt-15">
							  	<div class="d-flex justify-content-around align-items-center">
								  	<h1 class="mb-0">5</h1>
								  	<h1 class="mb-0">12</h1>
								 </div>
								 <div class="d-flex justify-content-around align-items-center">
								  	<p>Stations</p>
								  	<p>Outlets</p>
								 </div>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up fill-icon">
							  <div class="d-flex justify-content-between align-items-center">
								<h4 class="mb-0 fw-500"><i class="fa-solid fa-charging-station fs-26 text-success align-middle"></i> Currently</h4>
								<div>
									<ul class="box-controls pull-right">
										<li class="dropdown">
											<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1" aria-expanded="false"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-end" style="">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Today</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Weekly</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Monthly</a>	 
											</div>
										</li>
									</ul>
								</div>
							  </div>
							  <div class="mt-15">
							  	<div class="d-flex justify-content-around align-items-center">
								  	<h1 class="mb-0">3</h1>
								  	<h1 class="mb-0">2</h1>
								 </div>
								 <div class="d-flex justify-content-around align-items-center">
								  	<p>In Use</p>
								  	<p>Not In Use</p>
								 </div>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up fill-icon">
							  <div class="d-flex justify-content-between align-items-center">
								<h4 class="mb-0 fw-500"><i class="fa-solid fa-arrows fs-26 text-danger align-middle"></i> Consumed</h4>
								<div>
									<ul class="box-controls pull-right">
										<li class="dropdown">
											<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1" aria-expanded="false"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-end" style="">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Today</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Weekly</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Monthly</a>	 
											</div>
										</li>
									</ul>
								</div>
							  </div>
							  <div class="">
							  	<div class="text-center">
								  	<h1 class="mb-0">2589</h1>
								  	<h6 class="mt-0">Kw</h6>
								 </div>
							  </div>
							  <div>
							  	<p class="mb-0"><i class="fa-solid fa-arrows-down-to-line text-danger"></i> <strong class="text-danger">3%</strong><span class="text-fade">  vs last month</span></p>
							  </div>
							</div>
						</div>
						<div class="col-xxl-3 col-xl-6 col-lg-6 col-12 ">
							<div class="box box-body pull-up fill-icon income">
							  <div class="d-flex justify-content-between align-items-center">
								<h4 class="mb-0 fw-500"><i class="fa-solid fa-dollar-sign fs-26 text-info align-middle"></i> Income</h4>
								<div>
									<ul class="box-controls pull-right">
										<li class="dropdown">
											<a data-bs-toggle="dropdown" href="#" class="px-10 pt-1" aria-expanded="false"><i class="ti-more-alt"></i></a>
											<div class="dropdown-menu dropdown-menu-end" style="">
												<a class="dropdown-item" href="#"><i class="ti-import"></i> Today</a>
												<a class="dropdown-item" href="#"><i class="ti-export"></i> Weekly</a>
												<a class="dropdown-item" href="#"><i class="ti-printer"></i> Monthly</a>	 
											</div>
										</li>
									</ul>
								</div>
							  </div>
							  <div class="">
							  	<div class="d-flex justify-content-between align-items-center text-center">
							  		<div class="col-6">
									  	<!-- <div class=""> -->
											  <h1 class="mb-0 mt-0">$584</h1>
											  <p class="mb-0">Earned</p>
										<!-- </div> -->
									</div>
									<div class="col-6">
										<div>
											<div id="chart" class="mb-0"></div>
										</div>
									</div>
							  	</div>
							  <div>
							  	<!-- <div>
							  		<p><i class="fa-solid fa-arrows-up-to-line text-primary"></i> <strong class="text-primary">12%</strong><span class="text-fade">  vs last month</span></p>
							  	</div> -->
							  </div>
							</div>
						</div>
					</div>

					
						<div class="col-xxl-4 col-xl-5 col-12">
							<div class="box">
								<div class="box-header d-flex justify-content-between align-items-center">
									<h4 class="box-title mb-0">Charger Status</h4>
									<button type="button" class="btn btn-md border border-0 bg-secondary-light rounded-2 text-dark">View Chargers</button>
								</div>
									<div class="box-body">
										<div>
											<div id="charts_widget_2_chart"></div>
										</div>
									</div>
							</div>
						</div>
						<div class="col-xxl-8 col-xl-7 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Usage Summary</h4>
								</div>	
								<div class="box-body">
									<div>
										<div id="line-chart"></div>
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-xxl-6 col-xl-5 col-12">
								<div class="box">
									<div class="box-header fill-icon">
										<h4 class="box-title">Occupancy of charging stations <a href="#"><i class="fa-solid fa-circle-info text-fade"></i></a></h4>	
									</div>	
									<div class="box-body fill-icon occupancy">
										
										<div class="d-flex justify-content-between align-items-center">
								            <p class="fw-400 mb-0"><i class="fa-solid fa-location-dot"></i> Dallas, USA</p>
								            <p class="mb-0"><i class="fa-solid fa-plug"></i>  <b>140</b>/183</p>
									    </div>
									    <div class="progress mt-5" style="height:10px";>
									           <div class="progress-bar bg-success" style="width: 40%"></div>
									    </div>

								        <div class="d-flex justify-content-between align-items-center">
								            <p class="fw-400 mb-0"><i class="fa-solid fa-location-dot"></i> Tokyo, JAPAN</p>
								            <p class=" mb-0"><i class="fa-solid fa-plug"></i>  <b>250</b>/300</p>
									    </div>
									    <div class="progress mt-5" style="height:10px";>
									            <div class="progress-bar bg-success" style="width: 70%"></div>
									    </div>	


									    <div class="d-flex justify-content-between align-items-center">
								            <p class="fw-400 mb-0"><i class="fa-solid fa-location-dot"></i> Texas, USA</p>
								            <p class="mb-0"><i class="fa-solid fa-plug"></i>  <b>210</b>/250</p>
									    </div>
									    <div class="progress mt-5" style="height:10px";>
									            <div class="progress-bar bg-success" style="width: 55%"></div>
									    </div>
							        </div>
								</div>
						</div>	
						<div class="col-xxl-6 col-xl-7 col-12">
								<div class="box">
									<div class="box-header d-flex justify-content-between align-items-center fill-icon">
										<!-- <div class=""> -->
											<h4 class="box-title"><i class="fa-solid fa-location-dot "></i> Dallas, USA</h4>
											<p class="text-fade">ID D195821</p>	
										<!-- </div> -->
									</div>	
									<div class="box-body march">
								    	<h5 class="text-fade mb-10">March/2024</h5>
								    	<div class="d-sm-flex justify-content-between align-items-center">
									    	<div>
									    		<div class="d-flex justify-content-between align-items-center fill-icon">
									    			<h6 class="text-fade mb-5"><i class="fa-solid fa-plug text-success"></i> Charges</h6>
									    			<h5 class="fw-500 mb-10 ms-20">1254</h5>
									    		</div>
									    		<div class="d-flex justify-content-between align-items-center fill-icon">
									    			<h6 class="text-fade mb-5"><i class="fa-solid fa-bolt text-warning"></i> Instant Power</h6>
									    			<h5 class="fw-500 mb-10 ms-20">32 kW</h5>
									    		</div>
									    		<div class="d-flex justify-content-between align-items-center fill-icon">
									    			<h6 class="text-fade mb-5"><i class="fa-regular fa-clock text-primary"></i> Time Consumed</h6>
									    			<h5 class="fw-500 mb-10 ms-20">85 h</h5>
									    		</div>
									    	</div>
									    	<div>
									    		<div id="chart2"></div>
									    		<!-- <div class="text-center">
													<input class="knob" data-width="180" data-height="180" data-min="-100" data-fgColor="#ff4c52" data-displayPrevious="true" data-angleOffset="-125" data-angleArc="250" value="65" />
												</div> -->
									    	</div>
								    	</div>
							        </div>
								</div>
						</div>
					
					
					
					<div class="col-xl-12 col-12">
						  <div class="box">
							<div class="box-header with-border">
							  <h4 class="box-title">All Invoices</h4>
							</div>
							<div class="box-body no-padding">
								<div class="table-responsive">
								  <table class="table table-hover">
									<tbody>
									<tr>
									  <th><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
									  <label class="form-check-label" for="flexCheckDefault">
									    <span class="text-fade">Number</span>
									  </label>
									</div></th>
									  <th class="text-fade">Issued On</th>
									  <th class="text-fade">User Name</th>
									  <th class="text-fade" >EV Charger Location</th>
									  <th class="text-fade">EV Charger Info</th>
									  <th class="text-fade">Energy</th>
									  <th class="text-fade">Total</th>
									  <th class="text-fade">Payment Status</th>
									</tr>
									<tr>
									  <td> <div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
									  <label class="form-check-label" for="flexCheckDefault1">
									    <span class="text-primary">#123456</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>22/1/2024</td>
									  <td>John</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 1</td>
									  <td>60 kWh</td>
									  <td>$58.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
									  <label class="form-check-label" for="flexCheckDefault2">
									    <span class="text-primary">#458789</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>25/3/2024</td>
									  <td>Diana</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 2</td>
									  <td>50 kWh</td>
									  <td>$61.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
									  <label class="form-check-label" for="flexCheckDefault3">
									    <span class="text-primary">#84532</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>18/4/2024</td>
									  <td>Michael</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 1</td>
									  <td>80 kWh</td>
									  <td>$45.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
									  <label class="form-check-label" for="flexCheckDefault4">
									    <span class="text-primary">#458789</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>12/8/2024</td>
									  <td>Joe</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 2</td>
									  <td>70 kWh</td>
									  <td>$25.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
									  <label class="form-check-label" for="flexCheckDefault5">
									    <span class="text-primary">#92154</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>22/4/2024</td>
									  <td>Lina</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 1</td>
									  <td>50 kWh</td>
									  <td>$50.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
									  <label class="form-check-label" for="flexCheckDefault6">
									    <span class="text-primary">#62154</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>01/7/2024</td>
									  <td>Erica</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 1</td>
									  <td>50 kWh</td>
									  <td>$40.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
									<tr>
									  <td><div class="form-check">
									  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
									  <label class="form-check-label" for="flexCheckDefault7">
									    <span class="text-primary">#38754</span>
									  </label>
									</div><a href="javascript:void(0)" class="text-primary"></a></td>
									  <td>18/5/2024</td>
									  <td>Eva</td>
									  <td><i class="fa-solid fa-map-pin text-danger"></i> Charger Location</td>
									  <td>Charger Type 2</td>
									  <td>25 kWh</td>
									  <td>$18.00</td>
									  <td><button class="btn-sm bg-success-light border border-3 border-success rounded-2">Paid</button></td>
									</tr>
								  </tbody></table>
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


	
	<!-- <script type="text/javascript" src="../../../../../cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script> -->
	<!-- Vendor JS -->
	<!-- <script src="../src/js/vendors.min.js"></script>
	<script src="../src/js/pages/chat-popup.js"></script>
	<script src="../../../assets/icons/feather-icons/feather.min.js"></script>

	<script src="../../../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="../../../assets/vendor_components/raphael/raphael.min.js"></script>
	<script src="../../../assets/vendor_components/morris.js/morris.min.js"></script>
	<script src="../../../assets/vendor_components/moment/min/moment.min.js"></script>
	<script src="../../../assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>

 -->

	
	<!-- EV Admin App -->
	<!-- <script src="../src/js/demo.js"></script>
	<script src="../src/js/template.js"></script>
	<script src="../src/js/pages/information.js"></script>
	<script src="../src/js/pages/widget-inline-charts.js"></script> -->

<?php

view('pages/inc/header');

?>