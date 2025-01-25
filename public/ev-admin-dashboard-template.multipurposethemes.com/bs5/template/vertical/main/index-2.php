<!DOCTYPE html>
<html lang="tr">
	
<!-- Mirrored from ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 13:03:22 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- افزودن Bootstrap به پروژه -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		<link rel="icon" href="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/favicon.ico">

		<title>EV Admin - Dashboard</title>
		
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= assetb('../src/css/vendors_css.css') ?>">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		
	<!-- Style-->  
	<link rel="stylesheet" href="../src/css/style.css">
	<link rel="stylesheet" href="../src/css/skin_color.css">
	<link rel="stylesheet" href="../src/css/custom.css">
	<link href="../../../../../cdn.jquery.app/jqueryscripttop.css" rel="stylesheet" type="text/css">
		 
	</head>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
	
	<header class="main-header">
		<div class="d-flex align-items-center logo-box justify-content-start">	
			<!-- Logo -->
			<a href="index-2.html" class="logo">
				<!-- logo-->
				<div class="logo-mini w-40">
					<span class="light-logo"><img src="../../../images/logo-letter.png" alt="logo"></span>
					<span class="dark-logo"><img src="../../../images/logo-white-letter.png" alt="logo"></span>
					<!-- <span class="light-logo"><img src="../../../images/profitline-image.jpg" alt="logo"></span>
					<span class="dark-logo"><img src="../../../images/profitline-image-removebg-preview.png" width="max-width: 100%;" alt="logo"></span> -->
				</div>
				<div class="logo-lg">
					<span class="light-logo"><img src="../../../images/logo-light-text.png" alt="logo"></span>
					<span class="dark-logo"><img src="../../../images/logo-text.png" alt="logo"></span>
				</div>
			</a>		
		</div>   
		<!-- Header Navbar --> 
		<nav class="navbar navbar-static-top">
			<!-- Sidebar toggle button-->
			<div class="app-menu">
				<ul class="header-megamenu nav">
					<li class="btn-group nav-item">
						<a href="#" class="waves-effect waves-light nav-link push-btn btn-primary-light" data-toggle="push-menu" role="button">
							<i data-feather="menu"></i>
							</a>
					</li>
					<li class="btn-group d-lg-inline-flex d-none">
						<div class="app-menu">
							<div class="search-bx mx-5">
								<form>
									<div class="input-group">
										<input type="search" class="form-control" placeholder="Search">
										<div class="input-group-append">
										<button class="btn" type="submit" id="button-addon3"><i class="icon-Search"><span class="path1"></span><span class="path2"></span></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</li>
				</ul> 
			</div>
		
			<div class="navbar-custom-menu r-side">
				<ul class="nav navbar-nav">
					<li class="dropdown notifications-menu btn-group">
						<label class="switch">
								<a class="waves-effect waves-light btn-primary-light svg-bt-icon">
								<input type="checkbox" data-mainsidebarskin="toggle" id="toggle_left_sidebar_skin">
								<span class="switch-on"><i data-feather="moon"></i></span>
								<span class="switch-off"><i data-feather="sun"></i></span>
							</a>	
						</label>
					</li>
					<li class="dropdown notifications-menu btn-group ">
						<a href="#" class="waves-effect waves-light btn-primary-light svg-bt-icon" data-bs-toggle="dropdown" title="Notifications">
							<i data-feather="bell"></i>
							<div class="pulse-wave"></div>
							</a>
						<ul class="dropdown-menu animated bounceIn">
							<li class="header">
							<div class="p-20">
								<div class="flexbox">
									<div>
										<h4 class="mb-0 mt-0">Notifications</h4>
									</div>
									<div>
										<a href="#" class="text-danger">Clear All</a>
									</div>
								</div>
							</div>
							</li>
							<li>
							<!-- inner menu: contains the actual data -->
							<ul class="menu sm-scrol">
								<li>
								<a href="#">
									<i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
								</a>
								</li>
								<li>
								<a href="#">
									<i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
								</a>
								</li>
							</ul>
							</li>
							<li class="footer">
								<a href="component_notification.html">View all</a>
							</li>
						</ul>
					</li>
					
			
					<li class="btn-group d-xl-inline-flex d-none">
							<a href="#" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon dropdown-toggle" data-bs-toggle="dropdown">
							<img class="rounded" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg" alt="">
						</a>
							<div class="dropdown-menu">
							<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/usa.svg" alt=""> English</a>
							<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/spain.svg" alt=""> Spanish</a>
							<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/ger.svg" alt=""> German</a>
							<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/jap.svg" alt=""> Japanese</a>
							<a class="dropdown-item my-5" href="#"><img class="w-20 rounded me-10" src="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/svg-icon/fra.svg" alt=""> French</a>
							</div>
					</li>
			
					<li class="btn-group nav-item d-xl-inline-flex d-none">
						<a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon" title="Full Screen">
							<i data-feather="maximize"></i>
							</a>
					</li>					  
					<!-- Control Sidebar Toggle Button -->
					<li class="btn-group nav-item d-xl-inline-flex d-none">
						<a href="#" data-toggle="control-sidebar" title="Setting" class="waves-effect waves-light nav-link btn-primary-light svg-bt-icon">
							<i data-feather="sliders"></i>
						</a>
					</li>
			
					<!-- User Account-->
					<li class="dropdown user user-menu">
						<a href="#" class="waves-effect waves-light dropdown-toggle w-auto l-h-12 bg-transparent p-0 no-shadow" title="User" data-bs-toggle="modal" data-bs-target="#quick_user_toggle">
							<img src="../../../images/avatar/avatar-13.png" class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
						</a>
					</li>
			
				</ul>
			</div>
		</nav>
	</header>
	
	<aside class="main-sidebar">
		<!-- sidebar-->
		<section class="sidebar position-relative"> 
			<div class="multinav">
				<div class="multinav-scroll" style="height: 99%;">	
					<!-- sidebar menu-->
					<ul class="sidebar-menu" data-widget="tree">
						<li class="header fs-10 m-0 text-uppercase">Dashboard</li>
												<li class="treeview">
							<a href="index.html">
								<i data-feather="home"></i>

							<span>ANASAYFA</span>
							</a>
						</li>

						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>GÖREVLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">		
											<!-- این قسمت هم اون هایی که ۱۰ روز مونده به تموم شدن -->
							<li><a href="tables_kiraci_dey.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ACİL ARANMASI GEREKEN</a></li>
							<!-- این قسمت هم فقط کسانی که تایمشون داره تموم میشه به ترتیب بهمون نشون بده از ۱۰ روز تا یک ماه رو بهمون نشون بده -->
							<li><a href="tum-tables_kiraci.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM GÖREVLER</a></li>					
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="edit"></i> -->
							<span>PORTFÖYLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>
							<ul class="treeview-menu">											
							<li class="treeview">
								<a href="#">
									<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SATILIK PORTFÖY
									<span class="pull-right-container">
										<i class="fa fa-angle-right pull-right"></i>
									</span>
								</a>
								<!-- این قمسمت هم برای فروش هست -->
								<ul class="treeview-menu">
									<!-- مسکن -->
									<li><a href="konut_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
									<!-- دفتر -->
									<li><a href="ofis_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>
									<!-- ویلا -->
									<li><a href="villa_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>
									<!-- زمین -->
									<li><a href="arazi_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ</a></li>
								</ul>
							</li>												
							<li class="treeview">
								<a href="#">
									<!-- این قسمت هم برای اجاره هست -->
									<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KİRALIK PORTFÖY
									<span class="pull-right-container">
										<i class="fa fa-angle-right pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
										<!-- مسکن -->
									<li><a href="kiralik_konut_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
										<!-- دفتر -->
									<li><a href="kiralik_ofis_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>
										<!-- ویلا -->
									<li><a href="kiralik_villa_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>
										<!-- زمین -->
									<li><a href="kiralik_arazi_table.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ</a></li>	
								</ul>
							</li>										
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>KİRA TAKİBİ</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<!-- این قسمت اون هایی که یک مانده به پایان-->
							<li><a href="tables_kiraci_dey.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONTRAT BİTİMİ YAKLAŞAN</a></li> 
							<!--این قسمت هم همه رو نشون بده-->
							<li><a href="tum_sahib_kiraci_ler.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM KİRALANAN MÜLKLER</a></li>
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>PORTFÖY EKLE</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<li><a href="tum-tables_KONUT.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
							<li><a href="tum-tables_OFIS.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>					
							<li><a href="tum-tables_VILLA.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>					
							<li><a href="tum-tables_ARAZI.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ</a></li>					
							<li><a href="tum-tables_SANAYI-İŞYERİ.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SANAYİ İŞYERİ</a></li>					
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>MALİKLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>MALİK LİSTESİ EKLE</a></li>
							<li><a href="add_sahib_AKASYA_F.C.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>AKASYA F.C.</a></li>					
							<li><a href="add_sahib_BEGONYA-SUİT.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>BEGONYA SUİT</a></li>					
							<li><a href="add_sahib_KRİSTALŞEHİR.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KRİSTALŞEHİR</a></li>					
							<li><a href="add_sahib_VADİİSTANBUL.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VADİİSTANBUL</a></li>					
							<li><a href="add_sahib_BEŞİNCİ-LEVENT.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>BEŞİNCİ LEVENT</a></li>					
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>YATIRIMCILAR</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SANAYİ YATIRIMCISI</a></li>
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ YATIRIMCISI</a></li>					
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT YATIRIMCISI</a></li>					
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>MÜTAHİT</a></li>					
							</ul>
						</li>
						  <li class="treeview">
							<a href="#">
							<!-- <i data-feather="headphones"></i> -->
							<span>EŞLEŞTİRMELER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<li><a href="#"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM EŞLEŞMELER % İLE</a></li>
							</ul>
						</li>
						<li>
							<a href="forms_eklemek.html">
							<!-- <i data-feather="battery-charging"></i> -->

							<span>Kiraci Eklemek</span>
							</a>
						</li>
						
<li>
							<a href="extra_profile.html">
							<i data-feather="battery-charging"></i>
							<span>Benim profile</span>
							</a>
						</li>						 
						<li class="header fs-10 m-0 text-uppercase">Components</li>
						<li class="treeview">
							<a href="#">
							<i data-feather="headphones"></i>
							<span>Support</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>					
							<ul class="treeview-menu">					
							<li><a href="extra_app_ticket.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Support Ticket</a></li>
							<li><a href="contact_app_chat.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chat</a></li>					
							<li><a href="calendar.html"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Calendar</a></li>					
							</ul>
						</li>
						 	
						 			
						 				 
						 	 
						<li class="header  fs-10 m-0">LOGIN & ERROR</li>
						<li class="treeview">
							<a href="#">
							<i data-feather="lock"></i>
							<span>Authentication</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>
							<ul class="treeview-menu">
							<li>
								<a href="auth_login.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a>
								<a href="auth_login_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Login</a>
							</li>
							<li>
								<a href="auth_register.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a>
								<a href="auth_register_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Register</a>
							</li>
							<li>
								<a href="add-or-remove.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Add Or Remove</a>
							</li>
							<li>
								<a href="auth_lockscreen.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a>
								<a href="auth_lockscreen_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Lockscreen</a>
							</li>
							<li>
								<a href="auth_user_pass.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a>
								<a href="auth_user_pass_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Recover password</a>
							</li>	
							</ul>
						</li>
						<li class="treeview">
							<a href="#">
							<i data-feather="alert-triangle"></i>
							<span>Miscellaneous</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
							</a>
							<ul class="treeview-menu">
							<li>
								<a href="error_404.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a>
								<a href="error_404_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 404</a>
							</li>
							<li>
								<a href="error_500.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a>
								<a href="error_500_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Error 500</a>
							</li>
							<li>
								<a href="error_maintenance.html" target="_blank" class="d-light"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a>
								<a href="error_maintenance_dark.html" target="_blank" class="d-dark"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Maintenance</a>
							</li>	
							</ul>
						</li>	 	     
					</ul>
					
					 
				</div>
			</div>
		</section>
	</aside>
	<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<div class="container-full">
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-xxl-6 col-xl-12 col-lg-12 col-12">
							<div class="box tesla">
								
								<div class="box-body">
									<video width="100%" height="100%" autoplay loop muted>
										<source src="../../../images/profitline.mp4" type="video/mp4">
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
											<h1 class="text-fade mt-0">225</h1>
											<h1 class="text-fade mt-0">90%</h1>
											<h1 class="text-fade mt-0">10%</h1>
										</div>
									</div>
									<div>
										<div class="d-flex justify-content-between align-items-center">
											<p class="text-fade mb-0 mt-10">Available</p>
											<p class="text-fade mb-0 mt-10">In Use</p>
											<p class="text-fade mb-0 mt-10">Unavailable</p>
										</div>
										<div class="d-flex justify-content-between align-items-center">
											<h1 class="mt-0" style="color: #51ce8a;">145</h1>
											<h1 class="mt-0" style="color: #4d7cff;">65</h1>
											<h1 class="mt-0" style="color: #f2426d;">15</h1>
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
						<div class="col-xxl-4 col-xl-12 col-lg-12 col-12">
							<div class="box">
								<div class="box-header">
									<h4 class="box-title">Statistics</h4>
								</div>
								<div class="box-body">
									<!-- <div class="">
										<button type="button" class="btn bg-primary rounded-5">24 hours</button>
										<button type="button" class="btn bg-white rounded-5 text-fade">30 days</button>
										<button type="button" class="btn bg-white rounded-5 text-fade">1 years</button>
									</div>
									<div class="chart">
										<div id="bar-chart"></div>
									</div> -->
									<ul class="nav nav-tabs " role="tablist">
										<li class="nav-item"> <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab"><span class="hidden-sm-up"><i class="ion-home"></i></span> <span class="hidden-xs-down">24 hours</span></a> </li>
										<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab"><span class="hidden-sm-up"><i class="ion-person"></i></span> <span class="hidden-xs-down">30 days</span></a> </li>
										<li class="nav-item"> <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab"><span class="hidden-sm-up"><i class="ion-email"></i></span> <span class="hidden-xs-down">1 years</span></a> </li>
									</ul>

										<p class="mb-0 mt-15 text-fade">Total Energy Usage</p>
										<h3 class="mt-0 mb-0">50<span class="text-fade fs-12">Kwh</span></h3>
									<!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="home2" role="tabpanel">
											<div id="bar-chart"> </div>
										</div>
										<div class="tab-pane" id="profile2" role="tabpanel">
											<div id="bar-chart2"> </div>
										</div>
										<div class="tab-pane" id="messages2" role="tabpanel">
											<div id="bar-chart3"></div>
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
										<div id="staff_turnover"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xxl-4 col-xl-6 col-lg-12 col-12">
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
												<button type="button" class="btn-sm border border-3 bg-white rounded-5 text-fade fs-10">FR</button>
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
						</div>
						<div class="col-xxl-4 col-xl-12 col-lg-12 col-12">
							<div class="box smartcharging">
								<div class="box-header d-flex justify-content-between">
									<h4 class="box-title">Smart Charging</h4>
									
								</div>
								<div class="box-body">
									<div class="text-center">
										<input class="knob" data-width="270" data-height="275" data-min="-100" data-fgColor="#01a246" data-displayPrevious="true" data-angleOffset="-125" data-angleArc="250" value="65" />
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
	
	<footer class="main-footer bt-1">
		<div class="pull-right d-none d-sm-inline-block">
				<ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
			<li class="nav-item">
			<a class="nav-link" href="#" target="_blank">Purchase Now</a>
			</li>
		</ul>
		</div>
		&copy; <script>document.write(new Date().getFullYear())</script> <a href="https://www.multipurposethemes.com/">Multipurpose Themes</a>. All Rights Reserved.
	</footer>
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


	
	<script type="text/javascript" src="../../../../../cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>
	<!-- Vendor JS -->
	<script src="../src/js/vendors.min.js"></script>
	<script src="../src/js/pages/chat-popup.js"></script>
	<script src="../../../assets/icons/feather-icons/feather.min.js"></script>

	<script src="../../../assets/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
	<script src="../../../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>
	<script src="../../../assets/vendor_components/echarts/dist/echarts-en.min.js"></script>
	<script src="../../../assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>
	<script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-in-mill.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-us-aea-en.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-uk-mill-en.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jquery-jvectormap-au-mill.js"></script>
    <script src="../../../assets/vendor_components/jvectormap/lib2/jvectormap.custom.js"></script>	
    <script src="../../../assets/vendor_components/chartist-js-develop/chartist.js"></script>
    <script src="../../../assets/vendor_components/Flot/jquery.flot.js"></script>
	<script src="../../../assets/vendor_components/Flot/jquery.flot.resize.js"></script>
	<script src="../../../assets/vendor_components/Flot/jquery.flot.pie.js"></script>
	<script src="../../../assets/vendor_components/Flot/jquery.flot.categories.js"></script>
	<script src="../../../assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>
	<script src="../../../assets/vendor_components/raphael/raphael.min.js"></script>
	<script src="../../../assets/vendor_components/morris.js/morris.min.js"></script>
	<script src="../../../assets/vendor_components/echarts/dist/echarts-en.min.js"></script>
	<script src="../src/js/pages/widget-flot-charts.js"></script>
	<script src="../src/js/pages/widget-inline-charts.js"></script>


   


	
	<!-- EV Admin App -->
	<script src="../src/js/demo.js"></script>
	<script src="../src/js/template.js"></script>
	<script src="../src/js/pages/dashboard.js"></script>


	
</body>

<!-- Mirrored from ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 13:04:05 GMT -->
</html>
