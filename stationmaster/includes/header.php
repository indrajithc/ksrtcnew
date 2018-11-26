<?php

/**
 * @Author: indran
 * @Date:   2018-10-17 16:48:54
 * @Last Modified by:   indran
 * @Last Modified time: 2018-11-25 10:16:50
 */


include_once('../global.php'); ?>
<?php include_once('../root/connection.php');
include_once('../root/functions.php');

?>
<?php  

auth_login();  

$db=  new Database();
$message=array(null,null);

?>
<!DOCTYPE html>
<html lang="en"  ng-app="app-stationmaster">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="Indran">
	<meta name="github" content="https://github.com/indrajithc">

	<base href="<?php echo DIRECTORY ; ?>">
	<title><?php  echo DISPLAY_NAME; ?></title>

	<link rel="icon" href="assets/image/favicon/favicon.ico">

	<meta name="csrf-token" content="<?php echo $_SESSION[ SYSTEM_NAME . '_token']; ?>">










	<link rel="stylesheet" href="stationmaster/css/style_01.css"> 
	<link rel="stylesheet" href="stationmaster/css/style.css"> 
	<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/datatables.min.css">
	<link rel="stylesheet" href="assets/css/cropper.min.css">




	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->


<link rel="shortcut icon" href="assets/image/favicon/favicon.ico" /> 

<style type="text/css">

.select2-container .select2-selection--single { 
	height: 40px !important; 
}

.asColorPicker-input, .dataTables_wrapper select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=text], .jsgrid .jsgrid-table .jsgrid-filter-row select, .jsgrid .jsgrid-table .jsgrid-filter-row input[type=number], .select2-container--default .select2-selection--single, .select2-container--default .select2-selection--single .select2-search__field, .tt-hint, .tt-query, .typeahead {
	padding: .5rem 1rem 2rem !important; 
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
	height: 40px; 
}
</style>
<script src="assets/js/jquery.min.js"></script> 

</head>




<body>
	<div class="container-scroller">
		

		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a class="navbar-brand brand-logo" href=".">
					<img src="assets/image/logob.jpg" alt="logo" />
					<span class="text-primary px-2 py-1"><?php  echo DISPLAY_NAME; ?></span> 
				</a>
				<a class="navbar-brand brand-logo-mini" href="stationmaster/dashboard">
					<img src="assets/image/logob.jpg" alt="logo" /> 
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
					<span class="mdi mdi-menu"></span>
				</button>
				<ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">

				</ul>
				<ul class="navbar-nav navbar-nav-right">


					<li class="nav-item  ml-4" >
						
					</li>


					<li class="nav-item dropdown d-none">
						<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
							<i class="mdi mdi-file-outline"></i>
							<span class="count">0</span>
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
							<a class="dropdown-item py-3">
								<p class="mb-0 font-weight-medium float-left">You have 0 unread mails </p>
								<span class="badge badge-pill badge-primary float-right">View all</span>
							</a>
							<div class="dropdown-divider"></div>
							<!-- <a class="dropdown-item preview-item">
								<div class="preview-thumbnail">
									<img src="assets/image/default/user.png" alt="image" class="img-sm profile-pic"> </div>
									<div class="preview-item-content flex-grow py-2">
										<p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
										<p class="font-weight-light small-text"> The meeting is cancelled </p>
									</div>
								</a>
								<a class="dropdown-item preview-item">
									<div class="preview-thumbnail">
										<img src="assets/image/default/user.png" alt="image" class="img-sm profile-pic"> </div>
										<div class="preview-item-content flex-grow py-2">
											<p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
											<p class="font-weight-light small-text"> The meeting is cancelled </p>
										</div>
									</a>
									<a class="dropdown-item preview-item">
										<div class="preview-thumbnail">
											<img src="assets/image/default/user.png" alt="image" class="img-sm profile-pic"> </div>
											<div class="preview-item-content flex-grow py-2">
												<p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
												<p class="font-weight-light small-text"> The meeting is cancelled </p>
											</div>
										</a> -->
									</div>
								</li>
								<li class="nav-item dropdown ml-4" id="notificationNew">
								</li>

								<li class="nav-item dropdown d-none d-xl-inline-block">
									<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
										
										<img class="img-xs rounded-circle" src="assets/image/default/user.png" alt="Profile image"> </a>
										<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
									<!-- 		<a class="dropdown-item p-0">
												<div class="d-flex border-bottom">
													<div class="py-3 px-4 d-flex align-items-center justify-content-center">
														<i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
													</div>
													<div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
														<i class="mdi mdi-account-outline mr-0 text-gray"></i>
													</div>
													<div class="py-3 px-4 d-flex align-items-center justify-content-center">
														<i class="mdi mdi-alarm-check mr-0 text-gray"></i>
													</div>
												</div>
											</a> -->
											<!-- <a class="dropdown-item mt-2"> Manage Accounts </a> -->
											<a class="dropdown-item" href="stationmaster/change_password.php"> Change Password </a>
											<!-- <a class="dropdown-item"> Check Inbox </a> -->
											<a class="dropdown-item" href="exit"> Sign Out </a>
										</div>
									</li>
								</ul>
								<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
									<span class="ti-menu"></span>
								</button>
							</div>
						</nav>
						

						<div class="container-fluid page-body-wrapper">
							


							

							

							<nav class="sidebar sidebar-offcanvas" id="sidebar">
								<ul class="nav">



									<li class="nav-item nav-profile">
										

								<!-- 		<div class="nav-link">
											<div class="user-wrapper">
												<div class="profile-image">
													<img src="assets/image/default/user.png" alt="profile image"> </div>
													<div class="text-wrapper">
														<p class="profile-name">Richard V.Welsh</p>
														<div>
															<small class="designation text-muted">Manager</small>
															<span class="status-indicator online"></span>
														</div>
													</div>
												</div> 
											</div> -->


										</li>



										
										<?php  include_once('navbar.php'); ?>
									</ul>
								</nav>

								<div class="main-panel">

									<div class="content-wrapper">

										<?php
										if (isset($_SESSION['message'])) {
											$message = $_SESSION['message'];
											unset($_SESSION['message']);
										}

										?>

										<script type="text/javascript">
											

											$(document) .ready(function($) {


												// // location.href='stationmaster/includes/notifications.php';
												// $.ajax(  { 
												// 	url: 'stationmaster/includes/notifications.php',
												// 	method: "POST",
												// 	data: 'action='+"get-notif", 
												// 	success: function (response) {
												// 		console.log(response);

												// 		$('#notificationNew').html( response);
												// 	},
												// 	error: function () {
												// 		alert('notifications error');

												// 	}
												// });




											});


										</script>