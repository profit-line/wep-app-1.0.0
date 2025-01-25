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
		  <div class="row">
			  
			
			<div class="col-12">

			 <div class="box">
				<div class="box-header with-border">
				  <h4 class="box-title">KONUT</h4>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table text-fade table-bordered">
						<thead>
    						<tr class="text-dark">
    							<th>İsim</th>
    							<th>İletişim numarası</th>
    							<th>şehir</th>
    							<th>adres</th>
    							<th>Kat sayısı</th>
    							<th>Bulunduğu kat</th>
    							<th>No</th>
    							<th>blok</th>
    							<th>Oda sayısı</th>
    							<th>otopark</th>
    							<th>asansör</th>
    							<th>balkon</th>
    							<th>mobilyalı</th>
    							<th>site içi</th>
    							<th>Binanın Yaşı</th>
    							<th>Net</th>
    							<th>Brüt</th>
    							<th>Fiyat</th>
    							<th>Satmış</th>
                                <th>Kiralamış</th>
                                <th>Yanlış No</th>
                                <th>Cevap yok</th>
                                <th>Satmak istemiyor</th>
                                <th>Ulaşılamıyor</th>
                                <th>Aranmak istemiyor</th>
    							<th>Sil</th>
    						</tr>
    					</thead>
						<tbody>
							<?php foreach ($data['sales'] as $value): ?>
								<tr class="contract-row">
									<td title="<?= $value->family_name ?>" class="text-dark"><?= $value->family_name ?></td>
                                    <td title="<?= $value->phone_number ?>"><?= $value->phone_number ?></td>
                                    <td title="<?= $value->city ?>"><?= $value->city ?></td>
                                    <td title="<?= $value->address ?>"><?= strlen($value->address) > 30 ? substr($value->address, 0, 30) . '...' : $value->address ?></td>
                                    <td title="<?= $value->floor_count ?>"><?= $value->floor_count ?></td>
                                    <td title="<?= $value->floor ?>"><?= $value->floor ?></td>
                                    <td title="<?= $value->unit ?>"><?= $value->unit ?></td>
                                    <td title="<?= $value->block ?>"><?= $value->block ?></td>
                                    <td title="<?= $value->sleeps ?>"><?= $value->sleeps ?></td>
                                    <td title="<?= $value->parking == 1 ? 'Var' : 'Yok' ?>"><?= $value->parking == 1 ? 'Var' : 'Yok' ?></td>
                                    <td title="<?= $value->elevator  == 1 ? 'Var' : 'Yok' ?>"><?= $value->elevator  == 1 ? 'Var' : 'Yok' ?></td>
                                    <td title="<?= $value->balcony  == 1 ? 'Var' : 'Yok' ?>"><?= $value->balcony  == 1 ? 'Var' : 'Yok' ?></td>
                                    <td title="<?= $value->furnished  == 1 ? 'Var' : 'Yok' ?>"><?= $value->furnished  == 1 ? 'Var' : 'Yok' ?></td>
                                    <td title="<?= $value->within_site  == 1 ? 'Var' : 'Yok' ?>"><?= $value->within_site  == 1 ? 'Var' : 'Yok' ?></td>
                                    <td title="<?= $value->building_age ?>"><?= $value->building_age ?></td>
                                    <td title="<?= $value->net_area ?>" class="text-dark"><?= $value->net_area ?></td>
                                    <td title="<?= $value->gross_area ?>" class="text-dark"><?= $value->gross_area ?></td>
                                    <td title="<?= $value->price ?>" class="text-dark"><?= $value->price ?></td>
                                    <td class="text-dark"><?= $value->sold_out == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->rented == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->wrong_number == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->did_not_answer == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->does_not_sell == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->not_available == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                    <td class="text-dark"><?= $value->do_not_disturb == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                                     <td><a href="<?= url_view_builder('sale/deleteSale/' . $value->id); ?>" class="btn btn-danger">Sil</a></td>
				
								</tr> <?php endforeach; ?>
				
						</tbody>
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->       
			</div>
			<!-- /.col -->
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>
  </div>
  <!-- /.content-wrapper -->
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