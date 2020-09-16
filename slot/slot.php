<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="wrapper radius">
				<div class="slot_col" id='col_1'></div>
				<div class="slot_col" id='col_2'></div>
				<div class="slot_col" id='col_2'></div>
				<div class="slot_col" id='col_2'></div>
			</div>
			<input type="text" class="mny-amnt radius" name="" id="pt" value="">
			<button id="btn" class="myButton">Spin</button>
			<div class="update radius">
				<h1>You dont have enough money to spin</h1>
				<input type="text" class="radius" id="amnt-add" placeholder="Write the amount of money">
				<button id="update-button">update</button>
			</div>
		</div>
	</div>
	<script src="script/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<!-- <script src="script/slotwin.js"></script> -->
	<script src="script/slot.js"></script>
</body>
</html>