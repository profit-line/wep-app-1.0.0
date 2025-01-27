<header class="main-header">
	<div class="d-flex align-items-center logo-box justify-content-start">	
		<!-- Logo -->
		<a href="<?= url_view_builder('pages/inedx') ?>" class="logo">
			<!-- logo-->
			<div class="logo-mini w-40">
				<span class="light-logo"><img src="<?= asset('../../../images/logo-letter.png') ?>" alt="logo"></span>
				<span class="dark-logo"><img src="<?= asset('../../../images/logo-white-letter.png') ?>" alt="logo"></span>
			</div>
			<div class="logo-lg">
				<span class="light-logo"><img src="<?= asset('../../../images/logo-light-text.png') ?>" alt="logo"></span>
				<span class="dark-logo"><img src="<?= asset('../../../images/logo-text.png') ?>" alt="logo"></span>
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
						<?php
				if(isset($data) && is_array($data)){		
foreach($data as $notif):
	
?>	
					  <li>
						<a href="#">
						  <i class="fa fa-users text-info"></i> <?= $notif->message ?>
						</a>
					  </li>
					  <?php
endforeach; }
					  ?>
					</ul>
				  </li>
				  <li class="footer">
					  <a href="<?= url_view_builder('pages/notifications'); ?>">View all</a>
				  </li>
				</ul>
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
					<img src="<?= asset('../../../images/avatar/' . get('user')['profile_image']) ?>" class="avatar rounded-circle bg-primary-light h-40 w-40" alt="" />
				</a>
			</li>
			
        </ul>
      </div>
    </nav>
  </header>