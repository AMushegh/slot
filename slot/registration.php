<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
		<link rel="stylesheet" href="css/style.css"> 
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
		<link rel="stylesheet" href="css/registration.css">
	</head>

	<body>
		<div class="container">
			<div class="reg-content radius">
					<form class="reg-frm" id="reg-form" autocomplete="off">
						<span>Fill the fields for registration</span>
						<input type="text" placeholder="FIRST NAME" name="firstname" id="firstname" required autofocus>
						<input type="text" placeholder="LAST NAME" name="lastname" id="lastname" required>
						<input type="text" placeholder="USERNAME" name="username" id="username" required>
						<input type="password" placeholder="PASSWORD" name="password" id="password" required>
						<input type="password" placeholder="REPEAT PASSWORD" name="password1" id="password1" required>
						<input type="email" placeholder="Email" name="email" id="email" >
						<button class="reg-btn" name="create">register</button>
					</form>
					
					<div class="reg-link">
						<p>already have an account ?</p>
						<a href="index.php">Sign in</a>
					</div>
			</div>
		</div>
		<script src="script/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<script src="script/registration.js"></script>
	</body>

</html>