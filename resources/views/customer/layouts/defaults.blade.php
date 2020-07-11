<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('customer.includes.head')
	<title>Document</title>
</head>
<body>
	@include('customer.includes.header')
	@yield('content')
	
	@include('customer.includes.footer')
</body>
</html>