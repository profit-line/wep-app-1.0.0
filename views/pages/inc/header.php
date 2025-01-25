<!DOCTYPE html>
<html lang="tr">
	
<!-- Mirrored from ev-admin-dashboard-template.multipurposethemes.com/bs5/template/vertical/main/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 13:03:22 GMT -->
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<!-- افزودن Bootstrap به پروژه -->
		<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		<link rel="icon" href="https://ev-admin-dashboard-template.multipurposethemes.com/bs5/images/favicon.ico">

		<title><?= SITENAME ?></title>
		
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?= asset('../src/css/vendors_css.css') ?>">
  	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		
	<!-- Style -->  
	<link rel="stylesheet" href="<?= asset('../src/css/style.css') ?>">
	<link rel="stylesheet" href="<?= asset('../src/css/skin_color.css') ?>">
	<link rel="stylesheet" href="<?= asset('../src/css/custom.css') ?>">
	<link href="<?= asset('../../../../../cdn.jquery.app/jqueryscripttop.css') ?>" rel="stylesheet" type="text/css">
    <!--Applications-->
	<link rel="manifest" href="<?= asset('../../../../../manifest.json') ?>">
    <meta name="theme-color" content="#000000">

	<script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register('../../../../../public/service-worker.js')
            .then(function(registration) {
            console.log('Service Worker registered with scope:', registration.scope);
            })
            .catch(function(error) {
            console.log('Service Worker registration failed:', error);
            });
        }
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    


</head>