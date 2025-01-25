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

		 <!-- Step wizard -->
		  <div class="box">
			<div class="box-header with-border">
			  <h4 class="box-title">Müşteri Kaydı</h4>
			  
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
				<form action="<?= url_view_builder('estate/addKrystalsehir') ?>" class="tab-wizard wizard-circle" method="post">
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
						</div>						<div class="row">
							<div class="col-md-6">
							<div class="form-group">
												<label for="block" class="form-label">block :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'block'); ?>" name="block" id="block" value="<?= old($data, 'block') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'block') ?></span>
											</div>
																				<div class="form-group">
												<label for="unit" class="form-label">No :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'unit'); ?>" name="unit" id="unit" value="<?= old($data, 'unit') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'unit') ?></span>
											</div>
							</div>
																	<div class="col-md-6">
											<div class="form-group">
												<label for="addressline1" class="form-label">Fiyat :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'price'); ?>" name="price" id="addressline1" value="<?= old($data, 'price') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'price') ?></span>
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
												<span class="invalid-feedback"><?= view_error($data, 'phone') ?></span>
											</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-2">
							<div class="form-group">
												<label for="date1" class="form-label">Kat sayısı :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'floor_count'); ?>" name="floor_count" id="date1" value="<?= old($data, 'floor_count') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'floor_count') ?></span>
											</div>
							</div>
							<div class="col-md-2">
							<div class="form-group">
												<label for="date1" class="form-label">Bulunduğu kat :</label>
												<input type="text" class="form-control <?= add_class_error($data, 'floor'); ?>" name="floor" id="date1" value="<?= old($data, 'floor') ?>">
												<span class="invalid-feedback"><?= view_error($data, 'floor') ?></span>
											</div>
							</div>
						</div>

					</section>
					<!-- Step 2 -->
					<h6>Account Setup</h6>
					<section>
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
											<div class="jspContainer" style="width: 178px; height: 0px;"><div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 178px;"></div></div></ul>
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
													<div class="jspContainer" style="width: 178px; height: 0px;"><div class="jspPane" style="padding: 0px; top: 0px; left: 0px; width: 178px;"></div></div></ul>
												</dd>
										</dl>
									</div>

						<!-- m² (Net) & m² (Brüt) the end -->

						<div class="row">
							<div class="col-md-3">
							<div class="form-group">
													<label class="form-label">Bina yaşı :</label>
													<div class="c-inputs-stacked">
														<input type="checkbox" id="checkbox_123" value="0" name="building_age[]" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_123" class="d-block">0</label>
														<input type="checkbox" id="checkbox_234" value="1" name="building_age[]" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_234" class="d-block">1</label>
														<input type="checkbox" id="checkbox_345" value="2" name="building_age[]" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_345" class="d-block">2</label>
														<input type="checkbox" id="checkbox_456" value="3" name="building_age[]" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_456" class="d-block">3</label>
														<input type="checkbox" id="checkbox_567" value="4" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_567" class="d-block">4</label>
														<input type="checkbox" id="checkbox_678" value="5-10" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_678" class="d-block">5-10 arası</label>
														<input type="checkbox" id="checkbox_789" value="11-15" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_789" class="d-block">11-15 arası</label>
														<input type="checkbox" id="checkbox_891" value="16-20" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_891" class="d-block">16-20 arası</label>
														<input type="checkbox" id="checkbox_910" value="21-25" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this, 'building_age')">
														<label for="checkbox_910" class="d-block">21-25 arası</label>
														<input type="checkbox" id="checkbox_101" value="26-30" name="building_age" <?= old_checkbox($data, 'building_age[]') ?> onclick="checkOnlyThis(this , 'building_age')">
														<label for="checkbox_101" class="d-block">26-30 arası</label>
													</div>
												</div>
							</div>	
							  					
							<div class="col-md-3">
							<div class="form-group">
													<label class="form-label">Oda sayısı :</label>
													<div class="c-inputs-stacked">
														<input type="checkbox" id="checkbox_112" value="1+0" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this, 'sleeps')">
														<label for="checkbox_112" class="d-block">Stüdyo(1+0)</label>
														<input type="checkbox" id="checkbox_121" value="1+1" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this, 'sleeps')">
														<label for="checkbox_121" class="d-block">1+1</label>
														<input type="checkbox" id="checkbox_131" value="2+1" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this, 'sleeps')">
														<label for="checkbox_131" class="d-block">2+1</label>
														<input type="checkbox" id="checkbox_141" value="3+1" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this, 'sleeps')">
														<label for="checkbox_141" class="d-block">3+1</label>
														<input type="checkbox" id="checkbox_151" value="4+1" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this, 'sleeps')">
														<label for="checkbox_151" class="d-block">4+1</label>
														<input type="checkbox" id="checkbox_161" value="5+1" name="sleeps" <?= old_checkbox($data, 'sleeps') ?> onclick="checkOnlyThis(this , 'sleeps')">
														<label for="checkbox_161" class="d-block">5+1</label>
													</div>
												</div>
							</div>

							


							<div class="col-md-3">
							<div class="form-group">
													<label class="form-label">bilgi :</label>
													<div class="c-inputs-stacked">
														<input type="checkbox" id="checkbox_171" name="elevator" <?= old_checkbox($data, 'elevator') ?>>
														<label for="checkbox_171" class="d-block">Asansör</label>
														<input type="checkbox" id="checkbox_181" name="parking" <?= old_checkbox($data, 'parking') ?>>
														<label for="checkbox_181" class="d-block">Otopark</label>
														<input type="checkbox" id="checkbox_191" name="balcony" <?= old_checkbox($data, 'balcony') ?>>
														<label for="checkbox_191" class="d-block">Balkon</label>
														<input type="checkbox" id="checkbox_201" name="within_site" <?= old_checkbox($data, 'within_site') ?>>
														<label for="checkbox_201" class="d-block">Site içinde</label>
														<input type="checkbox" id="checkbox_211" name="furnished" <?= old_checkbox($data, 'furnished') ?>>
														<label for="checkbox_211" class="d-block">Eşyalı</label>
													</div>
												</div>
							</div>
							<div class="col-md-3">
												<div class="form-group">
													<div class="c-inputs-stacked">
														<input type="checkbox" id="checkbox_222" name="contract_type" <?= old_checkbox($data, 'contract_type') ?> value="SATILIK" onclick="checkOnlyThis(this , 'contract_type')">
														<label for="checkbox_222" class="d-block">SATILIK</label>
														<input type="checkbox" id="checkbox_233" name="contract_type" <?= old_checkbox($data, 'contract_type') ?> value="KIRALIK" onclick="checkOnlyThis(this , 'contract_type')">
														<label for="checkbox_233" class="d-block">KIRALIK</label>
													</div>
												</div>
											</div>
						</div>
					</section>
					<!-- Step 3 -->
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
		  <!-- /.box -->

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
<!-- ./wrapper -->
<?php

view('pages/inc/footer');

?>