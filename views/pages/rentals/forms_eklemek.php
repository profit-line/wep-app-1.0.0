<?php

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
				<!-- Content Header (Page header) -->

				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-lg-12 col-6">
							<div class="box">
								<div class="box-header with-border">
									<!-- <h4 class="box-title">Sample form 1</h4> -->
								</div>
								<!-- /.box-header -->
								<form action="<?= url_view_builder('rental/addRental/' . $data['id']) ?>" method="post" class="form" id="contractForm">
									<div class="box-body">
										<h4 class="box-title text-primary mb-0"><i class="ti-user me-15"></i>eklemek</h4>
										<?php
flash('RentalAdded');                       flash('RentalAdded');
										?> 
										<hr class="my-15">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstName5" class="form-label">Kullanıcı adı :</label>
													<input type="text" class="form-control <?= add_class_error($data, 'first_name'); ?>" name="first_name" id="firstName5" value="<?= old($data, 'first_name') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'first_name') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastName1" class="form-label">Soyisim :</label>
													<input type="text" name="last_name" class="form-control <?= add_class_error($data, 'last_name'); ?>" id="lastName1" value="<?= old($data, 'last_name') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'last_name') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="block" class="form-label">block :</label>
													<input type="text" class="form-control <?= add_class_error($data, 'block'); ?>" name="block" id="block" value="<?= old($data, 'block') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'block') ?></span>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="price" class="form-label">Fiyat :</label>
													<input type="text" class="form-control <?= add_class_error($data, 'price'); ?>" name="price" id="price" value="<?= old($data, 'price') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'price') ?></span>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="form-label">İletişim numarası</label>
													<input type="text" class="form-control <?= add_class_error($data, 'phone'); ?>" name="phone" id="addressline1" value="<?= old($data, 'phone') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>

												</div>
											</div>
										</div>
										<!-- <h4 class="box-title text-primary mb-0 mt-20"><i class="ti-save me-15"></i> Requirements</h4> -->
										<!-- <hr class="my-15"> -->
										<div class="form-group">
											<label for="addressline2" class="form-label ">Adres :</label>
											<input type="text" class="form-control <?= add_class_error($data, 'address'); ?>" name="address" id="addressline2" value="<?= old($data, 'address') ?>">
											<span class="invalid-feedback"><?= view_error($data, 'address') ?></span>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="startDate">Sözleşme başlangıç ​​tarihi</label>
													<input type="date" class="form-control <?= add_class_error($data, 'start_date'); ?>" id="start_date" name="start_date">
													<span class="invalid-feedback"><?= view_error($data, 'date') ?></span>

												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="endDate">Sözleşme bitiş tarihi</label>
													<input type="date" class="form-control <?= add_class_error($data, 'end_date'); ?>" id="end_date" name="end_date">
													<span class="invalid-feedback"><?= view_error($data, 'date') ?></span>
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
									</div>

								</form>
							</div>
							<!-- /.box -->
						</div>


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

			<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
			<?php

			view('users/inc/footer');

			?>