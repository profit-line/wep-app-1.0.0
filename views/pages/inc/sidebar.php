<aside class="main-sidebar">
	<!-- sidebar-->
	<section class="sidebar position-relative">
		<div class="multinav">
			<div class="multinav-scroll" style="height: 99%;">
				<!-- sidebar menu-->
				<ul class="sidebar-menu" data-widget="tree">
					<li class="header fs-10 m-0 text-uppercase">Dashboard</li>
					<li class="treeview">
						<a href="<?= url_view_builder('pages/index') ?>">
							<i data-feather="home"></i>
							<span>ANASAYFA</span>
						</a>
					</li>

					<li class="treeview">
						<a href="#">
							<i data-feather="target"></i>

							<!-- <i data-feather="headphones"></i> -->
							<span>GÖREVLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<!-- این قسمت هم اون هایی که ۱۰ روز مونده به تموم شدن -->
							<li><a href="<?= url_view_builder('reservation/expiringIn3Day') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ACİL ARANMASI GEREKEN</a></li>
							<!-- این قسمت هم فقط کسانی که تایمشون داره تموم میشه به ترتیب بهمون نشون بده از ۱۰ روز تا یک ماه رو بهمون نشون بده -->
							<li><a href="<?= url_view_builder('reservation/index') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM GÖREVLER</a></li>
							<li><a href="<?= url_view_builder('reservation/addReservation') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>GÖREVLER EKLEMEK</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="briefcase"></i>

							<!-- <i data-feather="edit"></i> -->
							<span>PORTFÖYLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li class="treeview">
								<a href="#">
									<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SATILIK PORTFÖY
									<span class="pull-right-container">
										<i class="fa fa-angle-right pull-right"></i>
									</span>
								</a>
								<!-- این قمسمت هم برای فروش هست -->
								<ul class="treeview-menu">
									<!-- مسکن -->
									<li><a href="<?= url_view_builder('sale/konutShow'); ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
									<!-- دفتر -->
									<li><a href="<?= url_view_builder('sale/ofisShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>
									<!-- ویلا -->
									<li><a href="<?= url_view_builder('sale/villaShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>
									<!-- زمین -->
									<li><a href="<?= url_view_builder('sale/araziShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ</a></li>
									
									<li><a href="<?= url_view_builder('sale/sanayiIsyeriShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SANAYİ İŞYERİ</a></li>
								</ul>
							</li>
							<li class="treeview">
								<a href="#">
									<!-- این قسمت هم برای اجاره هست -->
									<i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KİRALIK PORTFÖY
									<span class="pull-right-container">
										<i class="fa fa-angle-right pull-right"></i>
									</span>
								</a>
								<ul class="treeview-menu">
									<!-- مسکن -->
									<li><a href="<?= url_view_builder('rental/konutShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
									<!-- دفتر -->
									<li><a href="<?= url_view_builder('rental/ofisShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>
									<!-- ویلا -->
									<li><a href="<?= url_view_builder('rental/villaShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>
									
									<li><a href="<?= url_view_builder('rental/sanayiIsyeriShow') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SANAYİ İŞYERİ</a></li>
									
								</ul>
							</li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="award"></i>

							<!-- <i data-feather="headphones"></i> -->
							<span>KİRA TAKİBİ</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<!-- این قسمت اون هایی که یک مانده به پایان-->
							<li><a href="<?= url_view_builder('rental/expiringIn1Month') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONTRAT BİTİMİ YAKLAŞAN</a></li>
							<!--این قسمت هم همه رو نشون بده-->
							<li><a href="<?= url_view_builder('rental/index') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM KİRALANAN MÜLKLER</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="plus-square"></i>

							<!-- <i data-feather="headphones"></i> -->
							<span>PORTFÖY EKLE</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= url_view_builder('estate/addKonut') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KONUT</a></li>
							<li><a href="<?= url_view_builder('estate/addOfis') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>OFİS</a></li>
							<li><a href="<?= url_view_builder('estate/addVilla') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VİLLA</a></li>
							<li><a href="<?= url_view_builder('estate/addArazi') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>ARAZİ</a></li>
							<li><a href="<?= url_view_builder('estate/addSanayiIsyeri') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>SANAYİ İŞYERİ</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="users"></i>

							<!-- <i data-feather="headphones"></i> -->
							<span>MALİKLER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>

						<ul class="treeview-menu">
							<li><a href="<?= url_view_builder('estate/index') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>görüntüle Malik</a></li>
							<li><a href="<?= url_view_builder('estate/addAKASYA') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>AKASYA F.C.</a></li>
							<li><a href="<?= url_view_builder('estate/addBegonyaSuite') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>BEGONYA SUİT</a></li>
							<li><a href="<?= url_view_builder('estate/addKrystalsehir') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>KRİSTALŞEHİR</a></li>
							<li><a href="<?= url_view_builder('estate/addVadiistanbul') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>VADİİSTANBUL</a></li>
							<li><a href="<?= url_view_builder('estate/addBesinciLevent') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>BEŞİNCİ LEVENT</a></li>
							<li><a href="<?= url_view_builder('estate/ekle') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>EKLE</a></li>

						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="dollar-sign"></i>

							<!-- <i data-feather="headphones"></i> -->
							<span>YATIRIMCILAR</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= url_view_builder('investor/addInvestor') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>EKLEMEK</a></li>
							<li><a href="<?= url_view_builder('investor/index') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Görüntüle</a></li>
						</ul>
					</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="credit-card"></i>

							<span>EŞLEŞTİRMELER</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<li><a href="<?= url_view_builder('pages/eslestirmeler') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>TÜM EŞLEŞMELER % İLE</a></li>
						</ul>
					</li>


					<li>
						<a href="<?= url_view_builder('user/editUser/' . get('user')['id']) ?>">
							<i data-feather="user"></i>
							<span>Benim profile</span>
						</a>
					</li>
					<?php if (has('user')) {

						if (get('user')['role'] === "admin") { ?>
							<li>

								<a href="<?= url_view_builder('admin/usersShow') ?>">
									<span>users show</span>
								</a>
							</li>
					<?php

						}
					}
					?>


					<!-- <li>
						<a href="<?php //url_view_builder('calender/index') ?>">
							<span>calender</span>
						</a>
					</li> -->

					<li class="header fs-10 m-0 text-uppercase">Components</li>
					<li class="treeview">
						<a href="#">
							<i data-feather="headphones"></i>
							<span>Support</span>
							<span class="pull-right-container">
								<i class="fa fa-angle-right pull-right"></i>
							</span>
						</a>
						<ul class="treeview-menu">
							<?php if (has('user')) {

								if (get('user')['role'] === "ticket_admin"  || get('user')['role'] === "admin") { ?>
									<li><a href="<?= url_view_builder('admin/showTicket') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Support Ticket</a></li>
							<?php

								}
							}
							?>
							<!-- <li><a href="<?php // url_view_builder('message/index') ?>"><i class="icon-Commit"><span class="path1"></span><span class="path2"></span></i>Chat</a></li> -->
						</ul>
					</li>

					<li class="">
						<a href="<?= url_view_builder('user/logout') ?>">
						    <i data-feather="log-out"></i>
							<span>logout</span>
						</a>
					</li>

			</div>
		</div>
	</section>
</aside>