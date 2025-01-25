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

					<div class="box-header">						
						<h4 class="box-title">GÖREVLER</h4>
					</div>
					<div class="box-body">
					    				    			  <?php
			  flash('deletedReserv');
			  ?>
						<div class="table-responsive">
							<table id="complex_header" class="text-fade table table-bordered display" style="width:100%">
								<thead>
									<tr class="text-dark" >
									  <th>adı</th>
									  <th>soyadı</th>
									  <th>İletişim numarası</th>
									  <th>Giriş ​​tarihi</th>
									  <th>Hatırlatma tarihi </th>
									  <th>adres</th>
									  <th>Proje</th>
									  <th>Açıklama</th>
									  <th>Hakkında</th>
									   <th>delete</th>
									</tr>
								  </thead>
								  <tbody>		
								  <?php
								  if($data['reservs'] != null ){
										foreach($data['reservs']as $value):
									?>
									  <tr class="contract-row">
										<td title="<?= $value->first_name ?>" class="text-dark"><?= $value->first_name ?></td>
                                        <td title="<?= $value->last_name ?>"><?= $value->last_name ?></td>
                                        <td title="<?= $value->phone ?>"><?= $value->phone ?></td>
                                        <td title="<?= $value->start_date ?>" class="start-date"><?= $value->start_date ?></td>
                                        <td title="<?= $value->end_date ?>" class="end-date"><?= $value->end_date ?></td>
                                        <td title="<?= $value->address ?>"><?= strlen($value->address) > 30 ? substr($value->address, 0, 30) . '...' : $value->address ?></td>
                                        <td title="<?= $value->project_name ?>"><?= $value->project_name ?></td>
                                        <td title="<?= $value->description ?>" class="text-dark"><?= strlen($value->description) > 30 ? substr($value->description, 0, 30) . '...' : $value->description ?></td>
										<td class="time-left">00:00:00</td>
											<th><a href="<?= url_view_builder('Reservation/deleteReserv/' . $value->id); ?>" class="btn btn-danger">sil</a></th>
									
										</tr>
										<?php
											endforeach;
										}
										?>
									<script>
							 			// تابع برای محاسبه و نمایش زمان باقی‌مانده
										function updateTimers() {
											const rows = document.querySelectorAll('.contract-row');
											
											rows.forEach(row => {
												const startDate = new Date(row.querySelector('.start-date').innerText);
												const endDate = new Date(row.querySelector('.end-date').innerText);
												const timeLeftCell = row.querySelector('.time-left');
												
												const now = new Date();
												const timeDifference = endDate - now;
												
												if (timeDifference <= 0) {
													timeLeftCell.innerText = "TAMAM";
													row.classList.add('text-danger'); // اگر زمان تمام شد، کلاس text-danger به کل ردیف اضافه شود
												} else {
													const daysLeft = Math.floor(timeDifference / (1000 * 60 * 60 * 24));
													const hoursLeft = Math.floor((timeDifference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
													const minutesLeft = Math.floor((timeDifference % (1000 * 60 * 60)) / (1000 * 60));
													const secondsLeft = Math.floor((timeDifference % (1000 * 60)) / 1000);
													
													// نمایش زمان باقی‌مانده به صورت روز، ساعت، دقیقه، ثانیه
													timeLeftCell.innerText = `${daysLeft} gün ,${hoursLeft} saat ,${minutesLeft} dakika ,${secondsLeft} saniye`;
												// 	timeLeftCell.innerText = `${daysLeft} : ${hoursLeft} : ${minutesLeft} : ${secondsLeft} `;

													// اضافه کردن کلاس text-danger به کل ردیف وقتی یک ماه به پایان قرارداد باقی مانده
													if (daysLeft <= 30) {
														row.classList.add('text-danger'); // اضافه کردن کلاس text-danger به کل ردیف
													} else {
														row.classList.remove('text-danger'); // اگر هنوز یک ماه به پایان باقی است، کلاس حذف شود
													}
												}
											});
										}

										// بروزرسانی تایمر هر ثانیه
										setInterval(updateTimers, 1000);

										// فراخوانی اولیه برای نمایش زمان به‌روز
										updateTimers();


									</script>
									
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