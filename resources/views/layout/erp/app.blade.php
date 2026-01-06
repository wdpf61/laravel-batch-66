<!DOCTYPE html>
<html lang="en">

<head>

	<!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard | Kanakku - Invoice and Billing Management Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Kanakku is a Sales, Invoices & Accounts Admin template for Accountant or Companies/Offices with various features for all your needs. Try Demo and Buy Now.">
	<meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
	<meta name="author" content="Dreams Technologies">

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.png">

	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets')}}/img/apple-touch-icon.png">

    <!-- Theme Script js -->
    <script src="{{asset('assets')}}/js/theme-script.js" type="de90384026a73b34442fd480-text/javascript"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/plugins/tabler-icons/tabler-icons.min.css">

	<!-- Daterangepikcer CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.css">

	<!-- Datetimepicker CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap-datetimepicker.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/fontawesome/css/all.min.css">

	<!-- Tabler Icon CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/plugins/tabler-icons/tabler-icons.min.css">

    <!-- Simplebar CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/plugins/simplebar/simplebar.min.css"

	<!-- Iconsax CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/iconsax.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/style.css">

    @yield("css")

</head>

<body>


	<!-- Begin Wrapper -->
	<div class="main-wrapper">

         @include("layout.erp.partials.header")



         @include("layout.erp.partials.sidebar")



		<!-- ========================
			Start Page Content
		========================= -->

		<div class="page-wrapper">

			<!-- Start Content -->
			<div class="content">

				@yield("content")

			</div>
			<!-- End Content -->

			<!-- Start Footer -->
			<div class="footer d-sm-flex align-items-center justify-content-between bg-white py-2 px-4 border-top">
				<p class="text-dark mb-0">&copy; 2025 <a href="javascript:void(0);" class="link-primary">Kanakku</a>, All Rights Reserved</p>
				<p class="text-dark">Version : 1.3.8</p>
			</div>
			<!-- End Footer -->

		</div>

		<!-- ========================
			End Page Content
		========================= -->

		<!-- Start Add Ledger  -->
		<div id="add_ledger" class="modal fade">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Add New Ledger</h4>
						<button type="button" class="btn-close btn-close-modal custom-btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-x"></i></button>
					</div>
					<form action="https://kanakku.dreamstechnologies.com/html/template/index.html">
						<div class="modal-body pb-1">
							<div class="mb-3">
								<label class="form-label">Amount</label>
								<input type="text" class="form-control">
							</div>
							<div class="mb-3">
								<label class="form-label">Date</label>
								<div class="input-group position-relative">
									<input type="text" class="form-control datetimepicker rounded-end" placeholder="dd/mm/yyyy">
									<span class="input-icon-addon fs-16 text-gray-9">
										<i class="isax isax-calendar-2"></i>
									</span>
								</div>
							</div>
							<div class="mb-3">
								<label class="form-label">Mode</label>
								<div class="d-flex align-items-center">
									<div class="form-check me-3">
										<input class="form-check-input" type="radio" name="Radio" id="Radio-sm-1">
										<label class="form-check-label" for="Radio-sm-1">
											Credit
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="Radio" id="Radio-sm-2" checked="">
										<label class="form-check-label" for="Radio-sm-2">
											Debit
										</label>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer d-flex align-items-center justify-content-between gap-1">
							<button type="button" class="btn btn-outline-white" data-bs-dismiss="modal">Cancel</button>
							<button type="submit" class="btn btn-primary">Create</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- End Add Ledger -->

	</div>
	<!-- End Wrapper -->

	<!-- jQuery -->
	<script src="{{asset('assets')}}/js/jquery-3.7.1.min.js" ></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset('assets')}}/js/bootstrap.bundle.min.js" ></script>

	<!-- Daterangepikcer JS -->
	<script src="{{asset('assets')}}/js/moment.min.js" ></script>
	<script src="{{asset('assets')}}/plugins/daterangepicker/daterangepicker.js" ></script>

	<!-- Simplebar JS -->
	<script src="{{asset('assets')}}/plugins/simplebar/simplebar.min.js" ></script>

	<!-- Datetimepicker JS -->
	<script src="{{asset('assets')}}/js/bootstrap-datetimepicker.min.js" ></script>

	<!-- Chart JS -->
	<script src="{{asset('assets')}}/plugins/apexchart/apexcharts.min.js" ></script>
	<script src="{{asset('assets')}}/plugins/apexchart/chart-data.js" ></script>

	<!-- Datatable JS -->
	<script src="{{asset('assets')}}/js/jquery.dataTables.min.js" ></script>
    <script src="{{asset('assets')}}/js/dataTables.bootstrap5.min.js" ></script>

	<!-- Custom JS -->
	<script src="{{asset('assets')}}/js/script.js" ></script>

{{-- <script src="{{asset('assets')}}/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="de90384026a73b34442fd480-|50" ></script> --}}
<script  src="{{asset('assets')}}/cdn-cgi/abc.min.js" ></script>

 @stack("js")

</body>

</html>
