<?php

view('users/inc/header');

?>

<body class="hold-transition light-skin sidebar-mini theme-primary fixed">
	
<div class="wrapper">
	<div id="loader"></div>
  
<?php

view('pages/inc/header_nav');
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
					<div class="row">
						<div class="col-xl-9">									
							<div class="card">
								<div class="card-body">
									<div class="mb-30 mb-xl-0">
										<div id="calendar"></div>
									</div>
								</div>
							</div>
						</div>							
						<div class="col-xl-3">
							<div class="d-grid">
								<button class="btn btn-danger" id="btn-new-event">Create New Event</button>
							</div>
							<div id="external-events" class="mt-20">
								<br>
								<p class="text-muted">Drag and drop your event or click in the calendar
								</p>
								<div class="external-event bg-success" data-class="bg-success">
									<i class="mdi mdi-arrow-right me-2 vertical-middle"></i>LUNCH
								</div>
								<div class="external-event bg-primary" data-class="bg-primary">
									<i class="mdi mdi-arrow-right me-2 vertical-middle"></i>GO HOME
								</div>
								<div class="external-event bg-warning" data-class="bg-warning">
									<i class="mdi mdi-arrow-right me-2 vertical-middle"></i>DO HOMEWORK
								</div>
								<div class="external-event bg-danger" data-class="bg-danger">
									<i class="mdi mdi-arrow-right me-2 vertical-middle"></i>WORK ON UI DESIGN
								</div>
								<div class="external-event bg-info" data-class="bg-info">
									<i class="mdi mdi-arrow-right me-2 vertical-middle"></i>SLEEP TIGHT
								</div>
							</div>
						</div>
					</div>					
					
					<div class="modal fade" id="event-modal" tabindex="-1">
						<div class="modal-dialog">
							<div class="modal-content">
								<form class="needs-validation" name="event-form" id="form-event" novalidate>
									<div class="modal-header py-3 px-4 border-bottom-0">
										<h5 class="modal-title" id="modal-title">Event</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body px-4 pb-4 pt-0">
										<div class="row">
											<div class="col-12">
												<div class="mb-3">
													<label class="control-label form-label">Event Name</label>
													<input class="form-control" placeholder="Insert Event Name" type="text" name="title" id="event-title" required />
													<div class="invalid-feedback">Please provide a valid event name</div>
												</div>
											</div>
											<div class="col-12">
												<div class="mb-3">
													<label class="control-label form-label">Category</label>
													<select class="form-select" name="category" id="event-category" required>
														<option value="bg-danger" selected>Danger</option>
														<option value="bg-success">Success</option>
														<option value="bg-primary">Primary</option>
														<option value="bg-info">Info</option>
														<option value="bg-dark">Dark</option>
														<option value="bg-warning">Warning</option>
													</select>
													<div class="invalid-feedback">Please select a valid event category</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-6">
												<button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
											</div>
											<div class="col-6 text-end">
												<button type="button" class="btn btn-danger-light me-1" data-bs-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div> 
					</div>					
				</div>				
			</div> 
		</section>
		<!-- /.content -->
	  </div>	  
	
  </div>
  <!-- /.content-wrapper -->
	
  
  <!-- BEGIN MODAL -->
	<!-- Modal Add Category -->
	<div class="modal fade none-border" id="add-new-events">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><strong>Add</strong> a category</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form role="form">
						<div class="row">
							<div class="col-md-6">
								<label class="form-label">Category Name</label>
								<input class="form-control form-white" placeholder="Enter name" type="text" name="category-name" />
							</div>
							<div class="col-md-6">
								<label class="form-label">Choose Category Color</label>
								<select class="form-select form-white" data-placeholder="Choose a color..." name="category-color">
									<option value="success">Success</option>
									<option value="danger">Danger</option>
									<option value="info">Info</option>
									<option value="primary">Primary</option>
									<option value="warning">Warning</option>
									<option value="inverse">Inverse</option>
								</select>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success save-category" data-bs-dismiss="modal">Save</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- END MODAL -->
 
  <!-- Side panel --> 
  <!-- quick_user_toggle -->
  <div class="modal modal-right fade" id="quick_user_toggle" tabindex="-1">
<?php
view('pages/inc/sidebar_user');

?>
  </div>
  <!-- /quick_user_toggle --> 
	
  <!-- Control Sidebar -->
  <?php

  view('pages/inc/sidebar_setting');
  ?>
  <!-- /.control-sidebar -->
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
	
	
</div>
<!-- ./wrapper -->
	
	
	
	<div id="chat-box-body">
	</div>
	<!-- Page Content overlay -->
	<script>
                      // تنظیمات FullCalendar
                      $('#chat-submit').fullCalendar({
                        selectable: true,  // به کاربر اجازه می‌دهد تاریخ‌ها را انتخاب کند.
                        select: function(startDate, endDate) {
                          // زمانی که کاربر یک بازه زمانی را انتخاب می‌کند
                          var selectedStart = startDate.format('YYYY-MM-DD HH:mm:ss');
                          var selectedEnd = endDate.format('YYYY-MM-DD HH:mm:ss');
                          
                          // ارسال تاریخ‌ها به بک‌اند با استفاده از AJAX
                          $.ajax({
                            url: '<?= url_view_builder('calender/addCalender') ?>',  // آدرس بک‌اند
                            method: 'POST',
                            data: {
                              start: selectedStart,
                              end: selectedEnd
                            },
                            success: function(response) {
                              // پاسخ موفق از سرور، می‌توانیم اطلاعات را نمایش دهیم
                              alert('تاریخ‌ها با موفقیت ارسال شدند');
                              console.log(response);
                            },
                            error: function(error) {
                              // اگر مشکلی در ارسال درخواست وجود داشت
                              alert('خطا در ارسال داده‌ها');
                              console.error(error);
                            }
                          });
                        },
                  
                        // همچنین می‌توانید با استفاده از 'dateClick' تاریخ تک‌تایی را دریافت کنید
                        dateClick: function(info) {
                          var selectedDate = info.dateStr; // تاریخ انتخاب شده
                          console.log('تاریخ انتخاب شده: ', selectedDate);
                          
                          // ارسال تاریخ به بک‌اند
                          $.ajax({
                            url: '<?= url_view_builder('calender/addCalender') ?>',  // آدرس بک‌اند
                            method: 'POST',
                            data: {
                              date: selectedDate
                            },
                            success: function(response) {
                              // پاسخ موفق از سرور
                              alert('تاریخ ارسال شد');
                              console.log(response);
                            },
                            error: function(error) {
                              // اگر مشکلی در ارسال درخواست وجود داشت
                              alert('خطا در ارسال داده‌ها');
                              console.error(error);
                            }
                          });
                        }
                      });
                    </script>
	<script src="<?= asset('../../../assets/vendor_components/full-calendar/moment.js') ?>"></script>
	<script src="<?= asset('../../../assets/vendor_components/full-calendar/fullcalendar.min.js') ?>"></script>

	<script src="<?= asset('../src/js/pages/demo.calendar.js') ?>"></script>
    <?php

view('pages/inc/footer');
    ?>
	<script src="<?= asset('../../../assets/vendor_components/full-calendar/moment.js') ?>"></script>
	<script src="<?= asset('../../../assets/vendor_components/full-calendar/fullcalendar.min.js') ?>"></script>

	<script src="<?= asset('../src/js/pages/demo.calendar.js') ?>"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   