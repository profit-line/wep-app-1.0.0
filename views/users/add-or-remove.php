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
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<h4 class="page-title">Contact List</h4>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Apps</li>
								<li class="breadcrumb-item active" aria-current="page">Contact List</li>
							</ol>
						</nav>
					</div>
				</div>
				
			</div>
		</div>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xl-12">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Müşteriler</h5>
							<?php
flash('userActiveAccount');
							?>
							<div class="card-actions float-end">
								<div class="dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static"><i class="align-middle" data-feather="more-horizontal"></i></a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Aktif</a>
										<a class="dropdown-item" href="#">beklemek</a>
										<a class="dropdown-item" href="#">kaldırmak</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="example2" class="table" style="width:100%">
									<thead>
										<tr>
											<th>#</th>
											<th>soyadı</th>
											<th>adı</th>
											<th>Email</th>
											<th>Durum</th>
										</tr>
									</thead>
									<tbody class="text-fade">
										<?php
											foreach($data['users'] as $user):
												
										?>
										<tr>
											<td><img src="<?= asset('../../../images/avatar/' . $user->profile_image) ?>" width="32" height="32" class="bg-light rounded-circle my-n1" alt="Avatar"></td>
											<td><?= $user->last_name ?></td>
											<td><?= $user->family_name ?></td>
											<td><?= $user->email ?></td>
											<?php
												if($user->deleted_at !== NULL){
											echo '<td><span class="badge bg-danger-light">Deleted</span></td>';
												}elseif($user->status == '0'){
											echo '<td><span class="badge bg-warning-light">Inactive</span></td>';
												}elseif ($user->status == '2') {
											echo '<td><span class="badge bg-secondary-light">None</a></span></td>';
												}elseif ($user->status == '1') {
											echo '<td><span class="badge bg-success-light">Active</span></td>';
												}elseif ($user->status == '3') {
											echo '<td><a href="' . url_view_builder('user/activeAccount/' . $user->id) .'"><span class="badge bg-dark">Active</span></a></td>';
												}
											?>
										</tr>
										<?php
											endforeach;
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="col-xl-4">
					<div class="card">
						<div class="card-header">
							<h5 class="card-title mb-0">Angelica Ramos</h5>
							<div class="card-actions float-end">
								<div class="dropdown show">
									<a href="#" data-bs-toggle="dropdown" data-bs-display="static"> <i class="align-middle" data-feather="more-horizontal"></i></a>

									<div class="dropdown-menu dropdown-menu-end">
										<a class="dropdown-item" href="#">Aktif</a>
										<a class="dropdown-item" href="#">beklemek</a>
										<a class="dropdown-item" href="#">kaldırmak</a>
									</div>
								</div>
							</div>
						</div>
						<div class="card-body">
							<div class="row g-0">
								<div class="col-sm-3 col-xl-12 col-xxl-3 text-center">
									<img src="../../../images/avatar/avatar-3.png" width="64" height="64" class="bg-light rounded-circle mt-2" alt="Angelica Ramos">
								</div>
								<div class="col-sm-9 col-xl-12 col-xxl-9">
									<strong>About me</strong>
									<p class="text-fade">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</div>
							</div>

							<table class="table my-2">
								<tbody>
									<tr>
										<th>Name</th>
										<td class="text-fade">Angelica Ramos</td>
									</tr>
									<tr>
										<th>Company</th>
										<td class="text-fade">The Wiz</td>
									</tr>
									<tr>
										<th>Email</th>
										<td class="text-fade">angelica@ramos.com</td>
									</tr>
									<tr>
										<th>Phone</th>
										<td class="text-fade">+1234123123123</td>
									</tr>
									<tr>
										<th>Status</th>
										<td><span class="badge bg-success-light">Active</span></td>
									</tr>
								</tbody>
							</table>


							<strong class="my-20 d-block">Activity</strong>

							<div class="activity-div">
								<div class="timeline-label">
									<div class="timeline-item">
										<div class="timeline-label fw-500 fs-16">09:47</div>
										<div class="timeline-badge">
											<i class="fa fa-genderless text-warning fs-14"></i>
										</div>
										<div class="timeline-content text-muted ps-3">Lorem ipsum dolor sit amet, consectetur.</div>
									</div>
						
								</div>
							</div>

						</div>
					</div>
				</div> -->
			</div>		  
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
  <!-- /quick_user_toggle --> 
	
  <!-- Control Sidebar -->
 <?php

view('pages/inc/sidebar_setting');

?>
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
	
	
</div>
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
                                <img src="<?= asset('../../../images/avatar/3.jpg') ?>" class="avatar avatar-lg" alt="">
                            </span>
                        </div>
                        <div class="cm-msg-text">
                           My name is Anne Clarc.         
                        </div>        
                    </div>
                    <div class="chat-msg user">
                        <div class="d-flex align-items-center">
                            <span class="msg-avatar">
                                <img src="<?= asset('../../../images/avatar/2.jpg') ?>" class="avatar avatar-lg" alt="">
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
                    <input type="text" id="chat-input" placeholder="Send a message..."/>
                    <button type="submit" class="chat-submit" id="chat-submit">
                        <span class="icon-Send fs-22"></span>
                    </button>
                </form>      
            </div>
		</div>
	</div>
	
	<!-- Page Content overlay -->
	
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

<?php

view('users/inc/footer');

?>

