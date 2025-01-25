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
						<h4 class="box-title">Kiraciler</h4>
						<?php
						
						flash('deletedEstate');
						
						?>
					</div>
					<div class="box-body">
    <div class="table-responsive">
        <table id="complex_header" class="text-fade table table-bordered display" style="width:100%">
            <thead>
                <tr class="text-dark">
                  <th> adı</th>
                  <th>İletişim numarası</th>
                  <th>Adres</th>
                  <th>Hakkında</th>
                  <th>şehir</th>
                  <th>block</th>
                  <th>Net</th>
                  <th>Brüt</th>
                  <th>Kat sayısı </th>
                  <th>Bulunduğu kat </th>
                  <th>No</th>
                  <th>Bina yaşı</th>
                  <th>Oda sayısı </th>
                  <th>otopark</th>
				  <th>asansör</th>
				  <th>balkon</th>
				  <th>mobilyalı</th>
				  <th>site içi</th>
                  <th>tip</th>
                  <th>Proje adı</th>
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
                <?php 
				if(isset($data['estates']) && count($data['estates']) > 0){
				foreach ($data['estates'] as $value): ?>
                <tr class="contract-row">
                    <td title="<?= $value->family_name ?>" class="text-dark"><?= $value->family_name ?></td>
                    <td title="<?= $value->phone_number ?>" class="text-dark"><?= $value->phone_number ?></td>
                    <td title="<?= $value->address ?>"><?= strlen($value->address) > 30 ? substr($value->address, 0, 30) . '...' : $value->address ?></td>
                    <td title="<?= $value->description ?>" class="text-dark"><?= strlen($value->description) > 30 ? substr($value->description, 0, 30) . '...' : $value->description ?></td>
                    <td title="<?= $value->city ?>" class="text-dark"><?= $value->city ?></td>
                    <td title="<?= $value->block ?>" class="text-dark"><?= $value->block ?></td>
                    <td title="<?= $value->net_area ?>" class="text-dark"><?= $value->net_area ?></td>
                    <td title="<?= $value->gross_area ?>" class="text-dark"><?= $value->gross_area ?></td>
                    <td title="<?= $value->floor_count ?>" class="text-dark"><?= $value->floor_count ?></td>
                    <td title="<?= $value->floor ?>" class="text-dark"><?= $value->floor ?></td>
                    <td title="<?= $value->unit ?>" class="text-dark"><?= $value->unit ?></td>
                    <td title="<?= $value->building_age ?>" class="text-dark"><?= $value->building_age ?></td>
                    <td title="<?= $value->sleeps ?>" class="text-dark"><?= $value->sleeps ?></td>
                    <td title="<?= $value->parking == 1 ? 'Var' : 'Yok' ?>"><?= $value->parking == 1 ? 'Var' : 'Yok' ?></td>
                    <td title="<?= $value->elevator  == 1 ? 'Var' : 'Yok' ?>"><?= $value->elevator  == 1 ? 'Var' : 'Yok' ?></td>
                    <td title="<?= $value->balcony  == 1 ? 'Var' : 'Yok' ?>"><?= $value->balcony  == 1 ? 'Var' : 'Yok' ?></td>
                    <td title="<?= $value->furnished  == 1 ? 'Var' : 'Yok' ?>"><?= $value->furnished  == 1 ? 'Var' : 'Yok' ?></td>
                    <td title="<?= $value->within_site  == 1 ? 'Var' : 'Yok' ?>"><?= $value->within_site  == 1 ? 'Var' : 'Yok' ?></td>
                    <td title="<?= $value->contract_type ?>" class="text-dark"><?= $value->contract_type ?></td>
                    <td title="<?= $value->project_name ?>" class="text-dark"><?= $value->project_name ?></td>
                    <td title="<?= $value->price ?>" class="text-dark"><?= $value->price ?></td>
                    <td class="text-dark"><?= $value->sold_out == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->rented == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->wrong_number == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->did_not_answer == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->does_not_sell == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->not_available == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                    <td class="text-dark"><?= $value->do_not_disturb == 1 ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-times" aria-hidden="true"></i>' ?></td>
                     <th><a href="<?= url_view_builder('estate/deleteMalikler/' . $value->id); ?>" class="btn btn-danger">Sil</a></th>
                </tr>
                <?php endforeach; } ?>
            </tbody>
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
<?php

view('users/inc/footer');

?>