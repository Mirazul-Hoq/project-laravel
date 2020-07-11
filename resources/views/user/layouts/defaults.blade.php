<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('user.includes.head')
	<title>Document</title>
</head>
<body>
	@include('user.includes.header')
	@yield('content')
	
	@include('user.includes.footer')
</body>
</html>