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


				<!-- Main content -->
				<section class="content">

					<!-- Step wizard -->
					<div class="box">
						<div class="box-header with-border">
							<h4 class="box-title">Müşteri Kaydı</h4>

						</div>
						<!-- /.box-header -->
						<div class="box-body wizard-content">
							<form action="<?= url_view_builder('estate/addArazi') ?>" class="tab-wizard wizard-circle" method="post">
								<!-- Step 1 -->
								<h6>Müşteri Bilgileri</h6>
								<?php
								flash('EstateAdded');
								?>
								<section>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="firstName5" class="form-label">isim :</label>
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
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="addressline1" class="form-label">Fiyat :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'price'); ?>" name="price" id="addressline1" value="<?= old($data, 'price') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'price') ?></span>
											</div>
										</div>
										<div class="col-md-6">
							<div class="form-group">
												<label for="block" class="form-label">block :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'block'); ?>" name="block" id="block" value="<?= old($data, 'block') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'block') ?></span>
											</div>
							</div>
							
																	<div class="col-md-6">
							<div class="form-group">
												<label for="project_name" class="form-label">Proje :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'project_name'); ?>" name="project_name" id="project_name" value="<?= old($data, 'project_name') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'project_name') ?></span>
											</div>

							</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="addressline2" class="form-label ">Adres :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'address'); ?>" name="address" id="addressline2" value="<?= old($data, 'address') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'address') ?></span>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="location3" class="form-label">şehir :</label>
												<select class="form-select <?= add_class_error($data, 'city'); ?>" id="location3" name="city">
													<option value="">Şehir Seçin</option>
													<?php foreach ($data['cities'] as $city => $value): ?>
														<option value="<?= $city ?>" <?= (isset($data['requests']['city']) && $data['requests']['city'] == $value) ? 'selected' : '' ?>><?= $value ?></option>
													<?php endforeach; ?>
												</select>
												<span class="invalid-feedback"><?= view_error($data, 'city') ?></span>

											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="phoneNumber1" class="form-label"> İletişim numarası :</label>
												<input type="tel" class="form-control <?= add_class_error($data, 'mobile_phone_number'); ?>" name="mobile_phone_number" id="phoneNumber1" value="<?= old($data, 'mobile_phone_number') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'mobile_phone_number') ?></span>
											</div>
										</div>

									</div>

									<!-- m² (Net) & m² (Brüt) the end -->

									<div class="row ">


										<dl class="col-md-2">
											<dt class="collapseTitle" id="_cllpsID_a24">
												m² (Brüt)</dt>
											<dd class="collapseContent">
												<div class="numeric-input-holder clearfix">
													<input type="text" class="form-control <?= add_class_error($data, 'gross_area'); ?>" name="gross_area" placeholder="m²" maxlength="5" data-section="a24" value="<?= old($data, 'gross_area') ?>">
													<span class="invalid-feedback"><?= view_error($data, 'gross_area') ?></span>
												</div>
												<ul class="facetedSearchList scroll-pane" style="overflow: hidden; padding: 0px; width: 178px;">
													<div class="jspContainer" style="width: 178px; height: 0px;">
														<div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 178px;"></div>
													</div>
												</ul>
											</dd>
										</dl>
										<div id="searchResultLeft-a107889" class="col-md-2 search-filter-section" data-name="a107889" data-depends-on="" data-triggers-refresh="false">
											<dl class="">
												<dt class="collapseTitle" id="_cllpsID_a107889">
													m² (Net)</dt>
												<dd class="collapseContent">
													<div class="numeric-input-holder clearfix">
														<input type="text" data-role="tagsinput" class="form-control <?= add_class_error($data, 'net_area'); ?>" name="net_area" placeholder="m²" maxlength="4" data-section="a107889" value="<?= old($data, 'net_area') ?>">
														<span class="invalid-feedback"><?= view_error($data, 'net_area') ?></span>
													</div>
													<ul class="facetedSearchList scroll-pane" style="overflow: hidden; padding: 0px; width: 178px;">
														<div class="jspContainer" style="width: 178px; height: 0px;">
															<div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 178px;"></div>
														</div>
													</ul>
												</dd>
											</dl>
										</div>

										<!-- m² (Net) & m² (Brüt) the end -->
								</section>
								<!-- Step 2 -->
								<h6>Onay</h6>
								<section>
									<div class="row">
										<div class="col-12">
											<div class="form-group">
												<label for="decisions1" class="form-label">Açıklama</label>
												<textarea id="decisions1" rows="4" class="form-control <?= add_class_error($data, 'description'); ?>" name="description"><?= old($data, 'description') ?></textarea>
												<span class="invalid-feedback"><?= view_error($data, 'description') ?></span>
											</div>
											<div class="form-group">
												<div class="c-inputs-stacked">
													<input type="checkbox" id="checkbox_1" name="accept_rules">
													<label for="checkbox_1" class="d-block">Şartlar ve Koşullar sözleşmesinde sunulan şartları okuduğunuzu ve kabul ettiğinizi belirtmek için buraya tıklayın</label>
												</div>
											</div>
											<div class="form-group">
												<div class="c-inputs-stacked">
													<input type="submit" class="btn btn-primary" name="sub" value="submit">
												</div>
											</div>
										</div>
									</div>
								</section>
							</form>
						</div>
						<!-- /.box-body -->
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
					<script src="<?= asset('../src/js/pages/steps.js') ?>"></script>
					<script src="<?= asset('../../../assets/vendor_components/sweetalert/sweetalert.min.js"') ?>"></script>

					<script>
function checkOnlyThis(checkbox, name) {
    var checkboxes = document.getElementsByName(name);
    checkboxes.forEach(function(item) {
        if (item !== checkbox) {
            item.checked = false;
        }
    });
}
</script>
					<?php

					view('users/inc/footer');

					?>