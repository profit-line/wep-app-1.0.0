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

		<!-- Main content -->
		<section class="content">

		 <!-- Step wizard -->
		  <div class="box">
			<div class="box-header with-border">
			<h4 class="box-title">Müşteri Kaydı</h4>
			<?= flash('InvestorAdded') ?>  
			</div>
			<!-- /.box-header -->
			<div class="box-body wizard-content">
 <form action="<?= url_view_builder('investor/addInvestor') ?>" method="post" class="tab-wizard wizard-circle">
    <!-- Step 1 -->
    <h6>Müşteri Bilgileri</h6>
    <section>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="firstName5" class="form-label">isim :</label>
                    <input type="text" name="first_name" class="form-control <?= add_class_error($data, 'first_name'); ?>" id="firstName5" value="<?= (isset($data['requests']['first_name'])) ? $data['requests']['first_name'] : '' ?>" required>
                    <span class="invalid-feedback"><?= view_error($data, 'first_name') ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lastName1" class="form-label">Soyisim :</label>
                    <input type="text" name="last_name" class="form-control <?= add_class_error($data, 'last_name'); ?>" id="lastName1" value="<?= (isset($data['requests']['last_name'])) ? $data['requests']['last_name'] : '' ?>" required>
                    <span class="invalid-feedback"><?= view_error($data, 'last_name') ?></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="addressline1" class="form-label">Adres :</label>
                    <input type="text" name="address_line1" class="form-control <?= add_class_error($data, 'address_line1'); ?>" id="addressline1" value="<?= (isset($data['requests']['address_line1'])) ? $data['requests']['address_line1'] : '' ?>" required>
                    <span class="invalid-feedback"><?= view_error($data, 'address') ?></span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Budget" class="form-label">Bütçe :</label>
                    <input type="text" name="budget" class="form-control <?= add_class_error($data, 'budget'); ?>" id="budget" value="<?= (isset($data['requests']['budget'])) ? $data['requests']['budget'] : '' ?>">
                    <span class="invalid-feedback"><?= view_error($data, 'budget') ?></span>
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
                    <label for="phoneNumber1" class="form-label">İletişim numarası :</label>
                    <input type="tel" name="phone_number" class="form-control <?= add_class_error($data, 'phone_number'); ?>" id="phoneNumber1" value="<?= (isset($data['requests']['phone_number'])) ? $data['requests']['phone_number'] : '' ?>" required>
                    <span class="invalid-feedback"><?= view_error($data, 'phone_number') ?></span>
                </div>
            </div>
        </div>
    </section>
    <!-- Step 2 -->
    <h6>Account Setup</h6>
    <section>
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label class="form-label">Neye göre :</label>
                    <div class="c-inputs-stacked">
					<input type="radio" id="checkbox_123" name="investment_type" value="SANAYI YATIRIMCISI" 
       <?= (isset($data['requests']['investment_type']) && in_array('SANAYİ YATIRIMCISI', $data['requests']['investment_type'])) ? 'checked' : '' ?>>
<label for="checkbox_123" class="d-block">SANAYİ YATIRIMCISI</label>
<input type="radio" id="checkbox_234" name="investment_type" value="ARAZI YATIRIMCISI" 
       <?= (isset($data['requests']['investment_type']) && in_array('ARAZI YATIRIMCISI', $data['requests']['investment_type'])) ? 'checked' : '' ?>>
<label for="checkbox_234" class="d-block">ARAZİ YATIRIMCISI</label>
<input type="radio" id="checkbox_345" name="investment_type" value="KONUT YATIRIMCISI" 
       <?= (isset($data['requests']['investment_type']) && in_array('KONUT YATIRIMCISI', $data['requests']['investment_type'])) ? 'checked' : '' ?>>
<label for="checkbox_345" class="d-block">KONUT YATIRIMCISI</label>
<input type="radio" id="checkbox_456" name="investment_type" value="MUTAHIT" 
       <?= (isset($data['requests']['investment_type']) && in_array('MUTAHIT', $data['requests']['investment_type'])) ? 'checked' : '' ?>>
<label for="checkbox_456" class="d-block">MÜTAHİT</label></div>
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
                    <textarea name="description" id="decisions1" rows="4" class="form-control <?= add_class_error($data, 'description'); ?>"><?= (isset($data['requests']['description'])) ? $data['requests']['description'] : '' ?></textarea>
                    <span class="invalid-feedback"><?= view_error($data, 'description') ?></span>
                </div>
                <div class="form-group">
                    <div class="c-inputs-stacked">
                        <input type="checkbox" id="checkbox_1" name="agreement" <?= (isset($data['requests']['agreement']) && $data['requests']['agreement'] == 'on') ? 'checked' : '' ?> required>
                        <label for="checkbox_1" class="d-block">Şartlar ve Koşullar sözleşmesinde sunulan şartları okuduğunuzu ve kabul ettiğinizi belirtmek için buraya tıklayın</label>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    
    <input type="hidden" name="csrf_token" value="<?= setCsrfToken() ?>">
    <div class="box-footer">
        <button type="button" class="btn btn-primary-light me-1" id="cancelBtn">
            <i class="ti-trash"></i> Cancel
        </button>
        <button type="submit" class="btn btn-primary" id="submitBtn">
            <i class="ti-save-alt"></i> Save
        </button>
    </div>
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
<!-- ./wrapper -->
		  
<?php

view('pages/inc/footer');

?>