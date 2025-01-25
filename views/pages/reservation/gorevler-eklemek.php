<?php
 
view('users/inc/header');

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
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="d-flex align-items-center">
				<div class="me-auto">
					<!-- <h4 class="page-title">General Form Elements</h4> -->
					<div class="d-inline-block align-items-center">
						<nav>
						</nav>
					</div>
				</div>
				
			</div>
		</div>	  

		<!-- Main content -->
		<section class="content">
			<div class="row">			  
				<div class="col-lg-12 col-6">
					  <div class="box">
						<div class="box-header with-border">
						  <!-- <h4 class="box-title">Sample form 1</h4> -->
						</div>
						<!-- /.box-header -->
						<form action="<?= url_view_builder('reservation/addReservation') ?>" method="post" class="form" id="contractForm">
							<div class="box-body">
								<h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>GÖREVLER EKLEMEK</h4>
								<?php

flash('resevationAdded');
?>
								<hr class="my-15">
								<div class="row">
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">adı</label>
									  <input type="text" class="form-control <?= add_class_error($data, 'first_name'); ?>" name="first_name" id="firstName5" value="<?= old($data, 'first_name') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'first_name') ?></span>
												
									</div>
																		<div class="form-group">
										<label for="project_name">Proje</label>
										<input type="text" class="form-control <?= add_class_error($data, 'project_name'); ?>" id="project_name" name="project_name">
													<span class="invalid-feedback"><?= view_error($data, 'project_name') ?></span>
</div>
								  </div> 
								  <div class="col-md-6">
									<div class="form-group">
									  <label class="form-label">soyadı</label>
									  <input type="text" name="last_name" class="form-control <?= add_class_error($data, 'last_name'); ?>" id="lastName1" value="<?= old($data, 'last_name') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'last_name') ?></span>
												</div>
								  </div>
								</div>
								<div class="row">
								<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">İletişim numarası</label>
													<input type="text" class="form-control <?= add_class_error($data, 'phone'); ?>" name="phone" id="addressline1" value="<?= old($data, 'email') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>

												</div>
																					<div class="form-group">
												<label for="unit" class="form-label">No :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'unit'); ?>" name="unit" id="unit" value="<?= old($data, 'unit') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'unit') ?></span>
											</div>
											</div>
								</div>
								<!-- <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4> -->
								<!-- <hr class="my-15"> -->
								<div class="form-group">
								  <label class="form-label">adres</label>
								  <input type="text" class="form-control <?= add_class_error($data, 'address'); ?>" name="address" id="addressline2" value="<?= old($data, 'address') ?>">
											<span class="invalid-feedback"><?= view_error($data, 'address') ?></span>
										</div>
								<div class="row"> 
								  <div class="col-md-6">
									<div class="form-group">
										<label for="startDate">Giriş ​​tarihi</label>
										<input type="date" class="form-control <?= add_class_error($data, 'start_date'); ?>" id="start_date" name="start_date">
													<span class="invalid-feedback"><?= view_error($data, 'start_date') ?></span>
</div>

								  </div>
								  <div class="col-md-6">
								  <div class="form-group">
													<label for="endDate"> Hatırlatma tarihi </label>
													<input type="date" class="form-control <?= add_class_error($data, 'end_date'); ?>" id="end_date" name="end_date">
													<span class="invalid-feedback"><?= view_error($data, 'end_date') ?></span>
												</div>
								  </div>
								</div>
								<script>
									function updateEndDate() {
										var startDate = document.getElementById('startDate').value;
										document.getElementById('endDate').setAttribute('min', startDate);
									}

								</script>
								
								<div class="form-group">
											<label for="decisions1" class="form-label">Açıklama</label>
											<textarea id="decisions1" rows="4" class="form-control <?= add_class_error($data, 'description'); ?>" name="description"><?= old($data, 'description') ?></textarea>
											<span class="invalid-feedback"><?= view_error($data, 'description') ?></span>
										</div>
							</div>

							
							
							<!-- /.box-body -->
							<div class="box-footer">
						
								
								<div class="form-group">
											<div class="c-inputs-stacked">
												<input type="submit" class="btn btn-primary" name="sub" value="submit" id="submitBtn">
											</div>
										</div>
								<script>
									// گرفتن دکمه‌ها و فرم
									const submitBtn = document.getElementById('submitBtn');
									const cancelBtn = document.getElementById('cancelBtn');
									const form = document.getElementById('contractForm');
								  
									// تابع برای ارسال فرم (شبیه‌سازی ارسال داده‌ها)
									submitBtn.addEventListener('click', function() {
									  // گرفتن مقادیر تاریخ‌ها
									  const startDate = document.getElementById('startDate').value;
									  const endDate = document.getElementById('endDate').value;
								  
									  // بررسی اینکه فیلدهای تاریخ پر شده باشند
									  if (startDate && endDate) {
										// ارسال داده‌ها (در اینجا نمایش داده می‌شود، ولی در پروژه واقعی باید ارسال شود)
										alert('داده‌ها ارسال شدند:\nتاریخ شروع: ' + startDate + '\nتاریخ پایان: ' + endDate);
									  } else {
										alert('لطفا تاریخ‌ها را وارد کنید!');
									  }
									});
								  
									// تابع برای پاک کردن فیلدها (کنسل کردن)
									cancelBtn.addEventListener('click', function() {
									  // پاک کردن فیلدهای تاریخ
									  document.getElementById('startDate').value = '';
									  document.getElementById('endDate').value = '';
									});
								  </script>
							</div>  
							
						</form>
					  </div>

					  <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
							<?php

							view('pages/inc/sidebar_user');

							?>
						</div>


						<?php
						view('pages/inc/sidebar_setting');
						?>
					  <!-- /.box -->			
				</div>  

  
<?php

view('users/inc/footer');

?>