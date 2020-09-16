<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container">
		<div class="rg-wrapper radius">
			<div class="lgn">
				<form class="lgn-form">
					<span>Fill the fields to enter</span>
					<input type="text" placeholder="USERNAME" name="username" id="username" required autofocus>
					<input type="password" placeholder="PASSWORD" name="password" id="password"required>
					<button type="submit" class="frm-btn" type="submit">Sign in</button>
				</form>
				<div class="rg-link">
					<p>don't have an account yet ?</p>
					<a href="registration.php">Sign Up</a>	
				</div>
				<!-- <a href="slot.php">play as guest</a> -->
			</div>
		</div>
	</div>
	<script src="script/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script src="script/login.js"></script>
</body>
</html>