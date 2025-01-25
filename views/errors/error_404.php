<?php

view('users/inc/header');

?>

<body class="hold-transition light-skin theme-primary bg-img" style="background-image: url(../../../images/auth-bg/bg-17.png); background-position: bottom right">
	
	<section class="error-page h-p100">
		<div class="container h-p100">
		  <div class="row h-p100 align-items-center justify-content-center text-center">
			  <div class="col-lg-7 col-md-10 col-12">
				  <div class="rounded10 p-50">
					  <h1 class="fs-100">404</h1>
					  <h1>Page Not Found !</h1>
					  <h3 class="text-fade">looks like, page doesn't exist</h3>
					  <div class="my-30"><a href="<?= url_view_builder('pages/index') ?>" class="btn btn-primary">Back to dashboard</a></div>				  
				  </div>
			  </div>				
		  </div>
		</div>
	</section>


<?php

view('users/inc/footer');

?>