<?php

$totalRentalsCount24Hours = $data['data24Hours'];
$totalRentalsCount30Days = $data['data30Days'];
$totalRentalsCount1Year = $data['data1Year'];
view('pages/inc/header');


?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
<?php
view('pages/inc/header_nav' , $data['notif']);

view('pages/inc/sidebar');


?>
	<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xxl-6 col-xl-12 col-lg-12 col-12">
							<div class="box tesla">
								
								<div class="box-body">
								    <?php flash('deletedEstate'); ?>
									<video width="100%" height="100%" autoplay loop muted>
										<source src="<?= asset('../../../images/profitline.mp4') ?>" type="video/mp4">
									  </video>
									  
								</div>
							</div>
						</div>
						<div class="col-xxl-6 col-xl-12 col-lg-12 col-12">
							<div class="box">
								<div class="box-body dallasbox">
									<div class="row">
										
										<div class="col-lg-6 col-12">

										</div>

										<div class="col-12" >
											<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBoN8heGv_p5ju4p_bquCFyUoufQXM3T6k&callback=initMap" async defer></script>
											<style>
											  /* تنظیمات سبک نقشه */
											  #map {
												height: 450px;
												width: 100%;
											  }
											</style>
										  
											<div id="map"></div>
										
											<script>
											  // تابع برای تنظیم نقشه
											  function initMap() {
												// تنظیم مرکز نقشه (برای مثال استانبول)
												var center = {lat: 39.9334, lng: 32.8597};
										
												// ایجاد نقشه
												var map = new google.maps.Map(document.getElementById('map'), {
												  zoom: 6,
												  center: center
												});
										
												// لیست لوکیشن‌ها (مارکرها) در ترکیه
												var locations = [
												  {lat: 39.9334, lng: 32.8597, title: "Ankara"},
												  {lat: 41.0082, lng: 28.9784, title: "Istanbul"},
												  {lat: 38.4192, lng: 27.1287, title: "Izmir"},
												  {lat: 37.8667, lng: 27.8795, title: "Pamukkale"},
												  {lat: 36.8810, lng: 30.7070, title: "Antalya"},
												  {lat: 38.7317, lng: 35.4851, title: "Cappadocia"},
												  {lat: 40.9760, lng: 29.0388, title: "Bursa"},
												  {lat: 41.2785, lng: 36.3353, title: "Trabzon"},
												  {lat: 37.4728, lng: 29.1271, title: "Konya"}
												];
										
												// اضافه کردن مارکرها به نقشه
												locations.forEach(function(location) {
												  var marker = new google.maps.Marker({
													position: location,
													map: map,
													title: location.title
												  });
										
												  // اضافه کردن پنجره اطلاعات (اختیاری)
												  var infowindow = new google.maps.InfoWindow({
													content: location.title
												  });
										
												  // باز کردن پنجره اطلاعات در هنگام کلیک روی مارکر
												  marker.addListener('click', function() {
													infowindow.open(map, marker);
												  });
												});
											  }
											</script>
										
										</div>
									</div>						
								</div>
							</div>
						</div>
						
						<div class="col-xxl-4 col-xl-6 col-lg-12 col-12">
							<div class="box">
								<div class="box-header d-flex justify-content-between">
									<h4 class="box-title">Charging Stations</h4>
									<!-- <p class="text-fade">Updated @ 10:15 AM</p> -->
									<a href="#"><span class="glyphicon glyphicon-new-window text-fade"></span></a>
								</div>
								<div class="box-body chargingstation">
									<div class="box body p-10 pull-up">
										<div class="d-flex justify-content-between">
											<p class="text-fade mb-0">Total</p>
											<p class="text-fade mb-0">Online</p>
											<p class="text-fade mb-0">Offline</p>
										</div>
										<div class="d-flex justify-content-between">
											<h1 class="text-fade mt-0"><?= $data['AllUsersCount'] ?></h1>
											<h1 class="text-fade mt-0"><?= $data['isOnlineUsersCount'] ?></h1>
											<h1 class="text-fade mt-0"><?= $data['AllUsersCount'] - $data['isOnlineUsersCount'] ?></h1>
										</div>
									</div>
									<div>
										<div class="d-flex justify-content-between align-items-center">
											<p class="text-fade mb-0 mt-10">Available</p>
											<p class="text-fade mb-0 mt-10">In Use</p>
											<p class="text-fade mb-0 mt-10">Unavailable</p>
										</div>
										<div class="d-flex justify-content-between align-items-center">
											<h1 class="mt-0" style="color: #51ce8a;"><?= $data['AllEstatesCount'] ?></h1>
											<h1 class="mt-0" style="color: #4d7cff;"><?= $data['rentalsCount'] ?></h1>
											<h1 class="mt-0" style="color: #f2426d;"><?= $data['salesCount'] ?></h1>
										</div>
										<div class="mb-0">
											<div id="donut-chart" class="h-200 mt-20"></div>	
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-6 col-lg-12 col-12">
							<div class="box">
								<div class="box-header d-flex justify-content-between">
									<h4 class="box-title">Charging Information</h4>
									<h4 class="box-title">History</h4>
								</div>
								<div class="box-body">
									<div class="row">
										<div class="col-lg-6">
	                                        <div class="box pull-up">
	                                        	<div class="box-body fill-icon" style="background-color: #FAE6FA;">
		                                        	<i class="fa-solid fa-battery-three-quarters fs-22 mb-0" style="color:#4B0082"></i>
			                                        <p class="mb-0 text-fade mt-1">Percentage</p>
			                                        <h4 class="mb-0 text-dark fw-400">76%</h4>
	                                        	</div>
	                                        </div>
	                                        <div class="box pull-up">
	                                        	<div class="box-body bg-warning-light fill-icon">
	                                        		<i class="fa-solid fa-bolt fs-22 mb-0 text-warning"></i>
		                                        	<p class="mb-0 text-fade mt-1">kWh</p>
		                                        	<h4 class="m-0 text-dark fw-400">76%</h4>
	                                        	</div>
	                                        </div>
	                                        <div class="box pull-up">
	                                        	<div class="box-body bg-success-light fill-icon">
	                                        		<i class="fa-solid fa-dollar-sign fs-22 mb-0 text-success"></i>
		                                        	<p class="mb-0 text-fade mt-2">Total</p>
		                                        	<h4 class="m-0 text-dark fw-400">$765</h4>
	                                        	</div>
	                                        </div>
	                                    </div>
	                                    <div class="col-lg-6">
	                                    	<div class="box pull-up">
	                                        	<div class="box-body bg-secondary-light">
		                                        		<h6 class="m-0  fw-500">26 Jan'24</h6>
		                                        		<p class="mb-0 mt-1 text-fade">50 min</p>
	                                        		<div class="d-flex align-items-center">
	                                        			<span class="badge badge-sm rounded-circle w-30 h-30 fill-icon" style="background-color:#01a246;"><i class="fa-solid fa-bolt fs-12 l-h-26 text-center"></i></span>
	                                        			<p class="ps-5  mb-0 ">55 kWh</p>
	                                        		</div>
	                                        	</div>
	                                        </div>
	                                        <div class="box pull-up">
	                                        	<div class="box-body bg-secondary-light ">
		                                        		<h6 class="m-0 fw-500">25 Feb'24</h6>
		                                        		<p class="mb-0 mt-1 text-fade">80 min</p>
	                                        		<div class="d-flex align-items-center">
	                                        			<span class="badge badge-sm rounded-circle w-30 h-30 fill-icon" style="background-color:#01a246;"><i class="fa-solid fa-bolt fs-12 l-h-26"></i></span>
	                                        			<p class="ps-5  mb-0">62 kWh</p>
	                                        		</div>
	                                        	</div>
	                                        </div>
	                                        <div class="box pull-up">
	                                        	<div class="box-body bg-secondary-light ">
		                                        		<h6 class="m-0  fw-500">2 May'24</h6>
		                                        		<p class="mb-0 mt-1 text-fade">70 min</p>
	                                        		<div class="d-flex align-items-center">
	                                        			<span class="badge badge-sm rounded-circle w-30 h-30 fill-icon" style="background-color:#01a246;"><i class="fa-solid fa-bolt fs-12 l-h-26"></i></span>
	                                        			<p class="ps-5 mb-0">40 kWh</p>
	                                        		</div>
	                                        	</div>
	                                        </div>
	                                    </div>
									</div>
								</div>
							</div>
						</div>
				
						<div class="col-xxl-4 col-xl-6 col-lg-12 col-12">
    <div class="box">
        <div class="box-header d-flex justify-content-between">
            <h4 class="box-title">Energy & Time<a href="#" class="fill-icon"><i class="fa-solid fa-circle-info text-fade ps-5 "></i></a></h4>
            <div class="">
                <h4 class="box-title">Average Cost</h4>
                <!-- <a href="#"><p class="text-success">Conditions <i class="fa-solid fa-chevron-right fs-10"></i></p></a> -->
            </div>
        </div>
        <div class="box-body">
            <div class="chart">
                <div id="staff_turnover">
                    <!-- جایگذاری داده‌های اجاره‌ها -->
                    <p>Total Rentals in 24 Hours: <?= htmlspecialchars($data['data24Hours']) ?></p>
                    <p>Total Rentals in 30 Days: <?= htmlspecialchars($data['data30Days']) ?></p>
                    <p>Total Rentals in 1 Year: <?= htmlspecialchars($data['data1Year']) ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
						<!-- <div class="col-xxl-4 col-xl-6 col-lg-12 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Schedule</h4>
								</div>
								<div class="box-body ">
									<div class="d-flex justify-content-between">
										<div class="d-flex justify-content-between">
											<div class="fill-icon">
												<a href="#"><span class="badge border border-3 bg-secondary-light text-fade rounded-circle p-10"><i class="fa-solid fa-pen"></i></span></a>
											</div>
											<div class="ms-10">
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">MO</button>
												<!-- <button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">WE</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">TH</button> -->
												<!-- <button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">FR</button>
												<p class="mt-1">10:00 - 1:30</p>
											</div>
										</div>
										<div class="d-flex">
											<h6>9 kWh</h6>
											  <button type="button" class="btn btn-sm btn-toggle active" data-bs-toggle="button">
												<span class="handle"></span>
											  </button>
										</div>
									</div>
									<hr class="mt-0">
									<div class="d-flex justify-content-between">
										<div class="d-flex justify-content-between ">
											<div class="fill-icon">
												<a href="#"><span class="badge border border-3 bg-secondary-light text-fade rounded-circle p-10"><i class="fa-solid fa-pen"></i></span></a>
											</div>
											<div class="ms-10">
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">MO</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">TU</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">WE</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">FR</button>
												<p class="mt-1">12:00 - 1:00</p>
											</div>
										</div>
										<div class="d-flex">
											<h6>7 kWh</h6>
											  <button type="button" class="btn btn-sm btn-toggle active" data-bs-toggle="button">
												<span class="handle"></span>
											  </button>
										</div>
									</div>
									<hr class="mt-0">
									<div class="d-flex justify-content-between">
										<div class="d-flex justify-content-between">
											<div class="fill-icon">
												<a href="#"><span class="badge border border-3 bg-secondary-light text-fade rounded-circle p-10"><i class="fa-solid fa-pen"></i></span></a>
											</div>
											<div class="ms-10">
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">MO</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">TU</button>
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">FR</button>
												<p class="mt-1">15:00 - 17:00</p>
											</div>
										</div>
										<div class="d-flex">
											<h6>26 kWh</h6>
											   <button type="button" class="btn btn-sm btn-toggle active" data-bs-toggle="button" >
												<span class="handle"></span>
											  </button>
										</div>
									</div>
									<hr class="mt-0">
									<button type="button" class="btn rounded-2 w-p100 border border-3" style="color:#01a246"><span><i class="fa-solid fa-plus"></i></span> Add New Schedule</button>
								</div>
							</div>
						</div> --> -->
				
				</section>
				<!-- /.content -->
			</div>
		</div>
	<!-- /.content-wrapper -->
	
	<!-- Side panel -->   
	<!-- quick_user_toggle -->
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
	
	
<script src="<?= asset('../src/js/pages/dashboard.js') ?>"></script>
	
	  
<?php

view('pages/inc/footer');


?>