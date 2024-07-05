<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="{{ config('app.name') }} - Dashboard">
	<meta name="author" content="{{ config('app.name') }}">
	<meta name="keywords" content="{{ config('app.name') }}">

	<title>{{ config('app.name') }} - @yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('template') }}/images/favicon.png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/core/core.css">
	<!-- endinject -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('template') }}/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="{{ asset('template') }}/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('template') }}/css/demo2/style.css">
    <!-- End layout styles -->
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							@yield('content')
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
	<script src="{{ asset('template') }}/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- inject:js -->
	<script src="{{ asset('template') }}/vendors/feather-icons/feather.min.js"></script>
	<script src="{{ asset('template') }}/js/template.js"></script>
	<!-- endinject -->
</body>
</html>
