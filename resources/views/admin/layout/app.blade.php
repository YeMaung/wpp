<!DOCTYPE html>
<html>
<head>
	<title>WPP</title>
	@yield('css')
</head>
<body>
	@include('admin.layout.partials.header')

	@yield('content')

	@include('admin.layout.partials.footer')
	@yield('script')
</body>
</html>