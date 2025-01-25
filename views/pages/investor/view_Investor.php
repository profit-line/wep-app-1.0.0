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
        <div class="col-12">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">YATIRIMCILAR</h4>
                    <?php
                    
                    flash('deleteInvestor');
                    
                    ?>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="complex_header" class="text-fade table table-bordered display" style="width:100%">
                            <thead>
                                <tr class="text-dark">
                                    <th>isim</th>
                                    <th>Soyisim</th>
                                    <th>Adres 1</th>
                                    <th>şehir</th>
                                    <th>İletişim numarası</th>
                                    <th>Neye göre</th>
                                    <th>Açıklama</th>
                                    <th>Bütçe</th>
                                    <th>Sil</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                     foreach ($data['investors'] as $investor) { ?>
                    	  
										   <tr>
                                                <td title="<?= $investor->first_name ?>"><?= $investor->first_name ?></td>
                                                <td title="<?= $investor->last_name ?>"><?= $investor->last_name ?></td> 
                                                <td title="<?= $investor->address_line1 ?>"><?= strlen($investor->address_line1) > 30 ? substr($investor->address_line1, 0, 30) . '...' : $investor->address_line1 ?></td>
                                                <td title="<?= $investor->city ?>"><?= $investor->city ?></td> 
                                                <td title="<?= $investor->phone_number ?>"><?= $investor->phone_number ?></td>
                                                <td title="<?= $investor->investment_type ?>"><?= $investor->investment_type ?></td>
                                                <td title="<?= $investor->description ?>"><?= $investor->description ?></td>
                                                <td title="<?= $investor->budget ?>"><?= $investor->budget ?></td> 
                                                <th><a href="<?= url_view_builder('investor/deleteInvestor/' . $investor->id); ?>" class="btn btn-danger">Sil</a></th>
                                            </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

	  </div>
  </div>
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

<?php

view('users/inc/footer');

?>