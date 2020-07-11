<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="author" content="Mohammad Hoque">
	<title>Verify Email</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

</head>
<body>
	<div class="container-fluid offset-lg-3 col-lg-6 offset-md-3 col-md-6">
		<h2><b>Hello!</b></h2>
		<p>Click the button below to activate your Account</p>
		<div class="container justify-content-center">
			<a href="{{route('sendAdminEmailDone',['email'=>$email, 'verifyToken'=>$token, 'role'=>$role])}}" class="btn btn-link">Verify Account</a>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>