<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('admin.includes.head')
	<title>Document</title>
</head>
<body>
	@include('admin.includes.header')
	@yield('content')
	
	@include('admin.includes.footer')
</body>
</html>